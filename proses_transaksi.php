<?php
// memanggil file koneksi.php untuk melakukan koneksi database
include 'koneksi.php';

// membuat variabel untuk menampung data dari form
$id_petugas        = $_POST['id_petugas'];
$nisn              = $_POST['nisn'];
$tgl_bayar         = $_POST['tgl_bayar'];
$transfer_bank     = $_POST['transfer_bank'];
$jenis_pembayaran  = $_POST['jenis_pembayaran'];
$jumlah_bayar      = $_POST['jumlah_bayar'];




$query = "INSERT INTO pembayaran VALUES ('','$id_petugas', '$nisn', '$tgl_bayar', '$transfer_bank
                  ', '$jenis_pembayaran', '$jumlah_bayar')";
$result = mysqli_query($koneksi, $query);
// periska query apakah ada error
if (!$result) {
  die("Query gagal dijalankan: " . mysqli_errno($koneksi) .
    " - " . mysqli_error($koneksi));
} else {
  //tampil alert dan akan redirect ke halaman index.php
  //silahkan ganti index.php sesuai halaman yang akan dituju
  echo "<script>alert('Transaksi Pembayaran Berhasil.');window.location='transaksi.php';</script>";
}
