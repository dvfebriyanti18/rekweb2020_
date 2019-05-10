<?php 
require 'function.php';
$keyword = $_GET["keyword"];
$query = "SELECT * FROM daftar_mobil 
				WHERE
		id LIKE '%$keyword%' OR
		gambar LIKE '%$keyword%' OR
		nama LIKE '%$keyword%' OR
		merk LIKE '%$keyword%' OR
		bbm LIKE '%$keyword%' OR
		harga LIKE '%$keyword%'";
;
$daftar_mobil = query($query);
?>

<table border="1px" cellpadding="2px">
	<thead>
		<tr>
			<th>#</th>
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
					<td><?php echo $no++;?></td>
					<td><img width="200px" src="../assets/img/<?= $m['gambar'] ?>"></td>
					<td><?php echo $m['nama']; ?></td>
					<td><button type="button"><a href="index2.php?id=<?= $m['id']; ?>">Detail</a></button></td> 
				</tr>
		

			<?php endforeach ?>	
		<?php endif ?>
			
		
	</tbody>
</table>