<?php
require 'function.php';

if (isset($_GET['cari'])){
	$keyword = $_GET['s'];
	$mobil = query("SELECT * FROM daftar_mobil WHERE
		id LIKE '%$keyword%' OR
		gambar LIKE '%$keyword%' OR
		nama LIKE '%$keyword%' OR
		merk LIKE '%$keyword%' OR
		bbm LIKE '%$keyword%' OR
		harga LIKE '%$keyword%'");

}else{
	$mobil = query("SELECT * FROM daftar_mobil");
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Halaman User</title>
	<link rel="stylesheet" type="text/css" href="../css/index.css">




</head>
<body>
	<a href="login.php"><button>Login</button></a>
	<form action="" method="get">
		<input type="text" name="s" id="keyword" class="from-control" placeholder="Search..." autofocus>
		<button type="submit" name="cari" id="tombol-cari">Cari</button>
	</form>
	<br><br>

<div id="container">
<table border="1px" cellpadding="2px">
	<thead>
		<tr>
			<th>Gambar</th>
			<th>Nama Mobil</th>
			<th>Spesifikasi</th>
		</tr>
	</thead>
	<tbody>
		<?php if(empty($mobil)) : ?>
			<tr>
				<td colspan="7">
					<h1 align="center">Data Tidak Ditemukan!</h1>
				</td>
			</tr>
		<?php else :  ?>

			<?php $no = 1; ?>
			<?php foreach ($mobil as $m): ?>
				<tr>
					<td><img width="200px" src="../assets/img/<?= $m['gambar'] ?>"></td>
					<td><?php echo $m['nama']; ?></td>
					<td><button type="button"><a href="index2.php?id=<?= $m['id']; ?>">Detail</a></button></td> 
				</tr>
		

			<?php endforeach ?>	
		<?php endif ?>
			
		
	</tbody>
</table>
</div>
<script src="../js/script.js"></script>
</body>
</html>