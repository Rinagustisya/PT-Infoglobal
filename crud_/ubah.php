<?php
require 'koneksi.php';

// ambil data di url
$id = $_GET["id"];

$dok = query("SELECT * FROM dokumen WHERE id = $id")[0];


if (isset($_POST ["submit"]) ) {
// CEK APAKAH DATA BERHASIL DI UBAH ATAU TIDAK
		if (ubah($_POST)>0) {
			echo "
			<script>
			alert('data berhasil diubah!');
			document.location.href = 'index.php';
			</script>
			";
		} else {
			echo "
			<script>
			alert('data gagal diubah!');
			document.location.href = 'index.php';
			</script>
			" ; 
		}

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ubah Data</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
    
    <form action="" method="post" enctype="multipart/form-data">
    <div class="vh-100 d-flex justify-content-center align-items-center">
    <div class="col-md-4 p-5 shadow-sm border rounded-5 border-primary">

    <input type="hidden" name="id" value="<?= $dok['id']; ?>">
    <input type="hidden" name="berkas" value="<?= $dok['berkas']; ?>">
    <h3 align="center">Ubah Data</h3>
            <div class="mb-3">
                <label for="nama" class="form-label">Nama Dokumen : </label>
                <input class="form-control border border-primary" type="text" name="nama" id="nama" required value="<?= $dok['nama']; ?>">
            </div>
            <div class="mb-3">
                <label for="berkas" class="form-label">Tipe Dokumen : </label>
                <input class="form-control form-control-sm" type="file" name="berkas" id="berkas" required value="<?= $dok['berkas']; ?>">
            </div>
            <div class="mb-3">
					<label for="access">Aksesbilitas:</label>
					<select name="access" id="access">
						<option value="Public" class="form-control bg-info bg-opacity-10 border border-primary">Public</option>
						<option value="Private" class="form-control bg-info bg-opacity-10 border border-primary">Private</option>
					</select>
				</div>
            <div class="d-grid">
                <button type="submit" name="submit" value="upload" class="btn btn-primary"> Ubah Data!</button>
            </div>
</form>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</body>
</html>