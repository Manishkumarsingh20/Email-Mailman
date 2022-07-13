<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
include_once "../php/dbconnect.php";
session_start();
if ($_SESSION['login']) {
    $db = new dbconnection;
    $result = $db->getoneelement($_SESSION['id']);


?>

    <!doctype html>
    <html lang="en">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Profile</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
        <link rel="stylesheet" href="../css1/login.css">
        <link rel="stylesheet" href="../css1/dashboard.css">
    </head>

    <body class="">
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
                    <button type="button" style="padding: 4px 4px 8px 5px ; border-radius:11px 11px 11px 13px" id="search_btn" class="btn btn-primary">Search</button>
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
                    <img src="/images/<?php echo $_SESSION['picture'] ?>" alt="img">
                </div>
            </div>
            </div>
        </nav>
        <section class="Form my-4 mx-5">
            <div class="container">
                <div class="row no-gutters">

                    <div class="col-sm-6 pt-5 px-5">
                        <h2 class="font-weight-bold py-2">Mailman</h2>
                        <form class="" method="post">
                            <div class="form-row">
                                <div class="">
                                    <?php //print_r($result);
                                    ?>
                                    <input type="text" value="<?php echo $result['firstname'] ?>" name="name" class="form-control my-3" placeholder="Name" id="f1">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="">
                                    <input type="email" value="<?php echo $result['email'] ?>" name="email" class="form-control my-3" placeholder="Email(primary)" id="remail1">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="">
                                    <input type="email" value="<?php echo $result['secondemail'] ?>" name="remail" class="form-control my-3" placeholder="Email(Secondary)" id="rema">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="">
                                    <input type="text" value="<?php echo $result['username'] ?>" name="user_name" class="form-control my-3" placeholder="Username" id="tom">
                                </div>
                            </div>
                            <div class="form-row d-flex justify-content-between">
                            </div>
                        </form>
                    </div>
                    <div class="col-sm-6 mt-3">
                        <img src="http://localhost/project/images/<?php echo $_SESSION['picture'] ?>" style="width:300px" alt="" class="img-fluid">
                    </div>
                    <a class="col-sm-6" href="profileupload.php?updateid=<?= $result['id'] ?>">Edit Profile</a> <a href="changeoldpassword.php?changeoldpasswordid=<?= $result['id'] ?>">Change password</a>
                </div>
            </div>
        </section>

        <script src="../js1/profile.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
    </body>

    </html>
<?php
} else {
    header("location:login.php");
}
?>