<?php
require_once(dirname(__FILE__).'/Core/Init.php');
$property = new Property();
$house = $property->get_property_details(3);
$properties = $property->get_all_property();
foreach($properties as $property){
    $urls = json_decode($property->images);
    var_dump($urls->{"profile-pic"});
    foreach ($urls as $name => $value){
        //print($property->id . ' '. $name. '='. $value .'<br/>');
    }
}


?>
<?php 
  // some HTML code here
  $fruits = array("apple", "banana", "orange");
  foreach ($fruits as $fruit):
?>
    <!-- some more HTML code -->
    <p><?php echo $fruit; ?></p>
    <!-- some more HTML code -->
<?php endforeach; ?>
