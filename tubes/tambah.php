<?php 
require 'function.php';
if (isset($_POST['tambah'])){
	if (tambah($_POST) > 0){
		echo "<script>
			alert('Data Berhasil Ditambah!');
			document.location.href = 'admin.php';
		</script>";
	}else{
		echo "<script>
			alert('Data Gagal Ditambah!');
		</script>";

	}
}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Tambah Data Mobil</title>
	<link rel="stylesheet" type="text/css" href="../css/tambah.css">

</head>
<body>
<div class="container">
<form action="" method="post" enctype="multipart/form-data">
	<label for="gambar">Gambar</label>:
	<input type="file" name="gambar" id="gambar"><br>
	<label for="nama">Nama Mobil</label>:
	<input type="text" name="nama" id="nama" autofocud="on"><br>
	<label for="merk">Merk</label>:
	<input type="text" name="merk" id="merk"><br>
	<label for="bbm">BBM</label>:
	<input type="text" name="bbm" id="bbm"><br>
	<label for="harga">Harga</label>:
	<input type="text" name="harga" id="harga"><br>

	<button type="submit" name="tambah" id="submit">Tambah Data</button>

</form>
</body>
</html>