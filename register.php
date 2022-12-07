<?php
require 'koneksi.php';

if ( isset($_POST["register"])) {

	if (registrasi($_POST) > 0) {
		echo "<script>
			alert('user baru berhasil ditambahkan');
			</script>";
	} else {
		echo mysqli_error($koneksi);
	}
    header("location:index.php");
}
?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Halaman Registrasi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
	<style>
		label {
			display: block;
		}
	</style>
</head>
<body>
<form action="" method="post">
<div class="vh-100 d-flex justify-content-center align-items-center">
    <div class="col-md-4 p-5 shadow-sm border rounded-5 border-primary">
        <h2 class="text-center mb-4">Halaman Registerasi</h2>
            <form action="" method="post">
            <div class="mb-3">
			<label for="username" class="form-label">username:</label>
			<input type="text" name="username" id="username" class="form-control border border-primary">
            </div>
            <div class="mb-3">
		    <label for="password" class="form-label">Password:</label>
			<input type="password" name="password" id="password" class="form-control border border-primary">
            </div>
            <div class="mb-3">
			<label for="password2" class="form-label">Konfirmasi Password:</label>
			<input type="password" name="password2" id="password2" class="form-control border border-primary">
            </div>
            <div class="d-grid">
			<button type="submit" name="register" class="btn btn-primary"> Register!</button>
            </div>
</form>
        </div>
	</div>

</form>


<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</body>
</html>