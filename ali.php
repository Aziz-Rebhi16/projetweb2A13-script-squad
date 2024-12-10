<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

$mail = new PHPMailer(true);

try {
    // Server settings
    $mail->isSMTP();                                            // Set mailer to use SMTP
    $mail->Host = 'smtp.gmail.com';                              // Set the Gmail SMTP server
    $mail->SMTPAuth = true;                                      // Enable SMTP authentication
    $mail->Username = 'abedayoub87@gmail.com';                     // Your Gmail address
    $mail->Password = 'sthupvfyvzhsxsdb';                       // Use the App Password you generated
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;          // Use STARTTLS encryption
    $mail->Port = 587;                                          // Port 587 for STARTTLS

    // Recipients
    $mail->setFrom('abedayoub87@gmail.com', 'Your Name');          // Sender's email and name
    $mail->addAddress('chouaibamdouni@gmail.com', 'Recipient Name'); // Recipient's email and name

    // Content
    $mail->isHTML(true);                                         // Set email format to HTML
    $mail->Subject = 'Test Email';
    $mail->Body    = 'This is a <b>test</b> email sent using PHPMailer with Gmail App Password.';
    $mail->AltBody = 'This is the plain text version of the email.';

    // Send email
    if ($mail->send()) {
        echo 'Message has been sent successfully!';
    }
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
?>
