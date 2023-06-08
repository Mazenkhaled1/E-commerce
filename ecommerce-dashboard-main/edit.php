<?php include('../inc/header.php');?>
<?php session_start(); ?>
<?php
$success = '' ; 
// validate on id 

if(!isset($_GET['id']) or !is_numeric($_GET['id']))
{ 
    header("Location:../index.php");
}


$id = $_GET['id'] ; // get['id'] da feh el value bta3t el id el mawgod fe el db bta3ty 
$sql = "SELECT * FROM `products` WHERE `id` = '$id' " ;
$result = mysqli_query($conn,$sql) ;
if($result) { 
$row = mysqli_fetch_assoc($result) ;
}

?>

<?php
if(isset($_SESSION['errors'])) :
    foreach($_SESSION['errors'] as $error) :    

?>
<div class="alert alert-danger"><?php echo $error; ?></div>
<?php 
endforeach;
unset($_SESSION['errors']);
endif; 

?>
<form action = 'update.php'  method ='POST' class = "border p-3  " enctype ='multipart/form-data'>


<div class="form-group p-2 my-1">
   <label for ='image'>Image</label>
   <input type="file" name="image" class="form-control" id = 'image' >
   <input type="hidden"  value ='<?= $row['image']?>' name ='old_image'>

</div>



<div class="form-group p-2 my-1">
    <label for="title">title</label>
    <input type="text" name = 'title' value ='<?= $row['title'] ?>'  class = 'form-control' id = 'title'>
</div>


<div class="form-group p-2 my-1">
    <label for="price">price</label>
    <input type="price" name = 'price' value= '<?= $row['price']?>' class = 'form-control' id = 'price'>
</div>
<input type="hidden" name="id" value= '<?= $row['id']?>'>
<button type="submit" class="btn btn-primary" style ='margin-top:10px;'>Update</button>
</form> 
</div>


<?php include('../inc/footer.php') ;?>
