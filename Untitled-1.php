// Mapping of filters to SQL conditions
    $filterMapping = [
        'maxDistance' => "@distance <= ?",
        'minPrice' => "price >= ?",
        'maxPrice' => "price <= ?",
        'propertyType' => "type = ?",
        'status' => "status = ?",
        'location' => "(city = ? OR state = ? OR lga = ?)",
        'room' => "rooms = ?",
        'bedroom' => "bedrooms = ?",
        'toilet' => "bathrooms = ?",
    ];

    // Build conditions and parameters based on provided filters
    $conditions = [];
    foreach ($filterMapping as $key => $condition) {
        if (isset($filters[$key]) && $filters[$key] !== '') {
            $conditions[] = $condition;
            if ($key === 'location') {
                // For location, add three parameters
                $params[] = $filters[$key];
                $params[] = $filters[$key];
                $params[] = $filters[$key];
            } else {
                // For other filters, add one parameter
                $params[] = $filters[$key];
            }
        }
    }

    // Combine conditions into SQL WHERE clause
    $conditions = implode(' AND ', $conditions);
    $sql .= $conditions ? " WHERE $conditions" : "";
