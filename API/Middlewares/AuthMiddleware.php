<?php

require_once 'helpers/helpers.php'; 

use Firebase\JWT\JWT;

class AuthMiddleware {

    public function handle(Closure $next) {
        $authorizationHeader = getallheaders()['Authorization'] ?? null; 

        if (!$authorizationHeader) {
            return new ErrorResponse(401, "Authorization header missing.");
        }

        $token = str_replace('Bearer ', '', $authorizationHeader); // Remove "Bearer" prefix

        try {
            $decoded = JWT::decode($token, JWT_SECRET, ['HS256']);
            // If you want to verify the token's issuer or audience, check 'iss' and 'aud' claims
            // ...

            // Set user ID in the request for access in controllers
            $_SERVER['USER_ID'] = $decoded->sub;
            
            // Proceed to the next middleware or controller
            return $next();
        } catch (Exception $e) {
            return new ErrorResponse(401, "Invalid or expired token.");
        }
    }
}