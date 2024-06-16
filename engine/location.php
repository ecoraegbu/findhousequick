<?php
require_once '../Core/Init.php';

header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST, OPTIONS');
header('Access-Control-Allow-Headers: Content-Type');

if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    exit();
}

header('Content-Type: application/json');

$input = file_get_contents('php://input');
$data = json_decode($input, true);

if (isset($data['latitude']) && isset($data['longitude'])) {
    
    //Session::put('updated_coordinates', $data);
    $latitude = $data['latitude'];
    $longitude = $data['longitude'];
    $address = Geolocation::get_address($latitude, $longitude);
    echo json_encode(["message" => $address]);
    //$address = Geolocation::getAddress($latitude, $longitude);
    //$geocoded = Geolocation::geocodeAddress($address);
    //echo json_encode(["message" => $address]);
} else {
        echo json_encode(["message" => "Invalid input"]);
    }
    

