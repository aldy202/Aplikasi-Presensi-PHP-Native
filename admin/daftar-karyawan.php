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
                        <a class="tab-links active-link" href="daftar-karyawan.php" style="text-decoration: none;">Pendaftaran Karyawan</a>
                        <a class="tab-links" href="daftar-kuota-cuti.php" style="text-decoration: none;">Pendaftaran Kuota Cuti</a>
                    </div>

                    <div class="tab-contents active-tab" id="daftar">
                        <div class="card">
                            <div class=" card-header py-3">
                                <h5 class="card-title">Halaman pendaftaran karyawan</h5>
                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-primary btn-tap" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                    <i class="fa-solid fa-user-plus"></i>
                                </button>
                            </div>
                            <div class="card-body">

                                <!-- Modal -->
                                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel"></i>Tambah data</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <!-- Form Create Start -->
                                            <form method="POST" action="aksi-crud-admin.php">
                                                <div class="modal-body">

                                                    <div class="mb-3">
                                                        <label for="">NP</label>
                                                        <?php
                                                        $qn = mysqli_query($con, "SELECT max(idpegawai) AS max_code FROM user");
                                                        $dn = mysqli_fetch_array($qn);
                                                        $a = $dn['max_code'];
                                                        $urut = (int)substr($a, 2, 2);
                                                        $urut++;
                                                        $id = "NP" . sprintf("%02s", $urut);
                                                        ?>
                                                        <input type="text" class="form-control" name="nip" value="<?= $id ?>" required readonly>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="username" class="col-form-label">Username</label>
                                                        <input type="text" class="form-control" name="tusername" pattern="[^\s]+" title="Username tidak boleh mengandung spasi" placeholder="Username" required>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="id" class="col-form-label">Nama Lengkap</label>
                                                        <input type="text" class="form-control" name="tnama" placeholder="Nama Lengkap" required>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="password" class="col-form-label">Password</label>

                                                        <input type="password" class="form-control" name="tpassword" placeholder="Password" id="inputPassword" required>

                                                    </div>
                                                    <div class="mb-3">
                                                        <input type="checkbox" class="form-check-input" id="show-password"> Tampilkan Password
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="tbagian" class="col-form-label">Bagian</label>
                                                        <select class="form-select" name="tbagian" aria-label="Example select with button addon" required>
                                                            <option value="">Bagian..</option>
                                                            <option value="Karyawan">Karyawan</option>
                                                            <option value="Leader">Leader</option>
                                                            <option value="Admin">Admin</option>
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
                                <!-- akhir modal -->

                                <!-- Table User -->
                                <table class="table table-bordered table-striped">
                                    <thead class="table-danger">
                                        <tr>
                                            <th>No</th>
                                            <th>Nomer Pegawai</th>
                                            <th>Username</th>
                                            <th>Nama Lengkap</th>
                                            <th>Password</th>
                                            <th>Bagian</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $no = 1;
                                        $tampil = mysqli_query($con, "SELECT * FROM user ORDER BY idpegawai");
                                        while ($data =  mysqli_fetch_array($tampil)) :
                                        ?>
                                            <tr>
                                                <td><?= $no++ ?></td>
                                                <td><?= $data['idpegawai'] ?></td>
                                                <td><?= $data['username'] ?></td>
                                                <td><?= $data['nama'] ?></td>
                                                <td>******</td>
                                                <td><?= $data['bagian'] ?></td>
                                                <td class="col-2 text-center">
                                                    <a href="#" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#modalUbah<?= $no ?>"><i class="fa-solid fa-pen"></i></a>
                                                    <a href="#" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#modalHapus<?= $no ?>"><i class="fa-solid fa-trash"></i></a>
                                                </td>
                                            </tr>

                                            <!-- modal edit -->

                                            <div class="modal fade" id="modalUbah<?= $no ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Edit data</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <!-- Form Edit -->
                                                        <form method="POST" action="aksi-crud-admin.php">

                                                            <div class="modal-body">
                                                                <div class="mb-3">
                                                                    <input type="text" class="form-control" readonly name="id_registrasi" value="<?= $data['idpegawai'] ?>">
                                                                </div>

                                                                <div class="mb-3">
                                                                    <label for="username" class="col-form-label">Username</label>
                                                                    <input type="text" class="form-control" name="tusername" pattern="[^\s]+" placeholder="Username" value="<?= $data['username'] ?>" required>
                                                                </div>

                                                                <div class="mb-3">
                                                                    <label for="nama" class="col-form-label">Nama Lengkap</label>
                                                                    <input type="text" class="form-control" name="tnama" placeholder="Nama Lengkap" value="<?= $data['nama'] ?>" required>
                                                                </div>

                                                                <div class="mb-3">
                                                                    <label for="password" class="col-form-label">Password</label>
                                                                    <input type="text" class="form-control" id="edit" name="tpassword" value="<?= $data['password'] ?>" required>
                                                                </div>

                                                                <div class="mb-3">
                                                                    <label for="tbagian" class="col-form-label">Bagian</label>
                                                                    <select class="form-select" name="tbagian" aria-label="Example select with button addon" required>
                                                                        <?php if ($data['bagian'] == "Karyawan") { ?>
                                                                            <option value="<?= $data['bagian'] ?>"><?= $data['bagian'] ?></option>
                                                                            <option value="Leader">Leader</option>
                                                                        <?php } ?>
                                                                        <?php if ($data['bagian'] == "Leader") { ?>
                                                                            <option value="<?= $data['bagian'] ?>"><?= $data['bagian'] ?></option>
                                                                            <option value="Karyawan">Karyawan</option>
                                                                        <?php } ?>
                                                                        <?php if ($data['bagian'] == "Admin") { ?>
                                                                            <option value="<?= $data['bagian'] ?>"><?= $data['bagian'] ?></option>
                                                                            <option value="Karyawan">Karyawan</option>
                                                                            <option value="Leader">Leader</option>
                                                                        <?php } ?>
                                                                    </select>
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
                                            <!-- end modal edit -->


                                            <!-- start modal delete -->
                                            <div class="modal fade" id="modalHapus<?= $no ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Hapus data anda</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <!-- Form Delete Start -->
                                                        <form method="POST" action="aksi-crud-admin.php">

                                                            <div class="modal-body">



                                                                <h5 class="text-center">Apakah anda yakin ingin menghapus data ? <br>
                                                                    <span>
                                                                        <input type="hidden" name="id_registrasi" class="form-control border-0" value="<?= $data['idpegawai'] ?>" readonly></span>
                                                                    <span class="text-danger"><?= $data['nama'] ?></span><br>
                                                                    <span>Jika iya, maka akan menghapus data di semua TABLE</span>
                                                                </h5>


                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                                <button type="submit" class="btn btn-primary" name="hapus">Hapus Data</button>
                                                            </div>
                                                        </form>
                                                        <!-- Form Delete End -->
                                                    </div>
                                                </div>
                                            </div>


                                            <!-- end modal delete -->
                                        <?php endwhile; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

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