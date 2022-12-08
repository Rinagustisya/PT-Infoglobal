<?php
require 'koneksi.php';
if (isset($_POST["register"])) {
    if (registrasi($_POST) > 0) {
        echo "<script>
                alert('User baru berhasil ditambahkan!')
            </script>";
    } else {
        echo mysqli_error($koneksi);
    }
}
?>
<html>

<head>
    <title>Halaman Registrasi</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
	<link rel="stylesheet" href="asset/style/style.css">
    <style>
        label {
            display: block;
        }
    </style>
</head>

<body>
    <div class="vh-100 d-flex justify-content-center align-items-center">
        <div class="col-md-4 p-5 shadow-sm border rounded-5 border-primary">
            <h1>Halaman Registrasi</h1>
            <form action="" method="post">
                <div class="mb-3">
                    <label for="username">Username :</label>
                    <input type="text" name="username" id="username" class="form-control bg-info bg-opacity-10 border border-primary">
                </div>
                <div class="mb-3">
                    <label for="password">Password :</label>
                    <input type="password" name="password" id="password" class="form-control bg-info bg-opacity-10 border border-primary">
                </div>
                <div class="mb-3">
                    <label for="password2">Konfirmasi password :</label>
                    <input type="password" name="password2" id="password2" class="form-control bg-info bg-opacity-10 border border-primary">
                </div>
                <div class="grid">
                    <button type-="submit" name="register" class="btn btn-primary">Register</button>
                </div>
                <div class="mt-3">
                    <p class="mb-0  text-center">Sudah Punya Akun? <a href="login.php" class="text-primary fw-bold">Sign
                            In</a></p>
                </div>

            </form>
        </div>
    </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</html>