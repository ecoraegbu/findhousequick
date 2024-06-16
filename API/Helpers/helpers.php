<?php

function sanitizeInput($input) {
    // ... [Sanitize the input string to prevent XSS, SQL injection, etc.]
    return filter_var($input, FILTER_SANITIZE_STRING);
}

function generateToken($userId, $email) {
    $payload = [
        'iss' => 'your_api_domain', // Issuer (your API domain)
        'sub' => $userId,         // Subject (user ID)
        'iat' => time(),          // Issued at (timestamp)
        'exp' => time() + (60 * 60), // Expiration time (1 hour)
        'email' => $email // Include email for convenience
    ];
    return JWT::encode($payload, JWT_SECRET);
}