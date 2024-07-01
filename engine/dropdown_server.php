<?php
require_once '../Core/Init.php';
header('Access-Control-Allow-Origin: *'); // Replace * with the specific origin if needed
header('Access-Control-Allow-Methods: GET, POST, OPTIONS');
header('Access-Control-Allow-Headers: Content-Type');

if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    exit();
}
$action = Input::get('action')??'';
$stateId = Input::get('state_id') ?? 0;
$dropdown = new Dropdown();

switch($action) {
    case 'get_states':
        echo json_encode($dropdown->getStates());
        break;
    case 'get_lgas':
        echo json_encode($dropdown->getLgas($stateId));
        break;
    default:
        echo json_encode(['error' => 'Invalid action']);
}