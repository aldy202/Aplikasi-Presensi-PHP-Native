<?php
include 'koneksi.php';
// edit data aplikasi karyawan
if (isset($_POST['editDataApp'])) {

    $idApp = $_POST['idApp'];
    $idpeg = $_POST['idpeg'];
    $nameApp = $_POST['appName'];
    $username = $_POST['username'];
    $lastPass = $_POST['lastPass'];

    $q2 = mysqli_query($con, "SELECT * FROM aplikasi WHERE nama_aplikasi = '$nameApp'");
    while ($row = mysqli_fetch_array($q2)) {
        $dueData = date("Y-m-d", strtotime("+" . $row['masa_aktif'] . " days", strtotime($lastPass)));
        $exp = $row['masa_aktif'];
        $url = $row['alamat_aplikasi'];

        $queryUpdate = mysqli_query($con, "UPDATE app SET nama_aplikasi = '$nameApp',
                                                        username = '$username',
                                                        curend_pass = '$lastPass',
                                                        due_pass = '$dueData',
                                                        url = '$url' WHERE id = '$idApp'");

        if ($queryUpdate) {
            echo "<script>alert('Data Anda Berhasil Di Update');document.location='./admin/data-pegawai.php?id=$idpeg'</script>";
        } else {
            echo "<script>alert('Data Anda Gagal Di Update');document.location='./admin/data-pegawai.php?id=$idpeg'</script>";
        }
    }
}
// end edit data aplikasi karyawan

// start tambah data aplikasi karyawan
else if (isset($_POST['createApp'])) {

    $idpegawai = $_POST['idpeg'];
    $nameApp = $_POST['appName'];
    $username = $_POST['username'];
    $lastPass = $_POST['lastPass']; // Tanggal

    $q2 = mysqli_query($con, "SELECT * FROM aplikasi WHERE nama_aplikasi = '$nameApp'");
    while ($row = mysqli_fetch_array($q2)) {
        $dueData = date("Y-m-d", strtotime("+" . $row['masa_aktif'] . " days", strtotime($lastPass)));
        $exp = $row['masa_aktif'];
        $url = $row['alamat_aplikasi'];
        $queryCreate = mysqli_query($con, "INSERT INTO app (idpegawai,nama_aplikasi,username,curend_pass,due_pass,expired,url) VALUES ('$idpegawai','$nameApp','$username','$lastPass','$dueData','$exp','$url')");

        if ($queryCreate) {
            echo "<script>alert('Data Anda Berhasil Di Simpan');document.location='./admin/data-pegawai.php?id=$idpegawai'</script>";
        } else {
            echo "<script>alert('Data Anda Gagal Disimpan');document.location='./admin/data-pegawai.php?id=$idpegawai'</script>";
        }
    }
}
// end tambah data aplikasi karyawan

// start tambah data aplikasi karyawan untuk leader 
else if (isset($_POST['createAppld'])) {

    $idpegawai = $_POST['idpeg'];
    $nameApp = $_POST['appName'];
    $username = $_POST['username'];
    $lastPass = $_POST['lastPass']; // Tanggal

    $q2 = mysqli_query($con, "SELECT * FROM aplikasi WHERE nama_aplikasi = '$nameApp'");
    while ($row = mysqli_fetch_array($q2)) {
        $dueData = date("Y-m-d", strtotime("+" . $row['masa_aktif'] . " days", strtotime($lastPass)));
        $exp = $row['masa_aktif'];
        $url = $row['alamat_aplikasi'];
        $queryCreate = mysqli_query($con, "INSERT INTO app (idpegawai,nama_aplikasi,username,curend_pass,due_pass,expired,url) VALUES ('$idpegawai','$nameApp','$username','$lastPass','$dueData','$exp','$url')");

        if ($queryCreate) {
            echo "<script>alert('Data Anda Berhasil Di Simpan');document.location='./karyawan/data-aplikasi-karyawan.php?id=$idpegawai'</script>";
        } else {
            echo "<script>alert('Data Anda Gagal Disimpan');document.location='./karyawan/data-aplikasi-karyawan.php?id=$idpegawai'</script>";
        }
    }
}
// end tambah data aplikasi karyawan untuk leader


// Start Hapus Data Aplikasi Karyawan
// Delete App
else if (isset($_POST['hapusdataapp'])) {

    $id = $_POST['idApp'];
    $idpegawai = $_POST['idpeg'];

    $queryDelete = mysqli_query($con, "DELETE FROM app WHERE id = '$id'");

    if ($queryDelete) {
        echo "<script>alert('Data Anda Berhasil Dihapus');document.location='./admin/data-pegawai.php?id=$idpegawai'</script>";
    } else {
        echo "<script>alert('Data Anda Gagal Dihapus');document.location='./admin/data-pegawai.php?id=$idpegawai'</script>";
    }
}