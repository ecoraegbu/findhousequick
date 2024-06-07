<?php
require_once '../Core/Init.php';
header('Access-Control-Allow-Origin: *'); // Replace * with the specific origin if needed
header('Access-Control-Allow-Methods: GET, POST, OPTIONS');
header('Access-Control-Allow-Headers: Content-Type');

if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    exit();
}
if(Input::exists()){
   
$user_role = Input::get('user_role');
$user = Input::get('user');
switch ($user_role) {
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