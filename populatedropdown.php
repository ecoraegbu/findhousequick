<?php

// Connect to the database
$host = 'localhost';
$dbname = 'findhousequick';
$username = 'root';
$password = '';
$conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);

// Retrieve the state options
$stateOptions = '';
$stmt = $conn->query('SELECT * FROM states');
while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
  $stateOptions .= '<option value="' . $row['id'] . '">' . $row['state_name'] . '</option>';
}

// Retrieve the LGA options based on the selected state
if (isset($_POST['state'])) {
  $lgaOptions = '';
  $stateId = $_POST['state'];
  $stmt = $conn->prepare('SELECT * FROM lgas WHERE state_id = :state_id');
  $stmt->bindParam(':state_id', $stateId);
  $stmt->execute();
  while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    $lgaOptions .= '<option value="' . $row['id'] . '">' . $row['lga_name'] . '</option>';
  }
  echo $lgaOptions;
} else {
  echo '<option value="">Select an LGA</option>';
}

// Return the state options
echo $stateOptions;

?>
