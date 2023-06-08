<?php
session_start();
$errors = [] ;
if($_SERVER['REQUEST_METHOD'] == "POST") {


if(!isset($_GET['id']) or !is_numeric($_POST['id']))
{ 
    $errors [] = " Wrong request "; 
}

$id = $_POST['id'] ;

if(!isset($_SESSION['cart'])){ 

    $_SESSION['cart'] = [] ;
}

$_SESSION['cart'] [] = $id ;
header('location:../ecommerce-dashboard-main/cart.php') ;
die ; 


}