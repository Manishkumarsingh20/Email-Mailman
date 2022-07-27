<?php
session_start();


class dbconnection
{
    protected $db_name = 'manish';
    protected $db_user = 'tse';
    protected $db_pass = 'bPmtHasjyTJ2SgZJ';
    protected $db_host = 'localhost';
    public $connect_db;


    public function __construct()
    {

        $this->connect_db = new mysqli($this->db_host, $this->db_user, $this->db_pass, $this->db_name);

        if (!$this->connect_db) {

            echo "connected";
        } else {

            // echo " not connected";
        }
    }

    public function select($id)
    {

        $query = "SELECT firstname,middlename,lastname,secondemail FROM users WHERE id='$id'";
        $sql = mysqli_query($this->connect_db, $query);
        $get_result = mysqli_fetch_assoc($sql);
        return $get_result;
    }

    public function getoneelement($email)
    {
        $one_element = "SELECT * FROM users WHERE id='$email'";
        $data = $this->connect_db->query($one_element);
        $result = $data->fetch_assoc();
        return $result;
    }


    public function insert($id, $firstname, $lastname, $username, $picture, $email, $secondemail, $password, $confirmpassword, $resetcode)
    {

        $insert = "INSERT INTO users (id ,firstname,lastname,username,picture,email,secondemail,password,cofirmpassword,reset_code)
        VALUES ('$id' , '$firstname' , '$lastname' , '$username' , '$picture', '$email' '$secondemail' '$password' '$confirmpassword' '$resetcode')";
        $get_insert = mysqli_query($this->connect_db, $insert);
        return $insert;
    }

    public function update($firstname, $lastname,  $middlename, $secondemail, $picture)
    {
        $id = $_GET['updateid'];
        $update = "UPDATE users SET firstname='$firstname',lastname='$lastname', middlename='$middlename' , secondemail='$secondemail', picture='$picture' WHERE id='$id'";
        $result = mysqli_query($this->connect_db,  $update);
        if ($result) {
            $_SESSION['firstname'] = $firstname;
            $_SESSION['lastname'] = $lastname;
            $_SESSION['middlename'] = $middlename;
            $_SESSION['secondemail'] = $secondemail;
            $_SESSION['picture'] = $picture;
            $_SESSION['update'] = "Profile Uploaded Successful";
            $_SESSION['update_code'] = "success";
        } else {
            return " not updated";
        }
    }



    public function old_password_match($oldpassword, $confirm_passowrd_entery, $newconfirmpassword)
    {
        $id = $_GET['changeoldpasswordid'];
        $query = "SELECT `password` ,cofirmpassword,picture FROM users WHERE id='$id' AND `password`='$oldpassword'";
        $mysqli_query = $this->connect_db->query($query);
        $row = mysqli_fetch_array($mysqli_query);
        $passwordfetch = $row['password'];
        if ($passwordfetch == $confirm_passowrd_entery) {
            $changeQuery = $this->connect_db->query("UPDATE users SET password ='$newconfirmpassword', cofirmpassword='$newconfirmpassword' WHERE id = '$id'");
            if ($changeQuery) {
                $_SESSION['password'] = "Password Change Successfully";
                $_SESSION['password_code'] = "success";
            } else {
                echo "not updated";
            }
        }
    }



    public function delete($picture)
    {
        $id = $_GET['updateid'];
        $query = "UPDATE users SET picture='' WHERE id='$id'";
        $sql = $this->connect_db->query($query);
        if ($sql) {
            $_SESSION['delete'] = "Profile photo deleted successfully";
            $_SESSION['delete_code'] = "success";
            $_SESSION['picture'] = $picture;
        } else
            echo "not deleted";
    }




    public function insert_compose($to, $from, $subject, $cc, $bcc, $message, $attachement)
    {
        $sql_query = "INSERT INTO email(to_send,from_send,subject_line,cc,bcc,messsage_send, attachement,date_time)Values('$to','$from','$subject','$cc','$bcc','$message','$attachement',NOW())";
        $query_insert = $this->connect_db->query($sql_query);
        if ($query_insert) {
            $_SESSION['Compose'] = "Message Send successfully";
            $_SESSION['compose_code'] = "success";
        } else {
            echo "not inserted";
        }
    }



    public function fetchdata($email)
    {
        $query = "SELECT * from email WHERE from_send='$email' and fromdelete =0 and draft != 1";
        $result = $this->connect_db->query($query);
        return $result;
    }


    public function inbox_data($email)
    {
        $query = "SELECT * from email WHERE to_send ='$email' and todelete=0  AND draft != 1";
        $result = $this->connect_db->query($query);
        return $result;
    }



