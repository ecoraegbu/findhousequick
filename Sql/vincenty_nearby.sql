CREATE PROCEDURE FindNearbyProperties(
    IN userLat FLOAT,
    IN userLon FLOAT
)
BEGIN
    DECLARE propertyId INT;
    DECLARE propertyLat FLOAT;
    DECLARE propertyLon FLOAT;
    DECLARE dist FLOAT;

    DECLARE done INT DEFAULT 0;

    DECLARE propertyCursor CURSOR FOR
        SELECT id, latitude, longitude
        FROM property;

    DECLARE CONTINUE HANDLER FOR NOT FOUND SET done = 1;

    CREATE TEMPORARY TABLE NearbyProperties (
        id INT,
        latitude FLOAT,
        longitude FLOAT,
        distance FLOAT
    );

    OPEN propertyCursor;

    read_loop: LOOP
        FETCH propertyCursor INTO propertyId, propertyLat, propertyLon;
        IF done THEN
            LEAVE read_loop;
        END IF;

        CALL VincentyDistance(userLat, userLon, propertyLat, propertyLon, dist);

        INSERT INTO NearbyProperties (id, latitude, longitude, distance)
        VALUES (propertyId, propertyLat, propertyLon, dist);
    END LOOP;

    CLOSE propertyCursor;

    SELECT * FROM NearbyProperties
    ORDER BY distance ASC;

    DROP TEMPORARY TABLE NearbyProperties;
END;
