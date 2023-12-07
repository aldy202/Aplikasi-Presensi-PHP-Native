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
                <h5 class="text-center text-white mt-3"><?php echo $level ?></h5>
                <h4 class="text-center mt-3"><?php echo $_SESSION['nama'] ?></h4>

                <ul class="list-unstyled px-3 py-4">
                    <!-- ADMIN FITUR -->
                    <li class="active"><a href="admin-index.php" class="text-decoration-none px-3 py-2 d-block"><i class="fa-solid fa-house-circle-check"></i>
                            Dashboard</a></li>
                    <li><a href="data.php" class="text-decoration-none px-3 py-2 d-block"><i class="fa fa-list"></i>
                            Data Karyawan</a></li>
                    <li><a href="report-karyawan.php" class="text-decoration-none px-3 py-2 d-block"><i class="fa-sharp fa-solid fa-book"></i>
                            Report Karyawan</a></li>
                    <li><a href="daftar-karyawan.php" class="text-decoration-none px-3 py-2 d-block"><i class="fa-solid fa-calendar-minus"></i>
                            Pendaftaran Karyawan</a></li>
                    <li><a href="data-aplikasi.php" class="text-decoration-none px-3 py-2 d-block"><i class="fa-solid fa-calendar-minus"></i>
                            Daftar Aplikasi</a></li>
                    <hr class="h-color mx-2">
                    <a href="../profil.php" class=" btn btn-danger mb-2 py-2 d-block"><i class="fa fa-gear"></i>
                        Accounts Settings</a>
                    <a href="../karyawan/logout.php" style="width: 195px;" class="btn btn-danger text-decoration-none ms-0 px-5 py-2 d-block"><i class="fa-sharp fa-solid fa-right-from-bracket"></i> Logout</a>

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
                <h1>ADMIN DAMANSI</h1>

            </div>
            <?php
            $query = mysqli_query($con, "SELECT * FROM cuti JOIN user ON cuti.idpegawai = user.idpegawai  WHERE status = 'P'");
            $no = 1;
            while ($data = mysqli_fetch_array($query)) {
            ?>

                <div class="alert" style="background-color: #f44336; color: white; padding: 20px; margin: 20px;" role="alert">
                    Permintaan
                    <strong><?= ($data['keterangan'] == 1 ?: 'Cuti') ?></strong> Dari
                    <?= $data['nama'] ?>
                    <a href="status-cuti.php">Lihat</a>
                    <!-- <button type="button" class="close" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button> -->
                    <div class="close-bt" style="float: right;">
                        <span class="fas fa-times"></span>
                    </div>
                </div>
            <?php } ?>

            <?php
            $query2 = mysqli_query($con, "SELECT * FROM izin JOIN user ON izin.idpegawai = user.idpegawai  WHERE status = 'P'");
            $no2 = 1;
            while ($data2 = mysqli_fetch_array($query2)) {
            ?>

                <div id="myAlert" class="alert" style="background-color: #f44336; color: white; padding: 20px; margin: 20px;">
                    Permintaan
                    <strong><?= ($data2['keterangan'] == 1 ?: 'Izin') ?></strong> Dari
                    <?= $data2['nama'] ?>
                    <a href="status-izin.php">Lihat</a>
                    <div class="close-bt" style="float: right;">
                        <span class="fas fa-times" style="cursor: pointer;"></span>
                    </div>
                </div>
            <?php } ?>


            <!-- Notifikasi Update -->
            <hr/>
            <?php
            date_default_timezone_set('asia/jakarta');
            $i = $_SESSION['idpegawai'];
            $query3 = mysqli_query($con, "SELECT * FROM app JOIN user ON app.idpegawai = user.idpegawai");
            $no2 = 1;


            while ($dat = mysqli_fetch_array($query3)) :
                $d2 = strtotime($dat['due_pass']);
                $d3 = strtotime(date('Y-m-d')); // Tanggal Sekarang

                $hitung = $d2 - $d3;

                $hari = $hitung / (60 * 60 * 24);
            ?>
                <?php if ($hari <= 0) { ?>
                    <div id="myAlert" class="alert" style="background-color: #f44336; color: black; padding: 20px; margin: 20px;">
                        Segera ganti Password Aplikasi <strong><?= $dat['nama_aplikasi'] ?></strong> <?= $dat['nama'] ?> Hari Ini 
                        <a href="data-pegawai.php?id=<?= $dat['idpegawai'] ?>" style="text-decoration: none;"> Lihat</a>
                        <div class="close-bt" style="float: right;">
                            <span class="fas fa-times" style="cursor: pointer;"></span>
                        </div>
                    </div>
                <?php } else if ($hari <= 7) { ?>
                    <div id="myAlert" class="alert" style="background-color: #F7DB6A; color: black; padding: 20px; margin: 20px;">
                        Password Aplikasi <strong><?= $dat['nama_aplikasi'] ?></strong> <?= $dat['nama'] ?> Expired
                        <?= $hari ?> hari lagi
                        <a href="data-pegawai.php?id=<?= $dat['idpegawai'] ?>" style="text-decoration: none;"> Lihat</a>
                        <div class="close-bt" style="float: right;">
                            <span class="fas fa-times" style="cursor: pointer;"></span>
                        </div>
                    </div>
                <?php } ?>
            <?php endwhile; ?>
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