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
}
