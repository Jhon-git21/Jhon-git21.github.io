<h1 style="font-family: 'Agency FB'">Tambah Aturan</h1>

<hr>
<br>
<form method="POST">
	<div class="form-group">
		<label>Nama Aturan</label>
		<input type="text" class="form-control" name="nama_aturan" required="Harus Diisi">
	</div>

	<div class="form-group">
		<label>Hasil Aturan</label>
		<input type="text" class="form-control" name="hasil_aturan">
	</div>

	<hr>
	<button class="btn btn-success" name="simpan" style="font-weight: bold; font-family: 'cambria'">SIMPAN</button>
</form>

<?php 
if (isset($_POST['simpan']))
{
	$hasil = $aturan->tambah($_POST['nama_aturan'], $_POST['hasil_aturan']);

	if ($hasil=="sukses") {
		echo "<script>alert('Data Berhasil Ditambahkan')</script>";
		echo "<script>location=''</script>";
	}
	else

	{
		echo "<script>alert('Data yang Ditambahkan Gagal!!')/script>";
	}
}
?>
