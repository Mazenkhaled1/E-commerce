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
                    $destination = "img/" . $new_name ;
    
                    move_uploaded_file($f_tmp_name,$destination) ;
                    $success = " your file have been uploaded" ;
    
        }
    }else { 
        $new_name = $old_image ;
    }


$id = $_SESSION['auth']['id'] ;
$sql = "UPDATE `users` SET  `image` = '$new_name' ,`name`='$name',`email`='$email',`password`='$password' WHERE `id` = '$id'" ;
$add = mysqli_query($conn,$sql) ;

if($add) { 
    // $_SESSION['auth'] = [ 'name' =>$row['name'] , 'email' => $row['email'] , 'id' => $row['id'] ] ;
    $_SESSION['auth']['image'] = $new_name ;
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
