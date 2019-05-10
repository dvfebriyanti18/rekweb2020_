<?php
require 'function.php';
$id = $_GET['id'];

$mobil = query("SELECT * FROM daftar_mobil WHERE id = $id")[0];
?>
<!DOCTYPE html>
<html>

<head>
	<title>Details Mobil</title>
</head>

<body>
	<style>
		body {
			background-color :rgba(92, 114, 131, 0.9);
		}
	</style>
	<div class="left-btns">
		<a href="index.php" class="btn1">
		<i class="fas fa-user-plus"></i><button>Kembali</button></a>
	</div>	
	<h2>Details Mobil</h2>
		<div class="content">
           <div class="gambar">
                   <p><img height="300" width="300"  src="../assets/img/<?= $mobil['gambar']; ?>">
           </div>
				<th>
					<h3><td>Nama Mobil : <?php echo $mobil['nama']; ?></h3></td>
					<h3><td>Merk : <?php echo $mobil['merk']; ?></h3></td>
					<h3><td>BBM  : <?php echo $mobil['bbm']; ?></h3></td>
					<h3><td>Harga : <?php echo $mobil['harga']; ?></h3></td>	
				</th>
	</div>

</body>
</html>