<?php
session_start();

?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link rel="stylesheet" href="../css1/login.css">
</head>
<style>
    #login {
        color: red;
        font-size: 13px;
    }
</style>

<body class="mt-5">
    <section class="Form my-4 mx-5">
        <div class="container">
            <div class="row no-gutters">
                <div class="col-lg-5 mt-3">
                    <img src="../img1/j.png" alt="" class="img-fluid">
                </div>
                <div class="col-lg-7 pt-5 px-5">
                    <h2 class="font-weight-bold py-2">Mailman</h2>
                    <h3>Login Into Your Account</h3>

                    <form action="../php/logindb.php" class="" method="post">
                        <div class="form-row">
                            <div class="">
                                <label>Email</label>
                                <input type="text" class="form-control myy-3" onchange="return myvalidation()" name="username" placeholder="Email/Username" id="remail1">
                                <span id="login"><?php echo  $_SESSION['login'] ?></span>
                            </div>
                            <div class="form-row">
                                <div class="">
                                    <label>Password</label>
                                    <input type="password" class="form-control my-3" onchange="return myvalidation()" name="password" placeholder="Enter Password" id="cp1">
                                    <span id="passwordmatch"></span>
                                </div>
                            </div>
                            <div class="form-row d-flex justify-content-between">
                                <div>
                                    <a class="" href="forgot.php">Forgot Password</a>
                                </div>
                                <div class="">
                                    <button type="submit" name="submit" onclick="return myvalidation() " name="login" class="btn btn-outline-primary">Login</button>
                                </div>
                            </div>
                    </form>
                    <p>Don't have an account yet?</p>
                    <a href="signup.php">Create One</a>
                </div>
            </div>
        </div>
    </section>
    </script>

    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <?php

    if (isset($_SESSION['status']) && $_SESSION['status'] != '') {

    ?>

        <script>
            swal({
                title: "<?php echo $_SESSION['status']  ?>",
                text: "Please press ok to go to login Page!",
                icon: "<?php echo $_SESSION['status_code']  ?>",
                button: "Ok Done",
            });
        </script>
    <?php
        unset($_SESSION['status']);
    }


    ?>
    <script src="../js1/login.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
</body>

</html>