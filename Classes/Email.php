<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';



class Email {
  private $to;
  private $subject;
  private $text_message;
  private $html_message;
  private $message_from;
  private $reply_to;
  private $smtpHost;
  private $smtpUsername;
  private $smtpPassword;
  private $smtpPort;
  private $smtpSecure;

  public function __construct(
    $to,
    $subject,
    $message,
    $message_from,
    $reply_to,
    $is_html = false,
    $smtpHost = MAIL_HOST,
    $smtpUsername = MAIL_USERNAME,
    $smtpPassword = MAIL_PASSWORD,
    $smtpPort = MAIL_PORT,
    $smtpSecure = MAIL_SECURE
  ) {
    $this->to = $to;
    $this->subject = $subject;
    $this->message_from = $message_from;
    $this->reply_to = $reply_to;
    $this->smtpHost = $smtpHost;
    $this->smtpUsername = $smtpUsername;
    $this->smtpPassword = $smtpPassword;
    $this->smtpPort = $smtpPort;
    $this->smtpSecure = $smtpSecure;

    $this->html_message = $is_html ? $message : null;
    $this->text_message = $is_html ? strip_tags($message) : $message;
  }

  public function send() {
    $mail = new PHPMailer(true);
    try {
      // Server settings
      $mail->isSMTP();
      $mail->SMTPDebug = 0; // Set to DEBUG_SERVER for debugging
      $mail->Host = $this->smtpHost;
      $mail->SMTPAuth = true;
      $mail->Username = $this->smtpUsername;
      $mail->Password = $this->smtpPassword;
      $mail->SMTPSecure = $this->smtpSecure;
      $mail->Port = $this->smtpPort;

      // Recipients
      $mail->setFrom('noreply@findhousequick.com', BUSINESS_NAME); // Set the sender's name here
      $mail->addAddress($this->to);
      $mail->addReplyTo($this->reply_to);

      // Content
      $mail->isHTML(!empty($this->html_message));
      $mail->Subject = $this->subject;
      $mail->Body = $this->html_message;
      $mail->AltBody = $this->text_message;

      // Send the email
      $mail->send();
      return true;
    } catch (Exception $e) {
      echo "Failed to send message: " . $mail->ErrorInfo;
    }
    return false;
  }
}
