<?php
require_once 'Core/Init.php';

// HTTPS enforcement
if (!isset($_SERVER['HTTPS']) || $_SERVER['HTTPS'] !== 'on') {
    header('Location: https://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']);
    exit();
}

// Function to get client IP address
function getClientIP() {
    $ip = '';
    if (isset($_SERVER['HTTP_CLIENT_IP'])) {
        $ip = $_SERVER['HTTP_CLIENT_IP'];
    } elseif (isset($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    } elseif (isset($_SERVER['REMOTE_ADDR'])) {
        $ip = $_SERVER['REMOTE_ADDR'];
    }
    return $ip;
}

// IP logging and blocking
$blocked_ips = ['192.168.1.1', '10.0.0.1']; // Example list of blocked IPs, you can fetch from a database or file
$client_ip = getClientIP();

if (in_array($client_ip, $blocked_ips)) {
    die('Your IP has been blocked.');
}

// Rate limiting
if (!isset($_SESSION['login_attempts'])) {
    $_SESSION['login_attempts'] = 0;
}

if ($_SESSION['login_attempts'] > 5) {
    die('Too many login attempts. Please try again later.');
}

// CSRF protection
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!isset($_POST['csrf_token']) || $_POST['csrf_token'] !== $_SESSION['csrf_token']) {
        die('CSRF validation failed.');
    }
}

if (empty($_SESSION['csrf_token'])) {
    $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
}

$user = new User();

if ($user->isloggedin()) {
    // Regenerate session ID on successful login
    session_regenerate_id(true);

    // Log user login activity
    $user->logActivity('login', $client_ip);

    // Reset login attempts on successful login
    $_SESSION['login_attempts'] = 0;

 /*    // Check for unread notifications
    $unreadNotifications = $user->getUnreadNotifications();
    if ($unreadNotifications) {
        // Display notifications (implementation depends on your UI)
    }

    // Check if user profile is complete
    if (!$user->isProfileComplete()) {
        header('Location: ' . BASE_URL . 'user/complete_profile.php');
        exit();
    }
 */
    Session::put('user_role', $user->data()->role);

    if (isset($_SESSION['user_role'])) {
        switch ($_SESSION['user_role']) {
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
    }
} else {
    // Increment login attempts on failed login
    $_SESSION['login_attempts']++;

    // Log failed login attempts
    $user->logActivity('failed_login', $client_ip);
    redirect::to(BASE_URL . 'pages/home.php');
}
