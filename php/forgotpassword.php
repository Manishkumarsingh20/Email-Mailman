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
$to_mail = $fetch_data['secondemail'];

if ($to_mail != '') {
    $reset_codes = "UPDATE users SET reset_code = '$code' WHERE username='$second_email' OR email='$second_email'";
    $reset = $conn->query($reset_codes);

    if ($verifyQuery->num_rows > 0) {
        $mail = new PHPMailer(true);
        try {

            $mail->send();
            $mail->isSMTP();
            $mail->Host       = 'smtp.gmail.com';
            $mail->SMTPAuth   = true;
            $mail->Username   = 'manishkumarsingh1798@gmail.com';
            $mail->Password   = 'zyfhcwesddjwkeif';
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
            $mail->Port       = 465;
            $mail->setFrom('manishkumarsingh1798@gmail.com', 'Admin');
            $mail->addAddress('vijaypalg71@gmail.com');
            $code = substr(str_shuffle('1234567890QWERTYUIOPASDFGHJKLZXCVBNM'), 0, 10);


            $mail->isHTML(true);
            $mail->Subject = 'Password Reset';
            $mail->Body    = 'To reset your password click <a href="http://hestalabs.com/tse/mailnam-manish/manmail/newpassword.php?code=' . $code . '">click here </a> </br>Reset your password in a day.';
            echo 'mail send successfully';
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
    } 
    $conn->close();
}
else {
    echo 'username or email not found';
}
