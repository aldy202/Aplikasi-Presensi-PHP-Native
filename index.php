<?php 
include 'koneksi.php';
error_reporting(0);

session_start();
if(isset($_SESSION['nama'])){
    header("Location: login.php");
}else{
    header("Location: login.php");
}
?>
