CREATE PROCEDURE VincentyDistance(
    IN lat1 FLOAT, IN lon1 FLOAT, -- Input: Latitude and longitude of the first point
    IN lat2 FLOAT, IN lon2 FLOAT, -- Input: Latitude and longitude of the second point
    OUT distance FLOAT -- Output: Distance between the two points in meters
)
BEGIN
    DECLARE a FLOAT DEFAULT 6378137; -- Earth's semi-major axis (in meters)
    DECLARE b FLOAT DEFAULT 6356752.314245; -- Earth's semi-minor axis (in meters)
    DECLARE f FLOAT DEFAULT (a - b) / a; -- Flattening factor

    DECLARE U1 FLOAT; -- Reduced latitude of the first point
    DECLARE U2 FLOAT; -- Reduced latitude of the second point
    DECLARE sinU1 FLOAT; -- Sine of reduced latitude of the first point
    DECLARE cosU1 FLOAT; -- Cosine of reduced latitude of the first point
    DECLARE sinU2 FLOAT; -- Sine of reduced latitude of the second point
    DECLARE cosU2 FLOAT; -- Cosine of reduced latitude of the second point
    DECLARE lambda FLOAT; -- Difference in longitude between the two points
    DECLARE sinLambda FLOAT; -- Sine of difference in longitude
    DECLARE cosLambda FLOAT; -- Cosine of difference in longitude
    DECLARE sinSigma FLOAT; -- Sine of angular distance between the two points
    DECLARE cosSigma FLOAT; -- Cosine of angular distance between the two points
    DECLARE sigma FLOAT; -- Angular distance between the two points
    DECLARE sinAlpha FLOAT; -- Sine of azimuth angle
    DECLARE cosAlphaSquared FLOAT; -- Squared cosine of azimuth angle
    DECLARE cos2SigmaM FLOAT; -- Cosine of twice the angular distance between the two points
    DECLARE C FLOAT; -- Constant used in the calculation

    SET lat1 = RADIANS(lat1); -- Convert latitude of the first point to radians
    SET lon1 = RADIANS(lon1); -- Convert longitude of the first point to radians
    SET lat2 = RADIANS(lat2); -- Convert latitude of the second point to radians
    SET lon2 = RADIANS(lon2); -- Convert longitude of the second point to radians

    SET U1 = ATAN((1 - f) * TAN(PI() / 2 - lat1)); -- Calculate reduced latitude of the first point
    SET U2 = ATAN((1 - f) * TAN(PI() / 2 - lat2)); -- Calculate reduced latitude of the second point

    SET sinU1 = SIN(U1); -- Calculate sine of reduced latitude of the first point
    SET cosU1 = COS(U1); -- Calculate cosine of reduced latitude of the first point
    SET sinU2 = SIN(U2); -- Calculate sine of reduced latitude of the second point
    SET cosU2 = COS(U2); -- Calculate cosine of reduced latitude of the second point

    SET lambda = lon2 - lon1; -- Calculate difference in longitude between the two points
    SET sinLambda = SIN(lambda); -- Calculate sine of difference in longitude
    SET cosLambda = COS(lambda); -- Calculate cosine of difference in longitude

    SET sinSigma = SQRT(cosU2 * sinLambda * cosU2 * sinLambda +
                        (cosU1 * sinU2 - sinU1 * cosU2 * cosLambda) *
                        (cosU1 * sinU2 - sinU1 * cosU2 * cosLambda)); -- Calculate sine of angular distance
    SET cosSigma = sinU1 * sinU2 + cosU1 * cosU2 * cosLambda; -- Calculate cosine of angular distance

    SET sigma = ATAN2(sinSigma, cosSigma); -- Calculate angular distance between the two points

    SET sinAlpha = (cosU1 * cosU2 * sinLambda) / sinSigma; -- Calculate sine of azimuth angle
    SET cosAlphaSquared = 1 - sinAlpha * sinAlpha; -- Calculate squared cosine of azimuth angle

    SET cos2SigmaM = cosSigma - 2 * sinU1 * sinU2 / cosAlphaSquared; -- Calculate cosine of twice the angular distance
    SET C = f / 16 * cosAlphaSquared * (4 + f * (4 - 3 * cosAlphaSquared)); -- Calculate constant C

    SET distance = b * (sigma + C * sinSigma *
                        (cos2SigmaM + C * cosSigma *
                         (-1 + 2 * cos2SigmaM * cos2SigmaM))); -- Calculate distance in meters
END;

-- Example query
--CALL VincentyDistance(
/*     :userLatitude,
    :userLongitude,
    property.latitude,
    property.longitude,
    @distance
);

SELECT *
FROM property
WHERE @distance <= :maxDistance
ORDER BY @distance ASC; */