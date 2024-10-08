<?php
class Agent{
    private $connection;
    
    private function __construct(){
        $this->connection = Database::getInstance();
    }

    public function get_total_tenants_each_agent() {
        $query = "SELECT a.agent_id, ud.first_name, ud.last_name, COUNT(*) AS total_tenants
                  FROM agents a
                  JOIN users u ON u.id = a.agent_id
                  JOIN user_details ud ON ud.user_id = a.agent_id
                  JOIN property p ON p.agent_id = u.id
                  JOIN tenants t ON t.property_id = p.id
                  GROUP BY a.agent_id";
    
        $result = $this->connection->agent($query);
        if ($result->count()){
            return $result->first();
        }
    
    }
    public function get_total_tenants_single_agent($agent_id) {
        $query = "SELECT COUNT(*) as total_tenants FROM tenants t JOIN property p ON p.id = t.property_id
                  JOIN agents a ON a.agent_id = p.agent_id
                  WHERE a.agent_id = $agent_id;";
    
        $result = $this->connection->agent($query);
        if ($result->count()){
            return $result->first();
        }
    
    }    public function get_all_tenant_details_single_agent($agent_id) {
        $query = "SELECT u.email, u.joined, ud.first_name, ud.last_name, ud.phone, t.tenancy_start_date, t.tenancy_end_date
        FROM users u
        JOIN agents a ON a.agent_id = u.id
        JOIN property p ON p.agent_id = a.agent_id
        JOIN tenants t ON t.property_id = p.id
        JOIN users u2 ON u2.id = t.tenant_id
        JOIN user_details ud ON ud.user_id = u2.id
        WHERE a.agent_id = $agent_id;";
    
        $result = $this->connection->agent($query);
        if ($result->count()){
            return $result->first();
        }
    
    }    public function get_agent_total_properties($agent_id) {
        $query = "SELECT COUNT(*) AS total_properties FROM property p JOIN agents a 
                  ON a.agent_id = p.agent_id WHERE a.agent_id = $agent_id;";
    
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
    
    }    public function get_agent_details() {
        $query = "";
    
        $result = $this->connection->agent($query);
        if ($result->count()){
            return $result->first();
        }
    
    }   
    
    }    
    
    
    
        
    
    
