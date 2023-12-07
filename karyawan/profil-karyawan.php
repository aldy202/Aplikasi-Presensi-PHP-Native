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
                <h4 class="text-center text-white fw-bold mt-3"><?php echo $_SESSION['nama'] ?></h4>
                <h5 class="text-center mt-3"><?php echo $level ?></h5>

                <ul class="list-unstyled px-3 py-4">
                    <!-- Leader FITUR -->
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
                    <li class="active"><a href="profil-karyawan.php" class="text-decoration-none px-3 py-2 d-block"><i class="fa-sharp fa-solid fa-book"></i>
                            Ringkasan Karyawan</a></li>
                    <li><a href="status-data-izin-cuti.php" class="text-decoration-none px-3 py-2 d-block"><i class="fa-regular fa-calendar-check"></i>
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
                <a href="profil-karyawan.php" class="tab-links active-link" style="text-decoration: none;">
                    Profil Karyawan
                </a>
                <a href="ringkasan-presensi-karyawan.php" class="tab-links" style="text-decoration: none;">
                    Ringkasan Presensi
                </a>
                <a href="ringkasan-cuti-karyawan.php" class="tab-links" style="text-decoration: none;">
                    Ringkasan Cuti
                </a>
                <a href="ringkasan-izin-karyawan.php" class="tab-links" style="text-decoration: none;">
                    Ringkasan Izin
                </a>
            </div>
            <!-- Begin Page Content -->
            <div class="tab-contents active-tab" id="profil">
                <table class="table table-bordered table-hover">
                    <thead class="table-danger">
                        <tr>
                            <th>No</th>
                            <th>ID Pegawai</th>
                            <th>Nama Lengkap</th>
                            <th>Bagian</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        $tampil = mysqli_query($con, "SELECT * FROM user WHERE bagian != 'Admin' ORDER BY idpegawai");
                        while ($data =  mysqli_fetch_array($tampil)) :
                        ?>


                            <tr>
                                <td><?= $no++ ?></td>
                                <td> <a style="text-decoration: none; color: red;font-weight: bold;" href="data-aplikasi-karyawan.php?id=<?= $data['idpegawai'] ?>"><?= $data['idpegawai'] ?></a> </td>
                                <td><?= $data['nama'] ?></td>
                                <td><?= $data['bagian'] ?></td>
                            </tr>
                        <?php endwhile; // Table User
                        ?>
                    </tbody>
                </table>
            </div>
            <!-- /.container-fluid -->


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


    <!-- Custom scripts for all pages-->
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