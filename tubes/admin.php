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
	<title>Halaman Admin</title>
	<link rel="stylesheet" type="text/css" href="../css/admin.css">

</head>
<body>
	<a href="index.php"><button>Logout</button></a>
	<a href="tambah.php"><button>Tambah Data</button></a>
	<form action="" method="get">
		<input type="text" name="s" id="s" class="from-control" placeholder="Search...">
		<button type="submit" name="cari" id="cari">Cari</button>
	</form>
	<br><br>
	
	<div class="container">
		<table border="1px" cellpadding="2px">
	<thead>
		<tr>
			<th>#</th>
			<th>Opsi</th>
			<th>Gambar</th>
			<th>Nama Mobil</th>
			<th>Merk</th>
			<th>BBM</th>
			<th>Harga</th>
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
					<td><?php echo $no++; ?></td>
					<td>
						<a href="hapus.php?id=<?php echo $m['id']; ?>"><button>Hapus</button></a>
						<a href="ubah.php?id=<?php echo $m['id']; ?>"><button>Ubah</button></a>
					</td>
					<td><img width="120px" src="../assets/img/<?= $m['gambar'] ?>"></td>
					<td><?php echo $m['nama']; ?></td>
					<td><?php echo $m['merk']; ?></td>
					<td><?php echo $m['bbm']; ?></td>
					<td><?php echo $m['harga']; ?></td>
				</tr>

			<?php endforeach ?>	
		<?php endif ?>
			
		
	</tbody>
</table>
	</div>
</body>
</html>