<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

$mail = new PHPMailer(true);

try {
    // Server settings
    $mail->isSMTP();                        // Send using SMTP
    $mail->Host = 'smtp.gmail.com';         // Set the SMTP server to send through
    $mail->SMTPAuth = true;                 // Enable SMTP authentication
    $mail->Username = ''; // Your SMTP username (full email address)
    $mail->Password = '';   // Your SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS; // Enable implicit TLS encryption
    $mail->Port = 465;                      // TCP port to connect to; use 587 if using `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    // Get form data
    $name = $_POST['name'];
    $email = $_POST['email'];

    // Recipients
    $mail->setFrom($email, $name); // Sender's email and name
    $mail->addAddress('', 'Mayur Vyas'); // Recipient's email and name
    
   
    // Content
    $mail->isHTML(true);                  // Set email format to HTML
    $mail->Subject = $_POST['subject']; // Subject from form input
    $mail->Body = $_POST['message']; // Message from form input

    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
?>
