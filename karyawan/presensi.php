<?php
require('../koneksi.php');
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: ../login.php");
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
    <!-- font awosome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet" href="../assets/css/style2.css">

    <style>
        body {
            background: #eee;
            font-family: Calibri;
        }
    </style>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <title>DAMANSI | <?= $level ?></title>

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

<body onload="getLocation();">
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
                        <li><a href="karyawan-index.php" class="text-decoration-none px-3 py-2 d-block"><i class="fa-solid fa-house-circle-check"></i>
                                Dashboard</a></li>
                        <li class="active"><a href="presensi.php" class="text-decoration-none px-3 py-2 d-block"><i class="fa fa-list"></i>
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
                        <li><a href="karyawan-index.php" class="text-decoration-none px-3 py-2 d-block"><i class="fa-solid fa-house-circle-check"></i>
                                Dashboard</a></li>
                        <li class="active"><a href="presensi.php" class="text-decoration-none px-3 py-2 d-block"><i class="fa fa-list"></i>
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

                        <a href="../profil.php" class=" btn btn-danger mb-2 py-2 d-block"><i class="fa fa-gear"></i>
                            Accounts Settings</a>
                        <a href="logout.php" style="width: 202px;" class="btn btn-danger text-decoration-none ms-0 px-5 py-2 d-block"><i class="fa-sharp fa-solid fa-right-from-bracket"></i> Logout</a>
                    <?php } ?>

                </ul>

            </div>
        </div>

        <!-- Content Start -->
        <div class="content mb-2">
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

            <!-- Content Absensi MAsuk Satrt -->
            <?php
            date_default_timezone_set('asia/jakarta');
            $i = $_SESSION['idpegawai'];
            $tgl = date('Y-m-d');
            $query = mysqli_query($con, "SELECT * FROM absensi WHERE idpegawai = '$i' AND tgl_absen = '$tgl'");
            $data = mysqli_fetch_array($query);
            $cek = mysqli_num_rows($query);
            $now = date('H:i');
            // $now = "17:15";
            if ($cek != 1) {
                $set_buka = "06:30";
                $set_tutup = "23:59"; // Perlu diskusikan
                // $jam_masuk = "12:01";
                if ($now < $set_buka) {
                    $info = "Presensi masuk dibuka jam 06:30";
            ?>
                    <!-- Menampilkan Pesan Presensi Masuk di buka -->
                    <div class="dashboardContainer">
                        <div class="container">
                            <h2>Untuk melakukan presensi silahkan Tunggu</h2>
                            <p><?php echo $info ?>. Sampai Ketemu lagi, <?php echo $_SESSION['nama'] ?> </p>
                        </div>
                    </div>
                    <!-- Bagian penutup Selesai Presensi end -->
                <?php } else if ($now <= $set_tutup) { ?>
                    <form class="myForm" action="absen_action.php?a=M" method="post">
                        <!-- Container Card Start -->
                        <div class="container mt-3" style="max-width: fit-content;">
                            <div class="card">
                                <img src="../assets/img/logo.png" alt="ini adalah logo" class="m-auto" style="width:30%;">
                                <h3 class="m-auto">Form Presensi</h3>
                                <div class="card-body">
                                    <div class="mb-3">
                                        <label for="kondisi" class="form-label">Kondisi</label>
                                        <input type="text" name="kondisi" class="form-control" required autofocus autocomplete="off">
                                    </div>
                                    <div class="d-flex justify-content-center">
                                        <div class="mx-auto">

                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <fieldset>
                                                    <legend class="col-form-label pt-0">Keterangan :</legend>

                                                    <div class="form-check" style="padding-left: 100px;">
                                                        <input class="form-check-input" type="radio" name="keterangan" id="keterangan" value="WFO" required>
                                                        <label class="form-check-label" for="keterangan">
                                                            WFO
                                                        </label>
                                                    </div>
                                                    <div class="form-check" style="padding-left: 100px;">
                                                        <input class="form-check-input" type="radio" name="keterangan" id="keterangan" value="WFH">
                                                        <label class="form-check-label" for="keterangan">
                                                            WFH
                                                        </label>
                                                    </div>

                                                </fieldset>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <fieldset>
                                                    <legend class="col-form-label pt-0">Shift :</legend>

                                                    <div class="form-check" style="padding-left: 90px;">
                                                        <input class="form-check-input" type="radio" name="shift" id="shift" value="Pagi" required>
                                                        <label class="form-check-label" for="shift">
                                                            Pagi
                                                        </label>
                                                    </div>
                                                    <div class="form-check" style="padding-left: 90px;">
                                                        <input class="form-check-input" type="radio" name="shift" id="shift" value="Siang">
                                                        <label class="form-check-label" for="shift">
                                                            Siang
                                                        </label>
                                                    </div>

                                                </fieldset>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="mb-3">
                                        <div class="form-floating">
                                            <textarea class="form-control" placeholder="Jobdesk / Plan" id="jobdesk" name="jobdesk" style="height: 100px" required></textarea>
                                            <label for="jobdesk">Jobdesk / Plan</label>
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <input type="hidden" name="latitude">
                                        <input type="hidden" name="longitude">
                                    </div>
                                    <div class="d-grid gap-2">
                                        <button type="submit" name="submit" class="btn btn-danger btn-block btn-lg">Absen Masuk</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Container Card End -->
                        <div class="container mt-3">
                            <?php include 'dataAbsensi.php' ?>
                        </div>

                    </form>
                <?php } else { // Jika Tidak ada Presensi Masuk Maka muncul pesan
                    $msg = "Karena anda tidak ada presensi masuk";
                ?>

                    <!-- Bagian Tidak bisa presensi Selesai Presensi start-->
                    <div class="dashboardContainer">
                        <div class="container">
                            <h2>Mohon maaf anda tidak bisa presensi</h2>
                            <p><?php echo $msg ?>. Sampai Jumpa Besok, <?php echo $_SESSION['nama'] ?> </p>
                        </div>
                    </div>
                    <!-- Data Absensi -->
                    <div class="container mt-3" style="max-width: 850px;">
                        <?php include 'dataAbsensi.php' ?>
                    </div>
                    <!-- Bagian Tidak Bisa presensi penutup Selesai Presensi end -->

                <?php } ?>
                <!-- Presensi Pulang -->
                <?php } else if ($cek == 1) {
                $buka_pulang = '12:01';
                $set_pulang_akhir = '23:59';
                if ($data['pulang'] != null) {
                    $msg = "Presensi hari ini telah selesai";
                ?>

                    <!-- Bagian penutup Selesai Presensi start-->
                    <div class="dashboardContainer">
                        <div class="container">
                            <h2>Terima Kasih Sudah Bekerja Hari Ini</h2>
                            <p><?php echo $msg ?>. Sampai Jumpa Besok, <?php echo $_SESSION['nama'] ?> </p>
                        </div>
                    </div>
                    <!-- Bagian penutup Selesai Presensi end -->

                    <?php include 'dataAbsensi.php' ?>


                    <?php } else {
                    if ($now < $buka_pulang) {
                        $message = "Presensi pulang Belum Di Buka";
                    ?>
                        <!-- Menampilkan Pesan tunggu presensi pulang -->
                        <div class="dashboardContainer">
                            <div class="container">
                                <h2>Terima Kasih Telah Presensi</h2>
                                <p><?php echo $message ?>. Sampai Ketemu nanti, <?php echo $_SESSION['nama'] ?> </p>
                            </div>
                        </div>
                        <!-- Menampilkan Pesan tunggu presensi pulang -->

                    <?php } else {
                        $message = "Presensi pulang ditutup jam 23:59";
                    ?>
                        <!-- Form Presensi Pulang Start -->
                        <form class="myForm" action="absen_action.php?a=P" method="post">
                            <div class="container" style="width: fit-content;">
                                <div class="card mx-auto">
                                    <img src="../assets/img/logo.png" alt="ini adalah logo" class="m-auto" style="width:30%;">
                                    <h3 class="m-auto">Form Presensi</h3>
                                    <?php
                                    echo "<div class='text-center mt-2 text-danger fw-bold' style='padding:10px;' >{$message}</div>";
                                    ?>
                                    <div class="card-body">
                                        <div class="mb-3">
                                            <div class="form-floating">
                                                <textarea class="form-control" placeholder="Jobdesk / Plan" id="jobdesk" name="jobdesk" style="height: 100px" required></textarea>
                                                <label for="jobdesk">Jobdesk / Plan</label>
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <input type="hidden" name="latitude">
                                            <input type="hidden" name="longitude">
                                        </div>
                                        <div class="d-grid gap-2">
                                            <button type="submit" name="submit" class="btn btn-success btn-block btn-lg">Absen Pulang</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <div class="container mt-3">
                            <?php include 'dataAbsensi.php' ?>
                        </div>
                        <!-- Form Presensi Pulang End -->
                    <?php } ?>
                <?php } ?>
            <?php } ?>
            <!-- Content Absensi MAsuk End -->
        </div>
        <!-- Content End -->
    </div>
    <!-- Sidebar End -->

    <!-- My JS -->
    <script src="../assets/js/script.js"></script>

    <script type="text/javascript">
        function getLocation() {
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(showPosition, showError);
            }
        }

        function showPosition(position) {
            document.querySelector('.myForm input[name = "latitude"]').value = position.coords.latitude;
            document.querySelector('.myForm input[name = "longitude"]').value = position.coords.longitude;
        }

        function showError(error) {
            switch (error.code) {
                case error.PERMISSION_DENIED:
                    alert("You Must Allow The Request Location");
                    location.reload();
                    break;
            }
        }
    </script>

    <!-- Boostrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js" integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N" crossorigin="anonymous"></script>
</body>

</html>