    public function delete_data($email, $message_id)
    {
        $sql = "UPDATE email SET fromdelete=1 WHERE from_send = '$email' && id = '$message_id'";
        $result = $this->connect_db->query($sql);
        if ($result) {
            $_SESSION['sent_sent_delete'] = " Deleted successfully";
            $_SESSION['sent_delete_code'] = "success";
        } else {
            echo "not deleted";
        }
    }


    public function inbox_delete_data($email, $message_id)
    {

        $not = "UPDATE email SET todelete=1 WHERE (from_send = '$email' or  to_send= '$email') && id = '$message_id'";
        $result = $this->connect_db->query($not);
        if ($result) {
            $_SESSION['inbox_delete'] = " Deleted successfully";
            $_SESSION['inbox_code'] = "success";
        } else {
            echo "not deleted";
        }
    }


    public function draft_delete_data($email, $message_id)
    {
        $sql = "UPDATE email SET fromdelete=1 WHERE from_send = '$email' && id = '$message_id'";
        $result = $this->connect_db->query($sql);
        if ($result) {
            $_SESSION['draft_delete_code'] = " Deleted successfully";
            $_SESSION['draft_code'] = "success";
        } else {
            echo "not deleted";
        }
    }


    public function insert_draft($to, $from, $subject, $cc, $bcc, $message, $attachement)
    {
        $sql_query = "INSERT INTO email(to_send,from_send,subject_line,cc,bcc,messsage_send, attachement,draft,date_time)Values('$to','$from','$subject','$cc','$bcc','$message','$attachement', 1,NOW())";

        $query_insert = $this->connect_db->query($sql_query);
        if ($query_insert) {
            $_SESSION['draft'] = "Message saved in draft successfully";
            $_SESSION['draft_code'] = "success";
        } else {
            echo "not inserted";
        }
    }

    public function draft($email)
    {
        $query = "SELECT * from email WHERE from_send='$email' AND fromdelete=0 AND draft=1";
        $result = $this->connect_db->query($query);
        return $result;
    }

    public function trash($email)
    {
        $sql = "SELECT * FROM email WHERE from_send='$email' AND (todelete=1 OR fromdelete=1) ";
        $result = $this->connect_db->query($sql);
        return $result;
    }



    public function email_alreadyexsist($email)
    {
        $email = $_POST['email'];
        $sql = "SELECT email FROM users WHERE email='$email' ";
        $result = $this->connect_db->query($sql);
        if (mysqli_num_rows($result) > 0) {
            echo json_encode("Email id is already taken");
        } else {
            echo json_encode("Its available");
        }
    }

    public function username_already($username)
    {
        $username = $_POST['username'];
        $sql = "SELECT username FROM users WHERE username='$username'";
        $result = $this->connect_db->query($sql);
        if (mysqli_num_rows($result) > 0) {
            echo json_encode("username id is already taken");
        } else {
            echo json_encode("Its available");
        }
    }

    public function search($search, $email, $data)
    {

        $search = $_POST['search'];
        $sql = "SELECT subject_line,to_send, from_send ,date_time FROM email WHERE (to_send='$email' OR from_send='$email') AND subject_line LIKE '%$search%' ";
        $result = $this->connect_db->query($sql);
        if (mysqli_num_rows($result) > 0) {
            $data = $result->fetch_all(MYSQLI_ASSOC);
            echo json_encode($data);
        } else {
            echo json_encode("NOT Found");
        }
    }


