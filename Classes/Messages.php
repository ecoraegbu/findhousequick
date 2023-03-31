<?php
class Messages{
    private $database_connection;
    public function __construct(){
        $this->database_connection = Database::getInstance();
    }



  public function send_message($sender, $recipient, $subject, $body) {
    // Send message to recipient
    // trigger the notification event
    // This could be done using PHP's built-in mail() function or a third-party service like SendGrid or Mailgun
  }

  public function get_message() {
    // Retrieve message from a data store, such as a database
    // there has to be a way to identify each message.
    // This could be done using SQL queries or an ORM like Doctrine
  }

  public function delete() {
    // Delete message from a data store, such as a database
    // This could be done using SQL queries or an ORM like Doctrine
  }
}

?>
