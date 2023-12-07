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
    <!-- Admin CSS -->
    <link rel="stylesheet" href="../assets/css/admin.css">
    <!-- Boostrap Css-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous" />
    <!-- font awosome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" />
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
                    <li><a href="data.php" class="text-decoration-none px-3 py-2 d-block"><i class="fa fa-list"></i>
                            Data Karyawan</a></li>
                    <li><a href="report-karyawan.php" class="text-decoration-none px-3 py-2 d-block"><i class="fa-sharp fa-solid fa-book"></i>
                            Report Karyawan</a></li>
                    <li class="active"><a href="daftar-karyawan.php" class="text-decoration-none px-3 py-2 d-block"><i class="fa-solid fa-calendar-minus"></i>
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
            <!-- side bar start -->
            <div class=" d-flex">
                <div class="content ">
                    <div class="tab-titles">
                        <p class="tab-links"><a href="daftar-karyawan.php" style="text-decoration: none;">Pendaftaran Karyawan</a></p>
                        <p class="tab-links active-link"><a href="daftar-kuota-cuti.php" style="text-decoration: none;">Pendaftaran Kuota Cuti</a></p>
                    </div>



                    <div class="tab-contents active-tab">
                        <div class="card">
                            <div class=" card-header py-3">
                                <h5 class="card-title">Halaman kuota cuti</h5>
                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-primary btn-tap" data-bs-toggle="modal" data-bs-target="#modalkuota">
                                    <i class="fa-solid fa-user-plus"></i>
                                </button>
                            </div>
                            <div class="card-body">
                                <!-- Modal jatah cuti -->
                                <div class="modal fade" id="modalkuota" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="modalkuota"></i>Tambah data</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <!-- Form Create Start -->
                                            <form method="POST" action="jumlah-cuti.php">
                                                <div class="modal-body">
                                                    <div class="mb-3">
                                                        <label for="nama" class="col-form-label">Nama Lengkap</label>
                                                        <select type="text" class="form-control" name="tname" placeholder="Nama Lengkap">
                                                            <option value="">Nama Lengkap</option>
                                                            <?php
                                                            $tampil = mysqli_query($con, "SELECT * FROM user WHERE bagian != 'Admin' ORDER BY idpegawai");
                                                            while ($row =  mysqli_fetch_array($tampil)) :
                                                            ?>
                                                                <option value="<?= $row['idpegawai'] ?> "><?= $row['nama'] ?></option>
                                                            <?php endwhile; ?>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-primary" name="simpan">Save changes</button>
                                                </div>
                                            </form>

                                            <!-- Form Create End -->
                                        </div>
                                    </div>
                                </div>
                                <!-- End Modal Set jatah cuti -->
                                <!-- start tabel jatah cuti -->
                                <table class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Karyawan</th>
                                            <th>Jumlah</th>
                                            <th>Tahun Berlaku</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $y = date('Y');
                                        $query = mysqli_query($con, "SELECT * FROM jumlah_cuti JOIN user ON jumlah_cuti.idpegawai = user.idpegawai  WHERE tahun_berlaku ='$y'");
                                        $no = 1;
                                        while ($data = mysqli_fetch_array($query)) {
                                        ?>
                                            <tr>
                                                <td><?= $no++ ?></td>
                                                <td><?= $data['nama'] ?></td>
                                                <td><?= $data['jumlah'] ?></td>
                                                <td><?= $data['tahun_berlaku'] ?></td>
                                                <td class="col-2 text-center">
                                                    <a href="#" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#modalEdit<?= $no ?>"><i class="fa-solid fa-pen"></i></a>
                                                    <a href="#" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#modalCutiHapus<?= $no ?>"><i class="fa-solid fa-trash"></i></a>
                                                </td>
                                            </tr>

                                            <!-- start form edit kuota cuti -->
                                            <div class="modal fade" id="modalEdit<?= $no ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="modalEdit">Edit Kuota Cuti</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <!-- Form Edit -->
                                                        <form method="POST" action="jumlah-cuti.php">
                                                            <input type="hidden" name="id" value="<?= $data['id'] ?>">
                                                            <div class="modal-body">
                                                                <input type="text" class="form-control" name="tname" placeholder="Nama Lengkap" readonly value="<?= $data['nama'] ?>">

                                                                <div class="mb-3">
                                                                    <label for="password" class="col-form-label">Jumlah Cuti</label>
                                                                    <input type="text" class="form-control" name="tjumlah" placeholder="jumlah" value="<?= $data['jumlah'] ?>" id="jumlah">
                                                                </div>



                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                                <button type="submit" class="btn btn-primary" name="edit">Edit Data</button>
                                                            </div>
                                                        </form>
                                                        <!-- Form Edit End -->
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- end form edit kuota cuti -->



                                            <!-- start modal delete kuota cuti -->
                                            <div class="modal fade" id="modalCutiHapus<?= $no ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="modalCutiHapus">Hapus data anda</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <!-- Form Delete Start -->
                                                        <form method="POST" action="jumlah-cuti.php">
                                                            <input type="hidden" name="id" value="<?= $data['id'] ?>">
                                                            <div class="modal-body">

                                                                <h5 class="text-center">Apakah anda ingin hapus data ? <br>
                                                                    <span class="text-danger"><?= $data['nama'] ?></span>
                                                                </h5>


                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                                <button type="submit" class="btn btn-primary" name="hapus">Hapus Data</button>
                                                            </div>
                                                        </form>
                                                        <!-- Form Delete End kuota cuti-->
                                                    </div>
                                                </div>
                                            </div>
                                        <?php } ?>


                                    </tbody>
                                </table>

                            </div>
                        </div>
                    </div>



                </div>
            </div>


            <!-- Penambahan kuota cuti -->

        </div>

    </div>
    </div>
    </div>
    <!-- My JS -->
    <script>
        // Show Password
        $(document).ready(function() {
            $('#show').click(function() {
                if ($(this).is(':checked')) {
                    $('#edit').attr('type', 'text');
                } else {
                    $('#edit').attr('type', 'password');
                }
            });
        });
    </script>
    <script src="../assets/js/script.js"></script>

    <!-- Boostrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>

</html>