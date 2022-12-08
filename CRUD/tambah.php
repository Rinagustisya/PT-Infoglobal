<?php
require 'koneksi.php';


// CEK APAKAH TOMBOL SUBMIT SUDAH DITEKAN ATAU BELUM
if (isset($_POST ["submit"]) ) {


// CEK APAKAH DATA BERHASIL DI TAMBAHKAN ATAU TIDAK
		if (tambah($_POST) > 0) {
			echo "
			<script>
			alert('data berhasil ditambahkan!');
			document.location.href = 'index.php';
			</script>
			";
		} else {
			echo "
			<script>
			alert('data gagal ditambahkan!');
			document.location.href = 'index.php';
			</script>
			" ; 
		}

}
?>

<!DOCTYPE html>
<html lang="en">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>
<div class="bg-success p-2 text-white bg-opacity-75">
<body>

<div class="vh-100 d-flex justify-content-center align-items-center">
<div class="col-md-4 p-5 shadow-lg border rounded-5 border-dark">
    <h2 align="center">Tambah Data</h2>
    <div class="tambah">


    <form action="" method="post" enctype="multipart/form-data">
    <input type="hidden" name="id" id="id" required>
    <div class="mb-3">
                <label for="nama_doc" class="form-label">Nama : </label>
                <input class="form-control border border-success" type="text" name="nama_doc" id="nama_doc" required>
    </div>
    <div class="mb-3">
                <label for="tipe_doc" class="form-label">Tipe Dokumen : </label>
                <input class="form-control form-control-sm" type="file" name="tipe_doc" id="tipe_doc" required>
                
</div>
<div class="d-grid">
                <button type="submit" name="submit" class="btn btn-success"> Tambah Data!</button>
</div>

</form>
</div>
</div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>
</div>
</html>