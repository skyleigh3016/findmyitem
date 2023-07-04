<?php
use PHPMailer\PHPMailer\PHPMailer;

require_once 'phpmailer/Exception.php';
require_once 'phpmailer/PHPMailer.php';
require_once 'phpmailer/SMTP.php';

$mail = new PHPMailer(true);

$alert = '';

if(isset($_POST['submit']))
{
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];

    try{
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'findmyitembsis@gmail.com';//gmail add use as SMTP server
        $mail->Password = 'fmibsiscmdi'; //gmail pass 
        $mail->SMTPSecure = 'tls';
        $mail->Port = '587';

        $mail->setFrom('findmyitembsis@gmail.com');//gmail used as SMTP
        $mail->addAddress('findmyitembsis@gmail.com');//own gmail

        $mail->isHTML(true);
        $mail->Subject = 'Message Received (Contact Page)';
        $mail->Body = "<h3>Name: $name <br>Email: $email <br>Message: $message</h3>";

        $mail->send();
        $alert = '<div class = "alert">
                    <span class="check"><i class="fa fa-check"></i></span>
                    <span class="msg">Message Sent! Thank you for contacting us.</span>
                    
    </div>';
    } catch (Exception $e)
    {
        $alert = '<div class = "alert-error">
                    <span>'.$e->getMessage().'</span>
                  </div>';
    }
}

?>