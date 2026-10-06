<?php
include('koneksi.php'); //agar index terhubung dengan database, maka koneksi sebagai penghubung harus di include

?>
<!DOCTYPE html>
<html>

<head>
  <title>DATA SPP</title>

</head>

<body>

  <?php

  include('tampilan/header.php');
  include('tampilan/sidebar.php');
  include('tampilan/footer.php');
  ?>

  <!-- Main Content -->
  <div class="main-content bg-primary">
    <section class="section">
      <div class="section-header">
        <h1>TAGIHAN</h1>
        <div class="section-header-breadcrumb">
          <div class="breadcrumb-item active"><a href="dashboard.php">Dashboard</a></div>
          <div class="breadcrumb-item text-primary">Tagihan</div>
        </div>
      </div>
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h4>LIST TAGIHAN</h4>
              <div class="card-header-form">
                <form>
                  <div class="input-group-btn">
                    <a href="tambah_spp.php" class=""><i class=""></i></a>
                  </div>
                </form>
              </div>
            </div>
            <div class="card-body p-0">
              <div class="table-responsive">
                <table class="table table-striped">
                  <thead>
                    <tr>
                      <th>NO</th>
                      <th>JENIS PEMBAYARAN</th>
                      <th>TANGGAL</th>
                      <th>NOMINAL</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    // jalankan query untuk menampilkan semua data diurutkan berdasarkan id
                    $query = "SELECT * FROM spp ORDER BY id_spp ASC";
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
                        <td><?php echo $row['jenis_pembayaran']; ?></td>
                        <td><?php echo $row['tahun']; ?></td>
                        <td><?php echo substr($row['nominal'], 0, 20); ?></td>
                        <td>
                        </td>
                      </tr>
                    <?php
                      $no++; //untuk nomor urut terus bertambah 1
                    }
                    ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
  </div>
  </div>
</body>

</html>