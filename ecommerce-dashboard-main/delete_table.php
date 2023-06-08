<?php include('../inc/header.php') ; ?>
<?php
session_start();
$success = '' ;
include('../databse/connection.php');

$id = $_GET['id'] ;

$sql = "DELETE FROM `users` WHERE `id` ='$id' " ; 
$result = mysqli_query($conn,$sql) ;

if($result) {
    header('location:users.php') ;
    
}
?>

   
<?php include('../inc/footer.php') ; ?>
