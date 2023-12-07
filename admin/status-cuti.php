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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" />
    <link rel="stylesheet" href="https://kit.fontawesome.com/ce7c3c43ce.css" crossorigin="anonymous">
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
                <h5 class="text-center text-white mt-3"><?php echo $level ?></h5>
                <h4 class="text-center mt-3"><?php echo $_SESSION['nama'] ?></h4>

                <ul class="list-unstyled px-3 py-4">
                    <!-- ADMIN FITUR -->
                    <li><a href="admin-index.php" class="text-decoration-none px-3 py-2 d-block"><i class="fa-solid fa-house-circle-check"></i>
                            Dashboard</a></li>
                    <li class="active"><a href="data.php" class="text-decoration-none px-3 py-2 d-block"><i class="fa fa-list"></i>
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
                <a href="data.php" class="tab-links" style="text-decoration: none;">Profil Karyawan</a>
                <a href="status-izin.php" class="tab-links" style="text-decoration: none;">Status Izin</a>
                <a href="status-cuti.php" class="tab-links active-link" style="text-decoration: none;">Status Cuti</a>
            </div>
            <!-- Cuti -->
            <div class="tab-contents active-tab" id="cuti">
                <table class="table table-bordered table-striped table-hover">
                    <thead class="table-danger">
                        <tr>
                            <th>No</th>
                            <th>Nama Lengkap</th>
                            <th>ID Pegawai</th>
                            <th>Tanggal mulai cuti</th>
                            <th>Tanggal selesai cuti</th>
                            <th>Lama Cuti</th>
                            <th>Alasan</th>
                            <th>Keterangan</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $angka = 1;
                        $query = mysqli_query($con, "SELECT * FROM cuti JOIN user ON cuti.idpegawai = user.idpegawai ORDER BY id_cuti DESC");
                        while ($row = mysqli_fetch_array($query)) :
                        ?>
                            <tr>
                                <td><?= $angka++ ?></td>
                                <td><?= $row['nama'] ?></td>
                                <td><?= $row['idpegawai'] ?></td>
                                <td><?= $row['dari'] ?></td>
                                <td><?= $row['sampai'] ?></td>
                                <td><?= $row['lama'] . " Hari" ?></td>
                                <td><?= $row['alasan'] ?></td>
                                <td><?= $row['keterangan']  ?></td>
                                <td class="col-2 text-center p-3"> <?= $row['status'] === 'P' ?
                                                                        '<h5><span class="rounded p-1" style="background-color:#FFBF00">Pending <i class="fa-solid fa-hourglass-start"></i></span></h5>'
                                                                        : ($row['status'] === 'N' ?
                                                                            '<h5><span class="rounded text-white p-1" style="background-color:#FF0032">Reject <i class="fa-solid fa-circle-xmark"></i></span></h5>'
                                                                            : '<h5><span class="rounded p-1" style="background-color:#16FF00">Approve <i class="fa-solid fa-thumbs-up"></i></span></h5>') ?>

                                </td>
                                <!-- END -->
                                <td class="col-2 text-center p-3">
                                    <?php
                                    if ($row['status'] == 'P') {
                                    ?>
                                        <a href="proses_cuti.php?id=<?= $row['id_cuti'] ?>&&s=N" class="btn btn-sm" style="background-color:#FF0032" onclick="return confirm('Reject request ini ?')">
                                            <i>Deny</i>
                                        </a>
                                        <a href="proses_cuti.php?id=<?= $row['id_cuti'] ?>&&s=Y" class="btn btn-sm" style="background-color:#16FF00" onclick="return confirm('Approve request ini ?')">
                                            <i>Accept</i>
                                        </a>
                                    <?php } ?>
                                </td>
                            </tr>
                    </tbody>
                <?php endwhile; ?>
                </table>
            </div>
        </div>
    </div>
    <!-- My JS -->
    <script src="../assets/js/script.js"></script>
    <!-- Boostrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>

</html>