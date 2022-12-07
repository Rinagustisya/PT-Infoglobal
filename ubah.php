<?php
require 'koneksi.php';

// ambil data di url
$id = $_GET["id"];

if (isset($_POST ["submit"]) ) {


// CEK APAKAH DATA BERHASIL DI UBAH ATAU TIDAK
		if (ubah($_POST)>0 ) {
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
</head>
<body>
    <h3>Ubah Data</h3>
    <form action="" method="post" enctype="multipart/form-data">
    <input type="hidden" name="id">
        <ul>
            <li>
                <label for="nama_doc">Nama Dokumen : </label>
                <input type="text" name="nama_doc" id="nama_doc" required>
            </li>
            <li>
                <label for="tipe_doc">Tipe Dokumen : </label>
                <input type="file" name="tipe_doc" id="tipe_doc" required>
            </li>
            <li>
                <button type="submit" name="upload"> Ubah Data!</button>
            </li>
</ul>
</form>
</body>
</html>