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
    public function get_all_property(){
        $sql = "select * from property";
        $result =$this->connection->query($sql);
        if($result->count()){
            return $result->results();
        }
    }
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
    } 
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
    
    public function get_filered_properties_nearby($filters, $offset, $pageSize) {
        return $this->get_filtered_properties($filters, $offset, $pageSize, true);
    }
    public function get_filtered_properties_($filters, $offset, $pageSize) {
        // Default filters (for testing purposes, adjust as needed)
        $defaultFilters = [
            'minPrice' => 300410,
            'maxPrice' => 4000000,
            'status' => 'available',
        ];
    
        // Merge default filters with passed filters
        $filters = array_merge($defaultFilters, $filters);
    
        $userLatitude = 6.33; //isset($filters['userLatitude']) ? $filters['userLatitude'] : null;
        $userLongitude = 3.66; //isset($filters['userLongitude']) ? $filters['userLongitude'] : null;
    
        // Fetch rows based on filter criteria
        $sql = "SELECT * 
                FROM property
                WHERE price >= ? AND price <= ? AND status = ?";
        $params = [
            $filters['minPrice'],
            $filters['maxPrice'],
            $filters['status']
        ];
    
        $result = $this->connection->query($sql, $params);
        $properties = $result->results();
    
        $distances = [];
    
        foreach ($properties as $property) {
            $sql = "CALL VincentyDistance(?, ?, ?, ?, @distance)";
            $params = [
                $userLatitude,
                $userLongitude,
                $property->latitude,
                $property->longitude
            ];
    
            $this->connection->query($sql, $params);
    
            // Fetch the distance from the stored procedure
            $distanceResult = $this->connection->query("SELECT @distance AS distance");
            $distance = $distanceResult->first()->distance;
    
            // Add distance to property data
            $property->distance = $distance;
            $distances[] = $property;
        }
    
        // Sort properties by distance
        usort($distances, function($a, $b) {
            return $a->distance <=> $b->distance;
        });
    
        // Paginate results
        $pagedResults = array_slice($distances, $offset, $pageSize);
    
        return $pagedResults;
    }
    
    

