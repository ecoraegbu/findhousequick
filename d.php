<?php
require_once "Core/Init.php";
$latitude = 7.5567934;
$longitude = 3.3486891;
$response = Geolocation::get_address($latitude, $longitude);
$jsonResponse = json_encode(Geolocation::get_address($latitude, $longitude) );
echo '<pre>' . htmlspecialchars(json_encode(json_decode($jsonResponse), JSON_PRETTY_PRINT)) . '</pre>';
$address = Geolocation::geocodeAddress($response['constructed_address']);
//echo '<pre>'.$address.'</pre>'; 
var_dump($address);

$latitude = 6.3985756025596;
$longitude = 5.5932226287934;
$response = Geolocation::get_address($latitude, $longitude);
$jsonResponse = json_encode(Geolocation::get_address($latitude, $longitude));
echo '<pre>' . htmlspecialchars(json_encode(json_decode($jsonResponse), JSON_PRETTY_PRINT)) . '</pre>';
$address = Geolocation::geocodeAddress($response['constructed_address']);
//echo '<pre>'.$address.'</pre>'; 
var_dump($address);

$latitude = 6.537216;
$longitude = 3.3488896;
$response = Geolocation::get_address($latitude, $longitude);
$jsonResponse = json_encode(Geolocation::get_address($latitude, $longitude));
echo '<pre>' . htmlspecialchars(json_encode(json_decode($jsonResponse), JSON_PRETTY_PRINT)) . '</pre>'; 
$address = Geolocation::geocodeAddress($response['constructed_address']);
//echo '<pre>'.$address.'</pre>'; 
var_dump($address);