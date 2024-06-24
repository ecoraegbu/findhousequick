CREATE PROCEDURE CalculateDistance(
    IN userLat FLOAT,
    IN userLon FLOAT
)
BEGIN
    -- Declare variables to hold property details
    DECLARE propertyId INT;
    DECLARE propertyLat FLOAT;
    DECLARE propertyLon FLOAT;
    DECLARE dist FLOAT;
    DECLARE done INT DEFAULT 0;

    -- Declare a cursor to iterate through the Property table
    DECLARE propertyCursor CURSOR FOR
        SELECT id, latitude, longitude
        FROM property;

    -- Declare a handler to close the cursor
    DECLARE CONTINUE HANDLER FOR NOT FOUND SET done = 1;

    -- Create a temporary table to store calculated distances
    CREATE TEMPORARY TABLE NearbyProperties (
        id INT,
        latitude FLOAT,
        longitude FLOAT,
        distance FLOAT
    );

    -- Open the cursor
    OPEN propertyCursor;

    -- Loop through each property
    read_loop: LOOP
        -- Fetch the next property
        FETCH propertyCursor INTO propertyId, propertyLat, propertyLon;
        
        -- If the fetch was successful
        IF done THEN
            LEAVE read_loop;
        END IF;

        CALL VincentyDistance(userLat, userLon, propertyLat, propertyLon, dist);

        INSERT INTO NearbyProperties (id, latitude, longitude, distance)
        VALUES (propertyId, propertyLat, propertyLon, dist);
    END LOOP;

    CLOSE propertyCursor;

    -- Select results sorted by distance
    SELECT 
        p.id,
        p.property_id,
        p.address,
        p.city,
        p.state,
        p.lga,
        p.latitude,
        p.longitude,
        p.type,
        p.status,
        p.purpose,
        p.price,
        p.description,
        p.bedrooms,
        p.bathrooms,
        p.toilets,
        p.images,
        p.is_available,
        p.landlord_id,
        p.agent_id,
        p.created_at,
        p.updated_at,
        d.distance
    FROM 
        property p
    JOIN 
        NearbyProperties d ON p.id = d.id
    ORDER BY 
        d.distance ASC;

    DROP TEMPORARY TABLE NearbyProperties;
END;
