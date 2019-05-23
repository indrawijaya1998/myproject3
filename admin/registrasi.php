<?php 
require 'function.php';

if (isset($_POST["register"]) ) {

	if (registrasi($_POST) > 0) {
		echo "<script>
					alert('user baru berhasil ditambahkan!');

					</script>";
	} else {
		echo mysqli_error($conn);
		# code...
	}
	
	# code...
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Halaman Registrasi</title>
	<style type="text/css">
		label {
			display: block;
		}
	</style>
	<h1>Halaman Registrasi</h1>
	<form action="" method="post">
			<ul>
				<li>
					<label for="first_name">First Name:</label>
					<input type="text" name="first_name" id="first_name">
				</li>
				<li>
					<label for="last_name">Last Name:</label>
					<input type="text" name="last_name" id="last_name">
				</li>
				<li>
					<label for="email">Email:</label>
					<input type="text" name="email" id="email">
				</li>
				<li>
					<label for="username">Username:</label>
					<input type="text" name="username" id="username">
				</li>
				<li>
					<label for="password">Password:</label>
					<input type="password" name="password" id="password">
				</li>
				<li>
					<label for="password2">Konfirmasi Password:</label>
					<input type="password" name="password2" id="password2">
				</li>
				<li>
					<button type="submit" name="register">Create Account!</button>
				</li>
			</ul>
	</form>
</head>
<body>

</body>
</html>