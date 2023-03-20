<?php
require_once 'Core/Init.php';
$user = new User();
if ($user->isloggedin()) {
    Session::put('user_role', $user->data()->role);
    print_r($_SESSION);

    // Check if the user is logged in and has a role assigned
    if (isset($_SESSION['user_role'])) {
        // Use a switch statement to redirect based on the user role
        switch ($_SESSION['user_role']) {
            case USER_ROLE_ADMIN:
                // Redirect the admin to the admin dashboard
                header('Location: ' . BASE_URL . 'admin/dashboard.php');
                exit();
            case USER_ROLE_AGENT:
                // Redirect the agent to the agent dashboard
                header('Location: ' . BASE_URL . 'agent/dashboard.php');
                exit();
            case USER_ROLE_LANDLORD:
                // Redirect the landlord to the landlord dashboard
                header('Location: ' . BASE_URL . 'landlord/dashboard.php');
                exit();
            case USER_ROLE_TENANT:
                // Redirect the tenant to the tenant dashboard
                header('Location: ' . BASE_URL . 'tenant/dashboard.php');
                exit();
            case USER_ROLE_ORDINARY:
                // Redirect the ordinary user to the homepage
                header('Location: ' . BASE_URL . 'pages/dashboard.php');
                exit();
            default:
                // Redirect any other user to the homepage
                header('Location: ' . BASE_URL . '');
                exit();
        }
    }
} else {
    redirect::to(BASE_URL . 'pages/home.php');
}


$directory = new Directorycreator();
if (Input::exists()) {
}
if (isset($_POST['submit'])) {


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
