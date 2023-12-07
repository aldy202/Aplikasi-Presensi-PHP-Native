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
                    <li><a href="data.php" class="text-decoration-none px-3 py-2 d-block"><i class="fa fa-list"></i>
                            Data Karyawan</a></li>
                    <li><a href="report-karyawan.php" class="text-decoration-none px-3 py-2 d-block"><i class="fa-sharp fa-solid fa-book"></i>
                            Report Karyawan</a></li>
                    <li><a href="daftar-karyawan.php" class="text-decoration-none px-3 py-2 d-block"><i class="fa-solid fa-calendar-minus"></i>
                            Pendaftaran Karyawan</a></li>
                    <li class="active"><a href="data-aplikasi.php" class="text-decoration-none px-3 py-2 d-block"><i class="fa-solid fa-calendar-minus"></i>
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


            <div class="d-flex">
                <div class="content">
                    <div class="tab-titles">
                        <p class="tab-links">Pendaftaran Aplikasi</p>
                    </div>

                    <div class="tab-contents active-tab">
                        <div class="card">
                            <div class="card-header py-3">
                                <button type="button" class="btn btn-primary btn-tap" data-bs-toggle="modal" data-bs-target="#app">
                                    <i class="fa-solid fa-user-plus"></i>
                                </button>
                            </div>

                            <div class="card-body">
                                <div class="modal fade" id="app" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="app"></i>Tambah data aplikasi</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>

                                            <form action="aksi-crud-admin.php" method="POST">
                                                <div class="modal-body">
                                                    <div class="mb-3">
                                                        <label for="appname" class="col-form-label">Nama Aplikasi</label>
                                                        <input type="text" class="form-control" name="napp" placeholder="Nama Aplikasi" onkeyup="this.value = this.value.toUpperCase();" required>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="akapp" class="col-form-label">Masa Aktif Aplikasi</label>
                                                        <input type="number" class="form-control" name="akapp" placeholder="Masa Aktif Aplikasi" required>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="alamat" class="col-form-label">Alamat Aplikasi</label>
                                                        <input type="text" class="form-control" name="talamat" placeholder="Nama Aplikasi" required>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-primary" name="appsimpan">Save changes</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>


                                <table class="table table-bordered table-striped table-hover">
                                    <thead class="table-danger">
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Aplikasi</th>
                                            <th>Masa Aktif</th>
                                            <th>Alamat Aplikasi</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $batas = 6;
                                        $halaman = isset($_GET['halaman']) ? (int)$_GET['halaman'] : 1;
                                        $halaman_awal = ($halaman > 1) ? ($halaman * $batas) - $batas : 0;

                                        $Previous = $halaman - 1;
                                        $next = $halaman + 1;

                                        $data2 = mysqli_query($con, "SELECT * FROM aplikasi");
                                        $jumlaj_data = mysqli_num_rows($data2);
                                        $total_halaman = ceil($jumlaj_data / $batas);

                                        $no = $halaman_awal + 1;
                                        $tampil = mysqli_query($con, "SELECT * FROM aplikasi LIMIT $halaman_awal,$batas");
                                        while ($data =  mysqli_fetch_array($tampil)) :
                                        ?>
                                            <tr>
                                                <td class="col-sm-1"><?= $no++ ?></td>
                                                <td class="col-sm-2"><?= $data['nama_aplikasi'] ?></td>
                                                <td class="col-sm-2"><?= $data['masa_aktif'] ?> Hari</td>
                                                <td><a href="<?= $data['alamat_aplikasi'] ?>" target="_blank"><?= $data['nama_aplikasi'] ?></a></td>
                                                <td class="col-2 text-center">
                                                    <a href="#" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#editapp<?= $no ?>"><i class="fa-solid fa-pen"></i></a>
                                                    <a href="#" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#hapusapp<?= $no ?>"><i class="fa-solid fa-trash"></i></a>
                                                </td>
                                            </tr>

                                            <div class="modal fade" id="editapp<?= $no ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Edit data</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>

                                                        <form action="aksi-crud-admin.php" method="POST">
                                                            <div class="modal-body">
                                                                <div class="mb-3">
                                                                    <input type="text" class="form-control" readonly name="id_editapp" value="<?= $data['id'] ?>">
                                                                </div>

                                                                <div class="mb-3">
                                                                    <label for="nama_aplikasi" class="col-form-label">Nama Aplikasi</label>
                                                                    <input type="text" class="form-control" name="nmapp" placeholder="Nama Aplikasi" value="<?= $data['nama_aplikasi'] ?>" required>
                                                                </div>
                                                                <div class="mb-3">
                                                                    <label for="masa aktif" class="col-form-label">Masa Aktif Aplikasi</label>
                                                                    <input type="number" class="form-control" name="mtapp" placeholder="Masa Aktif Aplikasi" value="<?= $data['masa_aktif'] ?>" required>
                                                                </div>
                                                                <div class="mb-3">
                                                                    <label for="nama_aplikasi" class="col-form-label">Alamat Aplikasi</label>
                                                                    <input type="text" class="form-control" name="urlapp" placeholder="Alamat Aplikasi" value="<?= $data['alamat_aplikasi'] ?>" required>
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                                <button type="submit" class="btn btn-primary" name="editapp">Edit Data</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="modal fade" id="hapusapp<?= $no ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Hapus Data Aplikasi</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>

                                                        <form action="aksi-crud-admin.php" method="POST">
                                                            <div class="modal-body">
                                                                <span>
                                                                    <input type="hidden" name="id" class="form-control border-0" value="<?= $data['id'] ?>" readonly>
                                                                </span>
                                                                
                                                                <h5 class="text-center">Nama Aplikasi : <span class="text-danger"><?= $data['nama_aplikasi'] ?></span> </h5>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                                <button type="submit" class="btn btn-primary" name="apphapus">Hapus Data</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php endwhile; ?>
                                    </tbody>
                                </table>
                                
                                <nav>
                                    <ul class="pagination justify-content-center">
                                        <li class="page-item">
                                            <a class="page-link" <?php if ($halaman > 1) {
                                                                        echo "href='?halaman=$Previous'";
                                                                    } ?>>Previous</a>
                                        </li>
                                        <?php
                                        for ($x = 1; $x <= $total_halaman; $x++) {
                                        ?>
                                            <li class="page-item"><a class="page-link" href="?halaman=<?php echo $x ?>"><?php echo $x; ?></a></li>
                                        <?php
                                        }
                                        ?>
                                        <li class="page-item">
                                            <a class="page-link" <?php if ($halaman < $total_halaman) {
                                                                        echo "href='?halaman=$next'";
                                                                    } ?>>Next</a>
                                        </li>
                                    </ul>
                                </nav>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- My JS -->
    <script src="../assets/js/script.js"></script>
    <!-- Boostrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>

</html>