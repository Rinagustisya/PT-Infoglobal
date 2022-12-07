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
	while ($row = mysqli_fetch_assoc($result) ) 
	{}
}

function cari($keyword) {
	$query = "SELECT * FROM dokumen
			WHERE
		id LIKE '%$keyword%' OR
		nama_doc LIKE '%$keyword%' OR
		tipe_doc LIKE '%$keyword%'
	";
	return query($query);
}

function tambah($data) {
	global $koneksi;
$nama_doc = htmlspecialchars ($data["nama_doc"]);
$tipe_doc = htmlspecialchars($data["tipe_doc"]);

$query = "INSERT INTO dokumen
		VALUES 
		('','$nama_doc', '$tipe_doc')
		";
	mysqli_query ($koneksi, $query);

return mysqli_affected_rows ($koneksi);

}

function upload() {

	$ekstensi_diperbolehkan    = array('pdf','docx','doc','ppt','pptx','xls','txt');
        $nama    = $_FILES['tipe_doc']['nama_doc'];
        $x        = explode('.', $nama);
        $ekstensi    = strtolower(end($x));
        $ukuran        = $_FILES['tipe_doc']['size'];
        $file_tmp    = $_FILES['tipe_doc']['tmp_name']; 
     
        if(in_array($ekstensi, $ekstensi_diperbolehkan) === true){
            if($ukuran < 1044070){ 
                move_uploaded_file($file_tmp, 'aset/'.$nama);
                $query    = mysql_query("INSERT INTO dokumen VALUES(NULL,'$nama')");
                if($query){
                    echo 'FILE BERHASIL DI UPLOAD!';
                }
                else{
                    echo 'FILE GAGAL DI UPLOAD!';
                }
            }
            else{
                echo 'UKURAN FILE TERLALU BESAR!';
            }
        }
        else{
            echo 'EKSTENSI FILE YANG DI UPLOAD TIDAK DI PERBOLEHKAN!';
        }
    }


function ubah($data) {
    global $koneksi;
	$id = $data["id"];
	$nama_doc = $data["nama_doc"];
	$tipe_doc = $data["tipe_doc"];
	
	// query insert data 
	// sebelum where gausah koma, enakan dibikin satu baris biar keliatan
	$query = "UPDATE dokumen SET nama_doc = '$nama_doc', tipe_doc = '$tipe_doc' WHERE id = $id ";
	mysqli_query($conn, $query);

	return mysqli_affected_rows($conn);
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