<?php
require('../koneksi.php');
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: ../login.php");
}
$level = $_SESSION['bagian'];
$id = $_GET['id'];

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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-datetimepicker/2.5.20/jquery.datetimepicker.full.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-datetimepicker/2.5.20/jquery.datetimepicker.min.css" />

    <title>DAMANSI | ADMIN</title>
</head>

<body>
    <!-- side bar start -->
    <div class="main-container d-flex">
        <!-- Content Start -->
        <div class="content mb-2">
            <!-- Nav Start -->
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="container-fluid">
                    <div class="d-flex justify-content-between">
                        <h1>Damansi | Admin </h1>
                    </div>
                </div>
            </nav>
            <!-- Nav End -->


            <?php
            $no = 1;
            $tampil = mysqli_query($con, "SELECT * FROM user WHERE idpegawai = '$id'");
            while ($data =  mysqli_fetch_array($tampil)) :
            ?>
                <div class="tab-titles">
                    <h5>Data Aplikasi karyawan : <?= $data['nama'] ?></h5>
                </div>


                <!-- Tambah Data Aplikasi Karyawan -->
                <div class="modal fade" id="tambahapp" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="staticBackdropLabel">Tambah Data Nama Aplikasi</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" onclick="resetInput()"></button>
                            </div>
                            <!-- Form Create -->
                            <form action="../data-pegawai_action.php" method="post">
                                <div class="modal-body">
                                    <input type="text" class="form-control" readonly name="idpeg" value="<?= $data['idpegawai'] ?>">

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


                                            </div>
                                        </div>
                                    </div>

                                    <!-- Date last change pass -->
                                    <div class="row">
                                        <div class="col-md">
                                            <div class="mb-1">
                                                <label for="nama" class="form-label">Last Date Change Pass</label>
                                                <input type="text" class="form-control" id="datepicker2" placeholder="Masukkan Tanggal" autocomplete="off" name="lastPass" required>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" onclick="resetdata()">Close
                                        </button>
                                        <button name="createApp" type="submit" class="btn btn-primary">Submit</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- End Tambah Data Aplikasi Karyawan -->
            <?php endwhile; ?>

            <div class="tab-contents active-tab" id="profil">
                <a type="button" href="data.php" class="btn btn-success mb-3" id="backButton"><i class=" fa-regular fa-circle-left"></i> Back</a>

                <button type="button" class="btn btn-primary btn-tap" data-bs-toggle="modal" data-bs-target="#tambahapp">
                    <i class="fa-solid fa-user-plus"></i> Tambah
                </button>
                <table class="table table-bordered table-striped table-hover">
                    <thead class="table-danger">
                        <tr>
                            <th>No</th>
                            <th>ID Pegawai</th>
                            <th>Nama Aplikasi</th>
                            <th>Username</th>
                            <th>Currend Date</th>
                            <th>Due Date</th>
                            <th>URL</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        $tampil = mysqli_query($con, "SELECT * FROM app WHERE idpegawai = '$id'");
                        while ($data =  mysqli_fetch_array($tampil)) :
                        ?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td><?= $data['idpegawai'] ?></a> </td>
                                <td><?= $data['nama_aplikasi'] ?></td>
                                <td><?= $data['username'] ?></td>
                                <td><?= $data['curend_pass'] ?></td>
                                <?php
                                date_default_timezone_set('asia/jakarta');
                                $d2 = strtotime($data['due_pass']);
                                $d3 = strtotime(date('Y-m-d')); // Tanggal Sekarang

                                $hitung = $d2 - $d3;

                                $hari = $hitung / (60 * 60 * 24);

                                if ($hari <= 0) {
                                ?>
                                    <td class="table-danger"><?= $data['due_pass'] ?></td>
                                <?php } else if ($hari <= 7) { ?>
                                    <td style="background-color: #F7DB6A;"><?= $data['due_pass'] ?></td>
                                <?php } else { ?>
                                    <td><?= $data['due_pass'] ?></td>
                                <?php } ?>
                                <td><a href="<?= $data['url'] ?>" target="_blank"><?= $data['nama_aplikasi'] ?></a></td>
                                <td class="col-2 text-center">
                                    <a href="#" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#editdata<?= $no ?>"><i class="fa-solid fa-pen"></i></a>
                                    <a href="#" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#hapusdata<?= $no ?>"><i class="fa-solid fa-trash"></i></a>
                                </td>
                            </tr>


                            <!-- Modal EditApp -->
                            <div class="modal fade" id="editdata<?= $no ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Edit data</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>

                                        <form action="../data-pegawai_action.php" method="POST">
                                            <div class="modal-body">
                                                <!-- Id App -->
                                                <div class="mb-3">
                                                    <input type="hidden" class="form-control" readonly name="idApp" value="<?= $data['id'] ?>">
                                                    <input type="hidden" class="form-control" readonly name="idpeg" value="<?= $data['idpegawai'] ?>">
                                                </div>
                                                <!-- Nama Aplikasi -->
                                                <div class="row">
                                                    <div class="col-md">
                                                        <div class="mb-1">
                                                            <label for="nama" class="form-label">Nama Aplikasi</label>
                                                            <select type="text" class="form-control" name="appName" id="name_app" placeholder="Nama Lengkap" autocomplete="off">
                                                                <option value="<?= $data['nama_aplikasi'] ?>"><?= $data['nama_aplikasi'] ?></option>
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
                                                            <input type="text" class="form-control" name="username" id="user_app" value="<?= $data['username'] ?>" autocomplete="off" required>
                                                        </div>
                                                    </div>
                                                </div>

                                                <!-- Date last change pass -->
                                                <div class="row">
                                                    <div class="col-md">
                                                        <div class="mb-1">
                                                            <label for="nama" class="form-label">Last Date Change Pass</label>
                                                            <input type="date" class="form-control" value="<?= $data['curend_pass'] ?>" autocomplete="off" name="lastPass" required>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" onclick="resetdata()">Close
                                                </button>
                                                <button name="editDataApp" type="submit" class="btn btn-primary">Submit</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <!-- Modal EditApp END -->


                            <!-- Modal HapusAPP -->
                            <div class="modal fade" id="hapusdata<?= $no ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Hapus Data</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>

                                        <form action="../data-pegawai_action.php" method="POST">
                                            <div class="modal-body">
                                                <!-- Id App -->
                                                <div class="mb-3">
                                                    <input type="hidden" class="form-control" readonly name="idApp" value="<?= $data['id'] ?>">
                                                    <input type="hidden" class="form-control" readonly name="idpeg" value="<?= $data['idpegawai'] ?>">
                                                    <h5 class="text-center">Nama Aplikasi : <span class="text-danger"><?= $data['nama_aplikasi'] ?></span> </h5>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" onclick="resetdata()">Close
                                                    </button>
                                                    <button name="hapusdataapp" type="submit" class="btn btn-primary">Submit</button>
                                                </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        <?php endwhile; // Table User
                        ?>
                    </tbody>
                </table>
                <?php
                $tampil = mysqli_query($con, "SELECT * FROM app WHERE idpegawai = '$id'");
                $data5 =  mysqli_fetch_array($tampil)
                ?>
                <a href="report-csv.php?a=A&&id=<?= $data5['idpegawai'] ?>" class="btn btn-sm btn-success">Export CSV</a>
                <?php  ?>
            </div>
            <!-- End Contente -->
        </div>
        <!-- My JS -->
        <script src="../assets/js/script.js"></script>
        <!-- Boostrap JS -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>

        <script>
            <?php
            $query = mysqli_query($con, "SELECT * FROM app WHERE idpegawai = '$id'");
            while ($row = mysqli_fetch_array($query)) {
            ?>

                function resetdata() {
                    $('#name_app').val('<?= $row['nama_aplikasi'] ?>');
                    $('#user_app').val('<?= $row['username'] ?>');
                    $('#datepicker2').val('<?= $row['curend_pass'] ?>');
                }
            <?php
            }
            ?>
        </script>

        <script>
            $(function() {
                //Date picker

                $('#datepicker2').datetimepicker({
                    autoclose: true,
                    timepicker: false,
                    format: 'Y-m-d',
                });
            });
        </script>
</body>

</html>