CREATE PROCEDURE VincentyDistance(
    IN lat1 FLOAT, IN lon1 FLOAT,
    IN lat2 FLOAT, IN lon2 FLOAT,
    OUT distance FLOAT
)
BEGIN
    DECLARE a FLOAT DEFAULT 6378137; -- Earth's semi-major axis (in meters)
    DECLARE b FLOAT DEFAULT 6356752.314245; -- Earth's semi-minor axis (in meters)
    DECLARE f FLOAT DEFAULT (a - b) / a; -- Flattening factor

    DECLARE U1 FLOAT;
    DECLARE U2 FLOAT;
    DECLARE sinU1 FLOAT;
    DECLARE cosU1 FLOAT;
    DECLARE sinU2 FLOAT;
    DECLARE cosU2 FLOAT;
    DECLARE lambda FLOAT;
    DECLARE sinLambda FLOAT;
    DECLARE cosLambda FLOAT;
    DECLARE sinSigma FLOAT;
    DECLARE cosSigma FLOAT;
    DECLARE sigma FLOAT;
    DECLARE sinAlpha FLOAT;
    DECLARE cosAlphaSquared FLOAT;
    DECLARE cos2SigmaM FLOAT;
    DECLARE C FLOAT;

    SET lat1 = RADIANS(lat1);
    SET lon1 = RADIANS(lon1);
    SET lat2 = RADIANS(lat2);
    SET lon2 = RADIANS(lon2);

    SET U1 = ATAN((1 - f) * TAN(PI() / 2 - lat1));
    SET U2 = ATAN((1 - f) * TAN(PI() / 2 - lat2));

    SET sinU1 = SIN(U1);
    SET cosU1 = COS(U1);
    SET sinU2 = SIN(U2);
    SET cosU2 = COS(U2);

    SET lambda = lon2 - lon1;
    SET sinLambda = SIN(lambda);
    SET cosLambda = COS(lambda);

    SET sinSigma = SQRT(cosU2 * sinLambda * cosU2 * sinLambda +
                        (cosU1 * sinU2 - sinU1 * cosU2 * cosLambda) *
                        (cosU1 * sinU2 - sinU1 * cosU2 * cosLambda));

    SET cosSigma = sinU1 * sinU2 + cosU1 * cosU2 * cosLambda;

    SET sigma = ATAN2(sinSigma, cosSigma);

    SET sinAlpha = (cosU1 * cosU2 * sinLambda) / sinSigma;
    SET cosAlphaSquared = 1 - sinAlpha * sinAlpha;

    SET cos2SigmaM = cosSigma - 2 * sinU1 * sinU2 / cosAlphaSquared;

    SET C = f / 16 * cosAlphaSquared * (4 + f * (4 - 3 * cosAlphaSquared));

    SET distance = b * (sigma + C * sinSigma *
                        (cos2SigmaM + C * cosSigma *
                         (-1 + 2 * cos2SigmaM * cos2SigmaM)));
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