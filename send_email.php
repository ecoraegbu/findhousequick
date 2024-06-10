<?php
require_once 'Core/Init.php';
// Import PHPMailer classes into the global namespace
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Load Composer's autoloader
require 'vendor/autoload.php';

// Instantiate PHPMailer object
$mail = new PHPMailer(true);

try {
    // Server settings
    $mail->SMTPDebug = 0; // Enable verbose debug output (0 = off, 1 = client, 2 = client + server)
    $mail->isSMTP(); // Send using SMTP

    // Define SMTP settings
    $mail->Host = "premium105.web-hosting.com"; // Specify main and backup SMTP servers
    $mail->SMTPAuth = true; // Enable SMTP authentication
    $mail->Username = "noreply@findhousequick.com"; // SMTP username
    $mail->Password = "Chukwuka123@"; // SMTP password
    $mail->SMTPSecure = "ssl"; // Enable TLS encryption, `ssl` also accepted
    $mail->Port = 465; // TCP port to connect to

    // Define email content
    $mail->setFrom(MAIL_FROM_EMAIL, MAIL_FROM_NAME);
    $mail->addAddress('ecoraegbu@gmail.com'); // Add a recipient
    $mail->isHTML(true); // Set email format to HTML
    $mail->Subject = 'Test Email';
    $mail->Body = 'This is a test email sent via PHPMailer!';

    // Send email
    $mail->send();
    echo 'Email has been sent!';
} catch (Exception $e) {
    echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
}