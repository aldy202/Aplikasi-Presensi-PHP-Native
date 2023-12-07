<?php
include 'koneksi.php';
if (isset($_POST['login'])) {
    session_start();
    $user_nm = $_POST['nama'];
    $password = $_POST['password'];
    $select = mysqli_query($con, "SELECT * FROM user WHERE username = '$user_nm' AND password = '$password' ");

    if ($select->num_rows > 0) {
        $row = mysqli_fetch_assoc($select);
        $_SESSION['nama'] = $row['nama'];
        $_SESSION['username'] = $row['username'];
        $_SESSION['bagian'] = $row['bagian'];
        $_SESSION['idpegawai'] = $row['idpegawai'];
        $nama = $row['nama'];
        if($row['bagian'] == "Admin" && $row['username'] == $user_nm && $row['password'] == $password){
            echo "<script>alert('Selamat Datang, $nama');document.location='./admin/admin-index.php'</script>";
        }else if($row['bagian'] == "Karyawan" ){
            echo "<script>alert('Login Berhasil, Selamat Datang $nama');document.location='./karyawan/karyawan-index.php'</script>";
        }else if($row['bagian'] == "Leader"){
            echo "<script>alert('Login Berhasil, Selamat Datang $nama');document.location='./karyawan/karyawan-index.php'</script>";
        }
        else{
            echo "<script>alert('Username atau password Anda salah. Silahkan coba lagi!');document.location = 'login.php';</script>";
        }
    } else {
        echo "<script>alert('Username atau password Anda salah. Silahkan coba lagi!');document.location = 'login.php';</script>";
    }
}
?>