/*     public function get_similar($propertyId, $filters, $offset, $pageSize) {
        $property = $this->get_property_details($propertyId);
        $userLatitude = $filters['userLatitude'] ?? null;
        $userLongitude = $filters['userLongitude'] ?? null;
        $maxDistance = $filters['maxDistance'] ?? null;
        // Add more filters here.

        $conditions = [
            "type = :type",
            "city = :city",
            "state = :state",
            "lga = :lga",
            "bedrooms = :bedrooms",
            "bathrooms = :bathrooms",
            "id <> :propertyId"
        ];

        $params = [
            ':type' => $property->type,
            ':city' => $property->city,
            ':state' => $property->state,
            ':lga' => $property->lga,
            ':bedrooms' => $property->bedrooms,
            ':bathrooms' => $property->bathrooms,
            ':propertyId' => $propertyId
        ];

        if ($userLatitude && $userLongitude && $maxDistance) {
            $conditions[] = "SQRT(POW(69.1 * (latitude - :userLatitude), 2) + POW(69.1 * (longitude - :userLongitude) * COS(RADIANS(:userLatitude)), 2)) <= :maxDistance";
            $params[':userLatitude'] = $userLatitude;
            $params[':userLongitude'] = $userLongitude;
            $params[':maxDistance'] = $maxDistance;
        }

        $conditions = implode(" AND ", $conditions);
        $sql = "SELECT * FROM property WHERE $conditions ORDER BY SQRT(POW(69.1 * (latitude - :userLatitude), 2) + POW(69.1 * (longitude - :userLongitude) * COS(RADIANS(:userLatitude)), 2)) ASC LIMIT $offset, $pageSize";

        $stmt = $this->connection->query($sql, $params);
        if (!$stmt->error()) {
            return $stmt->results();
        } else {
            return [];
        }}
     */
    public function get_nearby_properties($userLatitude, $userLongitude, $maxDistance, $offset, $pageSize) {
        $sql = "CALL VincentyDistance(:userLatitude, :userLongitude, property.latitude, property.longitude, @distance);";
        $stmt = $this->connection->query($sql, [':userLatitude' => $userLatitude, ':userLongitude' => $userLongitude]);

        if (!$stmt->error()) {
            $sql = "SELECT * FROM property WHERE @distance <= :maxDistance ORDER BY @distance ASC LIMIT :offset, :pageSize";
            $stmt = $this->connection->query($sql, [':maxDistance' => $maxDistance, ':offset' => $offset, ':pageSize' => $pageSize]);

            if (!$stmt->error()) {
                return $stmt->results();
            }
        }

        return [];
    }
    public function filtered_properties($filters, $offset, $pageSize) {
        //WE CAN PROGRAMMATICALLY HANDLE THE PACKING AND UNPACKING OF THIS ARRAY, THEN CHECK IF LATITUDE AND LONGITUDE
        //IS IN THE ARRAY BEFORE RUNNING THE QUERY
        $userLatitude = $filters['userLatitude'] ?? null;
        $userLongitude = $filters['userLongitude'] ?? null;
        $maxDistance = $filters['maxDistance'] ?? null;
        $minPrice = $filters['minPrice'] ?? null;
        $maxPrice = $filters['maxPrice'] ?? null;
        $propertyType = $filters['propertyType'] ?? null;
        // Add more filter variables as needed

        $conditions = [];
        $params = [];

        // Construct the SQL query dynamically based on the provided filters
        $sql = "CALL VincentyDistance(:userLatitude, :userLongitude, property.latitude, property.longitude, @distance);";
        $params[':userLatitude'] = $userLatitude;
        $params[':userLongitude'] = $userLongitude;

        if ($maxDistance) {
            $conditions[] = "@distance <= :maxDistance";
            $params[':maxDistance'] = $maxDistance;
        }

        if ($minPrice && $maxPrice) {
            $conditions[] = "price BETWEEN :minPrice AND :maxPrice";
            $params[':minPrice'] = $minPrice;
            $params[':maxPrice'] = $maxPrice;
        } elseif ($minPrice) {
            $conditions[] = "price >= :minPrice";
            $params[':minPrice'] = $minPrice;
        } elseif ($maxPrice) {
            $conditions[] = "price <= :maxPrice";
            $params[':maxPrice'] = $maxPrice;
        }

        if ($propertyType) {
            $conditions[] = "type = :propertyType";
            $params[':propertyType'] = $propertyType;
        }

        // Add more conditions as needed

        $conditions = implode(' AND ', $conditions);
        $sql .= $conditions ? "SELECT * FROM property WHERE $conditions" : "SELECT * FROM property";
        $sql .= " ORDER BY @distance ASC LIMIT :offset, :pageSize";
        $params[':offset'] = $offset;
        $params[':pageSize'] = $pageSize;

        $result = $this->connection->query($sql);
        if (!$result->error()) {
            return $result->results();
        } else {
            return [];
        }
    }
    
    public function get_filtered_properties($filters, $offset, $pageSize, $includeDistance = false) {
        $userLatitude = $filters['userLatitude'] ?? null;
        $userLongitude = $filters['userLongitude'] ?? null;
        $maxDistance = $filters['maxDistance'] ?? null;
        $minPrice = $filters['minPrice'] ?? null;
        $maxPrice = $filters['maxPrice'] ?? null;
        $propertyType = $filters['propertyType'] ?? null;
        // Add more filter variables as needed

        $conditions = [];
        $params = [];

        // Construct the SQL query dynamically based on the provided filters
        if ($includeDistance && $userLatitude && $userLongitude) {
            $sql = "CALL VincentyDistance(:userLatitude, :userLongitude, property.latitude, property.longitude, @distance);";
            $params[':userLatitude'] = $userLatitude;
            $params[':userLongitude'] = $userLongitude;

            if ($maxDistance) {
                $conditions[] = "@distance <= :maxDistance";
                $params[':maxDistance'] = $maxDistance;
            }
        } else {
            $sql = "SELECT * FROM property";
        }

        if ($minPrice && $maxPrice) {
            $conditions[] = "price BETWEEN :minPrice AND :maxPrice";
            $params[':minPrice'] = $minPrice;
            $params[':maxPrice'] = $maxPrice;
        } elseif ($minPrice) {
            $conditions[] = "price >= :minPrice";
            $params[':minPrice'] = $minPrice;
        } elseif ($maxPrice) {
            $conditions[] = "price <= :maxPrice";
            $params[':maxPrice'] = $maxPrice;
        }

        if ($propertyType) {
            $conditions[] = "type = :propertyType";
            $params[':propertyType'] = $propertyType;
        }

        // Add more conditions as needed

        $conditions = implode(' AND ', $conditions);
        $sql .= $conditions ? " WHERE $conditions" : "";
        $sql .= $includeDistance ? " ORDER BY @distance ASC" : "";
        $sql .= " LIMIT :offset, :pageSize";
        $params[':offset'] = $offset;
        $params[':pageSize'] = $pageSize;

        $stmt = $this->connection->query($sql, $params);

        if (!$stmt->error()) {
            return $stmt->results();
        }

        return [];
    }
}
