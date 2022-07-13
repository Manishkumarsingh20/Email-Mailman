<?php
session_start();

if (isset($_POST['reset'])) {
    $email = $_POST['email'];
} else {
    exit();
}

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'mail/Exception.php';
require 'mail/PHPMailer.php';
require 'mail/SMTP.php';
$mail = new PHPMailer(true);

try {
    
    $mail->isSMTP();
    $mail->Host       = 'smtp.gmail.com';
    $mail->SMTPAuth   = true;
    $mail->Username   = 'manishkumarsingh1798@gmail.com';
    $mail->Password   = 'zyfhcwesddjwkeif';
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
    $mail->Port       = 465;                                    
   
    $mail->setFrom('manishkumarsingh1798@gmail.com', 'Admin');
    $to_mail = $_POST['email'];
    $mail->addAddress($to_mail);     
    $code = substr(str_shuffle('1234567890QWERTYUIOPASDFGHJKLZXCVBNM'), 0, 10);


 
    $mail->isHTML(true);                                 
    $mail->Subject = 'Password Reset';
    $mail->Body    = 'To reset your password click <a href="http://hestalabs.com/tse/mailnam-manish/manmail/newpassword.php?code=' . $code . '">click here </a> </br>Reset your password in a day.';

    $conn = new mySqli('localhost', 'tse', 'bPmtHasjyTJ2SgZJ','manish');

    if ($conn->connect_error) {
        die('Could not connect to the database.');
    }
    $verifyQuery = $conn->query("SELECT * FROM users WHERE secondemail = '$email'");

    if ($verifyQuery->num_rows) {
        $reset_codes = "UPDATE users SET reset_code = '$code' WHERE secondemail = '$email'";
        $reset = $conn->query($reset_codes);
        $mail->send();
        echo 'Message has been sent, check your email';
    }
    $conn->close();
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
