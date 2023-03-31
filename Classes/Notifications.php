<?php

/* Author: Emmanuel Oraegbu
Github: ecoraegbu
email: ecoraegbu@gmail.com */

class Notifications {
    private $db;
    private static $notification;

    function __construct() {
        $this->db = Database::getInstance();
    }

    public static function notifiction(){
        if(!isset(self::$notification)){
            self::$notification = new Notifications();

        }
        return self::$notification;
    }

    function sendNotification($user_id, $message) {
        // Code to insert the notification into the database
    }

    function markAsRead($notification_id) {
        $stmt = $this->db->prepare("UPDATE notifications SET read = 1 WHERE id = ?");
        $stmt->bind_param("i", $notification_id);
        $stmt->execute();
        $stmt->close();
    }

    function getUnreadNotifications($user_id) {
        $notifications = array();

        $stmt = $this->db->prepare("SELECT * FROM notifications WHERE user_id = ? AND read = 0");
        $stmt->bind_param("i", $user_id);
        $stmt->execute();

        $result = $stmt->get_result();
        while ($row = $result->fetch_assoc()) {
            $notifications[] = $row;
        }

        $stmt->close();

        return $notifications;
    }

    function deleteNotification($notification_id) {
        $stmt = $this->db->prepare("DELETE FROM notifications WHERE id = ?");
        $stmt->bind_param("i", $notification_id);
        $stmt->execute();
        $stmt->close();
    }

    function getNotificationCount($user_id) {
        $stmt = $this->db->prepare("SELECT COUNT(*) as count FROM notifications WHERE user_id = ?");
        $stmt->bind_param("i", $user_id);
        $stmt->execute();

        $result = $stmt->get_result();
        $count = $result->fetch_assoc()['count'];

        $stmt->close();

        return $count;
    }

    function deleteOldNotifications($days) {
        $cutoff = date('Y-m-d H:i:s', strtotime('-'.$days.' days'));

        $stmt = $this->db->prepare("DELETE FROM notifications WHERE created_at < ?");
        $stmt->bind_param("s", $cutoff);
        $stmt->execute();
        $stmt->close();
    }
}
class Notifications {
    private $db;
    private static $notification;

    function __construct() {
        $this->db = Database::getInstance();
    }

    public static function notifiction(){
        if(!isset(self::$notification)){
            self::$notification = new Notifications();

        }
        return self::$notification;
    }

    function sendNotification($user_id, $message) {
        $sql = "INSERT INTO notifications (user_id, message) VALUES (?, ?)";
        $params = array('is', $user_id, $message);
        $this->db->query($sql, $params);
    }

    function markAsRead($notification_id) {
        $sql = "UPDATE notifications SET read = 1 WHERE id = ?";
        $params = array('i', $notification_id);
        $this->db->query($sql, $params);
    }

    function getUnreadNotifications($user_id) {
        $notifications = array();

        $sql = "SELECT * FROM notifications WHERE user_id = ? AND read = 0";
        $params = array('i', $user_id);
        $result = $this->db->query($sql, $params);

        while ($row = $result->fetch_assoc()) {
            $notifications[] = $row;
        }

        return $notifications;
    }

    function deleteNotification($notification_id) {
        $sql = "DELETE FROM notifications WHERE id = ?";
        $params = array('i', $notification_id);
        $this->db->query($sql, $params);
    }

    function getNotificationCount($user_id) {
        $sql = "SELECT COUNT(*) as count FROM notifications WHERE user_id = ?";
        $params = array('i', $user_id);
        $result = $this->db->query($sql, $params);

        $count = $result->fetch_assoc()['count'];

        return $count;
    }

    function deleteOldNotifications($days) {
        $cutoff = date('Y-m-d H:i:s', strtotime('-'.$days.' days'));

        $sql = "DELETE FROM notifications WHERE created_at < ?";
        $params = array('s', $cutoff);
        $this->db->query($sql, $params);
    }
}
