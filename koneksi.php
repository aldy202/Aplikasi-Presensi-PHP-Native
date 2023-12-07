<?php 
    $hostname = 'localhost';
    $user = 'root';
    $pass = '';
    $db = 'damansifix';

    $con = mysqli_connect($hostname,$user,$pass,$db);

    if(!$con){
        die("<script>alert('Gagal tersambung dengan database.')</script>");
    }
?>