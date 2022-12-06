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
<body>
    <h2>Tambah Data</h2>
    <div class="mb-3">
    <form action="" method="post" enctype="multipart/form-data">
        <ul>
            <li>
                <label for="id">ID dokumen: </label>
                <input type="text" name="id" id="id" required>
            </li>
            <li>
                <label for="nama">Nama : </label>
                <input type="text" name="Nama" id="Nama" required>
            </li>
            <li>
                <label for="jenisfile">Tipe Dokumen : </label>
                <input type="text" name="file" id="jenisfile" required>
            </li>
            <li>
                <button type="submit" name="submit"> Tambah Data!</button>
            </li>
</ul>
</form>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>
</html>