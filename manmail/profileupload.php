<?php

session_start();

if ($_SESSION['login']) {

    include_once "../php/dbconnect.php";

    $obj = new dbconnection;
    if (isset($_POST['submit'])) {
        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $time = date('Y-m-d H:i:s');
        $secondemail = $_POST['recoveryemail'];
        $picture = $_FILES['picture']['name'];
        $name_image_temp = $_FILES['picture']['tmp_name'];
        // move_uploaded_file($name_image_temp, "/var/www/html/project/images/" . $picture);
        move_uploaded_file($name_image_temp, "../images/" . $picture);
        $result = $obj->update($firstname, $lastname, $secondemail, $picture, $time);
    }


    $get_result = $obj->select($_SESSION['id']);

    if (isset($_POST['delete'])) {
        $picture = $_POST['picture'];
        $result = $obj->delete($picture);
    }

?>


    <!doctype html>
    <html lang="en">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Edit Profile</title>
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
                    <img src="../images/<?php echo $_SESSION['picture'] ?>" alt="img">
                </div>
            </div>
            </div>
        </nav>
        <section class="Form my-2 mx-5">
            <div class="container">
                <div class="row no-gutters">

                    <form class="" method="post" enctype='multipart/form-data'>
                        <div class="row align-items-center">
                            <div class="col-sm-6 pt-5 px-5">
                                <h2 class="font-weight-bold py-2">Mailman</h2>
                                <div class="form-row">
                                    <div class="">
                                        Name: <input type="text" value="<?php echo $_SESSION['firstname'] ?>" onchange="return validationstart()" name="firstname" value="" class="form-control my-3" placeholder="FirstName" id="f1">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="">
                                        <input type="text" name="middlename" value="<?php echo $_SESSION['middlename'] ?>" onchange="return validationstart()" class="form-control my-3" placeholder="Middle Name" id="m1">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="">
                                        <input type="text" value="<?php echo $_SESSION['lastname'] ?>" onchange="return validationstart()" name="lastname" class="form-control my-3" placeholder="Last Name" id="l1">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="">
                                        Recovery Email: <input type="email" value="<?php echo $_SESSION['secondemail'] ?>" onchange="return validationstart()" name="recoveryemail" class="form-control my-3" placeholder="Email" id="remail">
                                    </div>
                                </div>
                                <div class="form-row d-flex justify-content-between">
                                    <div class="">
                                        <button type="submit" name="submit" style="padding: 5px 9px 9px 6px" onclick="return validationstart()" class="btn btn-outline-primary mb-5">Submit</button>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">

                                <div class="mt-3 iprofileimf">
                                    <span><button type="submit" name="delete" class="btn btn-outline-danger" style="padding:5px 5px 5px 5px ;width:94px"><a href="profileupload.php?updateid=<?php echo $_SESSION['id'] ?>">Delete</a></button></span>
                                    <input type="file" class="type djkdfjk" name="picture">
                                    <?php echo $_SESSION['picture']; ?>
                                    <img src="<?php echo 'http://hestalabs.com/tse/mailnam-manish/images/'.$_SESSION['picture']; ?>" alt="" class="" style="width:300px">

                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </section>
        <script src="../js1/profileupload.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
    </body>

    </html>
<?php
} else {
    header("location:login.php");
}
?>