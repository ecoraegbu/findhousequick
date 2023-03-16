<?php
class Landlord{
    private $connection;
    
    private function __construct(){
        $this->connection = Database::getInstance();
    }
    public function get_landlord_details() {
        $query = "";
    
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
    public function get_total_tenants_single_landlord($landlord_id) {
        $query = "SELECT COUNT(*) as total_tenants FROM tenants t JOIN property p ON p.id = t.property_id
                  JOIN landlords l ON l.landlord_id = p.landlord_id
                  WHERE l.landlord_id = $landlord_id;";
    
        $result = $this->connection->agent($query);
        if ($result->count()){
            return $result->first();
        }
    
    }    public function get_all_tenant_details_single_landlord($landlord_id) {
        $query = "SELECT u.email, ud.first_name, ud.last_name, ud.phone, t.tenancy_start_date, t.tenancy_end_date
        FROM users u
        JOIN landlords l ON l.landlord_id = u.id
        JOIN property p ON p.landlord_id = l.landlord_id
        JOIN tenants t ON t.property_id = p.id
        JOIN users u2 ON u2.id = t.tenant_id
        JOIN user_details ud ON ud.user_id = u2.id
        WHERE a.agent_id = $landlord_id;";
    
        $result = $this->connection->agent($query);
        if ($result->count()){
            return $result->first();
        }
    
    }    public function get_landlord_total_properties($landlord_id) {
        $query = "SELECT COUNT(*) AS total_properties FROM property p JOIN landlord l 
                  ON l.landlord_id = p.landlord_id WHERE l.landlord_id = $landlord_id;";
    
        $result = $this->connection->agent($query);
        if ($result->count()){
            return $result->first();
        }
    
    }    public function get_details_of_all_properties($agent_id) {
        $query = "SELECT * FROM property WHERE agent_id = $agent_id";
    
        $result = $this->connection->agent($query);
        if ($result->count()){
            return $result->first();
        }
    
    }  
    
    }    
    
    
    
        
    
    
