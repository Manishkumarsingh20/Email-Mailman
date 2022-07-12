<?php
session_start();
if(empty($_GET['code']) && !isset($_SESSION['id'])){
    header("location:login.php");
}
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>New password</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link rel="stylesheet" href="../css1/login.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <link rel="stylesheet" href="" class="css">
</head>

<body class="mt-5">
    <section class="Form my-4 mx-5">
        <div class="container">
            <div class="row no-gutters">
                <div class="col-lg-5 mt-3">
                    <h2 class="font-weight-bold py-2"><span class="Yellow">Mailman</span></h2>

                    <form class="" action="../php/changepassword.php" method="post">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="">
                                    <input type="hidden" name="reset_code" value="<?php echo $_GET['code']; ?>">

                                    <input type="password" name="npass" class="form-control my-3 icon" placeholder="Enter New Password Here" id="pass1"> <span> <i class="fa-solid fa-question"></i></span>
                                </div>
                                <div class="">
                                    <input type="password" name="new_password" class="form-control my-3" placeholder="Confirm Password" id="cp1">
                                </div>
                                <div class="text-right">
                                    <button type="submit" class="btn btn-outline-primary" onclick="myvalidation()" name="change">
                                        Submit</button>
                                </div>
                                <!-- <div id="write"></div> -->
                            </div>
                            <div class="col-sm-6 py-5 ">
                                <img src="../img1/locker.png" alt="">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="../js1/newpassword.js"></script>
</body>

</html>
<?php

?>