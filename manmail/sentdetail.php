<?php
session_start();
include_once "../php/dbconnect.php";
$obj = new dbconnection;
if ($_SESSION['login']) {
?>



<!doctype html>
    <html lang="en">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Inbox page</title>
        <!-- <link rel="stylesheet" href="../css1/emailpage.css"> -->
        <link rel="stylesheet" href="../css1/dashboard.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
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
                <img src=<?php echo 'http://hestalabs.com/tse/manish-mailman/images '.$_SESSION['picture'] ?>  alt="img">
                </div>
            </div>
            </div>
        </nav>
        <div class="container-fluid">
            <div class="row">
                <nav id="sidebar" class="d-md-block col-lg-2 col-md-3 bg-info sidebar collapse">
                    <div class="position-sticky">
                        <ul class="nav flex-column">
                            <li class="compose">
                                <button class=btn class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop"><a href="dashboard.php?composeid=<?php echo $_SESSION['id'] ?>">Compose</a></button>
                            </li>
                            <li class="nav-item mt-2">
                                <a class="nav-link" href="inbox.php">
                                    <span class="ml-2">Inbox</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="sent.php">
                                    <span class="ml-2">Sent</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="draft.php">
                                    <span class="ml-2">Draft</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="trash.php">
                                    <span class="ml-2">Trash</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </nav>

                <main class="col-lg-10 col-md-9 ml-sm-auto px-md-4 py-4">
                <form name="frmUser" method="post">
                    <div class="row actio_bar m-4">
                            <div>
                                <span class="mr-2">
                                    <input type="checkbox" name="" title="select all">
                                    <input name="submit" style="padding: 4px 11px 3px 14px;margin: -8px 30px 0px 49px; position: absolute;right: 1076px;" class="btn btn-outline-primary" id="hide"
                                     style="padding: 5px 9px 9px 6px " type="submit" value="Delete"></input>
                            </div>
                        </span>


                        <div class="d-grid gap-2 d-md-block">

                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 mb-3">
                            <div class="card">
                                <h5 class="card-header">Mailing Subject</h5>
                                <br>
                                <a href="" class="offset">Participants</a>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table">
                                            <tbody>
                                                <?php
                                                $sql = $obj->inbox_data($_SESSION['email']);
                                             

                                                while ($row = mysqli_fetch_array($sql)) {
                                                ?>
                                                 
                                                      <tr onclick="window.location='sentdetail.php';">
                                                        
                                                        <input type="hidden" name="message_id[]" id="message_id" value="<?php  echo $row['id'];?>">
                                                        <td><?php echo $row['messsage_send']?></td>
                                                       
                                                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsa nihil blanditiis ab dolores deleniti numquam labore iure ad, alias et maiores voluptates, soluta pariatur hic quaerat itaque sit magni assumenda.
                                                    </tr>
                                                <?php
                                                }
                                                ?> 
                                            </tbody>
                                        </table>

                                    </div>
                                </div>

                            </div>
                            </form>
                </main>
            </div>
        </div>
        <nav aria-label="Page navigation example">
            <ul class="pagination justify-content-center">
                <li class="page-item disabled">
                    <a class="page-link">Previous</a>
                </li>
                <li class="page-item"><a class="page-link" href="#">1</a></li>
                <li class="page-item"><a class="page-link" href="#">2</a></li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
                <li class="page-item">
                    <a class="page-link" href="#">Next</a>
                </li>
            </ul>
        </nav>
        <!-- Modal -->
        <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">Compose Your Mail</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <section class="form">
                            <div class="container-fluid py-2 mt-5">
                                <form class="form1">
                                    <div class="py-2">
                                        <input type="email" class="form-control" placeholder="Email-Address">
                                    </div>
                                    <div class="py-2">
                                        <input type="text" class="form-control" placeholder="CC">
                                    </div>
                                    <div class=" py-2">
                                        <input type="text" class="form-control" placeholder="BCC">
                                    </div>
                                    <div class="py-2">
                                        <textarea class="form-control" placeholder="Message body" name="" id="" cols="100" rows="10"></textarea>
                                    </div>
                                    </fieldset>
                                </form>
                            </div>
                        </section>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" onclick="return validation()" name="compose_msg_send">Send</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- <script src="/js1/showhide.js"></script> -->
        <script src="../js1/check.js"></script>
        <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
    </body>

    </html>
    <?
} else {
    header("location:login.php");
}
?>