<?php

class Tenants {
    private $connection;

    public function __construct() {
        $this->connection = Database::getInstance();
    }

    // Create a new tenant
    public function new_tenant($data = array()) {
        $sql = "INSERT INTO tenants (id, tenant_id, property_id, tenancy_start_date, tenancy_end_date) VALUES (?, ?, ?, ?, ?)";
        if ($this->connection->query($sql, $data)){
            //set a session:flash or a system of notifying successful transaction
            Session::flash('message', 'Tenancy Record created successfully!');
        }
    }

    // Get a specific tenant by ID
    public function get_tenant($id) {
        $sql = "SELECT * FROM tenants WHERE tenant_id = $id";
        $result = $this->connection->query($sql);
        if(!$result->error()){
            return $result->results();
        } else { 
            return [];
        }
    }

    // Get all tenants
    public function get_all_tenants() {
        $sql = "SELECT * FROM tenants";
        $result = $this->connection->query($sql);
        if (!$result->error()){
            return $result->results();
        }else {
            return [];
        }
    }

    // Delete a tenant
    public function delete_tenant($id) {
        $sql = "DELETE FROM tenants WHERE id = ?";

    }

    // Update tenant information
    public function update_tenant($id, $data) {

    }

    // Search tenants by name or email
    public function search_tenants($query) {
        $sql = "SELECT * FROM tenants WHERE name LIKE ? OR email LIKE ?";
/*         $stmt = $this->connection->prepare($sql);
        $search = "%$query%";
        $stmt->bind_param("ss", $search, $search);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC); */
    }

    // Get tenants by status
    public function get_tenants_by_status($status) {
        $sql = "SELECT * FROM tenants WHERE status = ?";
/*         $stmt = $this->connection->prepare($sql);
        $stmt->bind_param("s", $status);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC); */
    }

    public function single_landlords_tenants($id, $page, $itemsPerPage){
                // Get the total count of items
                 $sql = " SELECT u.email AS tenant_email, ud.first_name, ud.last_name, ud.phone, ud.address AS tenant_address,
                    ud.age,
                    ud.sex,
                    ud.marital_status,
                    ud.employment_status,
                    p.address AS property_address,
                    p.city,
                    p.state,
                    p.lga,
                    p.type AS property_type,
                    p.bedrooms,
                    p.bathrooms,
                    t.tenancy_start_date,
                    t.tenancy_end_date
                FROM 
                    users u
                JOIN 
                    user_details ud ON u.id = ud.user_id
                JOIN 
                    tenants t ON u.id = t.tenant_id
                JOIN 
                    property p ON t.property_id = p.id
                WHERE 
                    p.landlord_id = $id OR p.agent_id = $id;";
                $totalItems = $this->connection->query($sql)->count();
                // Calculate the offset
                $offset = ($page - 1) * $itemsPerPage;
                $itemsPerPage = (int) $itemsPerPage;
        $sql = " SELECT u.email AS tenant_email, ud.first_name, ud.last_name, ud.phone, ud.address AS tenant_address,
                    ud.age,
                    ud.sex,
                    ud.marital_status,
                    ud.employment_status,
                    p.address AS property_address,
                    p.city,
                    p.state,
                    p.lga,
                    p.type AS property_type,
                    p.bedrooms,
                    p.bathrooms,
                    t.tenancy_start_date,
                    t.tenancy_end_date
                FROM 
                    users u
                JOIN 
                    user_details ud ON u.id = ud.user_id
                JOIN 
                    tenants t ON u.id = t.tenant_id
                JOIN 
                    property p ON t.property_id = p.id
                WHERE 
                    p.landlord_id = $id OR p.agent_id = $id
                ORDER BY t.tenancy_start_date DESC
                LIMIT $itemsPerPage OFFSET $offset;";

        // Execute the query
        $result = $this->connection->query($sql);
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
}