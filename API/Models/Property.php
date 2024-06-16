<?php

require_once 'database/Database.php';

class Property {

    private static $db;

    public function __construct() {
        self::$db = Database::getInstance();
    }

    public static function getAll() {
        try {
            $query = "SELECT id, address, price, description, image_url FROM properties";
            $stmt = self::$db->prepare($query);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            throw new Exception("Failed to fetch properties: " . $e->getMessage());
        }
    }

    public static function findById($propertyId) {
        try {
            $query = "SELECT id, address, price, description, image_url FROM properties WHERE id = :propertyId";
            $stmt = self::$db->prepare($query);
            $stmt->bindValue(':propertyId', $propertyId, PDO::PARAM_INT);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            throw new Exception("Failed to find property: " . $e->getMessage());
        }
    }

    public static function create(
        $address, 
        $price, 
        $description, 
        $imageUrl // Assuming an image URL is provided
    ) {
        try {
            $query = "INSERT INTO properties (address, price, description, image_url) 
                      VALUES (:address, :price, :description, :imageUrl)";
            $stmt = self::$db->prepare($query);
            $stmt->bindValue(':address', $address, PDO::PARAM_STR);
            $stmt->bindValue(':price', $price, PDO::PARAM_INT); 
            $stmt->bindValue(':description', $description, PDO::PARAM_STR);
            $stmt->bindValue(':imageUrl', $imageUrl, PDO::PARAM_STR);
            $stmt->execute();

            $propertyId = self::$db->lastInsertId();
            return self::findById($propertyId);
        } catch (PDOException $e) {
            throw new Exception("Failed to create property: " . $e->getMessage());
        }
    }

    public static function update($propertyId, $address, $price, $description, $imageUrl) {
        try {
            $query = "UPDATE properties 
                      SET address = :address, price = :price, description = :description, image_url = :imageUrl
                      WHERE id = :propertyId";
            $stmt = self::$db->prepare($query);
            $stmt->bindValue(':address', $address, PDO::PARAM_STR);
            $stmt->bindValue(':price', $price, PDO::PARAM_INT);
            $stmt->bindValue(':description', $description, PDO::PARAM_STR);
            $stmt->bindValue(':imageUrl', $imageUrl, PDO::PARAM_STR);
            $stmt->bindValue(':propertyId', $propertyId, PDO::PARAM_INT);
            $stmt->execute();

            return self::findById($propertyId); 
        } catch (PDOException $e) {
            throw new Exception("Failed to update property: " . $e->getMessage());
        }
    }

    public static function delete($propertyId) {
        try {
            $query = "DELETE FROM properties WHERE id = :propertyId";
            $stmt = self::$db->prepare($query);
            $stmt->bindValue(':propertyId', $propertyId, PDO::PARAM_INT);
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            throw new Exception("Failed to delete property: " . $e->getMessage());
        }
    }
}