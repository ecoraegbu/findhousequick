<?php
class Messages{
    private $database_connection;
    private $notification;
    public function __construct(){
        $this->database_connection = Database::getInstance();
        $this->notification = Notifications::notifiction();
    }



  public function send_message($sender, $recipient, $subject, $body) {
    try {
        // insert the message into the message table in the database
        $conn =$this->database_connection;
        $conn->insert('messages',array('sender' => $sender, 'recipient' => $recipient, 'subject' => $subject,
            'message' => $body));
        // trigger the notification event
        $notify = $this->notification;
        $notify->sendNotification($recipient, 'You have received a message from '.$sender);

    } catch (Exception $e ) {

        return "An error occurred: " . $e->getMessage();
    }
  }
  public function get_all_messages($user_id){
    $messages = $this->database_connection->get('messages', array('recipient', '=', $user_id));
    return $messages->results();

  }
  public function sent_messages($user_id){
    // Retrieve all outbound message from the database.
    $sql = "SELECT * FROM messages WHERE sender_id = ?";
    $params = array($user_id);
    $messages = $this->database_connection->query($sql, $params)->results();
    return $messages;
  }
  public function inbox($user_id){
    // Retrieve all inbound message from the database.
    $sql = "SELECT * FROM messages WHERE recipient_id = ?";
    $params = array($user_id);
    $messages = $this->database_connection->query($sql, $params)->results();
    return $messages;

  }

  public function get_message($message_id) {
    // Retrieve a message from a data store, such as a database
    $sql = "SELECT * FROM messages WHERE id = ?";
    $params = array($message_id);
    $message = $this->database_connection->query($sql, $params);
    return $message->results();
    
  }

/*   public function delete($message_id) {
    // Delete a message or messages from the database
    $sql = "DELETE FROM messages WHERE id = ?";
    $params = array ('i', $message_id);
    if ($this->database_connection->query($sql, $params)){
        return true;
    }else {
        return false;
    }
  } */
  public function delete($message_ids) {
    if (is_array($message_ids)) {
        // Delete multiple messages from the database
        $placeholders = implode(',', array_fill(0, count($message_ids), '?'));
        $sql = "DELETE FROM messages WHERE id IN ($placeholders)";
        $params = $message_ids;
    } else {
        // Delete a single message from the database
        $sql = "DELETE FROM messages WHERE id = ?";
        $params = array($message_ids);
    }
    
    $result = $this->database_connection->query($sql, $params);
    
    if (!$result->error()) {
        return true;
    } else {
        return false;
    }
}

}

?>
