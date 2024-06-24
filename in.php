<?php
// Database connection parameters
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "findhousequick";

try {
    // Create a new PDO connection
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Start a transaction
    $conn->beginTransaction();

    // Parameters for the stored procedure
    $userLat = 12.345678;
    $userLon = 98.765432;

    // Call the stored procedure
    $stmt = $conn->prepare("CALL CalculateDistance(?, ?)");
    $stmt->bindParam(1, $userLat);
    $stmt->bindParam(2, $userLon);
    $stmt->execute();

    // Perform actions on the temporary table created by the stored procedure
    $selectQuery = "
    SELECT 
        np.id,
        np.latitude,
        np.longitude,
        np.distance
    FROM 
        NearbyProperties np
    ORDER BY 
        np.distance ASC";
    $stmt = $conn->prepare($selectQuery);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Commit the transaction
    $conn->commit();

    // Output the results
    if (count($result) > 0) {
        foreach ($result as $row) {
            echo "id: " . $row["id"] . " - Latitude: " . $row["latitude"] . " - Longitude: " . $row["longitude"] . " - Distance: " . $row["distance"] . " km<br>";
        }
    } else {
        echo "0 results";
    }

} catch (PDOException $e) {
    // Roll back the transaction if something failed
    $conn->rollBack();
    echo "Error: " . $e->getMessage();
}

// Close the connection
$conn = null;
