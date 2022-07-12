<?php
    session_start();
    session_destroy();
    echo "logout out successfully";
    header('location:../manmail/login.php');
?>