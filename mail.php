<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

$name = $_POST['name'];
$tel = $_POST['tel'];
$email = $_POST['email'];
$message = $_POST['message'];

$mail = new PHPMailer(true);

$mail->isSMTP();
$mail->Host = 'smtp.gmail.com';
$mail->SMTPAuth = true;
$mail->Username = 'website.contact.ds@gmail.com';
$mail->Password = 'ghyc fmtg hnwe mfkx';
$mail->SMTPSecure = 'tls';
$mail->Port = 587;


$mail->setFrom('website.contact.ds@gmail.com', 'Your Name');
$mail->addAddress('website.contact.ds@gmail.com', 'Recipient Name');
$mail->isHTML(true);
$mail->Subject = 'Test Email';
$mail->Body = '<h1>New message from your website</h1><p><b>Name: </b>' . $name . '</p><p><b>Tel: </b>' . $tel . '</p><p><b>Email: </b>' . $email . '</p><p><b>Message: </b>' . $message . '</p>';

if($mail->send()) {
   echo 'Email sent successfully.';
} else {
   echo 'Error sending email: ' . $mail->ErrorInfo;
}
