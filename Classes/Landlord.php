<?php
class Landlord{
    private $connection;
    private $landlord_id;
    
    private function __construct($landlord_id){
    // we can pass in the agent id, and use this construct method to store it in a private variable so that
    // we do not always have to add the agent id to the method calls when using it.
        $this->landlord_id = $landlord_id;
        $this->connection = Database::getInstance();
    }
    public function get_landlord_details() {
        $query = "SELECT *
        FROM landlords l
        INNER JOIN user_details ud ON l.landlord_id = ud.user_id
        WHERE l.landlord_id = $this->landlord_id;
        ";
    
        $result = $this->connection->agent($query);
        if ($result->count()){
            return $result->first();
        }
    
    } 

    public function get_total_tenants_each_landlord() {
        $query = "SELECT l.lanlord_id, ud.first_name, ud.last_name, COUNT(*) AS total_tenants
                  FROM landlord l
                  JOIN users u ON u.id = l.landlord_id
                  JOIN user_details ud ON ud.user_id = l.landlord_id
                  JOIN property p ON p.agent_id = u.id
                  JOIN tenants t ON t.property_id = p.id
                  GROUP BY l.landlord_id";
    
        $result = $this->connection->agent($query);
        if ($result->count()){
            return $result->first();
        }
    
    }
    public function get_total_tenants_single_landlord() {
        $query = "SELECT COUNT(*) as total_tenants FROM tenants t JOIN property p ON p.id = t.property_id
                  JOIN landlords l ON l.landlord_id = p.landlord_id
                  WHERE l.landlord_id = $this->landlord_id;";
    
        $result = $this->connection->agent($query);
        if ($result->count()){
            return $result->first();
        }
    
    }    public function get_all_tenant_details_single_landlord() {
        $query = "SELECT u.email, ud.first_name, ud.last_name, ud.phone, t.tenancy_start_date, t.tenancy_end_date
        FROM users u
        JOIN landlords l ON l.landlord_id = u.id
        JOIN property p ON p.landlord_id = l.landlord_id
        JOIN tenants t ON t.property_id = p.id
        JOIN users u2 ON u2.id = t.tenant_id
        JOIN user_details ud ON ud.user_id = u2.id
        WHERE a.agent_id = $this->landlord_id;";
    
        $result = $this->connection->agent($query);
        if ($result->count()){
            return $result->first();
        }
    
    }    public function get_landlord_total_properties() {
        $query = "SELECT COUNT(*) AS total_properties FROM property p JOIN landlord l 
                  ON l.landlord_id = p.landlord_id WHERE l.landlord_id = $this->landlord_id;";
    
        $result = $this->connection->agent($query);
        if ($result->count()){
            return $result->first();
        }
    
    }    public function get_details_of_all_properties() {
        $query = "SELECT * FROM property WHERE agent_id = $this->landlord_id";
    
        $result = $this->connection->agent($query);
        if ($result->count()){
            return $result->first();
        }
    
    }  
    
    }    
    
    
    
        
    
    
