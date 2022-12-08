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
	 <!-- My CSS -->
	 <link rel="stylesheet" href="style.css" />
	
	 <!-- bootstrap -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>
<body>

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
	<!-- Navbar -->
	<nav class="navbar navbar-expand-lg navbar-dark bg-primary shadow p-3 fixed-top">
      <div class="container">
        <a class="navbar-brand" href="#">Halaman Admin</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav ms-auto">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="#home">Home</a>
            </li>
          </ul>
        </div>
      </div>
</nav>
	<!-- akhir navbar -->
<div class="container">
    <div class="row">
        <div class="col">
	
		<section class="jumbotron text-center">
    	<h3>Tabel Data Dokumen </h3>
		</section>
	<marquee direction="right">Selamat Datang Di Halaman Tampilan</marquee>

	

	<div class="d-grid gap-3 d-md-flex justify-content-md-end">
	<a href="tambah.php"><buttonTambah type="button" class="btn btn-success">Tambah data</button></a>
	</div>
	<br><br>

	<table class="table table-success table-striped-columns">
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
		<a href="ubah.php?id=<?= $row["id"]?>">Ubah</a> |
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

<div class="d-grid gap-3 d-md-flex justify-content-md-center">
<a href="logout.php"><buttonTambah type="button" class="btn btn-outline-primary">Logout</button></a>
</div>
<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="#a2d9ff" fill-opacity="1" d="M0,32L40,37.3C80,43,160,53,240,58.7C320,64,400,64,480,85.3C560,107,640,149,720,181.3C800,213,880,235,960,250.7C1040,267,1120,277,1200,261.3C1280,245,1360,203,1400,181.3L1440,160L1440,320L1400,320C1360,320,1280,320,1200,320C1120,320,1040,320,960,320C880,320,800,320,720,320C640,320,560,320,480,320C400,320,320,320,240,320C160,320,80,320,40,320L0,320Z"></path></svg>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>
</html>