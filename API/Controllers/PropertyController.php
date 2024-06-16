<?php

require_once 'models/Property.php';
require_once 'responses/SuccessResponse.php';
require_once 'responses/ErrorResponse.php';
require_once 'middlewares/AuthMiddleware.php'; // For authentication

class PropertyController {

    private $authMiddleware;

    public function __construct() {
        $this->authMiddleware = new AuthMiddleware();
    }

    public function getAllProperties() {
        try {
            $properties = Property::getAll();
            return new SuccessResponse(200, $properties);
        } catch (Exception $e) {
            return new ErrorResponse(500, "Failed to retrieve properties: " . $e->getMessage());
        }
    }

    public function getPropertyById($propertyId) {
        try {
            $property = Property::findById($propertyId);
            if ($property) {
                return new SuccessResponse(200, $property);
            } else {
                return new ErrorResponse(404, "Property not found.");
            }
        } catch (Exception $e) {
            return new ErrorResponse(500, "Failed to retrieve property: " . $e->getMessage());
        }
    }

    public function createProperty() {
        $data = json_decode(file_get_contents('php://input'), true);

        if (!isset($data['address']) || !isset($data['price']) || !isset($data['description']) || !isset($data['image_url'])) {
            return new ErrorResponse(400, "Missing required fields.");
        }

        // Sanitize input
        $address = filter_var($data['address'], FILTER_SANITIZE_STRING);
        $price = filter_var($data['price'], FILTER_SANITIZE_NUMBER_INT); 
        $description = filter_var($data['description'], FILTER_SANITIZE_STRING);
        $imageUrl = filter_var($data['image_url'], FILTER_SANITIZE_URL); 

        try {
            $newProperty = Property::create($address, $price, $description, $imageUrl);
            return new SuccessResponse(201, $newProperty); 
        } catch (Exception $e) {
            return new ErrorResponse(500, "Failed to create property: " . $e->getMessage());
        }
    }

    public function updateProperty($propertyId) {
        // ... [Similar structure to createProperty]
    }

    public function deleteProperty($propertyId) {
        // ... [Similar structure to createProperty]
    }
}