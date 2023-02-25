<?php
require_once 'Core/Init.php';


$directory = new DirectoryCreator();

if(isset($_POST['submit'])){
    // Get the uploaded file information
    $file = $_FILES['file'];
    $fileName = $_FILES['file']['name'];
    $fileType = $_FILES['file']['type'];
    $fileTmpName = $_FILES['file']['tmp_name'];
    $fileError = $_FILES['file']['error'];
    $fileSize = $_FILES['file']['size'];

   $folder = $directory->createDirectory('philip', 'omogui', 'bedroom', '/findhousequick/uploads/');
   $upload = new ImageUploader($folder);
   $upload->upload($file);
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
		<label for="file">Choose a file to upload:</label>
		<input type="file" name="file" id="file"><br><br>
		<input type="submit" name="submit" value="Upload File">
	</form>
</body>
</html>

