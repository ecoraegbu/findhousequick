CREATE PROCEDURE findpropertiesbyradius(
    IN userLat FLOAT,
    IN userLon FLOAT,
    IN radius FLOAT
)
BEGIN
    DECLARE propertyLat FLOAT;
    DECLARE propertyLon FLOAT;
    DECLARE dist FLOAT;

    DECLARE done INT DEFAULT 0;

    DECLARE propertyCursor CURSOR FOR
        SELECT latitude, longitude
        FROM property;

    DECLARE CONTINUE HANDLER FOR NOT FOUND SET done = 1;

    CREATE TEMPORARY TABLE findpropertiesbyradius (
        id INT,
        name VARCHAR(255),
        latitude FLOAT,
        longitude FLOAT,
        distance FLOAT
    );

    OPEN propertyCursor;

    read_loop: LOOP
        FETCH propertyCursor INTO propertyLat, propertyLon;
        IF done THEN
            LEAVE read_loop;
        END IF;

        CALL VincentyDistance(userLat, userLon, propertyLat, propertyLon, dist);

        IF dist <= radius THEN
            INSERT INTO findpropertiesbyradius (id, latitude, longitude, distance)
            SELECT id, name, latitude, longitude, dist
            FROM Properties
            WHERE latitude = propertyLat AND longitude = propertyLon;
        END IF;
    END LOOP;

    CLOSE propertyCursor;

    SELECT * FROM findpropertiesbyradius;

    DROP TEMPORARY TABLE findpropertiesbyradius;
END;
