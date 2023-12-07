<?php
require('../koneksi.php');
session_start();
if (!isset($_SESSION['bagian']) == "Admin") {
    header("Location: ../login.php");
    session_destroy();
}
$level = $_SESSION['bagian'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="icon" href="../assets/img/logo.png">

    <!-- Boostrap Css-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous" />
    <!-- font awosome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" />

    <link rel="stylesheet" href="../assets/css/admin.css">

    <style>
        body {
            background: #eee;
            font-family: Calibri;
        }
    </style>


    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <title>DAMANSI | Dashboard</title>

    <style>
        .dashboardContainer {
            padding: 50px;
            max-width: 800px;
            margin: 100px auto;
        }

        .welcomeMessage {
            margin-top: 20px;
        }
    </style>
</head>

<body>
    <!-- Sidebar Satart -->
    <div class="main-container d-flex">
        <div class="sidebar" id="side_nav">
            <div class="header-box px-2 pt-3 pb-4 ">
                <h4 class="fs-4 d-flex"><span class="bg-white text-dark rounded shadow px-1 me-2 p">DS</span> <span class="text-white px-4">Damansi</span> <button class="btn d-md-none d-block close-btn px-2 ms-4 py-0 text-white"><i class="fa-solid fa-bars fa-lg"></i></button></h4>
                <div class="container px-4 ms-5">
                    <i class="fa-solid fa-circle-user fa-6x"></i>
                    <!-- <img src="/assets/img/logo.png" alt="" style="width: 50%;"> -->
                </div>
                <h4 class="text-center text-white fw-bold mt-3"><?php echo $_SESSION['nama'] ?></h4>
                <h5 class="text-center  mt-3"><?php echo $level ?></h5>

                <ul class="list-unstyled px-3 py-4">
                    <!-- Karyawan Fitur -->
                    <?php if ($level == "Karyawan") { ?>
                        <li class="active"><a href="karyawan-index.php" class="text-decoration-none px-3 py-2 d-block"><i class="fa-solid fa-house-circle-check"></i>
                                Dashboard</a></li>
                        <li><a href="presensi.php" class="text-decoration-none px-3 py-2 d-block"><i class="fa fa-list"></i>
                                Presensi</a></li>
                        <li><a href="izin.php" class="text-decoration-none px-3 py-2 d-block"><i class="fa-solid fa-calendar-days"></i>
                                Pengajuan Izin</a></li>
                        <li><a href="cuti.php" class="text-decoration-none px-3 py-2 d-block"><i class="fa-solid fa-calendar-minus"></i>
                                Pengajuan
                                Cuti</a></li>
                        <li><a href="status-cuti-izin-karyawan.php" class="text-decoration-none px-3 py-2 d-block"><i class="fa-solid fa-bell"></i>
                                Status Izin & Cuti</a></li>
                        <hr class="h-color mx-2 m-5">

                        <a href="../profil.php" class=" btn btn-danger mb-3 py-2 d-block"><i class="fa fa-gear"></i>
                            Accounts Settings</a>
                        <a href="logout.php" style="width: 202px;" class="btn btn-danger text-decoration-none ms-0 px-5 py-2 d-block"><i class="fa-sharp fa-solid fa-right-from-bracket"></i> Logout</a>
                    <?php } ?>

                    <!-- Leader Fitur -->
                    <?php if ($level == "Leader") { ?>
                        <li class="active"><a href="karyawan-index.php" class="text-decoration-none px-3 py-2 d-block"><i class="fa-solid fa-house-circle-check"></i>
                                Dashboard</a></li>
                        <li><a href="presensi.php" class="text-decoration-none px-3 py-2 d-block"><i class="fa fa-list"></i>
                                Presensi</a></li>
                        <li><a href="izin.php" class="text-decoration-none px-3 py-2 d-block"><i class="fa-solid fa-calendar-days"></i>
                                Pengajuan Izin</a></li>
                        <li><a href="cuti.php" class="text-decoration-none px-3 py-2 d-block"><i class="fa-solid fa-calendar-minus"></i>
                                Pengajuan
                                Cuti</a></li>
                        <li><a href="status-cuti-izin-karyawan.php" class="text-decoration-none px-3 py-2 d-block"><i class="fa-solid fa-bell"></i>
                                Status izin & Cuti</a></li>
                        <li><a href="profil-karyawan.php" class="text-decoration-none px-3 py-2 d-block"><i class="fa-sharp fa-solid fa-book"></i>
                                Ringkasan Karyawan</a></li>
                        <li><a href="status-data-izin-cuti.php" class="text-decoration-none px-3 py-2 d-block"><i class="fa-regular fa-calendar-check"></i>
                                Data Izin dan Cuti</a></li>
                        <hr class="h-color mx-2 ">

                        <a href="../profil.php" class=" btn btn-danger mb-2  py-2 d-block"><i class="fa fa-gear"></i>
                            Accounts Settings</a>
                        <a href="logout.php" style="width: 202px;" class="btn btn-danger text-decoration-none ms-0 px-5 py-2 d-block"><i class="fa-sharp fa-solid fa-right-from-bracket"></i> Logout</a>
                    <?php } ?>

                </ul>

            </div>
        </div>

        <!-- Content Start -->
        <div class="content mb-2 animate">
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="container-fluid">
                    <div class="d-flex justify-content-between d-md-none d-block">

                        <button class="btn px-1 py-0 open-btn"><i class="fa fa-bars fa-2x"></i></button>
                    </div>

                    <div class="d-flex justify-content-between d-md-none d-block">
                        <h1>Damansi</h1>
                    </div>
                </div>
            </nav>
            <div class="tab-titles">
                <?php
                if ($level == "Leader") {
                ?>
                    <h1>LEADER DAMANSI</h1>
                <?php } else { ?>
                    <h1>KARYAWAN DAMANSI</h1>
                <?php } ?>
            </div>

            <!-- Notifikasi Presensi -->
            <?php
            date_default_timezone_set('asia/jakarta');
            $i = $_SESSION['idpegawai'];
            $tgl = date('Y-m-d');
            $query = mysqli_query($con, "SELECT * FROM absensi WHERE idpegawai = '$i' AND tgl_absen = '$tgl'");
            $cek = mysqli_num_rows($query);
            $data = mysqli_fetch_array($query);

            if ($cek != 1) {
            ?>
                <div id="myAlert" class="alert" style="background-color: #f44336; color: white; padding: 20px; margin: 20px;">
                    Anda Belum Presensi Masuk Hari Ini
                    <a href="presensi.php" style="text-decoration: none;">Lihat</a>
                    <div class="close-bt" style="float: right;">
                        <span class="fas fa-times" style="cursor: pointer;"></span>
                    </div>
                </div>
            <?php } else if ($cek == 1) { ?>
                <?php
                if ($data['pulang'] != null) {
                ?>
                    <div id="myAlert" class="alert" style="background-color: #9DC08B; color: white; padding: 20px; margin: 20px;">
                        Anda Sudah Presensi Hari Ini
                    </div>
                <?php } else { ?>
                    <div id="myAlert" class="alert" style="background-color: #7B8FA1; color: white; padding: 20px; margin: 20px;">
                        Anda Belum Presensi Pulang Hari Ini
                        <a href="presensi.php" style="text-decoration: none;"> Lihat</a>
                        <div class="close-bt" style="float: right;">
                            <span class="fas fa-times" style="cursor: pointer;"></span>
                        </div>
                    </div>
                <?php } ?>
            <?php } ?>

            <!-- Notifikasi Update Data Aplikasi Leader -->
            <?php
            date_default_timezone_set('asia/jakarta');
            $i = $_SESSION['idpegawai'];
            $query3 = mysqli_query($con, "SELECT * FROM app WHERE idpegawai = '$i' ");
            $no2 = 1;


            while ($dat = mysqli_fetch_array($query3)) :
                $d2 = strtotime($dat['due_pass']);
                $d3 = strtotime(date('Y-m-d')); // Tanggal Sekarang

                $hitung = $d2 - $d3;

                $hari = $hitung / (60 * 60 * 24);
            ?>
                <?php if ($hari <= 0) { ?>
                    <div id="myAlert" class="alert" style="background-color: #f44336; color: black; padding: 20px; margin: 20px;">
                        Segera ganti Password Aplikasi <strong><?= $dat['nama_aplikasi'] ?></strong> Hari Ini
                        <a href="../profil.php" style="text-decoration: none;"> Lihat</a>
                        <div class="close-bt" style="float: right;">
                            <span class="fas fa-times" style="cursor: pointer;"></span>
                        </div>
                    </div>
                <?php } else if ($hari <= 7) { ?>
                    <div id="myAlert" class="alert" style="background-color: #F7DB6A; color: black; padding: 20px; margin: 20px;">
                        Masa Password Aplikasi <strong><?= $dat['nama_aplikasi'] ?></strong> Expired
                        <?= $hari ?> hari lagi
                        <a href="../profil.php" style="text-decoration: none;"> Lihat</a>
                        <div class="close-bt" style="float: right;">
                            <span class="fas fa-times" style="cursor: pointer;"></span>
                        </div>
                    </div>
                <?php } ?>
            <?php endwhile; ?>

            <?php if($level == "Leader") {?>
                <hr/>
                <!-- Notifikasi Update Semua Karyawan -->
                <?php
                date_default_timezone_set('asia/jakarta');
                $i = $_SESSION['idpegawai'];
                $query3 = mysqli_query($con, "SELECT * FROM app JOIN user ON app.idpegawai = user.idpegawai WHERE bagian != 'Leader' ");
                $no2 = 1;


                while ($dat = mysqli_fetch_array($query3)) :
                    $d2 = strtotime($dat['due_pass']);
                    $d3 = strtotime(date('Y-m-d')); // Tanggal Sekarang

                    $hitung = $d2 - $d3;

                    $hari = $hitung / (60 * 60 * 24);
                ?>
                    <?php if ($hari <= 0) { ?>
                        <div id="myAlert" class="alert" style="background-color: #66347F; color: white; padding: 20px; margin: 20px;">
                            Segera ganti Password Aplikasi <strong><?= $dat['nama_aplikasi'] ?></strong> <?= $dat['nama'] ?> Hari Ini 
                            <a href="data-aplikasi-karyawan.php?id=<?= $dat['idpegawai'] ?>" style="text-decoration: none;"> Lihat</a>
                            <div class="close-bt" style="float: right;">
                                <span class="fas fa-times" style="cursor: pointer;"></span>
                            </div>
                        </div>
                    <?php } else if ($hari <= 7) { ?>
                        <div id="myAlert" class="alert" style="background-color: #00235B; color: white; padding: 20px; margin: 20px;">
                            Password Aplikasi <strong><?= $dat['nama_aplikasi'] ?></strong> <?= $dat['nama'] ?> Expired
                            <?= $hari ?> hari lagi
                            <a href="data-aplikasi-karyawan.php?id=<?= $dat['idpegawai'] ?>" style="text-decoration: none;"> Lihat</a>
                            <div class="close-bt" style="float: right;">
                                <span class="fas fa-times" style="cursor: pointer;"></span>
                            </div>
                        </div>
                    <?php } ?>
                <?php endwhile; ?>
            <?php }?>

        </div>
        <!-- Content End -->
    </div>
    <!-- Sidebar End -->

    <!-- My JS -->
    <script src="../assets/js/script.js"></script>
    <script>
        $('.close-bt').click(function() {
            $(this).closest('.alert').fadeOut(50, function() {
                $(this).remove();
            });
        });
    </script>
    <!-- Boostrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>

</html>