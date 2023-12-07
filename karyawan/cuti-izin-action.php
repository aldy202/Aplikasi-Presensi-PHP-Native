<?php
date_default_timezone_set('asia/jakarta');
session_start();
include('../koneksi.php');

if (isset($_POST['submit'])) {
    $sts = 'P';
    $tgl = date('Y-m-d');
    if ($_GET['a'] == "C") {
        $idPegawai = $_SESSION['idpegawai'];
        $tgl1 = $_POST['mulai'];
        $tgl2 = $_POST['selesai'];
        $alasan = $_POST['alasan'];
        $ket = $_POST['keterangan'];

        $dari = new DateTime($tgl1);
        $sampai = new DateTime($tgl2);
        $d = $sampai->diff($dari)->days + 1;
        $cek = mysqli_query($con, "SELECT jumlah FROM jumlah_cuti WHERE idpegawai = '$idPegawai' AND tahun_berlaku = NOW()");
        $dcek = mysqli_fetch_array($cek);
        if ($d > $dcek['jumlah']) {
            echo "<script>alert('Sisa cuti tidak cukup');window.history.back()</script>";
        } else {
            $query = mysqli_query($con, "INSERT INTO cuti(timestamp,idpegawai,dari,sampai,lama,alasan,keterangan,status) VALUES('$tgl','$idPegawai','$tgl1','$tgl2','$d','$alasan','$ket','$sts')");
            if ($query) {
                echo "<script>alert('Terima Kasih, Cuti anda sedang di Proses');document.location='status-cuti-izin-karyawan.php'</script>";
            } else {
                echo "<script>alert('Gagal Proses Cuti');document.location='cuti.php'</script>";
            }
        }
    } else if ($_GET['a'] == "I") {
        $idPegawai2 = $_SESSION['idpegawai'];
        $keterangan = $_POST['keterangan'];
        $jMulai = $_POST['jMulai'];
        $jSelsai = $_POST['jSelesai'];
        $tMulai = $_POST['tMulai'];
        $tSelesai = $_POST['tSelesai'];
        $alasan = $_POST['alasan'];

        $sql = mysqli_query($con, "INSERT INTO izin(timestamp,idpegawai,mulai,selesai,tgl_mulai,tgl_selesai,alasan,keterangan,status) VALUES('$tgl','$idPegawai2','$jMulai','$jSelsai','$tMulai','$tSelesai','$alasan','$keterangan','$sts')");
        if ($sql) {
            echo "<script>alert('Terima Kasih, Izin anda sedang di Proses');document.location='status-cuti-izin-karyawan.php'</script>";
        } else {
            echo "<script>alert('Gagal Proses Izin');document.location='izin.php'</script>";
        }
    }
}
