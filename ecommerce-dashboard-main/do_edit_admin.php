<?php
session_start() ;
include '../core/validation.php';
include('../databse/connection.php') ;
$errors = [] ;
$success = '' ;
 
if($_SERVER['REQUEST_METHOD'] == 'POST'){

    //sanitization
foreach($_POST as $key => $value ) :
    
        $$key =sanitiz($value) ;
endforeach;

    //validations

        // name 
if(emp($name))
{ 
    $errors [] = "Please Enter Your Name ";  
}elseif(MinVal($name,3))
{
    $errors[] = "Name Must Be Greater Than 3 Chars" ;
    
}elseif(MaxVal($name,20))
{
    $errors [] ="Name Must Be Smaller Than 20 Chars ";
}

    // email 
if(emp($email))
{
    $errors [] ="Please Enter Your E-mail ";
}elseif(!emailVal($email))
{
    $errors [] = "Please Write An Valied E-mail" ;
    
}


    //password


 
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


    // errors 

if(empty($errors))
{
$id = $_SESSION['auth']['id'] ;
$sql = "UPDATE `admin` SET`name`='$name',`email`='$email',`password`='$password' WHERE `id` = '$id'" ;
$add = mysqli_query($conn,$sql) ;

if($add) { 
    // $_SESSION['auth'] = [ 'name' =>$row['name'] , 'email' => $row['email'] , 'id' => $row['id'] ] ;
    $_SESSION['auth']['name'] = $name ;
    $_SESSION['auth']['email'] = $email ;
    header("location:profile.php");
    die;
    
}


}else
{
    $_SESSION['errors'] = $errors ;
    header('location:edit_admin.php');
}






}








?>
