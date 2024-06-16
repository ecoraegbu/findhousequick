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
$sessionData = Session::session();

// Handle POST request for updating location coordinates
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get the location coordinates, action, and specifier from the request body
    $data = json_decode(file_get_contents('php://input'), true);
    $coordinates = $data['coordinates'];
    $action = $data['action'];
    $specifier = $data['specifier']; // Changed from $object to $specifier

    // Validate the coordinates
    if (isset($coordinates['latitude']) && isset($coordinates['longitude'])) {
        switch ($action) {
            case 'put':
                // Update the session data with the coordinates
                Session::put($specifier, $coordinates); // Update the specified specifier
                $response = [
                    'success' => true,
                    'message' => "{$specifier} updated successfully."
                ];
                break;
            case 'get':
                $response = [
                    'success' => true,
                    'message' => Session::get($specifier)
                ];
                break;
            case 'update':
                // Update the session data with the coordinates
                Session::put($specifier, $coordinates); // Update the specified specifier
                $response = [
                    'success' => true,
                    'message' => "{$specifier} updated successfully."
                ];
                break;
            case 'delete':
                Session::delete($specifier);
                $response = [
                    'success' => true,
                    'message' => "{$specifier} deleted successfully."
                ];
                break;
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