    public function pagination_sent($page, $data, $email)
    {
        $limit_per_page = 10;
        $page = "";
        if (isset($_POST["page_no"])) {
            $page = $_POST["page_no"];
        } else {
            $page = 1;
        }
        $offset = ($page - 1) * $limit_per_page;
        $sql = "SELECT * FROM email WHERE from_send='$email' AND fromdelete=0 AND draft != 1 ORDER BY id DESC  LIMIT $offset,$limit_per_page";
        $result = $this->connect_db->query($sql);
        $output = "";
        if (mysqli_num_rows($result) > 0) {
            // $row = mysqli_fetch_assoc($result);
            $data = $result->fetch_all(MYSQLI_ASSOC);
            $output .= " <table class='table' id='removetable'>
        <tbody>";
            foreach ($data as $key => $val) {
                $output .= "<tr>
            <td><input type='checkbox'class='checkbox' name='message_sent' id='message_sent' value='" . $val['id'] . "'></td>
            <td class='col-4 mesaagedetail' dataid=" . $val['id'] . ">" . $val['to_send'] . "</td>
            <td class='col-4 mesaagedetail' dataid=" . $val['id'] . ">" . $val['subject_line'] . "</td>
            <td class='col-4 mesaagedetail' dataid=" . $val['id'] . ">" . $val['date_time'] . "</td>
            </tr>";
            }
            $output .= " </tbody>
        </table>";
            $sql_total = "SELECT * FROM email WHERE to_send='$email' and todelete = 0";
            $records = $this->connect_db->query($sql_total);;
            $total_record = mysqli_num_rows($records);
            $total_pages = ceil($total_record / $limit_per_page);
            // print_r(($total_record)); die(" nnnn ");
            $output .= '<div id="pagination">';
            for ($i = 1; $i <= $total_pages; $i++) {
                if ($i == $page) {
                    $class_name = "active";
                } else {
                    $class_name = "";
                }
                $output .= "<a class='$class_name' id='$i' href=''>$i|</a>";
            }
            $output .= '</div>';

            echo json_encode(["status" => true, "html" => $output, "type" => "pagination"]);
        } else {
            echo "<h2>No Record Found.</h2>";
        }
    }

    public function pagination_inbox($page, $data, $email)
    {
        $limit_per_page = 10;
        $page = "";
        if (isset($_POST["page_no_inbox"])) {
            $page = $_POST["page_no_inbox"];
        } else {
            $page = 1;
        }
        $offset = ($page - 1) * $limit_per_page;
        $sql = "SELECT * FROM email WHERE to_send='$email' AND todelete=0 AND draft != 1  ORDER BY id DESC LIMIT $offset,$limit_per_page";
        $result = $this->connect_db->query($sql);
        $output = "";
        if (mysqli_num_rows($result) > 0) {
            // $row = mysqli_fetch_assoc($result);
            $data = $result->fetch_all(MYSQLI_ASSOC);
            $output .= " <table class='table' id='removetable'>
        <tbody>";
            foreach ($data as $key => $val) {
                $class = "";
                if ($val['read'] == 1) {
                    $class = "font-weight :normal";
                } else {
                    $class = "font-weight:bold";
                }
                $output .= "<tr style='" . $class . "'   name='inboxdetail'>
            <td  style='z-index:1;'><input type='checkbox'  class='checkbox'  name='message_inbox' id='message_inbox' value='" . $val['id'] . "'></td>
            <td class='col-4 mesaagedetail' dataid=" . $val['id'] . ">" . $val['from_send'] . "</td>
            <td class='col-4 mesaagedetail' dataid=" . $val['id'] . ">" . $val['subject_line'] . "</td>
            <td class='col-4 mesaagedetail'  dataid=" . $val['id'] . ">" . $val['date_time'] . "</td>
            </tr>";
            }
            $output .= " </tbody>
        </table>";
            $sql_total = "SELECT * FROM email WHERE to_send='$email' and todelete = 0";
            $records = $this->connect_db->query($sql_total);;
            $total_record = mysqli_num_rows($records);
            $total_pages = ceil($total_record / $limit_per_page);
            // print_r(($total_record)); die(" nnnn ");
            $output .= '<div id="pagination">';
            for ($i = 1; $i <= $total_pages; $i++) {
                if ($i == $page) {
                    $class_name = "active";
                } else {
                    $class_name = "";
                }
                $output .= "<a class='$class_name' id='$i' href=''>$i|</a>";
            }
            $output .= '</div>';
            echo json_encode(["status" => true, "html" => $output, "type" => "pagination"]);
        } else {
            echo "<h2>No Record Found.</h2>";
        }
    }

