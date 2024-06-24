<?php
require_once '../Core/Init.php';

// Allow cross-origin requests
header('Access-Control-Allow-Origin: *'); // Replace * with the specific origin if needed
header('Access-Control-Allow-Methods: GET, POST, OPTIONS');
header('Access-Control-Allow-Headers: Content-Type');

// Handle preflight requests
if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    exit();
}

// Get the session data
$sessionData = Session::all();

// Handle POST request for updating location coordinates
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get the location coordinates, action, and specifier from the request body
    $data = json_decode(file_get_contents('php://input'), true);
    // Assign null to variables if the data wasn't parsed in
    $coordinates = $data['coordinates'] ?? null;
    $action = $data['action'] ?? null;
    $specifier = $data['specifier'] ?? null; 

    // Validate the coordinates
    if (isset($coordinates['latitude']) && isset($coordinates['longitude'])) {
        switch ($action) {
            case 'put':
                // Update the session data with the coordinates
                // Update the specified specifier
                if(Session::put($specifier, $coordinates)){
                    $response = [
                        'success' => true,
                        'message' => "{$specifier} updated successfully."
                    ];
                }else{
                    $response = [
                        'success' => false,
                        'message' => "{$specifier} update failed."
                    ];
                }
                
                break;
            case 'get':
                $message = Session::get($specifier);
                if ($message !== null){
                    $response = [
                        'success' => true,
                        'message' => Session::get($specifier)
                    ];
                }else{
                    $response = [
                        'success' => false,
                        'message' => 'Session does not exist'
                    ];
                }
                
                break;
            case 'update':
                // Update the session data with the coordinates
                if (Session::update($specifier, $coordinates)){
                    $response = [
                        'success' => true,
                        'message' => "{$specifier} updated successfully."
                    ];
                } else{
                    $response = [
                        'success' => false,
                        'message' => "{$specifier} update failed."
                    ];
                }
                
                
                break;
            case 'delete':
                if (Session::delete($specifier)){
                    $response = [
                        'success' => true,
                        'message' => "{$specifier} Deleted successfully."
                    ];
                } else{
                    $response = [
                        'success' => false,
                        'message' => "{$specifier} Delete failed."
                    ];
                }
                
                break;
            case 'all':
                $response = [
                    'success' => true,
                    'message' => $sessionData
                ];
            default:
                $response = [
                    'success' => false,
                    'message' => 'Invalid action.'
                ];
                break;
        }
    } else {
        // Return an error response
        $response = [
            'success' => false,
            'message' => 'Invalid location coordinates.'
        ];
    }

    // Encode the response as JSON
    echo json_encode($response);
    exit;
}

// Encode the session data as JSON and send it
echo json_encode($sessionData);