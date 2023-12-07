<?php
require('koneksi.php');
session_start();
if (!isset($_SESSION['nama'])) {
    header("Location: ../login.php");
}
$level = $_SESSION['bagian'];
$name = $_SESSION['nama'];

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=f, initial-scale=1.0">

    <link rel="icon" href="assets/img/logo.png">

    <title>DAMANSI | Edit Profile</title>

    <!-- Boostrap Css-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous" />
    <!-- CSS -->
    <link rel="stylesheet" href="assets/css/style2.css">

    <!-- font awosome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- JQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-datetimepicker/2.5.20/jquery.datetimepicker.full.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-datetimepicker/2.5.20/jquery.datetimepicker.min.css" />
</head>

<body>
    <!-- Sidebar Satart -->
    <div class="main-container d-flex">
        <div class="sidebar" id="side_nav">
            <div class="header-box px-2 pt-3 pb-4 ">
                <h1 class="fs-4 d-flex"><span class="bg-white text-dark rounded shadow px-1 me-2">DS</span> <span class="text-white px-4">Damansi</span> <button class="btn d-md-none d-block close-btn px-2 ms-4 py-0 text-white"><i class="fa-solid fa-bars fa-lg"></i></button></h1>
                <div class="container px-4 ms-5">
                    <i class="fa-solid fa-circle-user fa-6x"></i>
                    <!-- <img src="/assets/img/logo.png" alt="" style="width: 50%;"> -->
                </div>
                <h4 class="text-center text-white fw-bold mt-3"><?php echo $_SESSION['nama'] ?></h4>
                <h5 class="text-center mt-3"><?php echo $_SESSION['bagian'] ?></h5>

                <ul class="list-unstyled px-3 py-4">

                    <!-- Karyawan Fitur -->
                    <?php if ($level == "Karyawan") { ?>
                        <li><a href="karyawan/karyawan-index.php" class="text-decoration-none px-3 py-2 d-block"><i class="fa-solid fa-house-circle-check"></i>
                                Dashboard</a></li>
                        <li><a href="karyawan/presensi.php" class="text-decoration-none px-3 py-2 d-block"><i class="fa fa-list"></i>
                                Presensi</a></li>
                        <li><a href="karyawan/izin.php" class="text-decoration-none px-3 py-2 d-block"><i class="fa-solid fa-calendar-days"></i>
                                Pengajuan Izin</a></li>
                        <li><a href="karyawan/cuti.php" class="text-decoration-none px-3 py-2 d-block"><i class="fa-solid fa-calendar-minus"></i>
                                Pengajuan
                                Cuti</a></li>
                        <li><a href="karyawan/status-cuti-izin-karyawan.php" class="text-decoration-none px-3 py-2 d-block"><i class="fa-solid fa-bell"></i>
                                Status Izin & Cuti</a></li>
                        <hr class="h-color mx-2 m-5">

                        <a href="./profil.php" class=" btn btn-danger mb-3 py-2 d-block active"><i class="fa fa-gear"></i>
                            Accounts Setting</a>
                        <a href="../karyawan/logout.php" style="width: 202px;" class="btn btn-danger text-decoration-none ms-0 px-5 py-2 d-block"><i class="fa-sharp fa-solid fa-right-from-bracket"></i> Logout</a>
                    <?php } ?>

                    <!-- Leader Fitur -->
                    <?php if ($_SESSION['bagian'] == "Leader") { ?>
                        <li><a href="karyawan/karyawan-index.php" class="text-decoration-none px-3 py-2 d-block"><i class="fa-solid fa-house-circle-check"></i>
                                Dashboard</a></li>
                        <li><a href="karyawan/presensi.php" class="text-decoration-none px-3 py-2 d-block"><i class="fa fa-list"></i>
                                Presensi</a></li>
                        <li><a href="karyawan/izin.php" class="text-decoration-none px-3 py-2 d-block"><i class="fa-solid fa-calendar-days"></i>
                                Pengajuan Izin</a></li>
                        <li><a href="karyawan/cuti.php" class="text-decoration-none px-3 py-2 d-block"><i class="fa-solid fa-calendar-minus"></i>
                                Pengajuan
                                Cuti</a></li>
                        <li><a href="karyawan/status-cuti-izin-karyawan.php" class="text-decoration-none px-3 py-2 d-block"><i class="fa-solid fa-bell"></i></i>
                                Status izin & Cuti</a></li>
                        <li><a href="karyawan/profil-karyawan.php" class="text-decoration-none px-3 py-2 d-block"><i class="fa-sharp fa-solid fa-book"></i>
                                Ringkasan Karyawan</a></li>
                        <li><a href="karyawan/status-data-izin-cuti.php" class="text-decoration-none px-3 py-2 d-block"><i class="fa-regular fa-calendar-check"></i>
                                Data Izin dan Cuti</a></li>
                        <hr class="h-color mx-2 ">

                        <a href="./profil.php" class=" btn btn-danger mb-2 py-2 d-block active"><i class="fa fa-gear"></i>
                            Accounts Settings</a>
                        <a href="../karyawan/logout.php" style="width: 202px;" class="btn btn-danger text-decoration-none ms-0 px-5 py-2 d-block"><i class="fa-sharp fa-solid fa-right-from-bracket"></i> Logout</a>
                    <?php } ?>

                    <?php if ($_SESSION['bagian'] == "Admin") { ?>
                        <!-- ADMIN FITUR -->
                        <li><a href="admin/admin-index.php" class="text-decoration-none px-3 py-2 d-block"><i class="fa-solid fa-house-circle-check"></i>
                                Dashboard</a></li>
                        <li><a href="admin/data.php" class="text-decoration-none px-3 py-2 d-block"><i class="fa fa-list"></i>
                                Data Karyawan</a></li>
                        <li><a href="admin/report-karyawan.php" class="text-decoration-none px-3 py-2 d-block"><i class="fa-sharp fa-solid fa-book"></i>
                                Report Karyawan</a></li>
                        <li><a href="admin/daftar-karyawan.php" class="text-decoration-none px-3 py-2 d-block"><i class="fa-solid fa-calendar-minus"></i>
                                Pendaftaran Karyawan</a></li>
                        <li><a href="admin/data-aplikasi.php" class="text-decoration-none px-3 py-2 d-block"><i class="fa-solid fa-calendar-minus"></i>
                                Daftar Aplikasi</a></li>
                        <hr class="h-color mx-2">
                        <a href="profil.php" class=" btn btn-danger mb-2 py-2 d-block active"><i class="fa fa-gear"></i>
                            Accounts Settings</a>
                        <a href="../karyawan/logout.php" style="width: 195px;" class="btn btn-danger text-decoration-none ms-0 px-5 py-2 d-block"><i class="fa-sharp fa-solid fa-right-from-bracket"></i> Logout</a>
                    <?php } ?>

                </ul>

            </div>
        </div>

        <!-- Content Start -->
        <div class="content mb-3">
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
            <!-- Profile Start -->
            <div class="container mt-1 justify-content-center" style="max-width: 850px;">
                <div class="row">
                    <div class="col-sm">
                        <div class="card">
                            <div class="m-auto mt-3 mb-2">
                                <i class="fa-solid fa-circle-user fa-6x"></i>
                            </div>
                            <h3 class="m-auto" style="text-transform: uppercase;">Profile</h3>
                            <div class="card-body">
                                <div class="container mt-4" style="max-width: 600px;">
                                    <!-- Nama Lengkap -->
                                    <?php
                                    $query = mysqli_query($con, "SELECT * FROM user WHERE idpegawai = '$_SESSION[idpegawai]'  ORDER BY idpegawai ");
                                    while ($row = mysqli_fetch_array($query)) :
                                    ?>
                                        <table class="table table-hover">
                                            <tbody>
                                                <tr style="cursor:pointer;" data-bs-toggle="modal" data-bs-target="#editusername">
                                                    <th scope="col">Username</th>
                                                    <td>:</td>
                                                    <td style="text-transform: uppercase;"><?= $row['username'] ?></td>
                                                </tr>
                                                <tr style="cursor:pointer;" data-bs-toggle="modal" data-bs-target="#editnama">
                                                    <th scope="col">Nama Lengkap</th>
                                                    <td>:</td>
                                                    <td style="text-transform: uppercase;"><?= $row['nama'] ?></td>
                                                </tr>
                                                <tr>
                                                    <th scope="col">Bagian</th>
                                                    <td>:</td>
                                                    <td style="text-transform: uppercase;"><?= $row['bagian'] ?></td>
                                                </tr>
                                                <tr>
                                                    <th scope="col">ID Pegawai</th>
                                                    <td>:</td>
                                                    <td style="text-transform: uppercase;"><?= $row['idpegawai'] ?></td>
                                                </tr>
                                                <tr style="cursor:pointer;" data-bs-toggle="modal" data-bs-target="#editps">
                                                    <th scope="col">Password</th>
                                                    <td>:</td>
                                                    <td style="text-transform: uppercase;">********</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    <?php endwhile; ?>
                                </div>
                                <!-- Tampilan Profile -->

                                <!-- Modal edit profil nama -->
                                <div class="modal fade" id="editnama" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="staticBackdropLabel">Edit Nama Lengkap</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" onclick="resetInput()"></button>
                                            </div>


                                            <form action="edit-profil_action.php" method="post">
                                                <div class="modal-body">

                                                    <?php
                                                    $query = mysqli_query($con, "SELECT * FROM user WHERE idpegawai = '$_SESSION[idpegawai]'  ORDER BY idpegawai ");
                                                    while ($row = mysqli_fetch_array($query)) {
                                                    ?>
                                                        <div class="row">
                                                            <div class="col-md">
                                                                <div class="mb-1">
                                                                    <label for="nama" class="form-label">Nama Lengkap</label>
                                                                    <input id="myinput" type="text" class="form-control" name="namalp" value="<?= $row['nama'] ?>" autocomplete="off" />

                                                                </div>
                                                            </div>
                                                        </div>


                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" onclick="resetInput()">Close
                                                            </button>
                                                            <button name="editnama" type="submit" class="btn btn-primary">Submit</button>
                                                        </div>
                                                    <?php } ?>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <!-- end modal edit nama -->

                                <!-- Modal edit profil Username -->
                                <div class="modal fade" id="editusername" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="staticBackdropLabel">Edit Username</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" onclick="resetInput()"></button>
                                            </div>
                                            <form action="edit-profil_action.php" method="post">
                                                <div class="modal-body">

                                                    <?php
                                                    $query = mysqli_query($con, "SELECT * FROM user WHERE idpegawai = '$_SESSION[idpegawai]'  ORDER BY idpegawai ");
                                                    while ($row = mysqli_fetch_array($query)) {
                                                    ?>
                                                        <div class="row">
                                                            <div class="col-md">
                                                                <div class="mb-1">
                                                                    <label for="nama" class="form-label">Username</label>
                                                                    <input id="myinputnm" onkeyup="checkInputnm()" type="text" class="form-control" name="username" value="<?= $row['username'] ?>" autocomplete="off" required />
                                                                    <p id="errorMsg"></p>
                                                                </div>
                                                            </div>
                                                        </div>


                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" onclick="resetInput()">Close
                                                            </button>
                                                            <button name="edituser" type="submit" class="btn btn-primary">Submit</button>
                                                        </div>
                                                    <?php } ?>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <!-- end modal edit username -->

                                <!-- Modal edit password -->
                                <div class="modal fade" id="editps" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="staticBackdropLabel">Edit Password</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" onclick="resetPass()"></button>
                                            </div>
                                            <form action="edit-profil_action.php" method="post">
                                                <div class="modal-body">
                                                    <?php
                                                    $query = mysqli_query($con, "SELECT * FROM user WHERE idpegawai = '$_SESSION[idpegawai]'  ORDER BY idpegawai ");
                                                    while ($row = mysqli_fetch_array($query)) {
                                                    ?>
                                                        <div class="row">
                                                            <div class="col-md">
                                                                <div class="mb-1">
                                                                    <label for="nama" class="form-label">Old Password</label>
                                                                    <input type="password" class="form-control" name="newpassword" id="inputPass3" value="<?= $row['password'] ?>" readonly>
                                                                </div>
                                                                <div class="mb-1">
                                                                    <input type="checkbox" class="form-check-input" id="show-pass3"> Tampilkan Password
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md">
                                                                <div class="mb-1">
                                                                    <label for="nama" class="form-label">New Password</label>
                                                                    <input type="password" class="form-control" name="newpassword" id="inputPass1" required>
                                                                </div>
                                                                <div class="mb-1">
                                                                    <input type="checkbox" class="form-check-input" id="show-pass1"> Tampilkan Password
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md">
                                                                <div class="mb-1">
                                                                    <label for="nama" class="form-label">Confirm Password</label>
                                                                    <input type="password" class="form-control" name="confirmpassword" id="inputPass2" required>
                                                                </div>
                                                                <div class="mb-1">
                                                                    <input type="checkbox" class="form-check-input" id="show-pass2"> Tampilkan Password
                                                                </div>

                                                            </div>
                                                        </div>


                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" onclick="resetPass()">Close</button>
                                                            <button name="editps" type="submit" class="btn btn-primary">Submit</button>


                                                        </div>
                                                    <?php } ?>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <!-- end modal edit password -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Profile END -->

            <?php
            if ($_SESSION['bagian'] == "Leader" || $_SESSION['bagian'] == "Karyawan") { ?>
                <!-- Data Profile Aplikasi Karyawan -->
                <div class="container mt-1" style="max-width: 1200px;">
                    <div class="row">
                        <div class="col-sm">
                            <div class="card">
                                <div class="card-body">
                                    <div class="container mt-4">
                                        <!-- Table Start -->
                                        <h4 style="text-transform: uppercase;float: left;"><?= $_SESSION['nama'] ?></h4>
                                        <!-- Button trigger modal -->
                                        <button type="button" class="btn btn-primary btn-tap mb-2" data-bs-toggle="modal" data-bs-target="#addApp">
                                            <i class="fa-solid fa-user-plus"></i>
                                        </button>
                                        <table class="table table-bordered table-sm">
                                            <thead class="table-danger">
                                                <tr>
                                                    <th>No</th>
                                                    <th>Id Pegawai</th>
                                                    <th>Nama Apliksi</th>
                                                    <th>Username</th>
                                                    <th>Last Update Password</th>
                                                    <th>Due Date Password</th>
                                                    <th>Url App</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $no = 1;
                                                $q1 = mysqli_query($con, "SELECT * FROM user WHERE idpegawai = '$_SESSION[idpegawai]'");
                                                while ($row1 = mysqli_fetch_array($q1)) :
                                                ?>
                                                    <?php
                                                    date_default_timezone_set('asia/jakarta');
                                                    $q2 = mysqli_query($con, "SELECT * FROM app WHERE idpegawai = '$row1[idpegawai]'");
                                                    while ($row2 = mysqli_fetch_array($q2)) :
                                                    ?>
                                                        <tr>

                                                            <td><?= $no++ ?></td>
                                                            <td><?= $row2['idpegawai'] ?></td>
                                                            <td><?= $row2['nama_aplikasi'] ?></td>
                                                            <td><?= $row2['username'] ?></td>
                                                            <td><?= $row2['curend_pass'] ?></td>
                                                            <?php
                                                            $d2 = strtotime($row2['due_pass']);
                                                            $d3 = strtotime(date('Y-m-d')); // Tanggal Sekarang

                                                            $hitung = $d2 - $d3;

                                                            $hari = $hitung / (60 * 60 * 24);

                                                            if ($hari <= 0) {
                                                            ?>
                                                                <td class="table-danger"><?= $row2['due_pass'] ?></td>
                                                            <?php } else if ($hari <= 7) { ?>
                                                                <td style="background-color: #F7DB6A;"><?= $row2['due_pass'] ?></td>
                                                            <?php } else { ?>
                                                                <td><?= $row2['due_pass'] ?></td>
                                                            <?php } ?>
                                                            <td><a href="<?= $row2['url'] ?>" target="_blank"><?= $row2['nama_aplikasi'] ?></a></td>

                                                            <td class="col-2 text-center">
                                                                <a href="#" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#editapp<?= $no ?>"><i class="fa-solid fa-pen"></i></a>
                                                                <a href="#" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#hapusapp<?= $no ?>"><i class="fa-solid fa-trash"></i></a>
                                                            </td>


                                                            <!-- Modal EditApp -->
                                                            <div class="modal fade" id="editapp<?= $no ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                                <div class="modal-dialog modal-dialog-centered">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <h5 class="modal-title" id="exampleModalLabel">Edit data</h5>
                                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                        </div>

                                                                        <form action="edit-profil_action.php" method="post">
                                                                            <div class="modal-body">
                                                                                <!-- Id App -->
                                                                                <div class="mb-3">
                                                                                    <input type="text" class="form-control" readonly name="idApp" value="<?= $row2['id'] ?>">
                                                                                </div>

                                                                                <!-- Nama Aplikasi -->
                                                                                <div class="row">
                                                                                    <div class="col-md">
                                                                                        <div class="mb-1">
                                                                                            <label for="nama" class="form-label">Nama Aplikasi</label>
                                                                                            <select type="text" class="form-control" name="appName" placeholder="Nama Aplikasi" autocomplete="off">
                                                                                                <option value="<?= $row2['nama_aplikasi'] ?> "><?= $row2['nama_aplikasi'] ?></option>
                                                                                                <?php
                                                                                                $q3 = mysqli_query($con, "SELECT * FROM aplikasi");
                                                                                                while ($row3 =  mysqli_fetch_array($q3)) :
                                                                                                ?>
                                                                                                    <option value="<?= $row3['nama_aplikasi'] ?> "><?= $row3['nama_aplikasi'] ?></option>
                                                                                                <?php endwhile; ?>
                                                                                            </select>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>

                                                                                <!-- Username -->
                                                                                <div class="row">
                                                                                    <div class="col-md">
                                                                                        <div class="mb-1">
                                                                                            <label for="nama" class="form-label">Username</label>
                                                                                            <input type="text" class="form-control" name="username" value="<?= $row2['username'] ?>" autocomplete="off" required>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>

                                                                                <!-- Date last change pass -->
                                                                                <div class="row">
                                                                                    <div class="col-md">
                                                                                        <div class="mb-1">
                                                                                            <label for="nama" class="form-label">Last Date Change Pass</label>
                                                                                            <input type="date" class="form-control" value="<?= $row2['curend_pass'] ?>" autocomplete="off" name="lastPass" required>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="modal-footer">
                                                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" onclick="resetdata()">Close
                                                                                </button>
                                                                                <button name="editData" type="submit" class="btn btn-primary">Submit</button>
                                                                            </div>
                                                                        </form>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!-- Modal EditApp END -->

                                                            <!-- Modal HapusApp -->
                                                            <div class="modal fade" id="hapusapp<?= $no ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                                <div class="modal-dialog modal-dialog-centered">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <h5 class="modal-title" id="exampleModalLabel">Hapus Data</h5>
                                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                        </div>

                                                                        <form action="edit-profil_action.php" method="POST">
                                                                            <div class="modal-body">
                                                                                <!-- Id App -->
                                                                                <div class="mb-3">
                                                                                    <input type="hidden" class="form-control" readonly name="idApp" value="<?= $row2['id'] ?>">
                                                                                    <h5 class="text-center">Nama Aplikasi : <span class="text-danger"><?= $row2['nama_aplikasi'] ?></span> </h5>
                                                                                </div>

                                                                            </div>

                                                                            <div class="modal-footer">
                                                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" onclick="resetdata()">Close
                                                                                </button>
                                                                                <button name="hapusData" type="submit" class="btn btn-primary">Submit</button>
                                                                            </div>
                                                                        </form>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!-- Modal HapusApp END -->
                                                        </tr>
                                                    <?php endwhile; // Tabel App
                                                    ?>

                                            </tbody>
                                        </table>
                                        <!-- Table END -->
                                    </div>

                                    <!-- Modal Create  Aplikasi  -->
                                    <div class="modal fade" id="addApp" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Tambah Data Nama Aplikasi</h1>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" onclick="resetInput()"></button>
                                                </div>
                                                <form action="edit-profil_action.php" method="post">
                                                    <div class="modal-body">

                                                        <!-- Nama Aplikasi -->
                                                        <div class="row">
                                                            <div class="col-md">
                                                                <div class="mb-1">
                                                                    <label for="nama" class="form-label">Nama Aplikasi</label>
                                                                    <select type="text" id="app" class="form-control" name="appName" placeholder="Nama Lengkap" autofocus autocomplete="off">
                                                                        <option value="">Nama Aplikasi</option>
                                                                        <?php
                                                                        $q3 = mysqli_query($con, "SELECT * FROM aplikasi");
                                                                        while ($row3 =  mysqli_fetch_array($q3)) :
                                                                        ?>
                                                                            <option value="<?= $row3['nama_aplikasi'] ?> "><?= $row3['nama_aplikasi'] ?></option>
                                                                        <?php endwhile; ?>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <!-- Username -->
                                                        <div class="row">
                                                            <div class="col-md">
                                                                <div class="mb-1">
                                                                    <label for="nama" class="form-label">Username</label>
                                                                    <input type="text" class="form-control" name="username" id="user" placeholder="Masukkan Username" autocomplete="off" required>
                                                                    <!-- idpegawau -->
                                                                    <input type="hidden" class="form-control" name="idpegawai" value="<?= $_SESSION['idpegawai'] ?>">
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <!-- Date last change pass -->
                                                        <div class="row">
                                                            <div class="col-md">
                                                                <div class="mb-1">
                                                                    <label for="nama" class="form-label">Last Date Change Pass</label>
                                                                    <input type="text" class="form-control" id="datepicker" placeholder="Masukkan Tanggal" autocomplete="off" name="lastPass" required>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" onclick="resetdata()">Close
                                                            </button>
                                                            <button name="createData" type="submit" class="btn btn-primary">Submit</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- end modal Create Applikasi -->
                                <?php endwhile; ?>
                                <!-- TAble User END -->
                                </div>
                                <!-- Card Body End -->
                            </div>
                            <!-- Card END -->
                        </div>
                    </div>
                </div>
                <!-- Data Profile Aplikasi Karyawan END -->
            <?php } ?>

        </div>
        <!-- Content End -->
    </div>
    <!-- Sidebar End -->

    <!-- My JS -->
    <script src="assets/js/script.js"></script>

    <script>
        // Show Password
        $(document).ready(function() {
            $('#show-pass1').click(function() {
                if ($(this).is(':checked')) {
                    $('#inputPass1').attr('type', 'text');
                } else {
                    $('#inputPass1').attr('type', 'password');
                }
            });
        });
        // Show Password
        $(document).ready(function() {
            $('#show-pass2').click(function() {
                if ($(this).is(':checked')) {
                    $('#inputPass2').attr('type', 'text');
                } else {
                    $('#inputPass2').attr('type', 'password');
                }
            });
        });
        // Show Password
        $(document).ready(function() {
            $('#show-pass3').click(function() {
                if ($(this).is(':checked')) {
                    $('#inputPass3').attr('type', 'text');
                } else {
                    $('#inputPass3').attr('type', 'password');
                }
            });
        });

        <?php
        $query = mysqli_query($con, "SELECT * FROM user WHERE idpegawai = '$_SESSION[idpegawai]'  ORDER BY idpegawai ");
        while ($row = mysqli_fetch_array($query)) {
        ?>

            function resetInput() {
                $('#myinput').val('<?= $row['nama'] ?>');
                $('#myinputnm').val('<?= $row['username'] ?>');

            }
        <?php
        }
        ?>

        function resetPass() {
            $('#inputPass1').val('');
            $('#inputPass2').val('');
        }

        function resetdata() {
            $('#app').val('');
            $('#user').val('');
            $('#datepicker').val('');
        }
    </script>


    <!-- DatePicker -->
    <script>
        $(function() {
            //Date picker
            $('#datepicker').datetimepicker({
                autoclose: true,
                timepicker: false,
                format: 'Y-m-d',
            });

            $('#datepicker2').datetimepicker({
                autoclose: true,
                timepicker: false,
                format: 'Y-m-d',
            });
        });
    </script>

    <script>
        function checkInputnm() {
            var input = document.getElementById("myinputnm").value;
            if (/\s/.test(input)) { // memeriksa jika input mengandung spasi
                document.getElementById("errorMsg").innerHTML = "Input tidak boleh mengandung spasi!";

            } else {
                document.getElementById("errorMsg").innerHTML = "";
            }
        }
    </script>

    <!-- Boostrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>

</html>