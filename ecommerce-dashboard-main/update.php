<?php include('../core/validation.php');?>
<?php include('../databse/connection.php') ;?>

<h1 class="text-center col-12 ">Update  User</h1>
<?php
session_start() ; 
$errors = [] ;


if($_SERVER['REQUEST_METHOD'] == 'POST'){ 
    // echo "<pre>" ;
    // print_r($_FILES) ;

foreach($_POST as $key => $value) :
    $$key = sanitiz($value) ;
endforeach ;

if(emp($id) or !is_numeric($id)) { 
    $errors [] = " Invalid Id " ;
}

if(emp($title) or !is_string($title)){ 
    $errors [] = " Invalid Title";
}

if(emp($price) or !is_numeric($price)){
    $errors [] = ' Invalid Price ' ;
}




if(emp($errors)){

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

$sql = " UPDATE `products` SET `image`='$new_name',`title`='$title',`price`='$price' WHERE `id` = '$id' " ;
mysqli_query($conn,$sql) ;
header('location:../index.php') ;
die ; 

    
}else{
    $_SESSION['errors'] = $errors ;
    header("location:edit.php?id=$id");
    die; 
}

   

}

?>


