<?php
session_start();
include('../koneksi.php');
if (!isset($_SESSION['username'])) {
    header("Location: ../login.php");
}
$nama = $_SESSION['nama'];
$bagian = $_SESSION['bagian'];

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DAMANSI | Cuti</title>

    <link rel="icon" href="../assets/img/logo.png">

    <!-- Boostrap Css-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous" />
    <!-- CSS -->
    <link rel="stylesheet" href="../assets/css/style2.css">

    <style>
        body {
            background: #eee;
            font-family: Calibri;
        }
    </style>

    <!-- font awosome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />

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
                <h4 class="text-center text-white fw-bold mt-3"><?php echo $nama ?></h4>
                <h5 class="text-center  mt-3"><?php echo $bagian ?></h5>

                <ul class="list-unstyled px-3 py-4">
                    <!-- Karyawan Fitur -->
                    <?php if ($bagian == "Karyawan") { ?>
                        <li><a href="karyawan-index.php" class="text-decoration-none px-3 py-2 d-block"><i class="fa-solid fa-house-circle-check"></i>
                                Dashboard</a></li>
                        <li><a href="presensi.php" class="text-decoration-none px-3 py-2 d-block"><i class="fa fa-list"></i>
                                Presensi</a></li>
                        <li><a href="izin.php" class="text-decoration-none px-3 py-2 d-block"><i class="fa-solid fa-calendar-days"></i>
                                Pengajuan Izin</a></li>
                        <li class="active"><a href="cuti.php" class="text-decoration-none px-3 py-2 d-block"><i class="fa-solid fa-calendar-minus"></i>
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
                    <?php if ($bagian == "Leader") { ?>
                        <li><a href="karyawan-index.php" class="text-decoration-none px-3 py-2 d-block"><i class="fa-solid fa-house-circle-check"></i>
                                Dashboard</a></li>
                        <li><a href="presensi.php" class="text-decoration-none px-3 py-2 d-block"><i class="fa fa-list"></i>
                                Presensi</a></li>
                        <li><a href="izin.php" class="text-decoration-none px-3 py-2 d-block"><i class="fa-solid fa-calendar-days"></i>
                                Pengajuan Izin</a></li>
                        <li class="active"><a href="cuti.php" class="text-decoration-none px-3 py-2 d-block"><i class="fa-solid fa-calendar-minus"></i>
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

            <!-- Form Start -->
            <form action="cuti-izin-action.php?a=C" method="post">
                <div class="container mt-2" style="width: fit-content;">
                    <div class=" card">
                        <img src="../assets/img/logo.png" alt="ini adalah logo" class="m-auto" style="width:30%;">
                        <h3 class="m-auto">Pengajuan Cuti</h3>
                        <div class="card-body">
                            <!-- Nama Lengkap -->
                            <div class="row">
                                <div class="col-md">
                                    <div class="mb-1">
                                        <label for="nama" class="form-label">Nama
                                            Lengkap</label>

                                        <input type="text" class="form-control" id="nama" readonly value="<?= $nama ?>" />


                                        <input type="hidden" class="form-control" id="nama" readonly <?php echo "value = $_SESSION[idpegawai]" ?> />
                                    </div>
                                    <!-- Keterangan -->
                                    <div class="mb-2">
                                        <label for="keterangan" class="form-label">Keterangan</label>
                                        <input type="text" class="form-control" name="keterangan" value="Cuti" readonly />
                                    </div>
                                </div>
                            </div>

                            <!-- Jam Izin -->
                            <div class="container border border-dark mb-2 rounded">
                                <div class="row">
                                    <div class="col-md">
                                        <div class="mb-2">
                                            <h5 for="" class="form-label">Tanggal Cuti</h5>
                                            <div class="row mb-md-3">
                                                <div class="col-md-4">
                                                    <label for="">Mulai</label>
                                                </div>
                                                <div class="col">
                                                    <input type="text" placeholder="Tanggal Mulai" class="form-control" name="mulai" id="dmulai" autocomplete="off" required>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <label for="">Selesai</label>
                                                </div>
                                                <div class="col">
                                                    <input type="text" placeholder="Tanggal Selesai" class="form-control" name="selesai" autocomplete="off" id="dselesai" required>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <!-- Alasan -->
                            <div class="row mb-3">
                                <div class="col-md">
                                    <div class="form-floating">
                                        <textarea class="form-control" placeholder="Leave a comment here" name="alasan" id="floatingTextarea2" style="height: 100px" required></textarea>
                                        <label for="floatingTextarea2">Alasan Cuti</label>
                                    </div>
                                </div>
                            </div>

                            <div class="d-grid gap-2 ">
                                <button name="submit" class="btn btn-danger" type="submit">Submit</button>
                            </div>
                        </div>
                    </div>
                </div>

            </form>
            <!-- Form End -->
        </div>
        <!-- Content End -->
    </div>
    <!-- Sidebar End -->


    <!-- My JS -->
    <script src="../assets/js/script.js"></script>

    <!-- Boostrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>

    <script>
        $(function() {
            //Date picker
            $('#dmulai').datetimepicker({
                autoclose: true,
                timepicker: false,
                format: 'Y-m-d',
                onChangeDateTime: function(dp, $input) {
                    // saat tanggal awal diubah, batasi tanggal selesai tidak kurang dari tanggal awal
                    $('#dselesai').datetimepicker({
                        minDate: $input.val()
                    });
                }
            });
            $('#dselesai').datetimepicker({
                autoclose: true,
                timepicker: false,
                format: 'Y-m-d'
            });
        });
    </script>

</body>

</html>