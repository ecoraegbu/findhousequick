<?php
require_once '../Core/Init.php';
header('Access-Control-Allow-Origin: *'); // Replace * with the specific origin if needed
header('Access-Control-Allow-Methods: GET, POST, OPTIONS');
header('Access-Control-Allow-Headers: Content-Type');

if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    exit();
}

//property_server.php?type=nearby&userLatitude=51.5072&userLongitude=-0.1276&maxDistance=10&minPrice=100000&maxPrice=500000&propertyType=Apartment&page=1&pageSize=10
// Initialize necessary variables and classes
$property = new Property();
$response = [];
$page = Input::get('page') ? intval(Input::get('page')) : 1;
$pageSize = Input::get('pageSize') ? intval(Input::get('pageSize')) : 10;
$offset = ($page - 1) * $pageSize;
$type = Input::get('type') ? Input::get('type') : 'default';
$propertyId = Input::get('propertyId') ? Input::get('propertyId') : null;
$userLatitude = Input::get('userLatitude') ? Input::get('userLatitude') : null;
$userLongitude = Input::get('userLongitude') ? Input::get('userLongitude') : null;
$maxDistance = Input::get('maxDistance') ? Input::get('maxDistance') : null;

// Check if 'type' parameter is provided
$type = Input::get('type') ? Input::get('type') : 'default';

// Switch case to handle different types of data requests
switch ($type) {
    // ALL CASES SHOULD HAVE THE CAPABILITY FOR FILTRERING PROPERTIES WITH THE EXCEIPTION OF SINGLE.
    case 'all':
        $properties = $property->get_paged('property', $offset, $pageSize);
        $response = $properties;
        break;

    case 'nearby':
        if ($userLatitude && $userLongitude && $maxDistance) {
            $nearbyProperties = $property->get_nearby_properties($filters, $offset, $pageSize);
            $response = $nearbyProperties;
        } else {
            $response = ['error' => 'Missing required parameters for nearby properties'];
        }
        break;

    // Add more cases as needed for different data types
    case 'single':
        $property = $property->get_property_details($propertyId);
        $response = $property;
        break;
    case 'similar':
        // we have to send the filters
        //SIMILAR PROPERTIES SHOULD HAVE LOCATION SEARCH ENABLED TOO SO USERS CAN FIND SIMILAR PROPERTIES IN OTHER PLACES
        $similarProperties = $property->get_similar($propertyId,  $offset, $pageSize);
        $response = $similarProperties;
        break;
    case 'filter':
        $filters = [];
        foreach ($_GET as $key => $value) {
            if (strpos($key, 'filter') !== false) {
                $filters[$key] = $value;
            }
        }
        $filteredProperties = $property->get_filtered_properties_($filters, $offset, $pageSize);
        $response = $filteredProperties;
    break;
    // Default case if no specific type is matched
    default:
        $response = ['error' => 'Invalid data type requested'];
        break;
}

// Return the response as JSON
echo json_encode($response);