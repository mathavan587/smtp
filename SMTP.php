<?php
// Import PHPMailer classes
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

function email($Sender_email=null,$Sender_Password=null,$Sender_username=null,$Receiver_email=null,$Receiver_name=null,$Receiver_Subject=null,$Receiver_Message=null)
{

require 'vendor/autoload.php'; // Include Composer's autoload file

// Create a new PHPMailer instance
$mail = new PHPMailer(true);

try {
    // Server settings
    $mail->isSMTP();                                            // Use SMTP
    $mail->Host       = 'smtp.gmail.com';                       // Gmail SMTP server
    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
    $mail->Username   =  $Sender_email;                        //'mathavan202004@gmail.com';                 // Your Gmail address
    $mail->Password   =  $Sender_Password;                      //'kzywvxlryddsuhoc';                    // App Password (not your Gmail password)
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption
    $mail->Port       = 587;                                    // TCP port to connect to

    // Recipients
    $mail->setFrom($Sender_email, $Sender_username);        // Sender email and name
    $mail->addAddress($Receiver_email,$Receiver_name);                       //'vmathavan587@gmail.com', 'RAJA'); // Add a recipient

    // Content
    $mail->isHTML(true);                                        // Set email format to HTML
    $mail->Subject = $Receiver_Subject;
    $mail->Body    = $Receiver_Message;
    // $mail->AltBody = 'This is a test email sent using Google SMTP with PHPMailer.';

    // Send the email
    $mail->send();
    echo 'Message has been sent successfully!';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
}
?>