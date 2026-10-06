<?php
include('koneksi.php'); //agar index terhubung dengan database, maka koneksi sebagai penghubung harus di include

?>
<!DOCTYPE html>
<html>

<head>
  <title>TRANSAKSI</title>

</head>

<body>

  <?php

  include('tampilan/header.php');
  include('tampilan/footer.php');
  include('tampilan/sidebar.php');
  ?>

  <!-- main content -->
  <div class="main-content bg-primary">
    <section class="section">
      <div class="section-header">
        <h1>REKAPITULASI</h1>
        <div class="section-header-breadcrumb">
          <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
          <div class="breadcrumb-item text-primary"></div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header">
              <div class="card-header-form">
                <form action="proses_transaksi.php" method="post">
              </div>
            </div>
            <div class="input-group mb-3">
              <div class="input-group-prepend">
              </div>
            </div>

            <div class="input-group mb-3">
              <div class="input-group-prepend">
              </div>
            </div>

            <div class="input-group mb-3">
              <div class="input-group-prepend">
              </div>
            </div>

            <div class="input-group mb-3">
              <div class="input-group-prepend">
              </div>
            </div>

            <div class="input-group mb-3">
              <div class="input-group-prepend">
              </div>
            </div>

            <div class="input-group mb-3">
              <div class="input-group-prepend">
              </div>
            </div>

            <div class="d-flex justify-content-center">

              </form>
            </div>

            <br />

            <form action="" method="get">
              <h2>REKAPITULASI DATA PEMBAYARAN SISWA SESUAI NISN</h2>
              <table class="table">
                <tr>
                  <td>NISN</td>
                  <td>:</td>
                  <td>
                    <input class="form-control" type="text" name="nisn" placeholder="--Data NISN Lihat Di Form Siswa--">
                  </td>
                  <td>
                    <button class="btn btn-success" type="submit" name="cari">Cari</button>
                  </td>
                </tr>

              </table>
            </form>
            <?php
            if (isset($_GET['nisn']) && $_GET['nisn'] != '') {
              $query = mysqli_query($koneksi, "SELECT * FROM siswa WHERE nisn='$_GET[nisn]'");
              $data = mysqli_fetch_array($query);
              $nisn = $data['nisn'];

            ?>

              <h2>DATA SISWA</h2>
              <table class="table table-striped">
                <thead>
                  <tr>
                    <th scope="col">NISN</th>
                    <th scope="col">NAMA SISWA</th>
                    <th scope="col">NAMA KELAS</th>

                  </tr>
                </thead>
                <tbody>
                  <td><?php echo $data['nisn']; ?></td>
                  <td><?php echo $data['nama']; ?></td>
                  <td><?php echo $data['nama_kelas']; ?></td>
                </tbody>
              </table>

              <h2>DATA PEMBAYARAN SISWA STATUS LUNAS</h2>
              <table class="table table-striped table-responsive">
                <thead>
                  <tr>
                    <!-- <th scope="col">Id Pembayaran</th> -->
                    <th scope="col">id petugas</th>
                    <th scope="col"> NISN</th>
                    <th scope="col">Tgl Bayar</th>
                    <th scope="col">Transfer Bank</th>
                    <th scope="col">Jenis Pembayaran</th>
                    <th scope="col">Jumlah</th>

                  </tr>
                </thead>

                <tbody>
                  <?php
                  $query = mysqli_query($koneksi, "SELECT * FROM pembayaran WHERE nisn='$data[nisn]'");


                  while ($data = mysqli_fetch_array($query)) {
                    echo " <tr>
                          
                          <td>$data[id_petugas]</td>
                          <td>$data[nisn]</td>
                          <td>$data[tgl_bayar]</td>
                          <td>$data[transfer_bank]</td>
                          <td>$data[jenis_pembayaran]</td>
                          <td>$data[jumlah_bayar]</td>

                        </tr>";
                  }

                  ?>

                </tbody>

              </table>

            <?php
            }
            ?>

          </div>
</body>

</html>