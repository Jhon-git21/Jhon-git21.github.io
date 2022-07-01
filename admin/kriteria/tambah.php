<h1 style="font-family: 'Agency FB'">Tambah Kriteria</h1>

<hr>
<form method="POST">
	<div class="form-group">
		<label>Nama Kriteria</label>
		<input type="text" class="form-control" name="nama_kriteria" required="" pattern="[A-Za-z\s]{2,}">
	</div>

	<div class="form-group">
		<label>Minimal Nilai</label>
		<input type="number" class="form-control" name="minimal_nilai" required="">
	</div>

	<div class="form-group">
		<label>Maksimal Nilai</label>
		<input type="number" class="form-control" name="maksimal_nilai" required="">
	</div>

	<hr>
	<button class="btn btn-success" name="simpan" style="font-weight: bold; font-family: cambria">SIMPAN</button> 
</form>

<?php 
if (isset($_POST['simpan']))
{
	$hasil = $kriteria->tambah($_POST['nama_kriteria'], $_POST['minimal_nilai'], $_POST['maksimal_nilai']);

	if ($hasil=="sukses") {
		echo "<script>alert('Data Berhasil Ditambahkan')</script>";
		echo "<script>location='?kriteria'</script>";
	}
	else

	{
		echo "<script>alert('Data yang Ditambahkan Gagal!!')/script>";
	}
}
?>
