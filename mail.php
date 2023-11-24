<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require './PHPMailer/src/PHPMailer.php';
require './PHPMailer/src/Exception.php';
require './PHPMailer/src/SMTP.php';

// Initialisiere die Formulardaten
$sender_name = isset($_POST['name']) ? $_POST['name'] : '';
$sender_email = isset($_POST['email']) ? $_POST['email'] : '';
$sender_phone = isset($_POST['Telefon']) ? $_POST['Telefon'] : ''; // Beachte, dass das Telefonfeld im Formular "Telefon" heißt
$sender_message = isset($_POST['message']) ? $_POST['message'] : '';

// PHPMailer-Setup
$mail = new PHPMailer(true);

try {
    //Servereinstellungen
    $mail->isSMTP();
    $mail->Host       = 'smtp.gmail.com';
    $mail->SMTPAuth   = true;
    $mail->Username   = 'dslutskovsky@gmail.com'; // Gib hier deine Gmail-Adresse ein
    $mail->Password   = 'yulialex'; // Gib hier dein Gmail-Passwort ein
    $mail->SMTPSecure = 'tls';
    $mail->Port       = 587;

    // Empfänger und Betreff
    $mail->setFrom($sender_email, $sender_name);
    $mail->addAddress('ziel_email@gmail.com'); // Gib hier die E-Mail-Adresse des Empfängers ein
    $mail->Subject = 'Betreff deiner E-Mail';

    // Nachricht
    $mail->Body = "From: $sender_name \n Email: $sender_email \n Phone: $sender_phone \n Message: $sender_message";

    // E-Mail senden
    $mail->send();

    header('Location: thanks.html');
    exit;
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
?>
