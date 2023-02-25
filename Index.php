<?php
require_once 'Core/Init.php';


$directory = new DirectoryCreator();
if (Input::exists()){
    
}
if(isset($_POST['submit'])){


foreach ($_FILES as $fieldName => $file) {
    // The imageupload class has been built to rename the images with the $fieldName which is usually
    // the name of the field being uploaded.
    //this only works when it is known beforehand, which picture is being uploaded
    $foldername = $name = $_POST['property_name'];
    //$source = $fieldName; it is property name here. when uploading profile pics then profile pics would be used
    try {
        $folder = $directory->createDirectory('Bright', 'Atogwe', $foldername, '/findhousequick/uploads/');
        //the useridandusername of the user would be used to create the folder where the user's pics would be
        //uploaded into
        $upload = new ImageUploader($folder);
        $path = $upload->upload($file, $fieldName);
        $connection = Database::getInstance();
        print($path);
        $connection->insert('property', array('name' => $path));
        // Do something with the uploaded file path, such as storing it in a database
        //how do i get the file path to store in the database?
    } catch (Exception $e) {
        // Handle the exception, such as displaying an error message to the user
    }
    
}



}
?>

<!DOCTYPE html>
<html>
<head>
	<title>File Upload Form</title>
</head>
<body>
	<h1>File Upload Form</h1>
	<form method="post" action="index.php" enctype="multipart/form-data">
    <label for="property_name">property name</label>
    <input type="text" name="property_name">
    <label>Profile pic:</label>
    <input type="file" name="profile-pic" accept="image/*">
    

    <label>Bedroom pic:</label>
    <input type="file" name="bedroom-pic" accept="image/*">
    

    <label>Parlor pic:</label>
    <input type="file" name="parlor-pic" accept="image/*">
    

    <input type="submit" name="submit" value="Upload">
</form>

</body>
</html>

