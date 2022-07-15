<?php

//singleton 

// class singleton{


// private  static $instance;

// private function __construct(){

// echo "Db connected";
// }


// public static function getinstance(){
//     if(self::$instance==null){
//         self::$instance=new singleton;
//         return $instance;
//     }
// }

// }


// $obj = singleton::getinstance();
















class validator{


    private static $email;
    private static $required;
    private static $numeric;
    


    private function __construct($e){
        $this->email=$e;
      echo $this->email;
    
    
    }

//email
    public static function  email1(){

        
        self::$email=new validator("manishkumarsingh@com");
       
        if(self::$email==!preg_match("/^[a-zA-Z-' ]*$/"));
        return self::$email;
            
        }
        
//            elseif(empty($em)){
            
//             echo "Email is empty";
//         }

//         elseif(preg_match("/^[a-zA-Z-' ]*$/" ,$em)){
//             echo "email has been corrected";
//         }

//         elseif(strlen($em)<20){
//             echo "length is correct";
//         }

//     }

// //required
//     public function required1($required){
//         if(empty($required)){
//             echo "form is not filled";
//         }
//             else{
//                 echo "form is filled";
//             }
//         }
    

// //numeric

//     public  function numeric1($numeric){

// if (preg_match('/[^0-9]/',$numeric )){

// echo "it is not numeric";

// }
// else{
//     echo  "it is numeric";
// }




//     }




 }

$one = validator::email1();



?>














