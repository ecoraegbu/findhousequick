<?php
require_once 'core/init.php';

$response = ['status' => 'success', 'message' => 'Logged out successfully'];

$user = new User();
$user->logout();

echo json_encode($response);

