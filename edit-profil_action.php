<?php
include 'koneksi.php';



if (isset($_POST['editps'])) {
    session_start();
    $newpass = $_POST['newpassword'];
    $confirmpass = $_POST['confirmpassword'];

    if ($newpass != $confirmpass) {
        echo "<script>alert('Password harus sama dengan confirm Password');document.location='profil.php'</script>";
    } else {
        $q = mysqli_query($con, "UPDATE user SET
        password = '$newpass'
        WHERE idpegawai = '$_SESSION[idpegawai]'");

        if ($q) {
            echo "<script>alert('Password Anda Berhasil di ganti, silahkan login kembali');document.location='karyawan/logout.php'</script>";
            session_destroy();
        } else {
            echo "<script>alert('Password harus sama dengan confirm Password 23');document.location='profil.php'</script>";
        }
    }
} else if (isset($_POST['editnama'])) {
    session_start();
    $usernm = $_POST['namalp'];

    $query = mysqli_query($con, "UPDATE user SET nama = '$usernm' WHERE idpegawai = '$_SESSION[idpegawai]'");
    if ($query) {
        echo "<script>alert('Nama Lengkap Anda Berhasil di ganti, silahkan login kembali');document.location='karyawan/logout.php'</script>";
        session_destroy();
    }
} else if (isset($_POST['edituser'])) {
    session_start();
    $usernm = $_POST['username'];

    $query = mysqli_query($con, "UPDATE user SET username = '$usernm' WHERE idpegawai = '$_SESSION[idpegawai]'");
    if ($query) {
        echo "<script>alert('Username Anda Berhasil di ganti, silahkan login kembali');document.location='karyawan/logout.php'</script>";
        session_destroy();
    }
}
// Create App
else if (isset($_POST['createData'])) {

    $idpegawai = $_POST['idpegawai'];
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
            echo "<script>alert('Data Anda Berhasil Disimpan');document.location='profil.php'</script>";
        } else {
            echo "<script>alert('Data Anda Gagal Disimpan');document.location='profil.php'</script>";
        }
    }
}

// Edit App
else if (isset($_POST['editData'])) {

    $idApp = $_POST['idApp'];
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
            echo "<script>alert('Data Anda Berhasil Di Update');document.location='profil.php'</script>";
        } else {
            echo "<script>alert('Data Anda Gagal Di Update');document.location='profil.php'</script>";
        }
    }
}

// Delete App
else if (isset($_POST['hapusData'])) {

    $id = $_POST['idApp'];

    $queryDelete = mysqli_query($con, "DELETE FROM app WHERE id = '$id'");

    if ($queryDelete) {
        echo "<script>alert('Data Anda Berhasil Dihapus');document.location='profil.php'</script>";
    } else {
        echo "<script>alert('Data Anda Gagal Dihapus');document.location='profil.php'</script>";
    }
}