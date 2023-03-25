<?php
require_once(dirname(__FILE__,2).'/Core/Init.php');
if (isset($_POST['action'])) {
    switch($_POST['action']) {
        case 'get_state_options':
            $dropdown = new Dropdown();
            echo $dropdown->getStateOptions();
            break;
        case 'get_lga_options':
            $stateId = $_POST['state_id'];
            $dropdown = new Dropdown();
            echo $dropdown->getLgaOptions($stateId);
            break;
        default:
            break;
    }
}

class Dropdown {

    private $db;

    public function __construct() {
        $this->db = Database::getInstance();
    }

    public function getStateOptions() {
        $stateOptions = '';
        $states = $this->db->get('states', ['id', '>', 0]);
        if($states->count()){
            foreach ($states->results() as $state) {
                $stateOptions .= '<option value="' . $state->id . '">' . $state->state_name . '</option>';
                
            }
        }
        echo $stateOptions;
    }

    public function getLgaOptions($stateId) {
        $lgaOptions = '';
        $lgas = $this->db->get('lgas', ['state_id', '=', $stateId]);
        if($lgas->count()){
            foreach ($lgas->results() as $lga) {
                $lgaOptions .= '<option value="' . $lga->id . '">' . $lga->lga_name . '</option>';
            }
        }
        return $lgaOptions;
    }

}


?>
