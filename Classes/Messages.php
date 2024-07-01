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
  public function get_all_messages($user_id, $type, $page, $itemsPerPage){
    switch ($type){
      case 'received':
        $sql = "SELECT * FROM messages WHERE recipient_id = $user_id";
        $totalItems = $this->database_connection->query($sql)->count();
        // Calculate the offset
        $offset = ($page - 1) * $itemsPerPage;
        $itemsPerPage = (int) $itemsPerPage;
        $sql = "SELECT * FROM messages WHERE recipient_id = $user_id LIMIT $itemsPerPage OFFSET $offset";
        
        $result = $this->database_connection->query($sql);
            // Calculate total pages
        $totalPages = ceil($totalItems / $itemsPerPage);
        if ($totalItems > 0) {
          
          $messages = [
              'items' => $result->results(),
              'currentPage' => $page,
              'itemsPerPage' => $itemsPerPage,
              'totalItems' => $totalItems,
              'totalPages' => $totalPages
          ];
      }else{
        $messages = [
          'items' => [],
          'currentPage' => $page,
          'itemsPerPage' => $itemsPerPage,
          'totalItems' => 0,
          'totalPages' => 0
      ];
      }
        break;
      case 'sent':
        $messages = $this->database_connection->get('messages', array('sender_id', '=', $user_id))->results();
      default:
      //$messages = $this->database_connection->get('messages', array('recipient_id', '=', $user_id));
    }

    return $messages;
  }



  public function sent_messages($user_id){
    // Retrieve all outbound message from the database.
    $sql = "SELECT * FROM messages WHERE sender_id = ?";
    $params = array('sender_id' => $user_id);
    $messages = $this->database_connection->query($sql, $params)->results();
    if ($messages->count()){
      return $messages;
    } else{
      return null;
    }
    
  }
  public function inbox($user_id){
    // Retrieve all inbound message from the database.
    $sql = "SELECT * FROM messages WHERE recipient_id = ?";
    $params = array('sender_id' => $user_id);
    $messages = $this->database_connection->query($sql, $params)->results();
    if ($messages->count()){
      return $messages;
    } else{
      return null;
    }
  }

  public function get_message($message_id) {
    // Retrieve a message from a data store, such as a database
    $sql = "SELECT * FROM messages WHERE id = ?";
    $params = array('id' => $message_id);
    $message = $this->database_connection->query($sql, $params);
    if($message->count()){
      $result = $message->results;
      return $result;
    }else{
      return null;
    }
    
    
  }

  // RATHER THAN DELETE MESSAGES, SET IS_DELETED TO 1

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

