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
    echo "Please Write An Valied E-mail" ;
    die ;
}


    //password
if($conf_password != $password)
{
    $errors [] = " Incorrect Password" ;
}elseif(emp($password))
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
    if(!emp($_FILES['image']['name'])){

   

        $file = $_FILES['image'] ; 
    
        // all the keys 
        $f_name = $file['name'] ; 
        $f_type = $file['type'] ; 
        $f_tmp_name = $file['tmp_name'] ; 
        $f_error = $file['error'] ; 
        $f_size = $file['size'] ; 
    
        
        
        if( $f_name != "") 
        {
           $ext = pathinfo($f_name) ; // info 3n kol el info bta3t el sora
    
            $original_name = $ext['filename'] ;
            $original_ext =  $ext ['extension'];
    
        //    echo "<pre>" ;
        //    print_r($ext) ; 
        //    echo "</pre>" ; 
        //    die ;
    
        $allowed = array("pdf" , "jpg" , "gif" , "jpeg");
                    // create new  name also uniuqe and upload it in server
                    $new_name = uniqid('' , true) . "." . $original_ext ;
                    $destination = "../ecommerce-dashboard-main/img/" . $new_name ;
    
                    move_uploaded_file($f_tmp_name,$destination) ;
                    $success = " your file have been uploaded" ;
    
        }
    }

$sql = " INSERT INTO `users` (`image`,`name` ,`email` , `password`, `conf_password`) 
VALUES ('$new_name','$name' , '$email' , '$password' , '$conf_password')" ;

$add = mysqli_query($conn,$sql) ;

if($add) { 
    // $_SESSION['auth'] = [ 'name' =>$row['name'] , 'email' => $row['email'] , 'id' => $row['id'] ] ;
    header("location:../authintication/login.php");
    die;
    
}


}else
{
    $_SESSION['errors'] = $errors ;
    header('location:../authintication/register.php');
}






}








?>
