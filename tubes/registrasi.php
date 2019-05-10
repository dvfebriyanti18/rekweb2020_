<?php 
require 'function.php';

if(isset($_POST['register'])) {

	if ( registrasi($_POST) > 0 ){
		echo "<script>
				alert('user baru berhasil ditambahkan!')
				document.location.href='login.php'
			  </script>";
	}else {
		echo mysqli_error($conn);

	}
}
?>


<!DOCTYPE html>
<html>
<head>
	<title>Halaman Registrasi</title>
	<link rel="stylesheet" type="text/css" href="../css/registrasi.css">

	<style>
		label {
			display: block;
		}

	</style>
</head>
<body>
	<div class="container">
	<h1>Halaman Registrasi</h1>

	<form action="" method="post">
		<ul>
			<li>
				<label for="username">Username :</label>
				<input type="text" name="username" id="username">
			</li>
			<li>
				<label for="password">Password :</label>
				<input type="password" name="password" id="password">
			</li>
			<li>
				<label for="password2">Konfirmasi password :</label>
				<input type="password" name="password2" id="password2">
			</li>
			<li>
				<button type="submit" name="register">Register!</button>
				<button><a href="login.php">Kembali ke login</a></button>
			</li>

		</ul>		
	</form>
	</div>

</body>
</html>