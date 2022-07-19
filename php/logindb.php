

<?php
session_start();

class Databases
{
     public $con;
     public $error;
     public function __construct()
     {
          $this->con = mysqli_connect("localhost", "tse", "bPmtHasjyTJ2SgZJ", "manish");
          if (!$this->con) {
               echo 'Database Connection Error ' . mysqli_connect_error($this->con);
          }
          $user = $_POST['username'];
          $psss = $_POST['password'];
          $this->check_login($user, $psss);
     }


     public function check_login($emailusername, $password)
     {
          $password = $password;
          $sql2 = "SELECT * from users WHERE (email='$emailusername' or username='$emailusername') and password='$password'";
          $result = mysqli_query($this->con, $sql2);
          $user_data = mysqli_fetch_array($result);
          $count_row = $result->num_rows;
          if ($count_row > 0) {
               session_start();
               $_SESSION['login'] = true;
               $_SESSION['id'] = $user_data['id'];
               $_SESSION['username'] =  $user_data['username'];
               $_SESSION['picture'] = $user_data['picture'];
               $_SESSION['firstname'] = $user_data['firstname'];
               $_SESSION['lastname'] = $user_data['lastname'];
               $_SESSION['secondemail'] = $user_data['secondemail'];
               $_SESSION['email'] = $user_data['email'];
               
               

               header('location:../manmail/dashboard.php');
               return  true;
          } else {
               
               $_SESSION['login']="Could't find your Mailman Account//please check your Username/Email or password";
               
               return header('location:../manmail/login.php');
               false;
          }
     }
     public function get_session()
     {

          return $_SESSION['login'];
     }

     public function user_logout()
     {

          $_SESSION['login'] = FALSE;

          session_destroy();
     }
}
new Databases();

?>
