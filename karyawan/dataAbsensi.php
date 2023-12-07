<div class="container-fluid" style="width: fit-content;">
    <div class="card">
        <div class="card-header">
            <h5 class="m-0 font-weight-bold text-primary text-center">Data Absensi</h5>
        </div>
        <div class="card-body">
            <table class="table table-bordered table-sm">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nama</th>
                        <th>Id Pegawai</th>
                        <th>Masuk</th>
                        <th>Pulang</th>
                        <th>Keterangan</th>
                        <th>Shift</th>
                        <th>Kondisi Fisik</th>
                        <th>Jobdesk</th>
                        <th>Tanggal</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $i = $_SESSION['idpegawai'];  // Table User
                    // Table Absensi
                    $query = mysqli_query($con, "SELECT * FROM absensi WHERE idpegawai = '$i' ORDER BY tgl_absen ='$tgl' DESC");
                    $no = 1;
                    while ($data = mysqli_fetch_array($query)) {
                    ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <?php
                            $q = mysqli_query($con, "SELECT * FROM user WHERE idpegawai = '$i'");
                            while ($usr = mysqli_fetch_array($q)) :
                            ?>
                                <td><?= $usr['nama'] ?></td>
                            <?php endwhile; ?>

                            <td><?= $data['idpegawai'] ?></td>
                            <td><?= $data['masuk'] ?></td>
                            <td><?= $data['pulang'] ?></td>
                            <td><?= $data['keterangan'] ?></td>
                            <td><?= $data['shift'] ?></td>
                            <td><?= $data['kondisi'] ?></td>
                            <td><?= $data['jobdesk'] ?></td>
                            <td><?= $data['tgl_absen'] ?></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>