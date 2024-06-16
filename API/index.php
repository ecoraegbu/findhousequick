<?php

// Include necessary files
require_once 'config.php';
require_once 'helpers/helpers.php'; 
require_once 'responses/SuccessResponse.php';
require_once 'responses/ErrorResponse.php';

// Autoload classes (For PSR-4 autoloading)
spl_autoload_register(function ($className) {
    $path = str_replace('\\', '/', $className) . '.php';
    if (file_exists($path)) {
        require_once $path;
    }
});

// Define API Version 
define('API_VERSION', 'v1');

// Routing logic
function route($method, $requestParts) {
    global $API_VERSION;

    // Handle API Version
    if ($requestParts[0] !== $API_VERSION) {
        return new ErrorResponse(400, "Invalid API version.");
    }

    // Basic Routing
    $resource = $requestParts[1] ?? null;

    switch ($resource) {
        case "users":
            return handleUserController($method, $requestParts);
        case "properties":
            return handlePropertyController($method, $requestParts);
        // Add more resources here
        default:
            return new ErrorResponse(404, "Resource not found.");
    }
}

// Controller Handlers (Example)
function handleUserController($method, $requestParts) {
    $controller = new UserController();

    // Apply authentication middleware if necessary
    if (in_array($method, ['GET', 'POST', 'PUT', 'DELETE'])) {
        $response = $controller->authMiddleware->handle(function () use ($controller, $method, $requestParts) {
            switch ($method) {
                case "GET":
                    if (isset($requestParts[2])) {
                        $userId = $requestParts[2];
                        return $controller->getUserById($userId);
                    } else {
                        return $controller->getAllUsers();
                    }
                case "POST":
                    return $controller->createUser();
                case "PUT":
                    if (isset($requestParts[2])) {
                        $userId = $requestParts[2];
                        return $controller->updateUser($userId);
                    } else {
                        return new ErrorResponse(400, "Invalid request.");
                    }
                case "DELETE":
                    if (isset($requestParts[2])) {
                        $userId = $requestParts[2];
                        return $controller->deleteUser($userId);
                    } else {
                        return new ErrorResponse(400, "Invalid request.");
                    }
                default:
                    return new ErrorResponse(405, "Method not allowed.");
            }
        });

        return $response;
    }
}

function handlePropertyController($method, $requestParts) {
    // ... Implement similar logic for PropertyController
}

// Run the API
$method = $_SERVER['REQUEST_METHOD'];
$requestPath = trim($_SERVER['REQUEST_URI'], '/');
$requestParts = explode('/', $requestPath);

$response = route($method, $requestParts);

// Send Response
header("Content-Type: application/json");
echo json_encode($response);

?>