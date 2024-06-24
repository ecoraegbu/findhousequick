<?php
require_once 'Core/Init.php';



/* // Create a new instance of the Property class
$propertyInstance = new Property();

// Set the user's latitude and longitude
$userLatitude = 6.7749; // Example user latitude
$userLongitude = 3.4194; // Example user longitude

// Set the offset and page size for pagination
$offset = 1; // Starting offset for pagination
$pageSize = 50; // Number of results per page
$filters = [
    'userLatitude' => 6.5244,
    'userLongitude' => 3.3792,
    'minPrice' => 200000, 
    'maxPrice' => 1000000, 
    'propertyType' => '3 bedroom', 
    'city' => 'asaba', 
    'state' => 'delta',
    'bedrooms' => 3,
    'bathrooms' => 4,
    'purpose' => 'sale'
]; */
// Call the get_nearby_properties method
//$nearbyProperties = $propertyInstance->filter_properties($filters, $offset, $pageSize);

/* // Check if there are any nearby properties
if (count($nearbyProperties) > 0) {
    foreach ($nearbyProperties as $property) {
        var_dump($property);
    }
}

 else {
    echo "No nearby properties found.\n";
} */ 
//var_dump (Session::all());
//Session::destroy();
// Usage example
/* $location = Geolocation::getLocationByIP();

if ($location) {
    $latitude = $location['location']['lat'];
    $longitude = $location['location']['lng'];
    $accuracy = $location['accuracy'];
    
    echo "Latitude: " . $latitude . "\n";
    echo "Longitude: " . $longitude . "\n";
    echo "Accuracy: " . $accuracy . " meters\n";

     $address = Geolocation::getAddress($latitude, $longitude);
     //$address = Geolocation::getAddress(6.397908439646045, 5.593056304101571);
    if ($address) {
        echo "Address: " . $address . "\n";
    } else {
        echo "Unable to retrieve address.\n";
    } 
} else {
    echo "Unable to retrieve your location.\n";
}

/// Geocode an address
$addressToGeocode = $address;
$geocodedLocation = Geolocation::geocodeAddress($addressToGeocode);
if ($geocodedLocation) {
    echo "Geocoded Latitude: " . $geocodedLocation['lat'] . "\n";
    echo "Geocoded Longitude: " . $geocodedLocation['lng'] . "\n";
} else {
    echo "Unable to geocode the address.\n";
}  */

$db = database::getInstance();
$db->execute_sql_script('findhousequick', 'sql/notifications.sql');
//$db->execute_sql_script('findhousequick', 'sql/vincenty_radius.sql'); 
// Send an activation email
/* $email = new Email('ecoraegbu@gmail.com', 'Account Activation', 'account_activation_message','noreply@findhousequick.com','noreply@findhousequick.com', true);
                        
if ($email->send()) {
   echo 'hurray!';
//echo '<div class="alert" style="position: fixed; top: 0; left: 0; width: 100%; background-color: #1877F2; color: white; text-align: center; padding: 10px;">' . Session::flash('account created', 'Your account has been successfully created. Please verify your account by clicking on the message sent to your email address.') . '</div>';
} else {
    // Handle email sending failure
    die('failed to send');
} */