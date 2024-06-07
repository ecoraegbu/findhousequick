<?php
require_once(dirname(__FILE__).'/Core/Init.php');

print(Hash::generate_unique_id(10,'chu'));
/* $property = new Property();
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
 */
/* $connection = Database::getInstance();
$connection->execute_sql_script('findhousequick','Sql/states.sql'); */
?>

<!-- <!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>State and LGA Dropdowns</title>
    

  </head>
  <body>
    <form>
      <label for="state-dropdown">State:</label>
      <select id="state-dropdown" name="state" data-table="states">

        <option value="">Select a state</option>
      </select>
      <br>
      <label for="lga-dropdown">LGA:</label>
      <select id="lga-dropdown" name="lga" data-table="lgas">

        <option value="">Select an LGA</option>
      </select>
      <input type="submit">
    </form>
    <script src="populatedropdown.js"></script>
  </body>
</html> -->
