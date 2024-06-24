<?php
class Property {
    private $connection;
    private $directorycreator;
    
    public function __construct(){
        $this->connection = Database::getInstance();
        $this->directorycreator = new Directorycreator;
    }
    public function new_property($data = array())
    {

        if($this->connection->insert('property', $data)){
            //set a session:flash or a system of notifying successful transaction
            Session::flash('message', 'Property created successfully!');

        }else{
            //set a session flash or a system of notifying failed transaction
            Session::flash('message', 'Property not Created!');

        }

    }
    public function update_property($fields, $property_id){
        //this update-property method will update an existing record of a property in the database
        if($this->connection->update('property',  $fields, $property_id)){
            Session::flash('message', 'Property record updated successfully!');

        }else{
            Session::flash('message', 'Record update failed');
        }
        
    }
    public function delete_property(){
        //this delete_property method will delete an existing record of a property from the database
    }
    public function get_property_details($property_id){
        //this get_property_details method will return the details of the requested property
        $property = $this->connection->get('property', ['id', '=', $property_id]);
        if($property->count()){
            return $property->first();
        }
    }

    public function listings($id, $params, $page, $itemsPerPage) {
        // Get the total count of items
        $sql = "SELECT * FROM property WHERE landlord_id = ? OR agent_id = ?";
        $totalItems = $this->connection->query($sql, $params)->count();
        // Calculate the offset
        $offset = ($page - 1) * $itemsPerPage;
        $itemsPerPage = (int) $itemsPerPage;
        $sql = "SELECT * FROM property WHERE landlord_id = ? OR agent_id = ? LIMIT $itemsPerPage OFFSET $offset";

        // Build the SQL query with LIMIT clause directly in the string
       
    
        // Execute the query
        $result = $this->connection->query($sql, $params);
    

    
        // Calculate total pages
        $totalPages = ceil($totalItems / $itemsPerPage);
    
        if ($totalItems > 0) {
            return [
                'items' => $result->results(),
                'currentPage' => $page,
                'itemsPerPage' => $itemsPerPage,
                'totalItems' => $totalItems,
                'totalPages' => $totalPages
            ];
        }
    
        return [
            'items' => [],
            'currentPage' => $page,
            'itemsPerPage' => $itemsPerPage,
            'totalItems' => 0,
            'totalPages' => 0
        ];
    }
    public function get_all_property(){
        $sql = "select * from property";
        $result =$this->connection->query($sql);
        if($result->count()){
            return $result->results();
        }
    }/* 
     public function get_similar($propertyId, $offset, $pageSize){
        $property = $this->get_property_details($propertyId);
        $offset = (int) $offset;
        $pageSize = (int) $pageSize;
        $sql = "SELECT * FROM property
        WHERE type = '$property->type'
        AND city = '$property->city'
        AND state = '$property->state'
        AND lga = '$property->lga'
        AND bedrooms = $property->bedrooms
        AND bathrooms = $property->bathrooms
        AND id <> $propertyId
        LIMIT $offset, $pageSize";

        $result = $this->connection->query($sql);
        if (!$result->error()) {
        return $result->results();
        } else {
            return [];
        }
    }  */
    public function get_paged($table, $offset, $pageSize) {
        $offset = (int) $offset;
        $pageSize = (int) $pageSize;
        $sql = "SELECT * FROM $table LIMIT $offset, $pageSize";
        
        $result = $this->connection->query($sql);
        if (!$result->error()) {
            return $result->results();
        } else {
            return [];
        }
    }
    
