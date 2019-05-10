<?php
//Connect To Databases
$conn = mysqli_connect('localhost', 'root', '', 'daftar_mobil');

function query($query) {
	global $conn;
	
	$result = mysqli_query($conn, $query);
	
	$rows = [];
	while($row = mysqli_fetch_assoc($result)) {
		$rows[] = $row;
	}
	return $rows;
}



function tambah($data) {
	global $conn;

	$nama = htmlspecialchars($data["nama"]);
	$merk = htmlspecialchars($data["merk"]);
	$bbm = htmlspecialchars($data["bbm"]);
	$harga = htmlspecialchars($data["harga"]);


	//upload gambar
$foto = upload();
if(!$foto) {
	return false;
}
	
	// Query insert data 
	$query = "INSERT INTO daftar_mobil VALUES 
				('', '$foto', '$nama', '$merk', '$bbm', '$harga')
			 ";
	mysqli_query($conn, $query);
	
	return mysqli_affected_rows($conn);
}

// Functions upload
function upload() {

	$namaFile = $_FILES['gambar']['name'];
	$ukuranFile = $_FILES['gambar']['size'];
	$error = $_FILES['gambar']['error'];
	$tmpName =$_FILES['gambar']['tmp_name'];

	//cek apakah tidak ada gambar yang diupload
	if($error === 4) {
	echo"<script>
	alert('Pilih gambar terlebih dahulu!');
	</script>";
		return false;
	}

	//cek apakah yang diupload adalah gambar
	$ekstensiGambarValid = ['jpg','jpeg', 'png'];
	$ekstensiGambar =explode('.', $namaFile);
	$ekstensiGambar = strtolower (end($ekstensiGambar));
	if( !in_array($ekstensiGambar, $ekstensiGambarValid)) {

			echo"<script>
	alert('yang anda upload bukan gambar!');
	</script>";
		return false;

	}
// cek jika ukurannya terlalu besar
	if( $ukuranFile > 1000000) {
			echo"<script>
	alert('Ukuran Gambar terlalu besar!');
	</script>";
		return false;
	}

	// lolos pengecekan, gambar siap diupload
	// generate nama gambar baru

	$namaFileBaru = uniqid();
	$namaFileBaru .= '.';
	$namaFileBaru .= $ekstensiGambar;
	
	move_uploaded_file($tmpName, '../assets/img/' . $namaFileBaru);

	return $namaFileBaru;

}

function hapus($id) {
	global $conn;
	mysqli_query($conn, "DELETE FROM daftar_mobil WHERE id = $id");
	
	return mysqli_affected_rows($conn);
}


function ubah($data) {
	global $conn;
	
	$id = $data["id"];
	$gambar = htmlspecialchars($data["gambar"]);
	$nama = htmlspecialchars($data["nama"]);
	$merk = htmlspecialchars($data["merk"]);
	$bbm = htmlspecialchars($data["bbm"]);
	$gambarLama = htmlspecialchars($data["gambarLama"]);
	$harga = htmlspecialchars($data["harga"]);
    

    // cek apakah user pilih gambar baru atau tidak
    if( $_FILES['gambar']['error'] === 4) {
    	$gambar = $gambarLama;
    }else {
    	$gambar = upload();
    }
	// Query insert data 
	$query = "UPDATE daftar_mobil SET 
				Gambar = '$gambar',
				Nama = '$nama',
				Merk = '$merk',
				BBM = '$bbm',
				Harga = '$harga'
				
			 WHERE id = $id
			 ";
	mysqli_query($conn, $query);
	
	return mysqli_affected_rows($conn);
}

function cari($keyword) {
	$query = "SELECT * FROM daftar_mobil WHERE
				Gambar LIKE '%$keyword%' OR
				Nama LIKE '%$keyword%' OR
				Merk LIKE '%$keyword%' OR
				BBM LIKE '%$keyword%' OR
				Harga LIKE '%$keyword%'
			";
	return query($query);
}

function registrasi($data) {
	global $conn;

	$username =strtolower(stripslashes($data["username"]));
	$password =mysqli_real_escape_string($conn, $data["password"]);
	$password2 =mysqli_real_escape_string($conn, $data["password2"]);

	// cek username sudah ada atau belum

     $result = mysqli_query($conn, "SELECT username FROM user WHERE username = '$username'");
     if( mysqli_fetch_assoc($result)) {
     	echo "<script>
     	alert('username sudah terdaftar!')</script>";

     	return false;
     }


	//cek konfirmasi password
	if( $password !== $password2) {
		echo "<script>
		alert('konfirmasi password tidak sesuai!');
		</script>";

		return false;
	}

	// enkripsi password
	$password = password_hash($password, PASSWORD_DEFAULT);

	//tambahkan user baru ke data base

	mysqli_query($conn, "INSERT INTO user VALUES('', '$username', '$password')");

	return mysqli_affected_rows($conn);


}








?>
