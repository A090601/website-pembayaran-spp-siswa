?>
<!DOCTYPE html>
<html>

<head>
  <title>WEBSITE PEMBAYARAN SISWA</title>

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
        <h1>TAGIHAN SISWA</h1>
        <div class="section-header-breadcrumb">
          <div class="breadcrumb-item active"><a href="dashboard.php">Dashboard</a></div>
          <div class="breadcrumb-item text-primary"></div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header">
              <h4>Tagihan Siswa</h4>
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
              <th>NOMINAL</th>
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


            <!-- Main Content -->
            <div class="main-content bg-primary">
              <section class="section">
                <div class="row">
                  <div class="col-lg-4 col-md-4 col-sm-12">
                    <div class="card card-statistic-2">
                      <div class="card-stats">
                        <div class="card-stats-title">
                          <div class="dropdown d-inline">
                          </div>
                        </div>
                        <div class="card-stats-items">
                          <div class="card-stats-item">
                            <?php
                            $jumlah_siswa = mysqli_query($koneksi, "select * from siswa");
                            ?>
                            <span class="counter"><?php echo mysqli_num_rows($jumlah_siswa); ?></span>
                            </span>
                            <div class="card-stats-item-label">Siswa</div>
                          </div>
                          <div class="card-stats-item">
                            <?php
                            $jumlah_spp = mysqli_query($koneksi, "select * from spp");
                            ?>
                            <span class="counter"><?php echo mysqli_num_rows($jumlah_spp); ?></span>
                            </span>
                            <div class="card-stats-item-label">Tagihan</div>
                          </div>
                          <div class="card-stats-item">
                            <?php
                            $jumlah_pembayaran = mysqli_query($koneksi, "select * from pembayaran");
                            ?>
                            <span class="counter"><?php echo mysqli_num_rows($jumlah_pembayaran); ?></span>
                            </span>
                            <div class="card-stats-item-label">Transaksi Lunas</div>
                          </div>
                        </div>
                      </div>
                      <div class="card-icon shadow-info bg-primary">
                        <i class="fas fa-users"></i>

              </section>
            </div>
          </div>
        </div>
</body>