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


}
