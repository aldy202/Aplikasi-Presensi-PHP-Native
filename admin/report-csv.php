<?php
require_once('../koneksi.php');
if ($_GET['a'] == "P") { // Report Presensi
  $t1 = $_GET['t1'];
  $t2 = $_GET['t2'];
  $d1 = date('d-m-Y', strtotime($_GET['t1']));
  $d2 = date('d-m-Y', strtotime($_GET['t2']));
  $d = date('m.y', strtotime($_GET['t1']));
  $query = mysqli_query($con, "SELECT * FROM user INNER JOIN absensi ON user.idpegawai = absensi.idpegawai WHERE tgl_absen  BETWEEN '$t1' AND '$t2' AND bagian != 'Admin' ORDER BY tgl_absen ASC");
  $data = [];
  if (mysqli_num_rows($query) > 0) {
    $no = 1;
    while ($row = mysqli_fetch_array($query)) {
      $a = [
        'no' => $no++,
        'nama' => $row['nama'],
        'idpegawai' => $row['idpegawai'],
        'masuk' => $row['masuk'],
        'pulang' => $row['pulang'],
        'keterangan' => $row['keterangan'],
        'shift' => $row['shift'],
        'kondisi' => $row['kondisi'],
        'jobdesk' => $row['jobdesk'],
        'tgl_absen' => $row['tgl_absen']
      ];
      array_push($data, $a);
    }
  }

  header('Content-Type: text/csv; charset=utf-8');
  header("Content-Disposition: attachment; filename=laporan_absensi_$d.csv");
  $output = fopen('php://output', 'w');
  fputcsv($output, array("Laporan Absensi periode $d1 s/d $d2"));
  fputcsv($output, array('No', 'Nama', 'ID Pegawai', 'Masuk', 'Pulang', 'Keterangan', 'Shift', 'Kondisi Fisik', 'Jobdesk', 'Tanggal'));
  if (count($data) > 0) {
    foreach ($data as $row) {
      fputcsv($output, $row);
    }
  }
} else if ($_GET['a'] == "C") { // REPORT CUTI
  $t1 = $_GET['t1'];
  $t2 = $_GET['t2'];
  $d1 = date('d-m-Y', strtotime($_GET['t1']));
  $d2 = date('d-m-Y', strtotime($_GET['t2']));
  $d = date('m.y', strtotime($_GET['t1']));
  $query = mysqli_query($con, "SELECT * FROM cuti INNER JOIN user ON cuti.idpegawai = user.idpegawai WHERE dari BETWEEN '$t1' AND '$t2' AND bagian != 'Admin' ORDER BY id_cuti ASC");
  $data = [];
  if (mysqli_num_rows($query) > 0) {
    $no = 1;
    while ($row = mysqli_fetch_array($query)) {
      $a = [
        'no' => $no++,
        'nama' => $row['nama'],
        'idpegawai' => $row['idpegawai'],
        'dari' => $row['dari'],
        'sampai' => $row['sampai'],
        'lama' => $row['lama'],
        'alasan' => $row['alasan']
      ];
      array_push($data, $a);
    }
  }

  header('Content-Type: text/csv; charset=utf-8');
  header("Content-Disposition: attachment; filename=laporan_cuti_$d.csv");
  $output = fopen('php://output', 'w');
  fputcsv($output, array("Laporan Cuti periode $d1 s/d $d2"));
  fputcsv($output, array('No', 'Nama', 'ID Pegawai', 'Dari', 'Sampai', 'Lama', 'Alasan'));
  if (count($data) > 0) {
    foreach ($data as $row) {
      fputcsv($output, $row);
    }
  }
} else if ($_GET['a'] == "K") { // Report Karyawan
  $t1 = $_GET['t1'];
  $t2 = $_GET['t2'];
  $d1 = date('d-m-Y', strtotime($_GET['t1']));
  $d2 = date('d-m-Y', strtotime($_GET['t2']));
  $d = date('m.y', strtotime($_GET['t1']));
  $query2 = mysqli_query($con, "SELECT * FROM user WHERE bagian != 'Admin'");
  $data = [];
  if (mysqli_num_rows($query2) != 0) {
    $no = 1;
    while ($row = mysqli_fetch_array($query2)) { // user
      // Presensi
      $query = mysqli_query($con, "SELECT COUNT(idpegawai) AS total_absen FROM absensi WHERE tgl_absen  BETWEEN '$t1' AND '$t2' AND idpegawai = '$row[idpegawai]' ORDER BY tgl_absen");
      while ($rq = mysqli_fetch_array($query)) {
        // Cuti
        $q = mysqli_query($con, "SELECT COUNT(idpegawai) AS total_cuti,SUM(lama) AS jumlah FROM cuti WHERE dari BETWEEN '$t1' AND '$t2' AND idpegawai = '$row[idpegawai]' AND status ='Y'");
        while ($rc = mysqli_fetch_array($q)) {
          if (isset($rc['jumlah']) != 0) {
            $jumlah = $rc['jumlah'];
          } else {
            $jumlah = 0;
          }
          $a = [
            'no' => $no++,
            'nama' => $row['nama'],
            'idpegawai' => $row['idpegawai'],
            'total_absen' => $rq['total_absen'] . " kali",
            'total_cuti' => $rc['total_cuti'] . " kali",
            'jumlah' => $jumlah . " hari"
          ];
          array_push($data, $a);
        } // Cuti

      } // Presensi

    } // User

  }

  header('Content-Type: text/csv; charset=utf-8');
  header("Content-Disposition: attachment; filename=laporan_Data_Karyawan_$d.csv");
  $output = fopen('php://output', 'w');
  fputcsv($output, array("Laporan Data Karyawan Damansi periode $d1 s/d $d2"));
  fputcsv($output, array('No', 'Nama', 'ID Pegawai', 'Total Presensi', 'Total Cuti', "Total Lama Cuti"));
  if (count($data) > 0) {
    foreach ($data as $row) {
      fputcsv($output, $row);
    }
  }
} else if ($_GET['a'] == "I") { // Report Izin
  $t1 = $_GET['t1'];
  $t2 = $_GET['t2'];
  $d1 = date('d-m-Y', strtotime($_GET['t1']));
  $d2 = date('d-m-Y', strtotime($_GET['t2']));
  $d = date('m.y', strtotime($_GET['t1']));
  $query = mysqli_query($con, "SELECT * FROM izin INNER JOIN user ON izin.idpegawai = user.idpegawai WHERE tgl_mulai BETWEEN '$t1' AND '$t2' AND bagian != 'Admin' ORDER BY id_izin ASC");
  $data = [];
  if (mysqli_num_rows($query) > 0) {
    $no = 1;
    while ($row = mysqli_fetch_array($query)) {
      $a = [
        'no' => $no++,
        'nama' => $row['nama'],
        'idpegawai' => $row['idpegawai'],
        'tgl_mulai' => $row['tgl_mulai'],
        'mulai' => $row['mulai'],
        'tgl_selesai' => $row['tgl_selesai'],
        'selesai' => $row['selesai'],
        'alasan' => $row['alasan']
      ];
      array_push($data, $a);
    }
  }

  header('Content-Type: text/csv; charset=utf-8');
  header("Content-Disposition: attachment; filename=laporan_izin_$d.csv");
  $output = fopen('php://output', 'w');
  fputcsv($output, array("Laporan Izin periode $d1 s/d $d2"));
  fputcsv($output, array('No', 'Nama', 'ID Pegawai', 'Tanggal Mulai', 'Jam Mulai', 'Tanggal Selesai', 'Jam Selesai', 'Alasan'));
  if (count($data) > 0) {
    foreach ($data as $row) {
      fputcsv($output, $row);
    }
  }
} else if ($_GET['a'] == "A") { // CSV Nama Aplikasi
  $idpegawai = $_GET['id'];

  $query = mysqli_query($con, "SELECT * FROM app WHERE idpegawai = '$idpegawai' ORDER BY id ASC");
  $data = [];
  if (mysqli_num_rows($query) > 0) {
    $no = 1;
    while ($row = mysqli_fetch_array($query)) {

      $q2 = mysqli_query($con, "SELECT * FROM user WHERE idpegawai = '$idpegawai'");
      while ($ru = mysqli_fetch_array($q2)) {
        $nama = $ru['nama'];
        $a = [
          'no' => $no++,
          'nama' => $ru['nama'],
          'idpegawai' => $row['idpegawai'],
          'nama_apilkasi' => $row['nama_aplikasi'],
          'username' => $row['username'],
          'curend_pass' => $row['curend_pass'],
          'due_pass' => $row['due_pass'],
          'expired' => $row['expired'] . " Hari"
        ];
        array_push($data, $a);
      }
    }
  }

  header('Content-Type: text/csv; charset=utf-8');
  header("Content-Disposition: attachment; filename=laporan_aplikasi_karyawan_$nama.csv");
  $output = fopen('php://output', 'w');
  fputcsv($output, array("Laporan Aplikasi karyawan"));
  fputcsv($output, array('No', 'Nama', 'ID Pegawai', 'Nama Aplikasi', 'Username', 'Last Update Password', 'Due Date Password', 'Expired'));
  if (count($data) > 0) {
    foreach ($data as $row) {
      fputcsv($output, $row);
    }
  }
} else if ($_GET['a'] == "D") { // Delete Cuti
  $t1 = $_GET['t1'];
  $t2 = $_GET['t2'];

  $query2 = mysqli_query($con, "DELETE FROM cuti WHERE dari BETWEEN '$t1' AND '$t2' AND status != 'P'");

  if ($query2) {
    echo "<script>alert('Data Berhasil Di Hapus');window.location='report-cuti.php'</script>";
  } else {
    echo "<script>alert('Gagal hapus Data');window.location='report-cuti.php'</script>";
  }
} else if ($_GET['a'] == "DP") { // Delete Absensi
  $t1 = $_GET['t1'];
  $t2 = $_GET['t2'];

  $query2 = mysqli_query($con, "DELETE FROM absensi WHERE tgl_absen BETWEEN '$t1' AND '$t2'");

  if ($query2) {
    echo "<script>alert('Data Berhasil Di Hapus');window.location='report-presensi.php'</script>";
  } else {
    echo "<script>alert('Gagal hapus Data');window.location='report-presensi.php'</script>";
  }
} else if ($_GET['a'] == "DI") { // Delete Izin
  $t1 = $_GET['t1'];
  $t2 = $_GET['t2'];

  $query2 = mysqli_query($con, "DELETE FROM izin WHERE tgl_mulai BETWEEN '$t1' AND '$t2' AND status != 'P' ");

  if ($query2) {
    echo "<script>alert('Data Berhasil Di Hapus');window.location='report-izin.php'</script>";
  } else {
    echo "<script>alert('Gagal hapus Data');window.location='report-izin.php'</script>";
  }
}
