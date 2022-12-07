<?php
include 'koneksi.php';
session_start();

if (isset($_POST["cari"]) ) {
	$dokumen = cari($_POST["keyword"]);
}

$query = mysqli_query($koneksi, 'SELECT*FROM dokumen ORDER BY id ASC');
$no =1;
if (mysqli_num_rows($query)==0) {
    echo "<tr><td colspan='6'> Tidak ada data</td></tr>";
}else {
}
while ($a= mysqli_fetch_array($query) ) {
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Data</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>
<body>
<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="#a2d9ff" fill-opacity="1" d="M0,128L48,112C96,96,192,64,288,80C384,96,480,160,576,181.3C672,203,768,181,864,160C960,139,1056,117,1152,133.3C1248,149,1344,203,1392,229.3L1440,256L1440,0L1392,0C1344,0,1248,0,1152,0C1056,0,960,0,864,0C768,0,672,0,576,0C480,0,384,0,288,0C192,0,96,0,48,0L0,0Z"></path></svg>
	<!-- cek pesan notifikasi -->
	<?php 
	if(isset($_GET['pesan'])){
		 if($_GET['pesan'] == "logout"){
			echo "Anda telah berhasil logout";
		}else if($_GET['pesan'] == "belum_login"){
			echo "Anda harus login untuk mengakses halaman admin";
		}
	}
	?>
	<!-- Akhir Navbar -->
<div class="container">
    <div class="row">
        <div class="col">
    <h3 align="center">Tabel Data Dokumen </h3>
	<marquee direction="right">Selamat Datang Di Halaman Tampilan</marquee>

	

	<div class="d-grid gap-3 d-md-flex justify-content-md-end">
	<a href="tambah.php"><buttonTambah type="button" class="btn btn-primary">Tambah data</button></a>
	<a href="logout.php"><buttonTambah type="button" class="btn btn-outline-primary">Logout</button></a>
	</div>
	<br><br>

<table class="table table-bordered border-primary">
	<tr>
		<th>No.</th>
		<th>Id</th>
		<th>Nama Dokumen</th>
		<th>Tipe Dokumen</th>
		<th>Action</th>
	</tr>
<?php $i = 1; ?>
<?php foreach ($query as $row) : ?>
<tr>
	<td><?= $i; ?></td>
	<td><?= $row["id"]?></td>
	<td><?= $row["nama_doc"]?></td>
	<td><?= $row["tipe_doc"]?></td>
    <td>
		<a href="ubah.php?id=<?= $row["id"]?>">Ubah</a>
		<a href="hapus.php?id= <?= $row["id"]?>" onclick="return confirm ('yakin?');">Hapus</a>

</td>
</tr>
<?php $i++; ?>
<?php endforeach; ?>
<?php } ?>
</table>
</div>
</div>
</div>

<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="#a2d9ff" fill-opacity="1" d="M0,96L21.8,122.7C43.6,149,87,203,131,218.7C174.5,235,218,213,262,186.7C305.5,160,349,128,393,117.3C436.4,107,480,117,524,133.3C567.3,149,611,171,655,165.3C698.2,160,742,128,785,117.3C829.1,107,873,117,916,133.3C960,149,1004,171,1047,186.7C1090.9,203,1135,213,1178,229.3C1221.8,245,1265,267,1309,261.3C1352.7,256,1396,224,1418,208L1440,192L1440,320L1418.2,320C1396.4,320,1353,320,1309,320C1265.5,320,1222,320,1178,320C1134.5,320,1091,320,1047,320C1003.6,320,960,320,916,320C872.7,320,829,320,785,320C741.8,320,698,320,655,320C610.9,320,567,320,524,320C480,320,436,320,393,320C349.1,320,305,320,262,320C218.2,320,175,320,131,320C87.3,320,44,320,22,320L0,320Z"></path></svg>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>
</html>