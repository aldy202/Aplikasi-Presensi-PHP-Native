<?php
include "../koneksi.php";


if (isset($_POST['simpan'])) {
    $nama = $_POST['tname'];

    // $query = mysqli_query($con, "SELECT idpegawai FROM user WHERE nama = '$_POST[tname]' ");
    // $col = mysqli_fetch_array($query);
    // if (isset($col['idpegawai'])) {
    //     $idpegawai = $col['idpegawai'];
    // }
    $j = 12;
    $y = date('Y');

    $simpan = mysqli_query($con, "INSERT INTO jumlah_cuti (idpegawai,jumlah, tahun_berlaku) 
                            VALUES ('$nama','$j','$y')");
    if ($simpan) {
        echo "<script>alert('menambahkan kuota cuti sukses');
                document.location='daftar-kuota-cuti.php';
        </script>";
    } else {
        echo "<script>alert('menambahkan kuota cuti gagal');
                document.location='daftar-kuota-cuti.php';
        </script>";
    }
}

if (isset($_POST['edit'])) {
    // $nama = $_POST['tname'];
    $j = $_POST['tjumlah'];
    $y = date('Y');

    $edit = mysqli_query($con, "UPDATE jumlah_cuti 
                            SET 
                            jumlah= '$j',
                            tahun_berlaku = '$y'
                            WHERE id = '$_POST[id]'
                            ");
    if ($edit) {
        echo "<script>alert('edit data berhasil');
                document.location='daftar-kuota-cuti.php';
        </script>";
    } else {
        echo "<script>alert('edit data gagal');
                document.location='daftar-kuota-cuti.php';
        </script>";
    }
}

if (isset($_POST['hapus'])) {

    $hapus = mysqli_query($con, "DELETE FROM jumlah_cuti WHERE id = '$_POST[id]'");

    if ($hapus) {
        echo "<script>alert('hapus data berhasil');
                document.location='daftar-kuota-cuti.php';
        </script>";
    } else {
        echo "<script>alert('hapus data gagal');
                document.location='daftar-kuota-cuti.php';
        </script>";
    }
}
