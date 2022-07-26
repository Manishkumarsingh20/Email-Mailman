<?php

session_start();
include_once "../php/dbconnect.php";

$obj = new dbconnection;
if ($_SESSION['login']) {
    if (isset($_POST['changetonew'])) {
        $oldpassword = $_POST['oldpass'];
        $confirm_passowrd_entery = $_POST['confirm_password'];
        $newconfirmpassword = $_POST['new_password'];
        $fetch_data = $obj->old_password_match($oldpassword, $confirm_passowrd_entery, $newconfirmpassword);
    }
?>
    <!doctype html>
    <html lang="en">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Changeoldpassword</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
        <link rel="stylesheet" href="../css1/login.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
        <link rel="stylesheet" href="../css1/dashboard.css">
    </head>

    <body>
        <nav class="navbar navbar-light bg-info p-3">
            <div class="col-12 col-md-3 col-lg-3 mb-2 flex-wrap flex-md-nowrap d-flex justify-content-between">
                <a class="navbar-brand" href="#">MAILMAN
                    <figure img src="../img1/j.png" alt="mailman"></figure>
                </a>
                <!-- //check -->
                <button class="navbar-toggler mb-3  collapsed d-md-none" type="button" data-toggle="collapse" data-target="#sidebar">
                    <span class="navbar-toggler-icon "></span>
                </button>
            </div>
            <!-- //check -->
            <div class="col-lg-6 col-md-6 col-6">
                <div class="input-group">
                    <input type="search" class="form-control rounded" placeholder="Search" aria-label="Search" aria-describedby="search-addon" />
                    <!-- <button type="button" style="padding: 4px 4px 8px 5px ; border-radius:11px 11px 11px 13px" id="search_btn" class="btn btn-primary">Search</button> -->
                </div>
            </div>
            <div class="col-4 col-md-2 col-lg-2 d-flex align-items-center justify-content-end mt-md-8">
                <div class="mr-3 mt-1">
                </div>
                <div class="dropdown">
                    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenu2" data-bs-toggle="dropdown" aria-expanded="false">
                        <?php echo $_SESSION['username']; ?>
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenu2">
                        <li><a class="dropdown-item" href="profile.php">Profile</a></li>
                        <li><a class="dropdown-item" href="../php/logout.php">Logout</a></li>
                    </ul>
                </div>
                <div class="profile_image" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                    <img src="../images/<?php echo $_SESSION['picture'] ?>" alt="img">
                </div>
            </div>
            </div>
        </nav>
        <section class="Form my-4 mx-5">
            <div class="container">
                <a href="profileupload.php"> <button type="button" style="padding: 7px 5px 7px 5px;" class="btn btn-danger">Back to Profileupload</button></a>
                <div class="row no-gutters">
                    <div class="col-lg-5 mt-3">
                        <h2 class="font-weight-bold py-2"><span class="Yellow">Mailman</span></h2>
                        <form class="" action="" method="post">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="">
                                        <input type="password" name="oldpass" class="form-control my-3 icon oldpass" onchange=" return validation()" placeholder="Type old password" id="pass1"> <span> <i class="fa-solid fa-question"></i></span>
                                        <span class="oldpassword"></span>
                                    </div>
                                    <div class="">
                                        <input type="password" name="confirm_password" class="form-control my-3" onchange=" return validation()" placeholder="Confirm password" id="cp1">
                                        <span id="write" style="color:red"></span>
                                    </div>
                                    <div class="">
                                        <input type="password" name="new_password" class="form-control my-3" onchange=" return validation()" placeholder="Type new password" id="newpassword">
                                    </div>
                                    <div class="text-right">
                                        <button type="submit" id="button" class="btn btn-outline-primary" style="padding:5px 5px 5px 5px ;width:94px" onclick="return validation()" name="changetonew">
                                            Submit</button>
                                    </div>
                                </div>
                                <div class="col-sm-6 py-5 ">
                                    <img src="../images/<?php echo $_SESSION['picture'] ?>" style="width:300px" alt="">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script src="../js1/newpassword.js"></script>
    </body>

    </html>
    <?php
    if (isset($_SESSION['password']) && $_SESSION['password'] != '') {
    ?>
        <script>
            swal({
                title: "<?php echo $_SESSION['password']  ?>",
                text: "Please press ok to go Back",
                icon: "<?php echo $_SESSION['password_code']  ?>",
                button: "Ok Done",
            });
        </script>
    <?php
        unset($_SESSION['password_code']);
    }
    ?>
<?php
} else {
    header("location:login.php");
}
?>