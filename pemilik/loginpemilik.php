<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>LOGIN PEMILIK</title>
	<link rel="stylesheet" href="../admin/assets/css/bootstrap.css">
	<link rel="stylesheet" href="../admin/assets/css/loginkaryawan.css">
</head>


<form class="box"  method="POST">

<h1 style="font-weight: bold;font-family: 'cambria'">LOGIN HERE</h1>

<input style="font-family: 'cambria'" type="text" name="username" placeholder="Username">

<input style="font-family: 'cambria'" type="password" name="password" placeholder="Password">

<input type="submit" name="login" value="Login">

<hr>
<a href="../loginkaryawan.php" style="font-weight: bold; font-family: cambria" class="btn btn-danger">LOGIN KARYAWAN</a> | <a href="../admin/login.php" style="font-weight: bold; font-family: cambria" class="btn btn-success">LOGIN ADMIN</a>



</form>


<!-- <body>
	
	<div class="container">
		<div class="login-box">
			<div class="panel panel-success">
				<div class="panel panel-heading">
					<h3 class="panel-title" style="font-weight: bold; font-family: 'cambria'">Login Karyawan</h3>
				</div>
				<div class="panel-body">
					<form method="POST">
						<div class="form-group">
							<label style="font-family: 'cambria'">Username</label>
							<input type="text"class="form-control"
							name="username">
						</div>
						<div class="form-group">
							<label style="font-family: 'cambria'">Password</label>
							<input type="password" class="form-control" name="password">
						</div>
						<button class="btn btn-danger btn-md" style="font-weight: bold; font-family: 'cambria'" name="login">LOGIN</button>
						<a href="admin/login.php" class="btn btn-primary" style="font-weight: bold; font-family: 'cambria'">Login Admin</a>
					</form>
				</div>
			</div>
		</div>
	</div>
</body> -->
</html>

<?php  

include '../config/mysqli.php';

if (isset($_POST['login'])) {
	$hasil = $pemilik->login($_POST['username'],$_POST['password']);

	if ($hasil=='Sukses') {
		echo "<script>location='../pemilik/index.php';</script>";
	}
	elseif ($hasil=='Salah') {
		echo "<script>alert('Password Salah!!');</script>";
	}
	elseif ($hasil=='tidak_ada') {
		echo "<script>alert('Akun Tidak Ditemukan!!');</script>";
	}
	
}
?>