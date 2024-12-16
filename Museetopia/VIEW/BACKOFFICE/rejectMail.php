<?php
session_start();


use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';




if(isset($_POST['rejected'])){

    $name=$_POST['name'];
    $surname=$_POST['surname'];
    $email = $_POST['email'];
    $musee_name = $_POST['musee_name'];
    $date = $_POST['date'];
    $time = $_POST['time'];
    $price = $_POST['price'];



    $mail = new PHPMailer(true);
    try {
        //Server settings
        //$mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = 'azizrebhi1990@gmail.com';                     //SMTP username
        $mail->Password   = 'hzzglnfpwdzevyua';                               //SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;            //Enable implicit TLS encryption
        $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
    
        //Recipients
        $mail->setFrom('azizrebhi1990@gmail.com', 'Museetopia Team');
        $mail->addAddress($email , $name);     //Add a recipient
    
        //Content
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = 'Reservation Confirmation';
        $mail->Body    = '<h3>HELLO !</h3>
        <h4> Dear '.$name.' '.$surname.' </h4>
        <h5> We regret to inform you that your reservation at '.$musee_name.' has been rejected. </h5>
        <h5> Unfortunately, we are unable to accommodate your request at this time. </h5>
        <h3><strong>DETAILS :</strong></h3>
        <h5>Reservation Date : '.$date.'</h5>
        <h5>Reservation Time : '.$time.'</h5>
        <h5>Price : '.$price.' DT</h5>
        <p>We apologize for any inconvenience this may cause.</p>
        <p>Thank you for understanding.</p>
        <p>Best Regards</p>
        <p>Museetopia Team</p>
        ';

        if($mail->send()){
            $_SESSION['status'] = 'Message has been sent';
            header("Location:{$_SERVER['HTTP_REFERER']}");
        exit(0);

        }else{
            $_SESSION['status'] = 'Message could not be sent. Mailer Error: {$mail->ErrorInfo}';
            header("Location:{$_SERVER['HTTP_REFERER']}");
        exit(0);
        }
        
        
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}else{
    header('Location: mail.php');
        exit(0);
}

?>