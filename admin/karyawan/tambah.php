<h1 style="font-weight: bold; font-family: 'Agency FB'">Tambah Karyawan</h1>
<hr>
<form method="POST" enctype="multipart/form-data">
	<div class="form-group">
		<label>Foto</label>
		<input type="file" class="form-control" name="foto">
	</div>

	<div class="form-group">
		<label>Nama</label>
		<input type="text" class="form-control" name="nama" required oninvalid="this.setCustomValidity('Masukkan Nama')" oninput="setCustomValidity('')" pattern="[A-Za-z\s]{2,}">
	</div>

	<div class="form-group">
		<label>NIP</label>
		<input type="number" class="form-control" name="nip" required oninvalid="this.setCustomValidity('Masukkan NIP')" oninput="setCustomValidity('')">
	</div>

	<div class="form-group">
		<label>Jenis Kelamin</label>
		<select class="form-control" name="jenis_kelamin" required oninvalid="this.setCustomValidity('Pilih Jenis Kelamin')" oninput="setCustomValidity('')">
			<option value="Laki - Laki">Laki - Laki</option>
			<option value="Perempuan"> Perempuan</option>
		</select>
	</div>

	<div class="form-group">
		<label>Tanggal Lahir</label>
		<input type="date" class="form-control" name="tgl_lahir" required oninvalid="this.setCustomValidity('Masukkan Tanggal Lahir')" oninput="setCustomValidity('')">
	</div>

	<div class="form-group">
		<label>Alamat</label>
		<textarea class="form-control" name="alamat" id="editor" required oninvalid="this.setCustomValidity('Masukkan Alamat')" oninput="setCustomValidity('')"></textarea>
	</div>

	<div class="form-group">
		<label>Email</label>
		<input type="email" class="form-control" name="email" required oninvalid="this.setCustomValidity('Masukkan Email')" oninput="setCustomValidity('')">
	</div>

	<div class="form-group">
		<label>No. HP</label>
		<input type="number" class="form-control" name="no_hp" required oninvalid="this.setCustomValidity('Masukkan Nomor Handphone')" oninput="setCustomValidity('')">
	</div>

	<button style="font-weight: bold; font-family: cambria" class="btn btn-success" name="simpan">SIMPAN</button>

</form>

<?php  

if (isset($_POST['simpan'])) 
{
	$hasil = $karyawan->tambah($_POST['nip'], $_POST['nama'], $_POST['jenis_kelamin'], $_POST['tgl_lahir'], $_POST['alamat'], $_POST['no_hp'], $_POST['email'], $_FILES['foto']);

	if ($hasil=='sukses') 
	{
	echo "<script>alert('Data Berhasil Disimpan')</script>";
	echo "<script>location='?karyawan'</script>";
	}
	else
	{
		echo "<script>alert('Data Gagal Disimpan')</script>";
		echo "<script>location='?karyawan==tambah'</script>";
	}
}
?>