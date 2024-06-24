<?php
require_once '../Core/Init.php';
header('Access-Control-Allow-Origin: *'); // Replace * with the specific origin if needed
header('Access-Control-Allow-Methods: GET, POST, OPTIONS');
header('Access-Control-Allow-Headers: Content-Type');

if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    exit();
}
$property = new Property();
$response = [];
$action = Input::get('action') ? Input::get('action') : 'default';
$userId = Input::get('user') ? intval(Input::get('user')) : null;

// Switch case to handle different types of data requests
switch ($action) {
    // ALL CASES SHOULD HAVE THE CAPABILITY FOR FILTRERING PROPERTIES WITH THE EXCEIPTION OF SINGLE.
    case 'create':

        break;

        case 'get':
            if ($userId) {
                $page = Input::get('page') ? intval(Input::get('page')) : 1;
                $itemsPerPage = Input::get('itemsPerPage') ? intval(Input::get('itemsPerPage')) : 20;
                
                $params = [
                    'landlord_id' => $userId,
                    'agent_id' => $userId,
                ];
                $listings = $property->listings($userId, $params, $page, $itemsPerPage);
                $response = $listings;
            } else {
                $response = ['error' => 'Missing required parameters for listings'];
            }
            break;

    // Add more cases as needed for different data types
    case 'update':

        break;
    case 'delete':

        break;
    case 'filter':
 
    break;
    // Default case if no specific type is matched
    default:
        $response = ['error' => 'Invalid data type requested'];
        break;
}

// Return the response as JSON
echo json_encode($response);