<?php
include('koneksi.php'); //agar index terhubung dengan database, maka koneksi sebagai penghubung harus di include

?>
<!DOCTYPE html>
<html>

<head>
  <title>DASHBOARD SISWA</title>

</head>

<body>

  <?php

  include('tampilan/header.php');
  include('tampilan/footer.php');
  include('tampilan/sidebar.php');
  ?>
  <div class="main-content bg-primary">
    <section class="section">
      <div class="section-header">
        <h1>DASHBOARD SISWA</h1>
        <div class="section-header-breadcrumb">
          <div class="breadcrumb-item active"><a href="dashboard.php">Dashboard</a></div>
          <div class="breadcrumb-item text-primary"></div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header">
              <h4>Dashboard Siswa</h4>
              <div class="card-header-form">
                <form>
                  <div class="input-group-btn">
                    <a href="tambah_siswa.php" class=""><i class=""></i></a>
                  </div>
                </form>
              </div>
            </div>


            <table class="table table-striped ">

              <th>NO</th>
              <th>NISN</th>
              <th>NIS</th>
              <th>NAMA</th>
              <th>NAMA KELAS</th>
              <th>ALAMAT</th>
              <th>NO.HP ORANG TUA</th>
              <?php
              // jalankan query untuk menampilkan semua data diurutkan berdasarkan id
              $query = "SELECT * FROM siswa,kelas,spp where siswa.nama_kelas=kelas.nama_kelas AND siswa.jenis_pembayaran=spp.jenis_pembayaran ORDER BY nisn ASC";
              $result = mysqli_query($koneksi, $query);
              //mengecek apakah ada error ketika menjalankan query
              if (!$result) {
                die("Query Error: " . mysqli_errno($koneksi) .
                  " - " . mysqli_error($koneksi));
              }

              //buat perulangan untuk element tabel dari data mahasiswa
              $no = 1; //variabel untuk membuat nomor urut
              // hasil query akan disimpan dalam variabel $data dalam bentuk array
              // kemudian dicetak dengan perulangan while
              while ($row = mysqli_fetch_assoc($result)) {
              ?>
                <tr>
                  <td><?php echo $no; ?></td>
                  <td><?php echo $row['nisn']; ?></td>
                  <td><?php echo $row['nis']; ?></td>
                  <td><?php echo $row['nama']; ?></td>
                  <td><?php echo $row['nama_kelas']; ?></td>
                  <td><?php echo $row['alamat']; ?></td>
                  <td><?php echo $row['no_telp']; ?></td>
                  <td>
                  </td>
                </tr>
              <?php
                $no++; //untuk nomor urut terus bertambah 1
              }
              ?>
              </tbody>
            </table>

            <!-- main content -->
            <div class="main-content bg-primary">
              <section class="section">
                <div class="section-header">
                  <h1>RIWAYAT PEMBAYARAN</h1>
                  <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="history.php"></a></div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12">
                    <div class="card">
                      <div class="card-header">
                        <h4>Riwayat Pembayaran</h4>
                        <div class="card-header-form">
                        </div>
                      </div>
                      <form action="" method="get">
                        <table class="table">
                          <tr>
                            <td>NISN</td>
                            <td>:</td>
                            <td>
                              <input class="form-control" type="text" name="nisn" placeholder="--Masukan NISN--">
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

                        <h2>DATA PEMBAYARAN SISWA LUNAS</h2>
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