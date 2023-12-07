<?php

include "../koneksi.php";

if (isset($_POST['simpan'])) {
    $simpan = mysqli_query($con, "INSERT INTO user (idpegawai, nama, username, password, bagian) 
                            VALUES ('$_POST[nip]',
                            '$_POST[tnama]',
                            '$_POST[tusername]',
                            '$_POST[tpassword]',
                            '$_POST[tbagian]')");
    if ($simpan) {
        echo "<script>alert('sukses');
                document.location='daftar-karyawan.php';
        </script>";
    } else {
        echo "<script>alert('gagal');
                document.location='daftar-karyawan.php';
        </script>";
    }
}

if (isset($_POST['edit'])) {

    $edit = mysqli_query($con, "UPDATE user 
                            SET nama = '$_POST[tnama]',username = '$_POST[tusername]',
                            password = '$_POST[tpassword]',
                            bagian = '$_POST[tbagian]'
                            WHERE idpegawai = '$_POST[id_registrasi]'
                            ");
    if ($edit) {
        echo "<script>alert('edit data berhasil');
                document.location='daftar-karyawan.php';
        </script>";
    } else {
        echo "<script>alert('edit data gagal');
                document.location='daftar-karyawan.php';
        </script>";
    }
}

// CRUD Karyawan-Leader
if (isset($_POST['editdata'])) {

    $edit = mysqli_query($con, "UPDATE user 
                            SET nama = '$_POST[tnama]',
                            password = '$_POST[tpassword]'
                            WHERE id_user = '$_POST[id_edit]'
                            ");
    if ($edit) {
        session_destroy();
        echo "<script>alert('edit data berhasil');
                document.location='../karyawan/presensi.php';
        </script>";
    } else {
        echo "<script>alert('edit data gagal');
                document.location='../karyawan/presensi.php';
        </script>";
    }
}
// END

if (isset($_POST['hapus'])) {

    $hapus = mysqli_query($con, "DELETE FROM user WHERE idpegawai = '$_POST[id_registrasi]'");
    $hapus2 = mysqli_query($con, "DELETE FROM absensi WHERE idpegawai = '$_POST[id_registrasi]'");
    $hapus3 = mysqli_query($con, "DELETE FROM cuti WHERE idpegawai = '$_POST[id_registrasi]'");
    $hapus4 = mysqli_query($con, "DELETE FROM izin WHERE idpegawai = '$_POST[id_registrasi]'");
    $hapus5 = mysqli_query($con, "DELETE FROM app WHERE idpegawai = '$_POST[id_registrasi]'");

    if ($hapus && $hapus2 && $hapus3 && $hapus4 && $hapus5) {
        echo "<script>alert('hapus data berhasil');
                document.location='daftar-karyawan.php';
        </script>";
    }  else {
        echo "<script>alert('hapus data gagal');
                document.location='daftar-karyawan.php';
        </script>";
    }
}

// start CRUD data aplikasi

if(isset($_POST['appsimpan'])){
    $query = mysqli_query($con, "INSERT INTO aplikasi (nama_aplikasi,masa_aktif,alamat_aplikasi) 
    VALUES ('$_POST[napp]','$_POST[akapp]','$_POST[talamat]')");

    if($query){
        echo "<script>alert('Tambah data aplikasi berhasil');
                document.location='data-aplikasi.php';
        </script>";
    }else{
        echo "<script>alert('Tambah data gagal');
                document.location='data-aplikasi.php';
        </script>";
    }
}

if (isset($_POST['apphapus'])) {

    $hapus = mysqli_query($con, "DELETE FROM aplikasi WHERE id = '$_POST[id]'");

    if ($hapus) {
        echo "<script>alert('hapus data aplikasi berhasil');
                document.location='data-aplikasi.php';
        </script>";
    } else {
        echo "<script>alert('hapus data aplikasi gagal');
                document.location='data-aplikasi.php';
        </script>";
    }
}

if (isset($_POST['editapp'])) {

    $edit = mysqli_query($con, "UPDATE aplikasi 
                            SET nama_aplikasi = '$_POST[nmapp]',
                            alamat_aplikasi = '$_POST[urlapp]',
                            masa_aktif = '$_POST[mtapp]'
                            WHERE id = '$_POST[id_editapp]'
                            ");

    $edit2 = mysqli_query($con, "UPDATE app 
                                SET nama_aplikasi = '$_POST[nmapp]',
                                url = '$_POST[urlapp]',
                                expired = '$_POST[mtapp]'
                                WHERE nama_aplikasi = '$_POST[nmapp]'
                                ");
    if ($edit && $edit2) {
        
        echo "<script>alert('edit data aplikasi berhasil');
                document.location='data-aplikasi.php';
        </script>";
    } else {
        echo "<script>alert('edit data aplikasi gagal');
                document.location='data-aplikasi.php';
        </script>";
    }
}
// end crud DATA APLIKASI
