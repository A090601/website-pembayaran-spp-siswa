<?php
include 'koneksi.php';

header("Content-type: application/vnd.ms-word");
header("Content-Disposition: attachment;Filename=data-transaksi.doc");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
	<title>Laporan Data Transaksi Pembayaran Siswa</title>
</head>

<body>
	<?php
	if (isset($_POST['daritanggal'])) {
		$daritanggal = ($_POST['daritanggal']);
		$sampaitanggal = ($_POST['sampaitanggal']);

	?>
		<p align="center">LAPORAN DATA TRANSAKSI PEMBAYARAN SISWA</p>
		<p align="center">SMP NEGERI 5 DEPOK</p>
		<p align="center">DARI TANGGAL <?php echo $daritanggal; ?> SAMPAI TANGGAL <?php echo $sampaitanggal; ?></p>
		<p>&nbsp;</p>


		<table>
			<thead>
				<tr>
					<th>No</th>
					<th>NISN</th>
					<th>Nama</th>
					<th>Kelas</th>
					<th>Tanggal Bayar</th>
					<th>Transfer Bank</th>
					<th>Jenis Pembayaran</th>
					<th>Jumlah Bayar</th>


			</thead>
			<tbody>
				<?php
				$query = "SELECT * FROM pembayaran,siswa,spp,kelas WHERE pembayaran.nisn=siswa.nisn AND siswa.jenis_pembayaran=spp.jenis_pembayaran AND siswa.nama_kelas=kelas.nama_kelas AND (pembayaran.tgl_bayar between '$daritanggal' AND '$sampaitanggal')";
				$result = mysqli_query($koneksi, $query);
				if (!$result) {
					die("Query Error: " . mysqli_errno($koneksi) .
						" - " . mysqli_error($koneksi));
				}
				$no = 1;
				while ($data = mysqli_fetch_assoc($result)) {
					$tahunsekarang = date('Y');
					$tahunmasuksiswa = $data['tahun'];

				?>

					<tr>
						<td><?php echo $no; ?></td>
						<td><?php echo $data['nisn']; ?></td>
						<td><?php echo $data['nama']; ?></td>
						<td><?php echo $data['nama_kelas']; ?></td>
						<td><?php echo $data['tgl_bayar']; ?></td>
						<td><?php echo $data['transfer_bank']; ?></td>
						<td><?php echo $data['jenis_pembayaran']; ?></td>
						<td><?php echo $data['jumlah_bayar']; ?></td>


					</tr>

			<?php
					$no++;
				}
			}
			?>
			</tbody>
		</table>
</body>

</html>