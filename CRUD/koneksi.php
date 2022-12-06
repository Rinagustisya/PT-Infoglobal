<?php
$koneksi = mysqli_connect("localhost", "root", "", "crud");
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


function tambah($data) {
	global $koneksi;
$id = htmlspecialchars($data ["id"]);
$nama = htmlspecialchars ($data["Nama"]);
$file = htmlspecialchars($data["file"]);

$query = "INSERT INTO dokumen
		VALUES 
		('$id', '$nama', '$file')
		";
	mysqli_query ($koneksi, $query);

return mysqli_affected_rows ($koneksi);

}

function ubah($data) {
    global $koneksi;
    $id = htmlspecialchars($data ["id"]);
    $nama_doc = htmlspecialchars($data ["nama_doc"]);
    $tipe_doc = htmlspecialchars ($data["tipe_doc"]);
    
    $query = "INSERT INTO dokumen
		VALUES 
		('$id', '$nama_doc', '$tipe_doc')
		";
	mysqli_query ($koneksi, $query);
    
    
    return mysqli_affected_rows ($koneksi);
    
    }
    
?>