<?php 
require 'function.php';
$id = $_GET['id'];
$m = query("SELECT * FROM daftar_mobil WHERE id = $id");

if (isset($_POST['ubah'])){
	if (ubah($_POST) > 0){
		echo "<script>
			alert('Data Berhasil Diubah!');
			document.location.href = 'index.php';
		</script>";
	}else{
		echo "<script>
			alert('Data Gagal Diubah!');
		</script>";

	}
}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Ubah Data Mobil</title>
	<link rel="stylesheet" type="text/css" href="../css/ubah.css">

</head>
<body>
<div class="container">
<form action="" method="post" enctype="multipart/form-data">
	<input type="hidden" name="id" <"?= $m['id']; ?>">
	<input type="hidden" name="gambarLama" <"?= $m['gambar']; ?>">

	<label for="gambar">Gambar</label>:
	<img src="img/<?= $m['gambar']; ?>">
	<input type="file" name="gambar" id="gambar"><br>
	
	<label for="nama">Nama Mobil</label>:
	<input type="text" name="nama" id="nama" value="<?= $m['nama']?>"autofocus="on"><br>
	
	<label for="merk">Merk</label>:
	<input type="text" name="merk" id="merk"value="<?= $m['merk']?>"><br>
	
	<label for="bbm">BBM</label>:
	<input type="text" name="bbm" id="bbm" value="<?= $m['bbm']?>"><br>
	
	<label for="harga">Harga</label>:
	<input type="text" name="harga" id="harga" value="<?= $m['harga']?>"><br>

	<button type="submit" name="ubah">Ubah</button>

</form>
</div>
</body>

</html>