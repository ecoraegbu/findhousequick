<?php
require_once(dirname(__FILE__).'/Core/Init.php');
$property = new Property();
$house = $property->get_property_details(3);
$properties = $property->get_all_property();
foreach($properties as $property){
    $urls = json_decode($property->images);
    foreach ($urls as $name => $value){
        print($property->id . ' '. $name. '='. $value .'<br/>');
    }
}


?>