<?php
require_once 'Core/Init.php';

// HTTPS enforcement
if (!isset($_SERVER['HTTPS']) || $_SERVER['HTTPS'] !== 'on') {
    header('Location: https://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']);
    exit();
}

// Function to get client IP address
$client_ip = Ip::getClientIP(); 

// IP logging and blocking
$blocked_ips = ['192.168.1.1', '10.0.0.1']; // Example list of blocked IPs, you can fetch from a database or file

if (in_array($client_ip, $blocked_ips)) {
    die('Your IP has been blocked.');
}


if (Session::exists('login_attempts') == false) {
    //put session with login_attempts here.
    Session::put('login_attempts', 0);
}

if (Session::get('login_attempts') > 5) {
    die('Too many login attempts. Please try again later.');
}

$user = new User();

if ($user->isLoggedIn()) {
    // Regenerate session ID on successful login
    session_regenerate_id(true);

    // Log user login activity
    $user->logActivity('login', $client_ip);

    // Reset login attempts on successful login
    Session::put('login_attempts', 0);

   /*  // Check for unread notifications
    $unreadNotifications = $user->getUnreadNotifications();
    if ($unreadNotifications) {
        // Display notifications (implementation depends on your UI)
    }

    // Check if user profile is complete
    if (!$user->isProfileComplete()) {
        header('Location: ' . BASE_URL . 'user/complete_profile.php');
        exit();
    } */

    Session::put('user_role', $user->data()->role);

/*     if (Session::exists('user_role')) {
        switch (Session::get('user_role')) {
            case USER_ROLE_ADMIN:
                header('Location: ' . BASE_URL . 'admin/dashboard.php');
                exit();
            case USER_ROLE_AGENT:
                header('Location: ' . BASE_URL . 'agent/dashboard.php');
                exit();
            case USER_ROLE_LANDLORD:
                header('Location: ' . BASE_URL . 'landlord/dashboard.php');
                exit();
            case USER_ROLE_TENANT:
                header('Location: ' . BASE_URL . 'tenant/dashboard.php');
                exit();
            case USER_ROLE_ORDINARY:
                header('Location: ' . BASE_URL . 'pages/dashboard.php');
                exit();
            default:
                header('Location: ' . BASE_URL . '');
                exit();
        }
    } */
    redirect::to(BASE_URL . 'pages/home.php');
} else {
/*     // Increment login attempts on failed login
    Session::put('login_attempts',Session::get('login_attempts') + 1);

    // Log failed login attempts
    //$user->logActivity('failed_login', $client_ip); */
    redirect::to(BASE_URL . 'pages/home.php');
}