    public function get_filtered_properties($filters, $offset, $pageSize) {
        $userLatitude = $filters['userLatitude'] ?? null;
        $userLongitude = $filters['userLongitude'] ?? null;
        $minPrice = $filters['minPrice'] ?? null;
        $maxPrice = $filters['maxPrice'] ?? null;
        $propertyType = $filters['propertyType'] ?? null;
        $status = $filters['status'] ?? null;
        $purpose = $filters['purpose'] ?? null;
        $city = $filters['city'] ?? null;
        $state = $filters['state'] ?? null;
        $lga = $filters['lga'] ?? null;
        $bedrooms = $filters['bedrooms'] ?? null;
        $bathrooms = $filters['bathrooms'] ?? null;
        $toilets = $filters['toilets'] ?? null;
    
        $conditions = [];
        $params = [];
    
        // If no latitude and longitude are provided, return an empty result
        if (!$userLatitude || !$userLongitude) {
            return [];
        }
    
        $sql = "CALL CalculateDistance($userLatitude, $userLongitude);";

        $stmt = $this->connection->query($sql);
    
        if (!$stmt->error()) {
            // Select properties and their distances from the `distances` table
            $sql = "SELECT p.* 
                    FROM property p 
                    JOIN distances ON p.latitude = distances.latitude AND p.longitude = distances.longitude"; 
    
            // Filter mapping
            $filterMapping = [
                'minPrice' => 'price',
                'maxPrice' => 'price',
                'propertyType' => 'type',
                'status' => 'status',
                'purpose' => 'purpose',
                'city' => 'city',
                'state' => 'state',
                'lga' => 'lga',
                'bedrooms' => 'bedrooms',
                'bathrooms' => 'bathrooms',
                'toilets' => 'toilets',
            ];
    
            // Add filter conditions
            foreach ($filterMapping as $filterName => $columnName) {
                if (isset($filters[$filterName])) {
                    if ($filterName === 'minPrice' && $filterName === 'maxPrice') {
                        $conditions[] = "p.$columnName BETWEEN :$filterName AND :maxPrice";
                        $params[':' . $filterName] = $filters[$filterName];
                        $params[':maxPrice'] = $filters['maxPrice'];
                    } elseif (isset($filters[$filterName])) {
                        $conditions[] = "p.$columnName = :$filterName";
                        $params[':' . $filterName] = $filters[$filterName];
                    }
                }
            }
    
            // Apply the conditions to the query
            $conditions = implode(' AND ', $conditions);
            $sql .= $conditions ? " WHERE $conditions" : "";
    
            // Apply ordering and pagination
            $sql .= " ORDER BY distance ASC LIMIT :offset, :pageSize";
            $params[':offset'] = $offset;
            $params[':pageSize'] = $pageSize;
    
            $stmt = $this->connection->query($sql, $params);
    
            if (!$stmt->error()) {
                return $stmt->results();
            }
        }
    
        return [];
    }
    public function filter_properties($filters, $offset, $pageSize) {
        $userLatitude = $filters['userLatitude'] ?? null;
        $userLongitude = $filters['userLongitude'] ?? null;
        $minPrice = $filters['minPrice'] ?? null;
        $maxPrice = $filters['maxPrice'] ?? null;
        $propertyType = $filters['propertyType'] ?? null;
        $status = $filters['status'] ?? null;
        $purpose = $filters['purpose'] ?? null;
        $city = $filters['city'] ?? null;
        $state = $filters['state'] ?? null;
        $lga = $filters['lga'] ?? null;
        $bedrooms = $filters['bedrooms'] ?? null;
        $bathrooms = $filters['bathrooms'] ?? null;
        $toilets = $filters['toilets'] ?? null;
    
        // Execute the stored procedure to calculate distances
        
        $sql = "CALL CalculateDistance($userLatitude, $userLongitude);";
        $this->connection->query($sql);
    
        // Construct the SQL query with all filters applied
        $sql = "SELECT * FROM NearbyProperties WHERE ";
            // Handle price filters
    if (isset($filters['minPrice'])) {
        $sql .= "price >= $minPrice";
    }
    if (isset($filters['maxPrice'])) {
        
            $sql .= " AND price <= $maxPrice";
        } 

        $conditions = [];
        $params = [];
    
        // Filter mapping
        $filterMapping = [
            'propertyType' => 'type',
            'status' => 'status',
            'purpose' => 'purpose',
            'city' => 'city',
            'state' => 'state',
            'lga' => 'lga',
            'bedrooms' => 'bedrooms',
            'bathrooms' => 'bathrooms',
            'toilets' => 'toilets',
        ];
    
/*         // Add price filters
        if ($minPrice) {
            $conditions[] = "price > ?";
            $params['price'] = $minPrice; // Key is 'price' from filter mapping
        }
        if ($maxPrice) {
            $conditions[] = "price < ?";
            $params['price'] = $maxPrice; // Key is 'price' from filter mapping
        } */
    
        // Add other filters
        foreach ($filterMapping as $filterName => $columnName) {
            if (isset($filters[$filterName])) {
                $sql .= " AND $columnName = ?";
                $conditions[] = "$columnName = ?";
                $params[$columnName] = $filters[$filterName]; // Key is from filter mapping
            }
        }
    
        // Combine conditions with AND operator
        //$sql .= implode(' AND ', $conditions);
    
        // Add ordering and pagination
        $sql .= " ORDER BY distance ASC";
        //$params['offset'] = $offset;
        //$params['pageSize'] = $pageSize;
        var_dump($sql);
        var_dump($params);
        // Execute the query with prepared statement
        $stmt = $this->connection->query($sql, $params);    
        if (!$stmt->error()) {
            return $stmt->results();
        }
    
        return [];
    }
    public function get_filtered_properties_($filters, $offset, $pageSize) {
        // Default filters (for testing purposes, adjust as needed)
/*         $defaultFilters = [
            'minPrice' => 300000,
            'maxPrice' => 400000,
            'status' => 'available',
        ];
    
        // Merge default filters with passed filters
        $filters = array_merge($defaultFilters, $filters); */
    
        $userLatitude = isset($filters['userLatitude']) ? $filters['userLatitude'] : null;
        $userLongitude = isset($filters['userLongitude']) ? $filters['userLongitude'] : null;
    
        $params = [];
    
        if ($userLatitude !== null && $userLongitude !== null) {
            // If user coordinates are provided, use stored procedure
            $sql = "CALL VincentyDistance(?, ?, property.latitude, property.longitude, @distance)";
            $params = [
                $userLatitude,
                $userLongitude
            ];
        } else {
            // If user coordinates are not provided, select all properties
            $sql = "SELECT * FROM property";
        }
    
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
    
        if ($userLatitude !== null && $userLongitude !== null) {
            // If using stored procedure, order by @distance ASC
            $sql .= " ORDER BY @distance ASC";
        }
    
        // Add LIMIT and OFFSET to the SQL query
        $sql .= " LIMIT $offset, $pageSize";
    
        // Execute the query
        $result = $this->connection->query($sql, $params);
    
        if (!$result->error()) {
            return $result->results();
        } else {
            return [];
        }
    }
}