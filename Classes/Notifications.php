<?php

/* Author: Emmanuel Oraegbu
Github: ecoraegbu
email: ecoraegbu@gmail.com */

class Notifications {
    private $db;

    function __construct() {
        $this->db = Database::getInstance();
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
