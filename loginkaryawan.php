<?php  include 'config/mysqli.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>LOGIN KARYAWAN</title>
	<link rel="stylesheet" href="Admin/assets/css/bootstrap.css">
	<link rel="stylesheet" href="Admin/assets/css/loginkaryawan.css">
</head>


<form class="box"  method="POST">

<h1 style="font-weight: bold;font-family: 'Agency FB'">LOGIN HERE</h1>

<input style="font-family: 'cambria'" type="text" name="username" placeholder="Username">

<input style="font-family: 'cambria'" type="password" name="password" placeholder="Password">

<input type="submit" name="login" value="Login">

<hr>
<a href="admin/login.php" style="font-weight: bold; font-family: cambria" class="btn btn-success">LOGIN ADMIN</a> |	<a href="pemilik/loginpemilik.php" style="font-weight: bold; font-family: cambria" class="btn btn-primary">LOGIN PEMILIK</a>



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

if (isset($_POST['login'])) {
	$hasil = $karyawan->loginkaryawan($_POST['username'], $_POST['password']);

	if ($hasil=='sukses') {
		echo "<script>alert('Berhasil Login!')</script>";
		echo "<script>location='indexkaryawan.php';</script>";
	}
	elseif ($hasil=='salah') {
		echo "<script>alert('Password Salah!!');</script>";
		echo "<script>location='loginkaryawan.php';</script>";
	}
	elseif ($hasil=='tidak_ada'){
		echo "<script>alert('Akun Tidak Ditemukan');</script>";
		echo "<script>location='loginkaryawan.php';</script>";
	}
}

?>