    public function pagination_draft($page, $data, $email)
    {
        $limit_per_page = 10;
        $page = "";
        if (isset($_POST["page_no_draft"])) {
            $page = $_POST["page_no_draft"];
        } else {
            $page = 1;
        }
        $offset = ($page - 1) * $limit_per_page;
        $sql = "SELECT * FROM email WHERE from_send='$email'AND fromdelete=0 AND draft=1 ORDER BY id DESC LIMIT $offset,$limit_per_page";
        $result = $this->connect_db->query($sql);
        $output = "";
        if (mysqli_num_rows($result) > 0) {
            // $row = mysqli_fetch_assoc($result);
            $data = $result->fetch_all(MYSQLI_ASSOC);
            $output .= " <table class='table' id='removetable'>
        <tbody>";
            foreach ($data as $key => $val) {
                $output .= "<tr>
            <td><input type='checkbox' class=' vvvv checkbox'  name='message_draft' id='message_draft' value='" . $val['id'] . "'></td>
            <td class='col-4 mesaagedetail' dataid=" . $val['id'] . ">" . $val['to_send'] . "</td>
            <td class='col-4  mesaagedetail' dataid=" . $val['id'] . ">" . $val['subject_line'] . "</td>
            <td class='col-4 mesaagedetail' dataid=" . $val['id'] . ">" . $val['date_time'] . "</td>
            </tr>";
            }
            $output .= " </tbody>
        </table>";
            $sql_total =  $sql_total = "SELECT * FROM email WHERE from_send='$email' and draft = 1";
            $records = $this->connect_db->query($sql_total);;
            $total_record = mysqli_num_rows($records);
            $total_pages = ceil($total_record / $limit_per_page);
            // print_r(($total_record)); die(" nnnn ");
            $output .= '<div id="pagination">';
            for ($i = 1; $i <= $total_pages; $i++) {
                if ($i == $page) {
                    $class_name = "active";
                } else {
                    $class_name = "";
                }
                $output .= "<a class='$class_name' id='$i' href=''>$i|</a>";
            }
            $output .= '</div>';
            echo json_encode(["status" => true, "html" => $output, "type" => "pagination"]);
        } else {
            echo "<h2>No Record Found.</h2>";
        }
    }



    public function pagination_trash($page, $data, $email)
    {
        $limit_per_page = 10;
        $page = "";
        if (isset($_POST["page_no_trash"])) {
            $page = $_POST["page_no_trash"];
        } else {
            $page = 1;
        }
        $offset = ($page - 1) * $limit_per_page;
        $sql = "SELECT * FROM email WHERE  from_send='$email' AND (todelete=1 OR fromdelete=1)  ORDER BY id DESC LIMIT $offset,$limit_per_page";
        $result = $this->connect_db->query($sql);
        $output = "";
        if (mysqli_num_rows($result) > 0) {
            // $row = mysqli_fetch_assoc($result);
            $data = $result->fetch_all(MYSQLI_ASSOC);
            $output .= " <table class='table' id='removetable'>
        <tbody>";
            foreach ($data as $key => $val) {
                $class = "";
                $output .= "<tr style='" . $class . "'   name='inboxdetail'>
            <td  style='z-index:1;'><input type='checkbox'  class='checkbox'  name='message_trash' id='message_trash' value='" . $val['id'] . "'></td>
            <td class='col-4 mesaagedetail' dataid=" . $val['id'] . ">" . $val['to_send'] . "</td>
            <td class='col-4 mesaagedetail' dataid=" . $val['id'] . ">" . $val['subject_line'] . "</td>
            <td class='col-4 mesaagedetail'  dataid=" . $val['id'] . ">" . $val['date_time'] . "</td>
            </tr>";
            }

            $output .= " </tbody>
        </table>";
            $sql_total = "SELECT * FROM email WHERE (from_send='$email' OR to_send='$email') AND (todelete=1 OR fromdelete=1)  ";
            $records = $this->connect_db->query($sql_total);;
            $total_record = mysqli_num_rows($records);
            $total_pages = ceil($total_record / $limit_per_page);
            // print_r(($total_record)); die(" nnnn ");
            $output .= '<div id="pagination">';
            for ($i = 1; $i <= $total_pages; $i++) {
                if ($i == $page) {
                    $class_name = "active";
                } else {
                    $class_name = "";
                }
                $output .= "<a class='$class_name' id='$i' href=''>$i|</a>";
            }
            $output .= '</div>';
            echo json_encode(["status" => true, "html" => $output, "type" => "pagination"]);
        } else {
            echo "<h2>No Record Found.</h2>";
        }
    }


    public function trash_delete_data($email, $message_id)
    {
        $not = "UPDATE email SET todelete=2 ,fromdelete=2,draft=2 WHERE (from_send = '$email' or  to_send= '$email') && id = '$message_id'";
        $result = $this->connect_db->query($not);
        // print_r($result);
        // die("0");
        if ($result) {
            $_SESSION['trash_delete'] = "Message Deleted successfully";
            $_SESSION['trash_code'] = "success";
        } else {
            echo "not deleted";
        }
    }


    public function read($message, $email)
    {
        $sql = "UPDATE email SET `read`=1 WHERE (from_send = '$email' or  to_send= '$email') && id = '$message'";
        $result = $this->connect_db->query($sql);
        if ($result) {
            echo "";
        } else {
            echo  "";
        }
    }




    public function unread_msg($message, $email)
    {
        $sql = "UPDATE email SET `read`=0 WHERE (from_send = '$email' or  to_send= '$email') && id = '$message'";
        $result = $this->connect_db->query($sql);
        if ($result) {
            echo "";
        } else {
            echo  "";
        }
    }

