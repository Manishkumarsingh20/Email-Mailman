<?php
session_start();
include_once "../php/dbconnect.php";
$obj = new dbconnection;
if ($_SESSION['login']) {


    if (isset($_POST["delete_all"]) && $_POST["delete_all"] != "") {
        $email = $_SESSION['email'];
        $result = $obj->deleteall_inbox($email);
    }

    if (isset($_POST['read_msg'])) {
        $message = $_POST['message_inbox'];
        $email = $_SESSION['email'];
        $read = $obj->read($message, $email);
    }

    if (isset($_POST['unread_msg'])) {
        $message = $_POST['message_inbox'];
        $email = $_SESSION['email'];
        $read = $obj->unread_msg($message, $email);
    }

    if (isset($_POST["submit_sent"]) && $_POST["submit_sent"] != "") {
        $email = $_SESSION['email'];
        $message_id = $_POST['message_inbox'];
        $result = $obj->inbox_delete_data($email, $message_id);
    }

    if (isset($_POST['compose_msg_send'])) {
        $to = $_POST['to'];
        $from = $_SESSION['email'];
        $subject = $_POST['subject'];
        $cc = $_POST['cc'];
        $bcc = $_POST['bcc'];
        $message = $_POST['message'];
        $attachement = $_FILES['pictures']['name'];
        $name_image_temp = $_FILES['pictures']['tmp_name'];
        move_uploaded_file($name_image_temp, "../images/" . $attachement);
        $query_insert = $obj->insert_compose($to, $from, $subject, $cc, $bcc, $message, $attachement);
    }
    if (isset($_POST['draft'])) {
        $to = $_POST['to'];
        $from = $_SESSION['email'];
        $subject = $_POST['subject'];
        $cc = $_POST['cc'];
        $bcc = $_POST['bcc'];
        $message = $_POST['message'];
        $attachement = $_FILES['pictures']['name'];
        $name_image_temp = $_FILES['pictures']['tmp_name'];
        move_uploaded_file($name_image_temp, "../images/" . $attachement);
        $query_insert = $obj->insert_draft($to, $from, $subject, $cc, $bcc, $message, $attachement);
    }




?>
    <!doctype html>
    <html lang="en">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Dashboard</title>
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
                    <input type="search" id="searchdata" class="form-control rounded" placeholder="Search" aria-label="Search" aria-describedby="search-addon" />
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
        <div class="container-fluid">
            <div class="row">
                <nav id="sidebar" class="d-md-block col-lg-2 col-md-3 my-5 ml-4  sidebar collapse">
                    <div class="position-sticky " style="margin: -7px 0px 0px 82px;">
                        <ul class="nav flex-column ">
                            <li class="compose">
                                <button class=btn class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">Compose</button>
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

                <main class="col-lg-10 col-md-9 ml-sm-auto px-md-4 py-4 message_details">
                    <form name="frmUser" method="post">
                        <div class="row actio_bar m-4">
                            <div>
                                <span class="mr-2">
                                    <input type="checkbox" class="checkbox_all" id="select_all" name="" title="select all">
                                    <input type="submit" name="delete_all" style="padding: 5px 10px 5px 10px;" class="btn btn-outline-danger d-none showhide" value="Delete All"></input>
                                    <input type="submit" name="submit_sent" style="padding: 5px 10px 5px 10px;" class="btn btn-outline-danger d-none hide" value="Delete"></input>
                                    <input type="submit" name="read_msg" style="padding: 5px 10px 5px 10px;" class="btn btn-outline-success d-none hide" value="Read"></input>
                                    <input type="submit" name="unread_msg" style="padding: 5px 10px 5px 10px;" class="btn btn-outline-secondary d-none hide" value="Unread"></input>
                                </span>
                            </div>
                            <div class="d-grid gap-2 d-md-block">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 mb-3">
                                <div class="card">
                                    <h5 class="card-header">Inbox</h5>
                                    <div class="card-body">
                                        <div class="table-responsive removable-table">
                                            <table class="table" id="removetable">
                                                <tbody>
                                                    <?php
                                                    $sql = $obj->inbox_data($_SESSION['email']);
                                                    while ($row = mysqli_fetch_array($sql)) {
                                                        $class = "";
                                                        if ($row['read'] == 1) {
                                                            $class = "text-danger";
                                                        } else {
                                                            $class = "font-weight:bold";
                                                        }
                                                    ?>
                                                        <tr id="color">

                                                            <td><input type="checkbox" class="checkbox" name=""></td>
                                                            <input type="hidden" name="message_inbox" id="message_inbox" value="<?php echo $row['id']; ?>">

                                                            <td class="col-4"><?php echo $row['from_send'] ?></td>
                                                            <td class="col-4"><?php echo $row['subject_line'] ?></td>
                                                            <td class="col-4"><?php echo $row['date_time'] ?></td>
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
                                <form class="form1" method="post" enctype='multipart/form-data'>
                                    <div class="py-2">
                                        <input type="email" name="to" id="email" onchange="return validation()" class="form-control" placeholder="Enter you email">
                                    </div>
                                    <div class="py-2">
                                        <input type="text" name="subject" id="sub" onchange="return validation()" class="form-control" placeholder="Subject">
                                    </div>
                                    <div class="py-2">
                                        <input type="text" name="cc" class="form-control" placeholder="CC">
                                    </div>
                                    <div class=" py-2">
                                        <input type="text" name="bcc" class="form-control" placeholder="BCC">
                                    </div>
                                    <div class="py-2">
                                        <textarea class="form-control" name="message" onchange="return validation()" placeholder="Message body" name="" id="" cols="100" rows="10"></textarea>
                                    </div>
                                    </fieldset>
                            </div>
                        </section>
                    </div>
                    <div class="modal-footer">
                        <input type="file" name="pictures">
                        <button type="submit" class="btn btn-danger" style="padding: 5px 10px 5px 10px;" name="draft" value="close" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-success" style="padding: 5px 10px 5px 10px;" onclick="return validation()" value="sent" name="compose_msg_send">Send</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>

        </script>

        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
        <?php

        if (isset($_SESSION['Compose']) && $_SESSION['Compose'] != '') {
        ?>
            <script>
                swal({
                    title: "<?php echo $_SESSION['Compose']  ?>",
                    text: "",
                    icon: "<?php echo $_SESSION['compose_code']  ?>",
                    button: "Ok Done",
                });
            </script>
        <?php
            unset($_SESSION['Compose']);
        }
        ?>
        </script>



        <!-- --------------------------------------------------------------------------- -->
        <?php
        if (isset($_SESSION['draft']) && $_SESSION['draft'] != '') {
        ?>
            <script>
                swal({
                    title: "<?php echo $_SESSION['draft']  ?>",
                    text: "",
                    icon: "<?php echo $_SESSION['draft_code']  ?>",
                    button: "Ok Done",
                });
            </script>
        <?php
            unset($_SESSION['draft']);
        }
        ?>
        <!-------------------------------------------------------------------------- --------->

        <script>
            $(document).ready(function() {
                $('#searchdata').keyup(function(e) {
                    e.preventDefault();
                    var search = $('#searchdata').val();
                    $.ajax({
                        type: "POST",
                        url: "../php/dbconnect.php",
                        dataType: 'json',
                        data: {
                            'check_search': 1,
                            'search': search,
                        },
                        success: function(data) {
                            console.log(data);
                            $.each(data, function(indexInArray, valueOfElement) {
                                $('#removetable').append("<tr ><td><input type='checkbox'></td><td>" + valueOfElement['to_send'] + "</td><td>" + valueOfElement['subject_line'] + "</td><td>" + valueOfElement['date_time'] + "</td></tr>");
                            });
                        }
                    });
                });
            });
        </script>

        <!---------------------------------------------------------------------------------- -->

        <script>
            //pagination
            $(document).ready(function() {
                function loadTable(page) {
                    $.ajax({
                        url: "../php/dbconnect.php",
                        type: "POST",
                        data: {
                            'check_page_inbox': 1,
                            'page_no_inbox': page
                        },
                        success: function(data) {
                            var res = JSON.parse(data);
                            if (res.type == "pagination") {
                                $(".removable-table").html('');
                                $(".removable-table").append(res.html);
                            }
                        }
                    });
                }
                loadTable();
                $(document).on("click", "#pagination a", function(e) {
                    e.preventDefault();
                    var page_id = $(this).attr("id");

                    loadTable(page_id);
                })
            });
        </script>

        <!-- ---------------------------------------------------------------------------- -->

        <script>
            $(document).on("click", ".checkbox", function() {
                if ($("input[type=checkbox]").is(":checked")) {
                    $(".hide").removeClass("d-none");
                } else {
                    $(".hide").addClass("d-none");
                }
            });
        </script>

        <!-- --------------------------------------------------------------------- -------->

        <script>
            $(document).on("click", ".checkbox_all", function() {
                if ($("#select_all").is(":checked")) {
                    $(".showhide").removeClass("d-none");
                } else {
                    $(".showhide").addClass("d-none");
                }
            });
        </script>

        <!------------------------------------------------------------------ -->

        <script>
            $(document).ready(function() {
                $('#select_all').on('click', function() {
                    if (this.checked) {
                        $('.checkbox').each(function() {
                            this.checked = true;
                        });
                    } else {
                        $('.checkbox').each(function() {
                            this.checked = false;
                        });
                    }
                });
                $('.checkbox').on('click', function() {
                    if ($('.checkbox:checked').length == $('.checkbox').length) {
                        $('#select_all').prop('checked', true);
                        $()
                    } else {
                        $('#select_all').prop('checked', false);
                    }
                });
            });
        </script>

        <!-- ------------------------------------------------------------------------ -->

        <script>
            $(document).on("click", ".mesaagedetail", function() {
                let message_id = $(this).attr('dataid')
                $.ajax({
                    type: "POST",
                    url: "../php/dbconnect.php",
                    data: {
                        'check_detail_inbox': 1,
                        'message_id': message_id
                    },
                    dataType: "json",
                    success: function(response) {
                        console.log(response);
                        var html = "<h1>Mailing Subject</h1>";
                        html += "<h5 style='color:blue'>Participants  </h5>";
                        html += "<div style='font-size:20px'>Date : " + response[0]['date_time'] + "</div>";
                        html += "<div> Subject:" + response[0]['subject_line'] + "</div>"
                        html += "<div> Email:" + response[0]['to_send'] + "</div>";
                        html += "<div> CC:" + response[0]['cc'] + "</div>";
                        html += "<div> BCC:" + response[0]['bcc'] + "</div>";
                        html += "<div> Message:" + response[0]['messsage_send'] + "</div>";
                        html += "<div> Attachement:" + response[0]['attachement '] + "</div>";
                        html += "<textarea style='width:600px;height:400px'></textarea>";
                        html += "<div><button style='padding: 1px 18px 1px 18px; background: blue;border-radius: 10px;' >Reply</button></div>";
                        html += "<br>";
                        html += "<div><button style='padding: 1px 18px 1px 18px; background: blue;border-radius: 10px;'>Reply ALL</button></div>";
                        $('.message_details').html(html)
                    }
                });
            })
        </script>

        <!-- -------------------------------------------------------------------------------------------- -->

        <!-- <script src="../js1/checkbox.js"></script> -->
        <script src="../js1/compose.js"></script>
        <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
    </body>

    </html>
<?php
} else {
    header("location:login.php");
}
?>