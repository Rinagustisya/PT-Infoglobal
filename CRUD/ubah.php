<?php
require 'koneksi.php';


//query data mahasiswa berdasarkan id
$id= $_GET['id'];
        $data = mysqli_query ($koneksi, "SELECT*FROM dokumen WHERE id='$id'");
        while ($a= mysqli_fetch_array($data))
if (isset($_POST ["submit"]) ) {


// CEK APAKAH DATA BERHASIL DI UBAH ATAU TIDAK
		if (ubah($_POST)) {
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
        <ul>
            <li>
                <label for="id">ID dokumen: </label>
                <input type="text" name="id" id="id" required  value="<?php echo $a['id']; ?>">
            </li>
            <li>
                <label for="nama_doc">Nama : </label>
                <input type="text" name="nama_doc" id="nama_doc" required  value="<?php echo $a['nama_doc']; ?>">
            </li>
            <li>
                <label for="tipe_doc">Tipe Dokumen : </label>
                <input type="text" name="tipe_doc" id="tipe_doc" required  value="<?php echo $a['tipe_doc']; ?>">
            </li>
            <li>
                <button type="submit" name="submit"> Ubah Data!</button>
            </li>
</ul>
</form>
</body>
</html>