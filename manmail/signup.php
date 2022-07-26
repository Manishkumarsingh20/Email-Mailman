<?php
session_start();
?>

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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="../js1/signup.js"></script>
    <!-- css link end -->

</head>
<!-- body start -->


<style>
    #error {
        color: red;
    }

    #lasterror {
        color: red;
    }

    #usererror {
        color: red;
        position: relative;
        left: -25px;
    }

    #emailerror {
        color: red;
    }

    #recover {
        color: red;
    }

    #passwordd {
        color: red;
    }

    #confirmpasswordd {
        color: red;
    }

    #pictures {
        color: red;
    }
</style>

<body>
    <!-- container start -->
    <section>
        <div class="container" style="
    height: 792px; ">

            <!-- logo design start -->
            <div class="login">
                <h2>Mailman </h2>
            </div>
            <!-- logo design end -->

            <!-- upload img start  -->
            <div class="upload">
                <img id="output" src="../img1/profile.jpg" width="150" height="150">
                <div class="round">
                </div>
            </div>
            <!-- upload img end -->
            <div class="create ">
                Create An Account
            </div>
            <div>
                <p id=emailhaserror></p>
                <?php
                if (isset($_SESSION['status'])) {
                ?>
                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                        <strong>Hey !</strong> <?= $_SESSION['status']; ?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                <?php
                    unset($_SESSION['status']);
                }

                ?>
                <!-- form start -->
                <div class="form1">
                    <form method="post" action="../php/insert.php" enctype="multipart/form-data" autocomplete="off" onsubmit="return submitForm(this);">
                        <div>
                            <input type="text" name="fname" onchange="return validationstart()" placeholder="Enter Your Firstname" id="f1" autocomplete="off">
                            <br> <span id="error" style="margin: 0px 0px 0px -480px"></span>
                        </div>
                        <div>
                            <input type="text" name="lname" onchange="return validationstart()" placeholder="Enter Your LastName" id="l1" autocomplete="off">
                            <br> <span id="lasterror" style="margin:0px 0px 0px -481px;"></span>
                        </div>
                        <div>
                            <input type="text" name="uname" class="user_id" placeholder="Enter Username" id="u1" autocomplete="off">
                            <br> <span id="usererror" class="user_name usernameclass" style="margin: 0px 0px 0px -455px;"></span>
                        </div>
                        <div>
                            <p class="avail ">Availability*</p>
                        </div>
                        <div class="email1">
                            <input type="Email" name="rmail" class="email_id" placeholder="Enter Your Email" id="email1" autocomplete="off"><span>@mailman.com</span>
                            <br> <span id="emailerror" class="email_name" style="margin: 0px 0px 0px -568px"></span>
                        </div>
                        <div class="email2">
                            <input type="Email" name="mmail" onchange="return validationstart()" placeholder="Enter Your Recovery Email" id="remail1" autocomplete="off">
                            <br> <span id="recover" style="margin: 0px 0px 0px -540px;"></span>
                        </div>
                        <div>
                            <input type="password" name="pass" onkeyup="return validationstart()" class="passing" placeholder="Enter New Password Here" id="pass1" autocomplete="off">
                            <br> <span id="passwordd" style=" margin: 0px 0px 0px -542px;"></span>
                        </div>
                        <div>
                            <input type="password" name="cpass" onchange="return validationstart()" class="passing" placeholder="Confirm Password" id="cp1" autocomplete="off">
                            <br> <span id="confirmpasswordd" style=" margin: 0px 0px 0px -489px;"></span>
                            <br>
                            <p id="write" width="5px"></p>
                        </div>
                        <div>
                            <P class="CB" style="margin: 0px 0px 0px 67px;">I agree to term & condition of MailMan</P>
                            <input type="checkbox" style="position: relative;top:-16px;left:-251px; position:relative;left:-369px" onchange="return validationstart()" id="checkbox" autocomplete="off">
                            <span id=checkboxx></span>
                        </div>
                        <div>
                            <input type="file" id="file" name="picture" style="position:relative;top: -482px;left:181px" onchange="loadFile(event)" onchange="return validationstart()" autocomplete="off">
                            <span id="pictures" style="position: absolute;top:207px;left:253px"></spna>
                        </div>

                        <button type="submit" class="btn btn-outline-primary" id="signup" onclick="return validationstart()" name="signup">Singup</button>
                        <button type="button" onclick="window.location.href='login.php'" class="btn btn-outline-primary">SingIn</button>
                    </form>

                </div>
                <!-- form end -->
            </div>
            <!-- container end -->


    </section>

    <!-- --------------------------------------------------------------------- -->

    <script>
        $(document).ready(function() {

            var email_state = false;
            $('.email_id').keyup(function(e) {
                e.preventDefault();
                var email = $('.email_id').val();
                $.ajax({
                    type: "POST",
                    url: "../php/dbconnect.php",
                    dataType: 'json',
                    data: {
                        'check_Emailbtn': 1,
                        'email': email,
                    },
                    success: function(response) {
                        if (response == 'Email id is already taken') {
                            email_state = false;
                            $('#emailerror').text('**sorry email already taken');
                            $('#emailerror').css({
                                'color': 'red'
                            })
                            $('#email1').css({
                                'border': '2px solid red'
                            });
                            $('#signup').prop('disabled', true);


                        } else if (response == 'Its available') {
                            email_state = true;
                            $('#emailerror').text('Email is available');
                            $('#emailerror').css({
                                'color': 'green'
                            });
                            $('#email1').css({
                                'border': '2px solid green'
                            });
                            $('#signup').prop('disabled', false);
                        }
                    }
                });
            });
        });
    </script>

    <!-- --------------------------------------------------------------------------------------------------------- -->


    <script>
        $(document).ready(function() {

            var user_state = false;
            $('.user_id').keyup(function(e) {
                e.preventDefault();
                var username = $('.user_id').val();
                $.ajax({
                    type: "POST",
                    url: "../php/dbconnect.php",
                    dataType: 'json',
                    data: {
                        'check_userbtn': 1,
                        'username': username,
                    },
                    success: function(response) {
                        console.log(response);
                        var username = $('.user_id').val()
                        if (response == 'username id is already taken' || username == "") {
                            user_state = false;
                            $('#usererror').text('**sorry Username already taken');
                            $('#usererror').css({
                                'color': 'red'
                            });
                            $('#u1').css({
                                'border': '2px solid red'
                            });
                            $('#signup').prop('disabled', true);

                        } else if (response == 'Its available') {
                            user_state = true;
                            $('.usernameclass').text('Username  is available');
                            $('#usererror').css({
                                'color': 'green'
                            });
                            $('#u1').css({
                                'border': '2px solid green'
                            });
                            $('#signup').prop('disabled', false);

                        }
                    }
                });
            });
        });
    </script>

    <!-------------------------------------------------------------------------------------- -->

    <script>
        var loadFile = function(event) {
            var output = document.getElementById('output');
            output.src = URL.createObjectURL(event.target.files[0]);
            output.onload = function() {
                URL.revokeObjectURL(output.src)
            }
        };
    </script>

    <!-- JavaScript Bundle with Popper -->
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
    <!-- JavaScript End -->
</body>
<!-- body end -->

</html>