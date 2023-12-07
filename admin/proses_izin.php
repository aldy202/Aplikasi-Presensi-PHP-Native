<?php

require('../koneksi.php');

$id = $_GET['id'];
$s = $_GET['s'];

if ($_GET['s'] == 'N') {
    $query = mysqli_query($con, "UPDATE izin SET status = '$s' WHERE id_izin = '$id'");
    if ($query) {
        header('location: status-izin.php');
    } else {
        echo "<script>alert('gagal);window.location='status-izin.php'</script>";
    }
} else {
    $query = mysqli_query($con, "UPDATE izin SET status = '$s' WHERE id_izin = '$id'");
    if ($query) {

        header('location: status-izin.php');
    } else {
        echo "<script>alert('gagal');window.location='status-izin.php'</script>";
    }
}
?>