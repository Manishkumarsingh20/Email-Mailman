<?php


if (isset($_POST['reset'])) {
    $second_email = $_POST['email'];
} else {
    exit();
}

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'mail/Exception.php';
require 'mail/PHPMailer.php';
require 'mail/SMTP.php';
$conn = new mySqli('localhost', 'tse', 'bPmtHasjyTJ2SgZJ', 'manish');

if ($conn->connect_error) {
    die('Could not connect to the database.');
}


$sql = "SELECT * FROM users WHERE username='$second_email' OR email='$second_email'";

$verifyQuery = $conn->query($sql);

$fetch_data = mysqli_fetch_assoc($verifyQuery);



$recoverymail = $fetch_data['secondemail'];
echo $recoverymail;
die;

if ($recoverymail != '') {
    $reset_codes = "UPDATE users SET reset_code = '$code' WHERE username='$second_email' OR email='$second_email'";
    $reset = $conn->query($reset_codes);

    $mail = new PHPMailer(true);

    try {

        $mail->send();
        echo 'Message has been sent, check your email';

        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com';
        $mail->SMTPAuth   = true;
        $mail->Username   = 'manishkumarsingh1798@gmail.com';
        $mail->Password   = 'zyfhcwesddjwkeif';
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
        $mail->Port       = 465;

        $mail->setFrom('manishkumarsingh1798@gmail.com', 'Admin');
        $to_mail = $recoverymail;
        $mail->addAddress($email);
        $code = substr(str_shuffle('1234567890QWERTYUIOPASDFGHJKLZXCVBNM'), 0, 10);



        $mail->isHTML(true);
        $mail->Subject = 'Password Reset';
        $mail->Body    = 'To reset your password click <a href="http://hestalabs.com/tse/mailnam-manish/manmail/newpassword.php?code=' . $code . '">click here </a> </br>Reset your password in a day.';
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
} else {
    echo 'username or email not found';
}
$conn->close();
