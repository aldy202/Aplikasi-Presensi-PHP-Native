<?php
date_default_timezone_set('asia/jakarta');
session_start();
include('../koneksi.php');
if (isset($_POST['submit'])) {
    $tgl = date('Y-m-d');
    if ($_GET['a'] == 'M') {
        $karyawan = $_SESSION['nama'];
        $idPegawai = $_SESSION['idpegawai'];
        $kondisi = $_POST['kondisi'];
        if (isset($_POST['keterangan'])) {
            $ket = $_POST['keterangan'];
            
        }
        $shift = $_POST['shift'];
        $jobdesk = $_POST['jobdesk'];
        $latitude = $_POST['latitude'];
        $longitude = $_POST['longitude'];
        $a_masuk = date("H:i");

        $query = mysqli_query($con, "INSERT INTO absensi(idpegawai,masuk,latitude_masuk,longitude_masuk,tgl_absen,kondisi,keterangan,shift,jobdesk) VALUES('$idPegawai','$a_masuk','$latitude','$longitude','$tgl','$kondisi','$ket','$shift','$jobdesk')");
        if ($query) {
            echo "<script>alert('Terima Kasih, Data Presensi Masuk anda telah tersimpan');document.location='presensi.php'</script>";
        }
    } else if ($_GET['a'] == 'P') {
        $k = $_SESSION['idpegawai'];
        $jobdesk = $_POST['jobdesk'];
        $latitude = $_POST['latitude'];
        $longitude = $_POST['longitude'];

        $a_pulang = date('H:i');

        // print($over);die;
        $query = mysqli_query($con, "UPDATE absensi SET pulang = '$a_pulang', latitude_pulang = '$latitude', longitude_pulang = '$longitude', jobdesk = '$jobdesk' WHERE idpegawai = '$k' AND tgl_absen = '$tgl'");
        if ($query) {
            header('location: presensi.php');
            echo "<script>alert('Terima Kasih, Data Presensi Keluar anda telah tersimpan');document.location='presensi.php'</script>";
        }
    } else {
        echo "<script>alert('Oppss ada Kesalahan !!!!');document.location='presensi.php'</script>";
    }
} else {
    echo "<script>alert('Oppss ada Kesalahan !!!!');document.location='presensi.php'</script>";
}
