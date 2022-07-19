<?php
// if(empty($_GET['code'])){
//     header("location:forgot.php");
// }
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>forgot page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link rel="stylesheet" href="../css1/forgot.css">
</head>

<body>
    <section class="form">
        <div class="container my-5  ">
            <div class="row justify-content-center align-items-center">
                <form method="post" class="col-6" action="../php/forgotpassword.php">
                    <div class="col-9">
                        <label class="my-2">Enter Your Registered Email</label>

                        <input type="text" name="email" value="username" class="form-control" placeholder="abc@.com"  onchange=" return validation()"id="emailconfirm">
                        <h6 class="my-2"><a href="login.php">Back to login</a></h6>
                        <button type="submit"  id="button"class="btn btn-outline-primary" name="reset" onclick=" return validation()">Sent Mail</button>
                    </div>
                </form>
                <div class="col-4 s  ">
                    <img src="../img1/j.png" alt="" class="img-fluid">
                </div>
            </div>
        </div>
    </section>
    <script src="../js1/forgot.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
</body>

</html>
<?php
