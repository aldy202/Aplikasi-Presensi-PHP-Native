<?php
require('../koneksi.php');
session_start();
if (!isset($_SESSION['nama'])) {
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
    <!-- Admin CSS -->
    <link rel="stylesheet" href="../assets/css/admin.css">
    <!-- Boostrap Css-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous" />
    <!-- font awosome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- JQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

    <title>DAMANSI | ADMIN</title>
</head>

<body>
    <!-- side bar start -->
    <div class="main-container d-flex">
        <div class="sidebar" id="side_nav">
            <div class="header-box px-2 pt-3 pb-4 ">
                <h4 class="fs-4 d-flex"><span class="bg-white text-dark rounded shadow px-1 me-2 p">DS</span> <span class="text-white px-4">Damansi</span> <button class="btn d-md-none d-block close-btn px-2 ms-4 py-0 text-white"><i class="fa-solid fa-bars fa-lg"></i></button></h4>
                <div class="container px-4 ms-5">
                    <i class="fa-solid fa-circle-user fa-6x"></i>
                    <!-- <img src="/assets/img/logo.png" alt="" style="width: 50%;"> -->
                </div>
                <h4 class="text-center text-white fw-bold mt-3"><?php echo $_SESSION['nama'] ?></h4>
                <h5 class="text-center mt-3"><?php echo $level ?></h5>

                <ul class="list-unstyled px-3 py-4">
                    <!-- Leader Fitur -->
                    <li><a href="karyawan-index.php" class="text-decoration-none px-3 py-2 d-block"><i class="fa-solid fa-house-circle-check"></i>
                            Dashboard</a></li>
                    <li><a href="presensi.php" class="text-decoration-none px-3 py-2 d-block"><i class="fa fa-list"></i>
                            Presensi</a></li>
                    <li><a href="izin.php" class="text-decoration-none px-3 py-2 d-block"><i class="fa-solid fa-calendar-days"></i>
                            Pengajuan Izin</a></li>
                    <li><a href="cuti.php" class="text-decoration-none px-3 py-2 d-block"><i class="fa-solid fa-calendar-minus"></i>
                            Pengajuan
                            Cuti</a></li>
                    <li><a href="status-cuti-izin-karyawan.php" class="text-decoration-none px-3 py-2 d-block"><i class="fa-solid fa-bell"></i></i>
                            Status izin & Cuti</a></li>
                    <li><a href="profil-karyawan.php" class="text-decoration-none px-3 py-2 d-block"><i class="fa-sharp fa-solid fa-book"></i>
                            Ringkasan Karyawan</a></li>
                    <li class="active"><a href="status-data-izin-cuti.php" class="text-decoration-none px-3 py-2 d-block"><i class="fa-regular fa-calendar-check"></i>
                            Data Izin dan Cuti</a></li>
                    <hr class="h-color mx-2 ">

                    <a href="../profil.php" class=" btn btn-danger mb-2 py-2 d-block"><i class="fa fa-gear"></i>
                        Accounts Settings</a>
                    <a href="logout.php" style="width: 202px;" class="btn btn-danger text-decoration-none ms-0 px-5 py-2 d-block"><i class="fa-sharp fa-solid fa-right-from-bracket"></i> Logout</a>

                </ul>
            </div>
        </div>

        <!-- Content Start -->
        <div class="content mb-2">
            <!-- Nav Start -->
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
            <!-- Nav End -->
            <div class="tab-titles">
                <p class="tab-links">Data Status Cuti</p>
            </div>
            <!-- Cuti -->
            <div class="tab-contents active-tab" id="cuti">
                <table class="table table-bordered table-striped table-hover">
                    <thead class="table-danger">
                        <tr>
                            <th>No</th>
                            <th>Nama Lengkap</th>
                            <th>Tanggal mulai cuti</th>
                            <th>Tanggal selesai cuti</th>
                            <th>Lama Cuti</th>
                            <th>Alasan</th>
                            <th>Status</th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $angka = 1;
                        $query = mysqli_query($con, "SELECT * FROM cuti JOIN user ON cuti.idpegawai = user.idpegawai WHERE bagian != 'Admin' AND keterangan = 'Cuti' ORDER BY id_cuti DESC");
                        while ($row = mysqli_fetch_array($query)) :
                        ?>
                            <tr>
                                <td><?= $angka++ ?></td>
                                <td><?= $row['nama'] ?></td>
                                <td><?= $row['dari'] ?></td>
                                <td><?= $row['sampai'] ?></td>
                                <td><?= $row['lama'] . " Hari" ?></td>
                                <td><?= $row['alasan'] ?></td>
                                <td> <?= $row['status'] === 'P' ?
                                            '<h5><span class="rounded p-1" style="background-color:#FFBF00">Pending <i class="fa-solid fa-hourglass-start"></i></span></h5>'
                                            : ($row['status'] === 'N' ?
                                                '<h5><span class="rounded text-white p-1" style="background-color:#FF0032">Reject <i class="fa-solid fa-circle-xmark"></i></span></h5>'
                                                : '<h5><span class="rounded p-1" style="background-color:#16FF00">Approve <i class="fa-solid fa-thumbs-up"></i></span></h5>') ?>

                                </td>
                                <!-- END -->
                            </tr>
                        <?php endwhile; ?>
                    </tbody>
                </table>
            </div>

            <!-- Table Izin -->
            <div class="tab-titles">
                <p class="tab-links">Data Status Izin</p>
            </div>
            <div class="tab-contents active-tab" id="izin">
                <table class="table table-bordered table-striped table-hover">
                    <thead class="table-danger">
                        <tr>
                            <th>No</th>
                            <th>Nama Lengkap</th>
                            <th>Jam Mulai</th>
                            <th>Jam Selesai</th>
                            <th>Tanggal mulai Izin</th>
                            <th>Tanggal selesai Izin</th>
                            <th>Alasan</th>
                            <th>Status</th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $angka2 = 1;
                        $query2 = mysqli_query($con, "SELECT * FROM izin JOIN user ON izin.idpegawai = user.idpegawai WHERE bagian != 'Admin' AND keterangan = 'Izin' ORDER BY id_izin DESC");
                        while ($row2 = mysqli_fetch_array($query2)) :
                        ?>
                            <tr>
                                <td><?= $angka2++ ?></td>
                                <td><?= $row2['nama'] ?></td>
                                <td><?= $row2['mulai'] ?></td>
                                <td><?= $row2['selesai'] ?></td>
                                <td><?= $row2['tgl_mulai'] ?></td>
                                <td><?= $row2['tgl_selesai'] ?></td>
                                <td><?= $row2['alasan'] ?></td>
                                <td> <?= $row2['status'] === 'P' ?
                                            '<h5><span class="rounded p-1" style="background-color:#FFBF00">Pending <i class="fa-solid fa-hourglass-start"></i></span></h5>'
                                            : ($row2['status'] === 'N' ?
                                                '<h5><span class="rounded text-white p-1" style="background-color:#FF0032">Reject <i class="fa-solid fa-circle-xmark"></i></span></h5>'
                                                : '<h5><span class="rounded p-1" style="background-color:#16FF00">Approve <i class="fa-solid fa-thumbs-up"></i></span></h5>') ?>

                                </td>
                                <!-- END -->
                            </tr>
                        <?php endwhile; ?>
                    </tbody>
                </table>
            </div>
        </div>
        <!-- Content End -->
    </div>
    <!-- My JS -->
    <script src="../assets/js/script.js"></script>

    <!-- Boostrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>

</html>