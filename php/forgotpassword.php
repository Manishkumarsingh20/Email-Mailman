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
    $code = substr(str_shuffle('1234567890QWERTYUIOPASDFGHJKLZXCVBNM'), 0, 10);
    $reset_codes = "UPDATE users SET reset_code = '$code' WHERE username='$second_email' OR email='$second_email'";
    $reset = $conn->query($reset_codes);

    if ($verifyQuery->num_rows > 0) {

        $mail = new PHPMailer(true);
        try {
            //Server settings
            $mail->isSMTP();                                            // Send using SMTP
            $mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
            $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
            $mail->Username   = 'manishkumarsingh1798@gmail.com';                     // SMTP username
            $mail->Password   = 'vpbnkgbbcglzmtmt';                               // SMTP password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
            $mail->Port       = 465;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

            //Recipients
            $mail->setFrom('manishkumarsingh1798@gmail.com', 'Admin');
            $mail->addAddress($to_mail);     // Add a recipient


 // Content
 $mail->isHTML(true);                                  // Set email format to HTML
 $mail->Subject = 'Password Reset';
 $mail->Body    = 'To reset your password click <a href="http://hestalabs.com/tse/mailnam-manish/manmail/newpassword.php?code=' . $code . '">click here </a> </br>Reset your password in a day.';
 $mail->send();
 echo "success please check your $to_mail";
 
} catch (Exception $e) {

 echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
}
$conn->close();
} else {
echo 'username or email not found';
}


