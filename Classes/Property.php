<?php
class Property {
    private $connection;
    private $directorycreator;
    
    public function __construct(){
        $this->connection = Database::getInstance();
        $this->directorycreator = new Directorycreator;
    }
    public function new_property()
    {
        //this new property method will create a new record in the property table of the database

    }
    public function update_property($property_id){
        //this update-property method will update an existing record of a property in the database
    }
    public function delete_property(){
        //this delete_property method will delete an existing record of a property from the database
    }
    public function get_property_details($property_id){
        //this get_property_details method will return the details of the requested property
    }

}
