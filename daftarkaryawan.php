<?php  
include 'config/mysqli.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Daftar Karyawan</title>
	<link rel="stylesheet" href="admin/assets/css/bootstrap.css">
	<link rel="stylesheet" href="admin/assets/css/pengunjung.css">
	<style>
		body{
			padding-top: 0px;
			padding-bottom: 0px;
			margin-top: 0px;
			margin-bottom: 0px;
		}
		#konten{
			background-image: url('images/Background-daftar.jpg');
			background-position: left;
			padding-top: 0;
			margin-top: 0;
			font-family: cambria, century;
		}
	</style>

</head>
<body>
	<div class="container" id="konten">
		<h1 class="text-center" style="font-weight: bold">Pendaftaran Karyawan</h1>
			<br>
			<form method="POST" enctype="multipart/form-data">

				<div class="form-group">
					<label>NIP</label>
					<input type="text" class="form-control" name="nip">
				</div>

				<div class="form-group">
					<label>Nama</label>
					<input type="text" class="form-control" name="nama">
				</div>

				<div class="form-group">
					<label>Jenis Kelamin</label>
					<select class="form-control" name="jenis_kelamin">
						<option value="Laki - Laki">Laki - Laki</option>
						<option value="Perempuan">Perempuan</option>
					</select>
				</div>

				<div class="form-group">
					<label>Tanggal Lahir</label>
					<input type="date" name="tgl_lahir" class="form-control">
				</div>

				<div class="form-group">
					<label>Alamat</label>
					<textarea name="alamat" cols="30" rows="10" class="form-control"></textarea>
				</div>

				<div class="form-group">
					<label>Nomor Telepon/Seluler</label>
					<input type="text" class="form-control" name="nomor_telepon">
				</div>

				<div class="form-group">
					<label>Email</label>
					<input type="text" class="form-control" name="email">
				</div>

				<div class="form-group">
					<label>Password</label>
					<input type="password" class="form-control" name="password">
				</div>

				<div class="form-group">
					<label>Foto</label>
					<input type="file" name="gambar">
				</div>
				<hr>
				<button class="btn btn-lg btn-success" name="simpan">Simpan</button>
			</div>
		</form>
	</body>
	</html>

	<?php 	
	if (isset($_POST['simpan']))
	{
		$hasil = $pelamar->tambah($_POST['nip'], $_POST['nama'], $_POST['jenis_kelamin'], $_POST['tgl_lahir'], $_POST['alamat'], $_POST['nomor_telepon'], $_POST['email'], $_POST['password'], $_FILES['gambar']);

		if ($hasil=="sukses") {
			echo "<script>alert('Data Berhasil Ditambahkan')</script>";
			echo "<script>location='indexkaryawan.php'</script>";
		}

		else

		{
			echo "<script>alert('Tambah Data Gagal!')/script>";
		}
	}
	?>