    public function deleteall_inbox($email)
    {
        $sql = "UPDATE email SET todelete=1 WHERE (from_send = '$email' or  to_send= '$email')";
        $result = $this->connect_db->query($sql);
        if ($result) {
            $_SESSION['deleteall_inbox'] = "All Message Deleted  successfully";
            $_SESSION['delete_code'] = "success";
        } else {
            echo "not deleted";
        }
    }


    public function deleteall_sent($email)
    {
        $sql = "UPDATE email SET fromdelete=1 WHERE from_send = '$email'";
        $result = $this->connect_db->query($sql);
        if ($result) {
            $_SESSION['deleteall_sent'] = "All Message Deleted  successfully";
            $_SESSION['delete_sent'] = "success";
        } else {
            echo "not deleted";
        }
    }

    public function deleteall_draft($email)
    {
        $sql = "UPDATE email SET draft=0 WHERE from_send = '$email'";
        $result = $this->connect_db->query($sql);
        if ($result) {
            $_SESSION['deleteall_draft'] = "All Message Deleted  successfully";
            $_SESSION['delete_draft'] = "success";
        } else {
            echo "not deleted";
        }
    }

    public function inbox_detail($message_id)
    {
        $sql = "SELECT to_send , from_send, subject_line,cc,bcc,messsage_send,attachement,date_time FROM email WHERE id='$message_id' ";
        $result = $this->connect_db->query($sql);
        // print_r(($result->fetch_all(MYSQLI_ASSOC))); 
        if (mysqli_num_rows($result) > 0) {
            $data = $result->fetch_all(MYSQLI_ASSOC);
            echo json_encode($data);
        } else {
        }
    }



    public function delete_check($message_id, $email)
    {
        $array_id_users = implode(",", $message_id);
        $sql = "UPDATE email SET fromdelete=1 WHERE (from_send = '$email' or  to_send= '$email') WHERE id IN ($array_id_users)";
        $result = $this->connect_db->query($sql);
        if (mysqli_num_rows($result) > 0) {
            $data = $result->fetch_all(MYSQLI_ASSOC);
            echo json_encode($data);
        } else {
        }
    }


    public function trashall_delete($email)
    {
        $sql = "UPDATE email SET todelete=2 ,fromdelete=2, draft=2  WHERE from_send = '$email'";
        $result = $this->connect_db->query($sql);

        if ($result) {
            $_SESSION['deleteall_trash'] = "All Message Deleted  successfully";
            $_SESSION['delete_trash'] = "success";
        } else {
            echo "not deleted";
        }
    }

    public function trash_restore($email, $message_id)
    {


        $sql = "UPDATE email SET fromdelete=0 WHERE from_send = '$email' AND id='$message_id'";
        $result = $this->connect_db->query($sql);

        if ($result) {
            $_SESSION['restore_trash'] = " Message restored successfully";
            $_SESSION['restoreone_trash'] = "success";
        } else {
            echo "not RESTORED";
        }
    }
}



$obj = new dbconnection();
if (isset($_POST['check_Emailbtn']) && !empty($_POST['check_Emailbtn'])) {
    $obj->email_alreadyexsist($_POST['check_Emailbtn']);
}
if (isset($_POST['check_userbtn']) && !empty($_POST['check_userbtn'])) {
    $obj->username_already($_POST['check_userbtn']);
}
if (isset($_POST['check_search']) && !empty($_POST['check_search'])) {
    $obj->search($_POST['check_search'], $_SESSION['email'], $data);
}

if (isset($_POST['check_page']) && !empty($_POST['check_page'])) {
    $obj->pagination_sent($page, $data, $_SESSION['email']);
}
if (isset($_POST['check_page_inbox']) && !empty($_POST['check_page_inbox'])) {
    $obj->pagination_inbox($page, $data, $_SESSION['email']);
}
if (isset($_POST['check_page_draft']) && !empty($_POST['check_page_draft'])) {
    $obj->pagination_draft($page, $data, $_SESSION['email']);
}

if (isset($_POST['check_detail_inbox']) && !empty($_POST['check_detail_inbox'])) {
    $obj->inbox_detail($_POST['message_id']);
}
if (isset($_POST['delete-check']) && !empty($_POST['delete-check'])) {
    $obj->delete_check($_POST['array_id'], $_SESSION['email']);
}

if (isset($_POST['check_page_trash']) && !empty($_POST['check_page_trash'])) {
    $obj->pagination_trash($page, $data, $_SESSION['email']);
}
