<?php

//  Class calcu{

//     public $a , $b , $c;
//     public function sum(){
//         $this->c=$this->a+$this->b;
//         return $this->c;
//     }


// }

// $obj1 = new calcu();
// $obj1->a=10;
// $obj1->b=20;

// echo $obj1->sum();




// class manish{

// public function ravi(){

// echo "manish";

// }

// public function price (){
//     echo "Rs 199";
// }


// }


// $ob1=new manish();


// echo $ob1->ravi();

// echo $ob1->price();




// class person{

// public $name ;

// public function show(){

// echo "my name is " . $this->name;

// }}

// $c1=new person();
// $c1->name=manish;
// echo $c1->show();




// Class con{

//     public $name , $age;


//     public function __construct($a , $b){

//         $this->name=$a;
//         $this->age=$b;

//     }

// public function show(){

//     // $this->name;
//     // $this->age;
//    return $this->name . $this->age;

// }

// }

// $c1=new con("manish", 20);
// echo $c1->show();





// class fruit{

// public $name;
// public $color;

//  public function man($n , $c){

//     $this->name=$n;
//     $this->color=$c;

// }

// public function man1(){
//     return $this->name . $this->color;
// }


// }


// $c1=new fruit();
// echo $c1->man1="apple"." " ."red";




// class employ{

// public $name;
// public $age;
// public $salary;
// public $total;

// public function __construct($n , $a , $s ,$t){

//     $this->name=$n;
//     $this->age=$a;
//     $this->salary=$s;
//     $this->total=$t;

// }

// function show(){

//     echo "Emp name : - ". $this->name;
//     echo "Emp age :-". $this->age;
//     echo "Emp salary : -". $this->salary;
//     echo "Emp total" . $this->total;

// }

// }


// Class Manager extends employ{
//     public $ta = 1000;
//     public $ma =2000;
   
//     function show(){
//         $this->total = $this->ta + $this->ma;


//         echo "Emp name : - ". $this->name;
//         echo "Emp age :-". $this->age;
//         echo "Emp salary : -". $this->salary;
//         echo "Emp total" . $this->total;
    
//     } 

// }

// $ob1= new manager("manish " , "20" , "2000" ,$ob1->$total);
// $ob2 = new employ("ravi " ,"12" , "2000" , $total) ;
// $ob1->show();
// $ob2->show();

// ABSTRACT CLASS


// abstract class A {

//     public $a;
//     public $b;
//     public $c;

// abstract  protected function  show($a, $b);


// }

// class B extends  A {
// public function show($e , $b){

//     $this->c=$e+$b;
//     echo $this->c;

// }



// }

// $obj=new B(2 , 3);
// $obj->show(20, 30);


// INTERFACE 


interface person1{

    function show1($a , $b);
    
}

interface person2{

function show2($a , $b);

}

class person implements person1 , person2{

public function show1($a , $b){

    echo $a+$b;
}
public function show2($a, $b){

    echo $a-$b;
}

}

$obj=new  person();
$obj->show1(30 , 40);
echo "<br>";
$obj->show2(200 , 20);












?>
