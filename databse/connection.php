<?php

$local = 'localhost' ; 
$root = 'root' ;
$password= '' ;
$dbName='e-commerce';

$conn = mysqli_connect($local,$root,$password,$dbName) ;
if(!$conn) { 
    echo " Faild To Connect" . mysqli_connect_error() ;
    exit () ; 
}

