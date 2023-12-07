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
    <!-- JQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-datetimepicker/2.5.20/jquery.datetimepicker.full.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-datetimepicker/2.5.20/jquery.datetimepicker.min.css" />

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
                    <li><a href="data.php" class="text-decoration-none px-3 py-2 d-block"><i class="fa fa-list"></i>
                            Data Karyawan</a></li>
                    <li class="active"><a href="report-karyawan.php" class="text-decoration-none px-3 py-2 d-block"><i class="fa-sharp fa-solid fa-book"></i>
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
                <a href="report-karyawan.php" style="text-decoration: none;" class="tab-links active-link">
                    Report Karyawan
                </a>
                <a href="report-presensi.php" style="text-decoration: none;" class="tab-links">
                    Ringkasan Presensi
                </a>
                <a href="report-cuti.php" style="text-decoration: none;" class="tab-links">
                    Ringkasan Cuti
                </a>
                <a href="report-izin.php" style="text-decoration: none;" class="tab-links ">
                    Ringkasan Izin
                </a>
            </div>

            <!-- Report Karyawan -->
            <div class="container-fluid" id="Rpresensi">
                <div class="card">
                    <div class="card-header">
                        <form action="" method="post">
                            <div class="form-group form-row">
                                <div class="row">
                                    <div class="col">
                                        <input type="text" name="tgl1" class="form-control" id="datepicker" placeholder="Dari" readonly required>
                                    </div>
                                    <div class="col">
                                        <div class="input-group">
                                            <input type="text" name="tgl2" class="form-control" id="datepicker1" placeholder="Sampai" readonly required>
                                            <div class="input-group-append">
                                                <button type="submit" name="proses" class="btn btn-primary">Proses</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </form>
                    </div>
                    <?php
                    if (isset($_POST['proses'])) {
                        $tgl1 = $_POST['tgl1'];
                        $tgl2 = $_POST['tgl2'];
                    ?>
                        <div class="card-body">
                            <table class="table table-bordered table-sm">
                                <thead class="table-danger">
                                    <tr>
                                        <td colspan="9" align="center">
                                            <h5 class="m-0 font-weight-bold text-primary text-center">
                                                Laporan Data Karyawan Dari <?php echo $tgl1 ?> s/d <?php echo $tgl2 ?>
                                            </h5>
                                        </td>
                                    </tr>
                                    <tr>

                                        <th>No</th>
                                        <th>Nama</th>
                                        <th>ID Pegawai</th>
                                        <th>Total Presensi</th>
                                        <th>Total Izin</th>
                                        <th>Total Cuti</th>
                                        <th>Total Lama Cuti</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $query = mysqli_query($con, "SELECT * FROM user WHERE bagian != 'Admin'");
                                    $no = 1;
                                    foreach ($query as $row) :
                                    ?>

                                        <tr>
                                            <td><?= $no++; ?></td>
                                            <td><?= $row['nama']; ?></td>
                                            <td><?= $row['idpegawai']; ?></td>
                                            <!-- Total Presensi -->
                                            <?php
                                            $q = mysqli_query($con, "SELECT COUNT(idpegawai) AS total_absen FROM absensi WHERE tgl_absen  BETWEEN '$tgl1' AND '$tgl2' AND idpegawai = '$row[idpegawai]' ORDER BY tgl_absen");
                                            foreach ($q as $data) :
                                            ?>
                                                <td><?= $data['total_absen']; ?> kali</td>
                                            <?php endforeach; ?>
                                            <!-- Total Izin -->
                                            <?php
                                            $q3 = mysqli_query($con, "SELECT COUNT(idpegawai) AS total_izin FROM izin WHERE tgl_mulai BETWEEN '$tgl1' AND '$tgl2' AND idpegawai = '$row[idpegawai]' AND status ='Y' ORDER BY tgl_mulai");
                                            foreach ($q3 as $data3) :
                                            ?>
                                                <td><?= $data3['total_izin'] ?> kali</td>
                                            <?php endforeach; ?>
                                            <!-- Total Cuti -->
                                            <?php
                                            $q2 = mysqli_query($con, "SELECT COUNT(idpegawai) AS total_cuti,SUM(lama) AS jumlah FROM cuti WHERE dari BETWEEN '$tgl1' AND '$tgl2' AND idpegawai = '$row[idpegawai]' AND status ='Y'");
                                            foreach ($q2 as $data2) :
                                            ?>
                                                <td><?= $data2['total_cuti']; ?> kali</td>
                                                <?php
                                                if (isset($data2['jumlah']) != 0) {
                                                ?>
                                                    <td><?= $data2['jumlah']; ?> hari</td>
                                                <?php } else { ?>
                                                    <td>0 hari</td>
                                                <?php } ?>
                                            <?php endforeach; ?>
                                        </tr>
                                    <?php endforeach; ?>

                                </tbody>
                            </table>
                            <a href="report-csv.php?a=K&&t1=<?= $tgl1 ?>&&t2=<?= $tgl2 ?>" class="btn btn-sm btn-success">Export CSV</a>
                        </div>
                    <?php } else { ?>
                        <div class="card-body">
                            <table class="table table-bordered table-sm">
                                <thead class="table-danger">
                                    <tr>
                                        <th>No</th>
                                        <th>Nama</th>
                                        <th>ID Pegawai</th>
                                        <th>Total Presensi</th>
                                        <th>Total Izin</th>
                                        <th>Total Cuti</th>
                                        <th>Total Lama Cuti</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $query = mysqli_query($con, "SELECT * FROM user WHERE bagian != 'Admin'");
                                    $no = 1;
                                    foreach ($query as $row) :
                                    ?>

                                        <tr>
                                            <td><?= $no++; ?></td>
                                            <td><?= $row['nama']; ?></td>
                                            <td><?= $row['idpegawai']; ?></td>
                                            <!-- Total Presensi -->
                                            <?php
                                            $q = mysqli_query($con, "SELECT COUNT(idpegawai) AS total_absen FROM absensi WHERE idpegawai = '$row[idpegawai]'");
                                            foreach ($q as $data) :
                                            ?>
                                                <td><?= $data['total_absen']; ?> kali</td>
                                            <?php endforeach; ?>
                                            <!-- Total Izin -->
                                            <?php
                                            $q3 = mysqli_query($con, "SELECT COUNT(idpegawai) AS total_izin FROM izin WHERE idpegawai = '$row[idpegawai]' AND status ='Y' ORDER BY tgl_mulai");
                                            foreach ($q3 as $data3) :
                                            ?>
                                                <td><?= $data3['total_izin'] ?> kali</td>
                                            <?php endforeach; ?>
                                            <!-- Total Cuti -->
                                            <?php
                                            $q2 = mysqli_query($con, "SELECT COUNT(idpegawai) AS total_cuti, SUM(lama) AS jumlah_lama FROM cuti WHERE idpegawai = '$row[idpegawai]' AND status ='Y'");
                                            foreach ($q2 as $data2) :
                                            ?>
                                                <td><?= $data2['total_cuti']; ?> kali</td>
                                                <?php
                                                if (isset($data2['jumlah_lama']) != 0) {
                                                ?>
                                                    <td><?= $data2['jumlah_lama']; ?> hari</td>
                                                <?php } else { ?>
                                                    <td>0 hari</td>
                                                <?php } ?>
                                            <?php endforeach; ?>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    <?php } ?>
                </div>
            </div>
            <!-- End report karyawan -->
        </div>
        <!-- Content End -->

    </div>
    <!-- My JS -->
    <script src="../assets/js/script.js"></script>
    <script>
        // Slide Effect
        var tablinks = document.getElementsByClassName("tab-links");
        var tabcontents = document.getElementsByClassName("tab-contents");

        function opentab(tabname) {
            for (tablink of tablinks) {
                tablink.classList.remove("active-link");
            }
            for (tabcontent of tabcontents) {
                tabcontent.classList.remove("active-tab");
            }
            event.currentTarget.classList.add("active-link");
            document.getElementById(tabname).classList.add("active-tab");
        }
    </script>

    <!-- Boostrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>

    <script>
        $(function() {
            //Date picker
            $('#datepicker').datetimepicker({
                autoclose: true,
                timepicker: false,
                format: 'Y-m-d',
                onChangeDateTime: function(dp, $input) {
                    // saat tanggal awal diubah, batasi tanggal selesai tidak kurang dari tanggal awal
                    $('#datepicker1').datetimepicker({
                        minDate: $input.val()
                    });
                }
            });
            $('#datepicker1').datetimepicker({
                autoclose: true,
                timepicker: false,
                format: 'Y-m-d'
            });
        });
    </script>
</body>

</html>