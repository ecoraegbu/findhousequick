<!-- Parent dropdown list -->
<select id="parent">
  <option value="1">Option 1</option>
  <option value="2">Option 2</option>
  <option value="3">Option 3</option>
</select>

<!-- Child dropdown list -->
<select id="child">
</select>

// Listen for changes to the parent dropdown list
$('#parent').on('change', function() {
  // Get the selected value from the parent dropdown list
  var selectedValue = $(this).val();

  // Make an AJAX request to fetch the values for the child dropdown list
  $.ajax({
    url: 'get-child-values.php', // Replace with the URL of your server-side script
    method: 'POST', // Or 'GET' depending on your server-side implementation
    data: { parentValue: selectedValue },
    success: function(data) {
      // Update the child dropdown list with the returned values
      $('#child').html(data);
    },
    error: function() {
      alert('Error fetching child values!');
    }
  });
});


<?php
// Get the value of the parent dropdown list from the AJAX request
$parentValue = $_POST['parentValue'];

// Replace with your own database connection details
$host = 'localhost';
$username = 'your_database_username';
$password = 'your_database_password';
$dbname = 'your_database_name';

// Create a PDO object to connect to the database
try {
  $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
  die("Could not connect to the database: " . $e->getMessage());
}

// Prepare a SQL statement to fetch the child values based on the parent value
$stmt = $pdo->prepare("SELECT child_value FROM child_table WHERE parent_value = :parent_value");
$stmt->bindParam(':parent_value', $parentValue);
$stmt->execute();

// Fetch the child values as an array
$childValues = $stmt->fetchAll(PDO::FETCH_COLUMN);

// Generate HTML for the child dropdown list options
$optionsHtml = '';
foreach ($childValues as $value) {
  $optionsHtml .= '<option value="' . $value . '">' . $value . '</option>';
}

// Return the HTML as the response to the AJAX request
echo $optionsHtml;
?>
