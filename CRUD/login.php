<?php
session_start();
require 'koneksi.php';

// ambil username berdasarkan id
$result = mysqli_query($koneksi,"SELECT username FROM user WHERE id_user = '$id'");
$row = mysqli_fetch_assoc($result);

if (isset($_POST["login"])) {
	$username = $_POST ["username"];
	$password = $_POST["password"];

	$result = mysqli_query($koneksi, "SELECT * FROM user WHERE username = '$username'");
}
header("location:index.php");
exit;

$error = true;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>
<body>
<div class="container">
  <h3>Silahkan Login Terlebih Dahulu</h3>
 
<form class="col-6">
  <div class="mb-4">
    <label for="username" class="form-label">Username :</label>
    <input type="username" class="form-control" id="username" aria-describedby="username">
    <div id="username" class="form-text">We'll never share your email with anyone else.</div>
  </div>
  <div class="mb-3">
    <label for="password" class="form-label">Password : </label>
    <input type="password" class="form-control" id="password">
  </div>
  <div class="mb-3 form-check">
    <input type="checkbox" class="form-check-input" id="username">
    <label class="form-check-label" for="password">Check me out</label>
  </div>
  <button type="submit" class="btn btn-primary">Login</button>
</form>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>
</html>