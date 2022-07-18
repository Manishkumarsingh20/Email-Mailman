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

    public function update($firstname, $lastname, $secondemail, $picture)
    {
        $id = $_GET['updateid'];
        $update = "UPDATE users SET firstname='$firstname',lastname='$lastname', secondemail='$secondemail', picture='$picture' WHERE id='$id'";

        $result = mysqli_query($this->connect_db,  $update);
        if ($result) {
            $_SESSION['firstname'] = $firstname;
            $_SESSION['lastname'] = $lastname;
            $_SESSION['secondemail'] = $secondemail;
            $_SESSION['picture'] = $picture;
            

            $_SESSION['update']="Profile Uploaded Successful";
            $_SESSION['update_code']="success";
        } else {
            return " not updated";
        }
    }

    public function old_password_match($oldpassword, $confirm_passowrd_entery, $newconfirmpassword)
    {
        $id = $_GET['changeoldpasswordid'];
        $oldpassword=$oldpassword;
        $query = "SELECT password ,cofirmpassword,picture FROM users WHERE id='$id' AND password='$oldpassword'";
        $mysqli_query = $this->connect_db->query($query);
        $fetch_data = $mysqli_query->fetch_assoc();
        if ($oldpassword == $confirm_passowrd_entery) {
            $changeQuery = $this->connect_db->query("UPDATE users SET password ='$newconfirmpassword', cofirmpassword='$newconfirmpassword' WHERE id = '$id'");

            if ($changeQuery) {
                
                $_SESSION['password']="Password Change Successfully";
            $_SESSION['password_code']="success";
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
            $_SESSION['delete']="Profile photo deleted successfully";
            $_SESSION['delete_code']="success";
            $_SESSION['picture'] = $picture;

        } else
            echo "not deleted";
    }


    public function insert_compose($to, $from, $subject, $cc, $bcc, $message, $attachement)
    {


        $sql_query = "INSERT INTO email(to_send,from_send,subject_line,cc,bcc,messsage_send, attachement,date_time)Values('$to','$from','$subject','$cc','$bcc','$message','$attachement',NOW())";

        $query_insert = $this->connect_db->query($sql_query);
        if ($query_insert) {
            $_SESSION['Compose']="Message Send successfully";
            $_SESSION['compose_code']="success";
        } else {
            echo "not inserted";
        }
    }

    public function fetchdata($email)
    {
        $query = "SELECT * from email WHERE from_send='$email' and fromdelete =0";
        $result = $this->connect_db->query($query);
        return $result;
    }

    public function inbox_data($email){
        $query = "SELECT * from email WHERE to_send ='$email' and todelete=0";
        $result = $this->connect_db->query($query);
        
        return $result;
        
    }


    public function delete_data($email,$message_id){
        foreach($message_id as $deleteid){
            $sql="UPDATE email SET fromdelete=1 WHERE from_send = '$email' && id = '$deleteid'";
            $result = $this->connect_db->query($sql);
        }
        if($result){
            echo '<script language="javascript">';
            echo 'alert("Deleted successfully")';
            echo '</script>';
        }else{
            echo "not deleted";
        }

}




         public function inbox_delete_data($email,$message_id){
          foreach($message_id as $deleteid){
           $sql="UPDATE email SET todelete=1 WHERE to_send = '$email' AND id = '$deleteid'";
          $result = $this->connect_db->query($sql);
       }
       if($result){
        echo '<script language="javascript">';
        echo 'alert("Deleted successfully")';
        echo '</script>';
    }else{
        echo "not deleted";
    }

}


public function insert_draft($to, $from, $subject, $cc, $bcc, $message, $attachement)
{


    $sql_query = "INSERT INTO email(to_send,from_send,subject_line,cc,bcc,messsage_send, attachement,draft,date_time)Values('$to','$from','$subject','$cc','$bcc','$message','$attachement', 1,NOW())";

    $query_insert = $this->connect_db->query($sql_query);
    if ($query_insert) {
        $_SESSION['draft']="Message saved in draft successfully";
        $_SESSION['draft_code']="success";
    } else {
        echo "not inserted";
    }
}

public function draft($email)
{
    $query = "SELECT * from email WHERE from_send='$email' AND draft =1";
    $result = $this->connect_db->query($query);
    return $result;
}

public function trash($email){

$sql="SELECT * FROM email WHERE to_send='$email' AND fromdelete=1";
$result=$this->connect_db->query($sql);

return $result;
}



public function email_alreadyexsist($email){
    $email=$_POST['email'];
    $sql="SELECT email FROM users WHERE email='$email' ";
    $result=$this->connect_db->query($sql);
    if(mysqli_num_rows($result)>0){
        echo json_encode("Email id is already taken");
    }else{
        echo json_encode("Its available");
    }
}

public function username_already($username){
    $username=$_POST['username'];
    $sql="SELECT username FROM users WHERE username='$username'";
    $result=$this->connect_db->query($sql);
    if(mysqli_num_rows($result)>0){
        echo json_encode("username id is already taken");
    }else{
        echo json_encode("Its available");
    }
}




}


$obj = new dbconnection();
if(isset($_POST['check_Emailbtn']) && !empty($_POST['check_Emailbtn'])){
    $obj->email_alreadyexsist($_POST['check_Emailbtn']);
}
if(isset($_POST['check_userbtn']) && !empty($_POST['check_userbtn'])){
    $obj->username_already($_POST['check_userbtn']);
}


