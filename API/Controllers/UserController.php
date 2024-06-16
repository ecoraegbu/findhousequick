<?php

require_once 'models/User.php';
require_once 'responses/SuccessResponse.php';
require_once 'responses/ErrorResponse.php';
require_once 'middlewares/AuthMiddleware.php'; // For authentication

class UserController {

    // Authentication middleware
    private $authMiddleware;

    public function __construct() {
        $this->authMiddleware = new AuthMiddleware(); 
    }

    public function getAllUsers() {
        // Protect with authentication middleware (see index.php for usage)
        try {
            $users = User::getAll();
            return new SuccessResponse(200, $users);
        } catch (Exception $e) {
            return new ErrorResponse(500, "Failed to retrieve users: " . $e->getMessage());
        }
    }

    public function getUserById($userId) {
        try {
            $user = User::findById($userId);
            if ($user) {
                return new SuccessResponse(200, $user);
            } else {
                return new ErrorResponse(404, "User not found.");
            }
        } catch (Exception $e) {
            return new ErrorResponse(500, "Failed to retrieve user: " . $e->getMessage());
        }
    }

    public function createUser() {
        $data = json_decode(file_get_contents('php://input'), true);

        if (!isset($data['email']) || !isset($data['password'])) {
            return new ErrorResponse(400, "Missing email or password.");
        }

        $email = filter_var($data['email'], FILTER_SANITIZE_EMAIL); // Basic sanitation
        $password = filter_var($data['password'], FILTER_SANITIZE_STRING); 

        try {
            $newUser = User::create($email, $password);
            return new SuccessResponse(201, $newUser);
        } catch (Exception $e) {
            // Handle specific exceptions
            if (strpos($e->getMessage(), 'Duplicate entry') !== false) {
                return new ErrorResponse(409, "User with this email already exists.");
            } else {
                return new ErrorResponse(500, "Failed to create user: " . $e->getMessage());
            }
        }
    }

    public function updateUser($userId) {
        // ... [Similar structure to createUser]
    }

    public function deleteUser($userId) {
        // ... [Similar structure to createUser]
    }
}