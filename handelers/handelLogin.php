<?php
session_start() ;
include '../core/validation.php';
include('../databse/connection.php') ;

$errors = [] ;
if($_SERVER['REQUEST_METHOD'] =='POST') { 

     

        //sanitization
foreach($_POST as $key => $value ) :
    $$key = sanitiz($value) ;
endforeach;


    // validations 

    // email 
if(emp($email))
{
        $errors [] ="Please Enter Your E-mail ";
}elseif(!emailVal($email))
{
     $errors [] = "Please Write An Valied E-mail" ;
}




    // password
if(emp($password))
{
    $errors [] = "Please Enter Your password ";
}elseif(MinVal($password,4))
{ 
    $errors [] = "Password Must Be Greater Than 4 Chars";
}elseif(MaxVal($password,35))
{
    $errors [] = "Password Must Be Smaller Than 35 Chars";
}

// print_r($errors) ;
// echo $email ;
// echo $password ;
// echo emp($errors) ;
// die ; 
if(emp($errors))
{
    
    // $admin = `admin` ;
    $sql = " SELECT * FROM `admin` ";
    $get_data_from_admin = mysqli_query($conn,$sql);
        while($row = mysqli_fetch_assoc($get_data_from_admin)){

            // echo $row['password'] ."<br>" ;
            // echo $row['email'] ."<br>" ;
            if($row['email'] == $email && $row['password'] == $password){

                $_SESSION['auth'] = $row  ;
                $_SESSION['auth']['permision'] = 'admin';
                header("location:../index.php");
                die; 
            }
        }

    if(!isset($_SESSION['auth'])){ 

        $sql = " SELECT * FROM `users` " ;
        $get_data_from_user = mysqli_query($conn,$sql) ;
        while($row = mysqli_fetch_assoc($get_data_from_user)){

            // echo $row['password'] ."<br>" ;
            // echo $row['email'] ."<br>" ;
            if($row['email'] == $email && $row['password'] == $password ){

                $_SESSION['auth'] = $row  ;
                $_SESSION['auth']['permision'] = 'user' ;
                header("location:../index.php");
                die ;
            }
        }
    }

    
        $errors [] = "Wrong Data " ;
        $_SESSION['errors'] = $errors ;
        header('location:../authintication/login.php');
        die;
        

 
}else
{
    $_SESSION['errors'] = $errors ;
    header('location:../authintication/login.php');
    die; 
}



}






?>
             
                