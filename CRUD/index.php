<?php
include 'koneksi.php';

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
<div class="container">
    <div class="row">
        <div class="col">
    <h3>Tambah Data </h3>
	<div class="d-grid gap-2 d-md-flex justify-content-md-end">
	<a href="tambah.php"><buttonTambah type="button" class="btn btn-secondary">Tambah data</button></a>
	<a href="logout.php"><buttonTambah type="button" class="btn btn-outline-primary">Logout</button></a>
	</div>
	<br><br>

<table class="table table-striped table-hover">
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
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>
</html>