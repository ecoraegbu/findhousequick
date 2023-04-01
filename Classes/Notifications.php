<?php

class Notifications {
    private $database_connection;
    private static $notification;

    function __construct() {
        $this->database_connection = Database::getInstance();
    }

    public static function notifiction(){
        if(!isset(self::$notification)){
            self::$notification = new Notifications();

        }
        return self::$notification;
    }

    function sendNotification($user_id, $message) {
        $sql = "INSERT INTO notifications (user_id, messages) VALUES (?, ?)";
        $params = array($user_id, $message);
        $this->database_connection->query($sql, $params);
    }

    function markAsRead($notification_id) {
        $sql = "UPDATE notifications SET read = 1 WHERE id = ?";
        $params = array($notification_id);
        $this->database_connection->query($sql, $params);
    }

    function getUnreadNotifications($user_id) {
        $notifications = array();

        $sql = "SELECT * FROM notifications WHERE user_id = ? AND read = 0";
        $params = array($user_id);
        $result = $this->database_connection->query($sql, $params);
// I think it is best to use a for each loop here to get the notifications as an array not as an object.
        while ($row = $result->results()) {
            $notifications[] = $row;
        }

        return $notifications;
    }


    function deleteNotification($notification_id) {
        $sql = "DELETE FROM notifications WHERE id = ?";
        $params = array($notification_id);
        $this->database_connection->query($sql, $params);
    }

    public function delete_notifications($notification_id) {
        if (is_array($notification_id)) {
            // Delete multiple messages from the database
            $placeholders = implode(',', array_fill(0, count($notification_id), '?'));
            $sql = "DELETE FROM messages WHERE id IN ($placeholders)";
            $params = $notification_id;
        } else {
            // Delete a single message from the database
            $sql = "DELETE FROM messages WHERE id = ?";
            $params = array($notification_id);
        }
        
        $result = $this->database_connection->query($sql, $params);
        
        if (!$result->error()) {
            return true;
        } else {
            return false;
        }
    }
    function getNotificationCount($user_id) {
        $sql = "SELECT COUNT(*) as count FROM notifications WHERE user_id = ?";
        $params = array($user_id);
        $result = $this->database_connection->query($sql, $params);

        $count = $result->count();

        return $count;
    }
    function deleteOldNotifications($days) {
        $cutoff = date('Y-m-d H:i:s', strtotime('-'.$days.' days'));

        $sql = "DELETE FROM notifications WHERE created_at < ?";
        $params = array($cutoff);
        $this->database_connection->query($sql, $params);
    }

}
