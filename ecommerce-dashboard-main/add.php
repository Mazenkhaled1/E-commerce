<?php
session_start();
include('../core/validation.php');
$errors = [] ;
$success = '' ;
if($_SERVER["REQUEST_METHOD"] == 'POST')  {

    // all the keys 
 
foreach($_POST as $key => $value) :

        // sanitize
    $$key = sanitiz($value);
endforeach ;



// validation

if(emp($title)){
    $errors [] = "Please Add Title" ;
}

if(emp($price)){ 
    $errors [] = "Please Add Price" ;
}










    // error 

if(emp($errors)) { 

    include('../databse/connection.php') ;
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
                



$sql= "INSERT INTO `products`(`image`, `title`, `price`, `category_id`)
    VALUES ('$new_name' , '$title' , '$price' ,'$id')" ;
$add = mysqli_query($conn,$sql) ;

if($add) { 
    $success = " Product Added Successfully";
    $_SESSION['success'] = $success ;
    header('location:../index.php');
    die ; 

}


}else { 

    $_SESSION['errors'] = $errors ;
}








} 




}




?>







<?php include('../inc/header.php');?>

<input type="checkbox" id="mobile-menu" />

<div class="sidebar">
  <div class="logo">
  <i class="fa-solid fa-dumbbell"></i>
  </div>
  <div class="menu">
    <ul>
      <li><i class="fa fa-home"><a href="../index.php" style="color: white;" ></i> Home</li></a>
      <li><a href="signOut.php"  style="color: white;"><i class="fa fa-sign-out-alt"></i> Sign Out</li></a>
    </ul>
  </div>
</div>

<label for="mobile-menu" id="mmenu">
  <i class="fa fa-bars"></i>
  <i class="fa fa-times"></i>
</label>

<div class="content">
  <div class="top">
  </div>

  <div class="all-products">
    <div class="title">
      <h2>Add Product</h2>
    </div>



        <div class="container">

        <?php  if(isset($_SESSION['errors'])): 
            
                foreach($_SESSION['errors'] as $error) :    
        ?>

                    <div class="alert alert-danger"><?php echo $error ; ?></div>


        <?php 
            endforeach ;
            unset($_SESSION['errors']) ;
            endif ;
            ?>

            <?php if(isset($_SESSION['success']) ): ?> 
                <div class="alert laert-info"><?php echo $_SESSION['success']  ; ?></div>
             <?php
            unset($_SESSION['success'] ) ;
            endif; 
            ?>
    <form action = '<?php $_SERVER['PHP_SELF'] ; ?>'  method ='POST' class = "border p-3  " enctype ='multipart/form-data'>


             <div class="form-group p-2 my-1">
			    <label for ='image'>Image</label>
			    <input type="file" name="image"  class="form-control" id = 'image'  >
		    </div>
          


        <div class="form-group p-2 my-1">
                 <label for="title">title</label>
                 <input type="text" name = 'title' class = 'form-control' id = 'title'>
        </div>


        <div class="form-group p-2 my-1">
                 <label for="price">price</label>
                 <input type="price" name = 'price' class = 'form-control' id = 'price'>
        </div>

        <select class="form-select form-select-sm p-1" name = 'id'>
            <option selected class = 'text-center'>Select Category</option>
            <option value="1">Supplments</option>
            <option value="2">Vitamins</option>
            <option value="3">Equepments</option>
        </select>
       
        <button type="submit" class="btn btn-primary" style ='margin-top:10px;'>Add</button>
</form> 
</div>



<?php include('../inc/footer.php') ;?>