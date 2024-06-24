<?php

require_once '../Core/Init.php';

// Set CORS headers
header('Access-Control-Allow-Origin: *'); // Replace * with the specific origin if needed
header('Access-Control-Allow-Methods: GET, POST, OPTIONS');
header('Access-Control-Allow-Headers: Content-Type');

// Handle preflight requests
if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    exit;
}
    // Get user login status
    $user = new User();

    if ($user->isLoggedin()) {
        // User is logged in
        echo json_encode(['logged_in' => true]);
    } else {
        // User is not logged in
        echo json_encode(['logged_in' => false]);
    }
