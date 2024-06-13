<?php
class Property {
    private $connection;
    private $directorycreator;
    
    public function __construct(){
        $this->connection = Database::getInstance();
        $this->directorycreator = new Directorycreator;
    }

    // ... (other methods)
    public function get_property_details($property_id){
        //this get_property_details method will return the details of the requested property
        $property = $this->connection->get('property', ['id', '=', $property_id]);
        if($property->count()){
            return $property->first();
        }
    }

    public function get_nearby_properties($filters, $offset, $pageSize) {
        return $this->get_filtered_properties($filters, $offset, $pageSize, true);
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

    public function get_similar($propertyId, $filters, $offset, $pageSize) {
        $property = $this->get_property_details($propertyId);
        $userLatitude = $filters['userLatitude'] ?? null;
        $userLongitude = $filters['userLongitude'] ?? null;
        $maxDistance = $filters['maxDistance'] ?? null;

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

        }}}