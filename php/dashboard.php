<?

include_once "dbconnect.php";
$obj=new dbconnection;
if(isset($_POST['submit'])){
    $email=$_POST['username'];
    $password=$_POST['password'];
    $query="SELECT * FROM users WHERE email='$email' and password='$password'";
    $result=$this->connect_db->query($query);
    $total=mysqli_num_rows($result);
    if($total==1){
        $_SESSION['username']=$email;
        $_SESSION['picture']=$file_name;
        // echo "showed";
    }
    else{
        echo "not showed";
    }

}
