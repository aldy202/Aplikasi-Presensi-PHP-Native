<?php

require('../koneksi.php');

$id = $_GET['id'];
$s = $_GET['s'];

if ($_GET['s'] == 'N') {
    $query = mysqli_query($con, "UPDATE cuti SET status = '$s' WHERE id_cuti = '$id'");
    if ($query) {
        header('location: data.php');
    } else {
        echo "<script>alert('gagal);window.location='status-cuti.php'</script>";
    }
} else {
    $query2 = mysqli_query($con, "UPDATE cuti SET status = '$s' WHERE id_cuti = '$id'");
    if ($query2) {
        $y = date("Y");
        $get = mysqli_query($con,"UPDATE cuti SET status = '$s' WHERE id_cuti = '$id'");
        if($get){
            $y = date('Y');
            $get_t = mysqli_query($con, "SELECT idpegawai,lama FROM cuti WHERE id_cuti = '$id'");
            $d = mysqli_fetch_array($get_t);
            $a = $d['idpegawai'];
            $lama = $d['lama'];
            $get_jumlah = mysqli_query($con,"SELECT idpegawai,jumlah,tahun_berlaku FROM jumlah_cuti WHERE idpegawai = '$a' AND tahun_berlaku = '$y'");
            $dat = mysqli_fetch_array($get_jumlah);
            $jumlah = $dat['jumlah'];
            $jumlah -= $lama;
            $up = mysqli_query($con,"UPDATE jumlah_cuti SET jumlah = '$jumlah' WHERE idpegawai = '$a' AND tahun_berlaku = '$y'");
            if($up){
                header('location: status-cuti.php');
            }
            
        }else{
            echo"<script>alert('gagal');window.location='status-cuti.php'</script>";
        }
        
        // if ($get_jumlah) {
        //     $dat = mysqli_fetch_array($get_jumlah);
        //     $nama = $d['nama'];
        //     $jumlah = $dat['jumlah'];
        //     $jumlah -= $lama;
        //     $up = mysqli_query($con, "UPDATE jumlah_cuti SET jumlah = '$jumlah' WHERE nama = '$a'");
        //     if ($up) {
        //         header('location: data.php');
        //     }
        // } else {
        //     echo "<script>alert('gagal mencari jumlah');window.location='data.php'</script>";
        // }
    } else {
        echo "<script>alert('gagal');window.location='status-cuti.php'</script>";
    }
}
