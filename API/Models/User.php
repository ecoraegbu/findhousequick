<?php

require_once 'database/Database.php';

class User {

    private static $db;

    public function __construct() {
        self::$db = Database::getInstance();
    }

    public static function getAll() {
        try {
            $query = "SELECT id, email, created_at FROM users";
            $stmt = self::$db->prepare($query);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            throw new Exception("Failed to fetch users: " . $e->getMessage());
        }
    }

    public static function findById($userId) {
        try {
            $query = "SELECT id, email, created_at FROM users WHERE id = :userId";
            $stmt = self::$db->prepare($query);
            $stmt->bindValue(':userId', $userId, PDO::PARAM_INT);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            throw new Exception("Failed to find user: " . $e->getMessage());
        }
    }

    public static function create($email, $password) {
        try {
            // Hash the password for security
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

            $query = "INSERT INTO users (email, password) VALUES (:email, :password)";
            $stmt = self::$db->prepare($query);
            $stmt->bindValue(':email', $email, PDO::PARAM_STR);
            $stmt->bindValue(':password', $hashedPassword, PDO::PARAM_STR);
            $stmt->execute();

            $userId = self::$db->lastInsertId();
            return self::findById($userId);
        } catch (PDOException $e) {
            // Handle duplicate email errors (unique constraint violation)
            if (strpos($e->getMessage(), 'Duplicate entry') !== false) {
                throw new Exception("User with this email already exists.");
            } else {
                throw new Exception("Failed to create user: " . $e->getMessage());
            }
        }
    }

    public static function update($userId, $email, $password) {
        try {
            $hashedPassword = $password ? password_hash($password, PASSWORD_DEFAULT) : null;
            $query = "UPDATE users SET email = :email, password = :password WHERE id = :userId";
            $stmt = self::$db->prepare($query);
            $stmt->bindValue(':email', $email, PDO::PARAM_STR);
            $stmt->bindValue(':password', $hashedPassword, PDO::PARAM_STR);
            $stmt->bindValue(':userId', $userId, PDO::PARAM_INT);
            $stmt->execute();

            return self::findById($userId); 
        } catch (PDOException $e) {
            throw new Exception("Failed to update user: " . $e->getMessage());
        }
    }

    public static function delete($userId) {
        try {
            $query = "DELETE FROM users WHERE id = :userId";
            $stmt = self::$db->prepare($query);
            $stmt->bindValue(':userId', $userId, PDO::PARAM_INT);
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            throw new Exception("Failed to delete user: " . $e->getMessage());
        }
    }
}