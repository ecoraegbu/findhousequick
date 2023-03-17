<?php
require_once 'Core/Init.php';
$user = new User();
if($user->isloggedin()){
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

}else{
    redirect::to(BASE_URL.'pages/home.php');
}
