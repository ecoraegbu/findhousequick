public function get_filtered_properties_($filters, $offset, $pageSize) {
    $filters = [
        'minPrice' => "300000",
        'maxPrice' => "400000",
        'status' => "available",
    ];
    $userLatitude = 6.38; // $filters['userLatitude'] ?? null;
    $userLongitude = 3.59; // $filters['userLongitude'] ?? null;
    $maxDistance = 1000; // Example maximum distance in meters

    if ($userLatitude && $userLongitude) {
        $sql = "CALL FindPropertiesWithinDistance(?, ?, ?)";
        $params = [$userLatitude, $userLongitude, $maxDistance];
        
        $stmt = $this->connection->prepare($sql);
        $stmt->execute($params);
        $nearbyProperties = $stmt->fetchAll(PDO::FETCH_ASSOC);

        // Apply additional filters in PHP
        $filteredProperties = array_filter($nearbyProperties, function($property) use ($filters) {
            return $property['price'] >= $filters['minPrice'] &&
                   $property['price'] <= $filters['maxPrice'] &&
                   $property['status'] === $filters['status'];
        });

        // Paginate results
        $pagedProperties = array_slice($filteredProperties, $offset, $pageSize);

        return $pagedProperties;
    } else {
        // Fallback if no location is provided
        $sql = "SELECT * FROM property";
        $params = [];

        $filterMapping = [
            'minPrice' => "price >= ?",
            'maxPrice' => "price <= ?",
            'propertyType' => "type = ?",
            'status' => "status = ?",
            'location' => "(city = ? OR state = ? OR lga = ?)",
            'room' => "rooms = ?",
            'bedroom' => "bedrooms = ?",
            'toilet' => "bathrooms = ?",
        ];

        $conditions = [];

        foreach ($filterMapping as $key => $condition) {
            if (isset($filters[$key]) && $filters[$key] !== '') {
                $conditions[] = $condition;
                if ($key === 'location') {
                    $params[] = $filters[$key];
                    $params[] = $filters[$key];
                    $params[] = $filters[$key];
                } else {
                    $params[] = $filters[$key];
                }
            }
        }

        $conditions = implode(' AND ', $conditions);
        $sql .= $conditions ? " WHERE $conditions" : "";
        $sql .= " LIMIT $offset, $pageSize";

        $stmt = $this->connection->prepare($sql);
        $stmt->execute($params);
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $result;
    }
}
