CREATE PROCEDURE VincentyDistance(
    IN lat1 FLOAT,  -- Input: Latitude of the first point (in degrees)
    IN lon1 FLOAT,  -- Input: Longitude of the first point (in degrees)
    IN lat2 FLOAT,  -- Input: Latitude of the second point (in degrees)
    IN lon2 FLOAT,  -- Input: Longitude of the second point (in degrees)
    OUT distance FLOAT  -- Output: Distance between the two points in meters
)
BEGIN
    -- Constants for Earth radius
    DECLARE a FLOAT DEFAULT 6378137;  -- Earth's semi-major axis (in meters)
    DECLARE b FLOAT DEFAULT 6356752.314245;  -- Earth's semi-minor axis (in meters)
    DECLARE f FLOAT DEFAULT (a - b) / a;  -- Flattening factor

    -- Radians conversion
    DECLARE lat1Rad FLOAT;
    DECLARE lon1Rad FLOAT;
    DECLARE lat2Rad FLOAT;
    DECLARE lon2Rad FLOAT;

    -- Longitude and latitude calculations
    DECLARE L FLOAT;
    DECLARE U1 FLOAT;
    DECLARE U2 FLOAT;

    -- Sine and cosine values
    DECLARE sinU1 FLOAT;
    DECLARE cosU1 FLOAT;
    DECLARE sinU2 FLOAT;
    DECLARE cosU2 FLOAT;

    -- Lambda and iteration variables
    DECLARE lambda FLOAT;
    DECLARE lambdaP FLOAT;
    DECLARE iter INT;
    DECLARE maxIter INT DEFAULT 20;  -- Maximum number of iterations

    -- Intermediate calculations
    DECLARE sinLambda FLOAT;
    DECLARE cosLambda FLOAT;
    DECLARE sinSigma FLOAT;
    DECLARE cosSigma FLOAT;
    DECLARE sigma FLOAT;
    DECLARE sinAlpha FLOAT;
    DECLARE cosSqAlpha FLOAT;
    DECLARE cos2SigmaM FLOAT;
    DECLARE C FLOAT;
    DECLARE sigmaPrime FLOAT;
    DECLARE tolerance FLOAT DEFAULT 0.000000001;  -- Tolerance for convergence

    -- Assign values
    SET lat1Rad = RADIANS(lat1); -- Convert latitude of the first point to radians
    SET lon1Rad = RADIANS(lon1); -- Convert longitude of the first point to radians
    SET lat2Rad = RADIANS(lat2); -- Convert latitude of the second point to radians
    SET lon2Rad = RADIANS(lon2); -- Convert longitude of the second point to radians

    SET L = lon2Rad - lon1Rad;  -- Difference in longitude in radians
    SET U1 = ATAN((1 - f) * TAN(lat1Rad));  -- Reduced latitude of the first point
    SET U2 = ATAN((1 - f) * TAN(lat2Rad));  -- Reduced latitude of the second point

    SET sinU1 = SIN(U1);  -- Sine of reduced latitude of the first point
    SET cosU1 = COS(U1);  -- Cosine of reduced latitude of the first point
    SET sinU2 = SIN(U2);  -- Sine of reduced latitude of the second point
    SET cosU2 = COS(U2);  -- Cosine of reduced latitude of the second point

    SET lambda = L;  -- Initial value for lambda (difference in longitude)
    SET iter = 0;  -- Iteration counter

    -- Iterate until convergence or maximum iterations reached
    REPEAT
        SET lambdaP = lambda;  -- Store the previous value of lambda
        
        SET sinLambda = SIN(lambda);  -- Sine of lambda
        SET cosLambda = COS(lambda);  -- Cosine of lambda

        SET sinSigma = SQRT((cosU2 * sinLambda) * (cosU2 * sinLambda) + (cosU1 * sinU2 - sinU1 * cosU2 * cosLambda) * (cosU1 * sinU2 - sinU1 * cosU2 * cosLambda));  -- Sine of angular distance
        SET cosSigma = sinU1 * sinU2 + cosU1 * cosU2 * cosLambda;  -- Cosine of angular distance
        SET sigma = ATAN2(sinSigma, cosSigma);  -- Angular distance

        SET sinAlpha = (cosU1 * cosU2 * sinLambda) / sinSigma;  -- Sine of azimuth angle
        SET cosSqAlpha = 1 - sinAlpha * sinAlpha;  -- Squared cosine of azimuth angle

        -- Handle possible division by zero
        IF cosSqAlpha <> 0 THEN
            SET cos2SigmaM = cosSigma - 2 * sinU1 * sinU2 / cosSqAlpha;  -- Cosine of twice the angular distance
        ELSE
            SET cos2SigmaM = 0;  -- This condition handles the case when cosSqAlpha is zero
        END IF;

        SET C = (f / 16) * cosSqAlpha * (4 + f * (4 - 3 * cosSqAlpha));  -- Constant used in the calculation
        SET sigmaPrime = sigma + C * sinSigma * (cos2SigmaM + C * cosSigma * (-1 + 2 * cos2SigmaM * cos2SigmaM));  -- Improved angular distance

        SET lambda = L + (1 - C) * f * sinAlpha * (sigmaPrime + C * sinSigma * (cos2SigmaM + C * cosSigma * (-1 + 2 * cos2SigmaM * cos2SigmaM)));  -- Update lambda for the next iteration

        SET iter = iter + 1;  -- Increment iteration count
    UNTIL ABS(lambda - lambdaP) < tolerance OR iter >= maxIter END REPEAT;

    -- Calculate distance in meters
    SET distance = a * sigma;  -- Calculate the final distance using Vincenty's formula
END;