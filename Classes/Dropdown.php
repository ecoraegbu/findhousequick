<?php
class Dropdown {
    private $db;

    public function __construct() {
        $this->db = Database::getInstance();
    }

    public function getStates() {
        return $this->db->get('states', ['id', '>', 0])->results();
    }

    public function getLgas($stateId) {
        return $this->db->get('lgas', ['state_id', '=', $stateId])->results();
    }
}