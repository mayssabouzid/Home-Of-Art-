<?php

session_start();


use PHPMailer\PHPMailer\PHPMailer;

require_once 'phpmailer_client/Exception.php';
require_once 'phpmailer_client/PHPMailer.php';
require_once 'phpmailer_client/SMTP.php';

$name=$_SESSION['login'];
$email=$_SESSION['email'];
$mail = new PHPMailer(true);

$alert = '';

if(isset($_POST['submit'])){
  
  $message = $_POST['message'];

  try{
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'eya.bouzaiene@esprit.tn'; // Gmail address which you want to use as SMTP server
    $mail->Password = '191JFT1008'; // Gmail address Password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port = '587';

    $mail->setFrom('eya.bouzaiene@esprit.tn'); // Gmail address which you used as SMTP server
    $mail->addAddress('eya.bouzaiene@esprit.tn'); // Email address where you want to receive emails (you can use any of your gmail address including the gmail address which you used as SMTP server)

    $mail->isHTML(true);
    $mail->Subject = 'Message Received (Contact Page)';
    $mail->Body = "<h3>Pseudo : $name <br>Email: $email <br>Message : $message</h3>";

    $mail->send();
    $alert = '<div class="alert-success">
                 <span>Message Sent! Thank you for contacting us.</span>
                </div>';
  } catch (Exception $e){
    $alert = '<div class="alert-error">
                <span>'.$e->getMessage().'</span>
              </div>';
  }
}
?>