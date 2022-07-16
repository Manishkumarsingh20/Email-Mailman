<?php
include_once "db.php";
session_start();
$obj = new DB;
if (isset($_POST['signup'])) {
    $firstname = $_POST["fname"];
    $lastname = $_POST["lastname"];
    $username = $_POST["uname"];
    $picture = $_FILES["picture"];
    $emails = $_POST["rmail"];
    $remails = $_POST["mmail"];
    $password = $_POST["pass"];
    $confirmpassword = $_POST["cpass"];
    $file_name = $_FILES['picture']['name'];
    $file_size = $_FILES['picture']['size'];
    $file_tmp_name = $_FILES['picture']['tmp_name'];
    $file_type = $FILES['picture']['type'];


    // if (move_uploaded_file($file_tmp_name, "/var/www/html/project/images/" . $file_name)) {
    if (move_uploaded_file($file_tmp_name, "../images/" . $file_name)) {
        echo "uploaded files";
    } else {
        echo "not uploaded files";
    }

    $query = "INSERT INTO users(firstname,lastname,username,picture,email,secondemail,password,cofirmpassword) Values('$firstname','$lastname','$username' ,'$file_name' ,'$emails', '$remails','$password' ,'$confirmpassword')";
    $m = 'abc';
    if ($obj->insertinto($query)) {
        $_SESSION['status']=" Congratulations Registration Successfull";
        $_SESSION['status_code']="success";
        $obj->url("../manmail/login.php?msg='$m'");
    }
}
