<?php
require_once '../Core/Init.php';
header('Access-Control-Allow-Origin: *'); // Replace * with the specific origin if needed
header('Access-Control-Allow-Methods: GET, POST, OPTIONS');
header('Access-Control-Allow-Headers: Content-Type');

if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    exit();
}
$message_data = new Messages();
$response = [];
$action = Input::get('action') ? Input::get('action') : 'default';
$sender_id = Input::get('sender_id') ? intval(Input::get('sender_id')) : null;
$recipient_id = Input::get('recipient_id') ? intval(Input::get('recipient_id')) : null;
$message_id = Input::get('message_id') ? intval(Input::get('message_id')) : null;




// Switch case to handle different types of data requests
switch ($action) {
    // ALL CASES SHOULD HAVE THE CAPABILITY FOR FILTRERING PROPERTIES WITH THE EXCEIPTION OF SINGLE.
    case 'send':
        break;
    case 'get':
        $response = $message_data->get_message($message_id);
        break;

    // Add more cases as needed for different data types
    case 'get_all':
        $response = $message_data->get_all_messages($recipient_id);
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