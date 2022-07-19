
<?php

if (isset($_POST['reset_code'])) {
    $code = $_POST['reset_code'];
    $conn = new mySqli('localhost', 'tse', 'bPmtHasjyTJ2SgZJ', 'manish');
    if ($conn->connect_error) {
        die('Could not connect to the database');
    }
    $sql = "SELECT * FROM users WHERE reset_code = '$code'";
    $verifyQuery = $conn->query($sql);
    if ($verifyQuery->num_rows == 0) {
        header("Location: ../manmail/login.php ");
        exit();
    }
    if (isset($_POST['change'])) {
        $new_reset_password = $_POST['npass'];
        $new_password = $_POST['new_password'];
        if ($new_reset_password == $new_password) {
             $query = "UPDATE users SET password = '$new_reset_password', cofirmpassword = '$new_password' WHERE reset_code = '$code'";
            
            $changeQuery = $conn->query($query);
           
             if ($changeQuery) {
                // $_SESSION['forgot']="Password changed successfully";
                // $_SESSION['forgot_code']="success";
                echo "password updated successfully";
            } else {
                echo "not updated";
            }
        }
    }
    $conn->close();
} else {
    echo "failed to update";
    exit();
}
?>



