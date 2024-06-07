<?php
require_once '../Core/Init.php';

header('Content-Type: application/json');


if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $response = ['token' => Token::generate()];
} else {
    $response = ['success' => false, 'message' => 'Invalid request method.'];
}

echo json_encode($response);
