<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup</title>
    <!-- css link Start-->
    <link rel="stylesheet" href="../css1/signup.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <script src="../js1/signup.js"></script>
    <!-- css link end -->

</head>
<!-- body start -->

<body>
    <!-- container start -->
    <section>
        <div class="container">

            <!-- logo design start -->
            <div class="login">
                <h2>Mailman </h2>
            </div>
            <!-- logo design end -->

            <!-- upload img start  -->
            <div class="upload">
                <img src="/img/profile.png" width="100" height="100">
                <div class="round">
                </div>
            </div>
            <!-- upload img end -->
            <div class="create">
                Create An Account
            </div>
            <!-- form start -->
            <div class="form1">
                <form method="post" action="../php/insert.php" enctype="multipart/form-data">

                    <input type="file" name="picture">
                    <div>
                        <input type="text" name="fname" onchange="return validationstart()" placeholder="Enter Your Firstname" id="f1">
                        <span id="error"></span>
                    </div>
                    <div>
                        <input type="text" name="lname" onchange="return validationstart()" placeholder="Enter Your LastName" id="l1">
                    </div>

                    <div>
                        <input type="text" name="uname" onchange="return validationstart()" placeholder="Enter Username" id="u1">
                    </div>

                    <div>
                        <p class="avail">Availability*</p>
                    </div>
                    <div class="email1">
                        <input type="Email" name="rmail" onchange="return validationstart()" placeholder="Enter Your Email" id="email1"><span>@mailman.com</span>
                    </div>
                    <div class="email2">
                        <input type="Email" name="mmail" onchange="return validationstart()" placeholder="Enter Your Recovery Email" id="remail1">
                    </div>
                    <div>
                        <input type="password" name="pass" onchange="return validationstart()" class="passing" placeholder="Enter New Password Here" id="pass1">
                    </div>
                    <div>
                        <input type="password" name="cpass" onchange="return validationstart()" class="passing" placeholder="Confirm Password" id="cp1">
                        <br>
                        <p id="write" width="5px"></p>
                    </div>
                    <div>
                        <P class="CB">I agree to term & condition of MailMan</P>
                        <input type="checkbox" required>
                    </div>
                    <br>
                    <button type="submit" class="btn btn-outline-primary" onclick="return validationstart()" name="signup">Singup</button>
                    <button type="submit" class="btn btn-outline-primary" name="submit"><a href="login.php">SingIn</a></button>
                </form>

            </div>
            <!-- form end -->
        </div>
        <!-- container end -->


    </section>

    <!-- JavaScript start-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
    <!-- JavaScript End -->
</body>
<!-- body end -->

</html>