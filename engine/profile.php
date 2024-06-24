<?php
require_once '../Core/Init.php';
header('Access-Control-Allow-Origin: *'); // Replace * with the specific origin if needed
header('Access-Control-Allow-Methods: GET, POST, OPTIONS');
header('Access-Control-Allow-Headers: Content-Type');

if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    exit();
}
$user = new User();
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
            $userdetails = $user->get_user_details($userId);
            $response = $userdetails;
        } else {
            $response = ['error' => 'Missing required parameters for nearby properties'];
        }
        break;

    // Add more cases as needed for different data types
    case 'update':

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