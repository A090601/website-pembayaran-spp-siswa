<?php
include('koneksi.php'); //agar index terhubung dengan database, maka koneksi sebagai penghubung harus di include

?>
<!DOCTYPE html>
<html>

<head>
  <title></title>

</head>

<body>
  <?php

  include('tampilan/header.php');
  include('tampilan/sidebar.php');
  include('tampilan/footer.php');
  ?>
  <div class="main-content bg-primary">
    <section class="section">
      <div class="section-header">
        <h1>INPUT DATA SISWA</h1>
        <div class="section-header-breadcrumb">
          <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
          <div class="breadcrumb-item text-primary"><a href="siswa.php">Data Siswa</a></div>
          <div class="breadcrumb-item text-primary">Tambah Data Siswa</div>
        </div>
      </div>
      <div class="row">
        <div class="col-12">
          <div class="card bg-primary">
          </div>
          <div class="card-body bg-primary">
            <div class="row mt-4">
              <div class="col-12 col-lg-8 offset-lg-2">
                <div class="wizard-steps">
                  <div class="wizard-step wizard-step-active">
                    <div class="wizard-step-icon">
                      <i class="fas fa-school"></i>
                    </div>
                    <div class="wizard-step-label">
                      Input Data siswa
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <form class="wizard-content mt-2" method="post" action="proses_tambahsiswa.php">
              <div class="wizard-pane">
                <div class="form-group row align-items-center">
                  <label class="col-md-4 text-md-right text-white">NISN</label>
                  <div class="col-lg-4 col-md-6">
                    <input type="text" name="nisn" class="form-control">
                  </div>
                </div>
                <div class="form-group row align-items-center">
                  <label class="col-md-4 text-md-right text-white">NIS</label>
                  <div class="col-lg-4 col-md-6">
                    <input type="text" name="nis" class="form-control">
                  </div>
                </div>
                <div class="form-group row align-items-center">
                  <label class="col-md-4 text-md-right text-white">NAMA</label>
                  <div class="col-lg-4 col-md-6">
                    <input type="text" name="nama" class="form-control">
                  </div>
                </div>
                <div class="form-group row align-items-center">
                  <label class="col-md-4 text-md-right text-white">NAMA KELAS</label>
                  <div class="col-lg-4 col-md-6">
                    <select class="form-control" name="nama_kelas">
                      <option value="not_option"> silahkan pilih kelas</option>
                      <?php
                      // jalankan query untuk menampilkan semua data diurutkan berdasarkan
                      $query = "SELECT * FROM kelas ORDER BY nama_kelas ASC";
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
                        <option value="<?php echo $row['nama_kelas']; ?>"><?php echo $row['nama_kelas']; ?></option>
                      <?php
                        $no++; //untuk nomor urut terus bertambah 1
                      }
                      ?>
                    </select>

                  </div>

                </div>
              </div>
              <div class="form-group row align-items-center">
                <label class="col-md-4 text-md-right text-white">ALAMAT</label>
                <div class="col-lg-4 col-md-6">
                  <input type="text" name="alamat" class="form-control">
                </div>
              </div>
              <div class="form-group row align-items-center">
                <label class="col-md-4 text-md-right text-white">NO.HP ORANG TUA</label>
                <div class="col-lg-4 col-md-6">
                  <input type="text" name="no_telp" class="form-control">
                </div>
              </div>
              <div class="form-group row align-items-center">
                <label class="col-md-4 text-md-right text-white">TANGGAL BAYAR</label>
                <div class="col-lg-4 col-md-6">
                  <select class="form-control" name="tahun">
                    <option value="not_option"> silahkan masukan tanggal</option>
                    <?php
                    // jalankan query untuk menampilkan semua data diurutkan berdasarkan
                    $query = "SELECT * FROM spp ORDER BY tahun ASC";
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
                      <option value="<?php echo $row['jenis_pembayaran']; ?>"><?php echo $row['tahun']; ?></option>
                    <?php
                      $no++; //untuk nomor urut terus bertambah 1
                    }
                    ?>
                  </select>

                </div>
              </div>
          </div>
          <div class="form-group row">
            <div class="col-md-4"></div>
            <div class="col-lg-4 col-md-6 text-right">
              <button type="submit" class="btn btn-icon icon-right btn-primary">TAMBAH DATA SISWA<i class="fas fa-arrow-right"></i></button>
            </div>
          </div>
        </div>
        </form>
      </div>
  </div>
  </div>
  </div>
  </div>
  </section>
  </div>
  </div>
  </div>