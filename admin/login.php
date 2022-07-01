<!DOCTYPE html>
<html lang="en">
<head>
	<!-- <meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Login Admin</title> -->
	<link rel="stylesheet" href="assets/css/bootstrap.css">
	<title>LOGIN ADMIN</title>
	<link rel="stylesheet" href="assets/css/login.css">
	<!-- <link rel="stylesheet" href="Admin/assets/css/style.css"> -->
</head>

<form class="box"  method="POST">

<h1 style="font-weight: bold;font-family: 'Agency FB'">LOGIN HERE</h1>

<input style="font-family: 'cambria'" type="text" name="username" placeholder="Username">

<input style="font-family: 'cambria'" type="password" name="password" placeholder="Password">

<input type="submit" name="login" value="Login">
<!-- <input type="submit" value="Login Karyawan" onclick=”window.location = ‘home.php’;”/> -->
<!-- <button type="button" class="btn btn-success" href="../loginkaryawan.php">Success</button> -->
<a href="../pemilik/loginpemilik.php" style="font-weight: bold; font-family: cambria" class="btn btn-primary">LOGIN PEMILIK</a>
<h4></h4>
<a href="../loginkaryawan.php" style="font-weight: bold; font-family: cambria" class="btn btn-danger">LOGIN KARYAWAN</a>


</form>

</html>

<?php 

include '../config/mysqli.php';

if (isset($_POST['login'])) {
	$hasil = $admin->login($_POST['username'],$_POST['password']);

	if ($hasil=='Sukses') {
		echo "<script>location='../admin/index.php?beranda';</script>";
	}
	elseif ($hasil=='Salah') {
		echo "<script>alert('Password Salah!!');</script>";
	}
	elseif ($hasil=='tidak_ada') {
		echo "<script>alert('Akun Tidak Ditemukan!!');</script>";
	}
	
}
?>
