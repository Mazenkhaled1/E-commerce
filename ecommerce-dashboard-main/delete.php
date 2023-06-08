<?php include('../inc/header.php');?>
<?php
include('../databse/connection.php') ;
$success = '' ;
$id = $_GET['id'] ;

$sql = "DELETE FROM `products` WHERE `id` = '$id' " ;
$result = mysqli_query($conn,$sql) ;

if($result) { 
    $success = "Deleted Successuflly" ;
    $_SESSION['succ'] = $success ; 
    header('refresh:1;url=../index.php');
}
?>
<?php if(isset($_SESSION['succ'])) : ?>
<div class="alert alert-success "> <?php echo $success; ?></div>
<?php endif ; ?>
<?php include('../inc/footer.php') ;?>
