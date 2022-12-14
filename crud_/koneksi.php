<?php
$koneksi = mysqli_connect("localhost" ,"root", "","crud");

$data = mysqli_query($koneksi, "SELECT*FROM dokumen");

function hapus($id) {
    global $koneksi;
    mysqli_query($koneksi, "DELETE FROM dokumen WHERE id = $id");
    return mysqli_affected_rows($koneksi);
}

function query ($query) {
	global $koneksi;
	$result= mysqli_query ($koneksi, $query);
	$rows = [];
	while($row = mysqli_fetch_assoc($result)) {
		$rows[] = $row; 
	}
		return $rows;
}

function cari($keyword) {
	$query = "SELECT * FROM dokumen
			WHERE
		id LIKE '%$keyword%' OR
		nama LIKE '%$keyword%' OR
		berkas LIKE '%$keyword%'
	";
	return query($query);
}

function tambah($data) {
	global $koneksi, $_SESSION;
$nama = htmlspecialchars ($data['nama']);
$berkas = htmlspecialchars($_FILES['berkas']['name']);
$access = htmlspecialchars($data["access"]);
$created_by = $_SESSION['username'];

// upload file
$berkas = upload();
if (!$berkas) {
	return false;
}

$query = "INSERT INTO dokumen
		VALUES 
		('','$nama', '$berkas', '$access', '$created_by')
		";
	mysqli_query ($koneksi, $query);

return mysqli_affected_rows ($koneksi);

}

function upload() {

	$namaFile = $_FILES['berkas']['name'];
	$ukuranFile = $_FILES['berkas']['size'];
	$error = $_FILES['berkas']['error'];
	$tmpName = $_FILES['berkas']['tmp_name'];

	// cek apakah tidak ada doc yang diupload
	if ($error === 4) {
		echo "<script>
				alert('pilih dokumen terlebih dahulu')
				</script>";
		return false;
	}

	// cek apakah yang diupload adalah gambar
	$ekstensiFileValid= ['docx', 'pdf', 'txt', 'pptx', 'ppt'];
	$ekstensiFile = explode('.', $namaFile);
	$ekstensiFile = strtolower(end($ekstensiFile));
	if (!in_array($ekstensiFile, $ekstensiFileValid)) {
		echo "<script>
				alert('yang anda upload bukan dokumen')
			</script>";
		return false;
	}

	// cek jika ukurannya terlalu besar
	if ($ukuranFile > 10000000) {
		echo "<script>
				alert('ukuran dokumen terlalu besar')
				</script>";
		return false;
	}

	// lolos pengecekan file siap diupload
	// generate nama file baru
	$namaFileBaru = uniqid();
	$namaFileBaru .= '.';
	$namaFileBaru .= $ekstensiFile;
	// file udah berhasil keupload tapi namanya ngaco, di kodingan php dasarmu errornya juga gini
	// gara gara kurang slash sama folder doc harus dibuat dulu di dalem asset
	move_uploaded_file($tmpName, 'asset/doc/' . $namaFileBaru);

	return $namaFileBaru;
}

function ubah($data) {
    global $koneksi;
	$id = $data['id'];
	$nama = $data['nama'];
	$berkas = $data['berkas'];
	$access = $data["access"];
	$created_by = $data["created_by"];


	// query insert data 
	// sebelum where gausah koma, enakan dibikin satu baris biar keliatan
	$query = "UPDATE dokumen SET nama = '$nama', berkas = '$berkas' , access = '$access', created_by = '$created_by' WHERE id = $id ";
	mysqli_query($koneksi, $query);

	return mysqli_affected_rows($koneksi);
    }
    
	function registrasi($data) {
		global $koneksi;
	
		$username = strtolower(stripcslashes($data["username"])) ;
		$password = mysqli_real_escape_string($koneksi, $data["password"]);
		$password2 = mysqli_real_escape_string($koneksi, $data["password2"]);
	
		// cek username  sudah ada atau belum
		$result = mysqli_query($koneksi, "SELECT username FROM user WHERE username = '$username'");
		if (mysqli_fetch_assoc($result)) {
			echo "<script>
				alert('username yang dipilih sudah terdaftar!');
					</script>";
			return false;
		}
	
		// cek konfirmasi password
		if ($password !== $password2) {
			echo "<script>
				alert ('Konfirmasi password tidak sesuai!');
				</script>";
			return false;
		}
	
		// enkripsi password
		$password = password_hash($password, PASSWORD_DEFAULT);
	
		// tambahkan userbaru ke database
		mysqli_query($koneksi, "INSERT INTO user VALUES ('','$username', '$password')");
	
		return mysqli_affected_rows($koneksi);
	}
?>