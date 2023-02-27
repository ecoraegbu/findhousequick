<?php
class Email {
  private $to;
  private $subject;
  private $text_message;
  private $html_message;
  private $headers;

  /**
   * Constructs an Email object with the given recipient, subject, and message.
   * @param string $to The recipient's email address
   * @param string $subject The email subject
   * @param string $message The email message
   * @param bool $is_html True if the message is in HTML format, false otherwise
   */
  public function __construct($to, $subject, $message, $is_html=false) {
    $this->to = $to;
    $this->subject = $subject;
    if ($is_html) {
      $this->html_message = $message;
      $this->text_message = strip_tags($message);
      $this->headers = "MIME-Version: 1.0\r\n";
      $this->headers .= "Content-type: text/html; charset=UTF-8\r\n";
    } else {
      $this->text_message = $message;
      $this->html_message = NULL;
      $this->headers = "From: webmaster@example.com\r\n";
    }
  }

  /**
   * Sets the email message.
   * @param string $message The email message
   * @param bool $is_html True if the message is in HTML format, false otherwise
   */
  public function setMessage($message, $is_html=false) {
    if ($is_html) {
      $this->html_message = $message;
      $this->text_message = strip_tags($message);
      $this->headers = "MIME-Version: 1.0\r\n";
      $this->headers .= "Content-type: text/html; charset=UTF-8\r\n";
    } else {
      $this->text_message = $message;
      $this->html_message = NULL;
    }
  }

  /**
   * Sends the email using PHP's built-in mail() function.
   * @return bool True if the email was sent successfully, false otherwise
   */
  public function send() {
    if ($this->html_message !== NULL) {
      $message = $this->html_message;
    } else {
      $message = htmlspecialchars($this->text_message, ENT_QUOTES, 'UTF-8');
    }
    
    try {
      $result = mail($this->to, $this->subject, $message, $this->headers);
      if (!$result) {
        throw new Exception("Failed to send message.");
      }
      return "Message sent successfully.";
    } catch (Exception $e) {
      return "Failed to send message: " . $e->getMessage();
    }
  }
  
}
