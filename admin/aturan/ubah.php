<?php
$id_aturan = $_GET['id'];
$data_aturan = $aturan->ambil_aturan($id_aturan);?>

<h1 style="font-family: 'Agency FB'">Ubah Aturan</h1>

<br>
<form method="POST">
	<div class="form-group">
		<label>Nama Aturan</label>
		<input type="text" class="form-control" name="nama_aturan" required="Harus Diisi" value="<?php echo $data_aturan['nama_aturan'] ?>">
	</div>

	<div class="form-group">
		<label>Hasil Aturan</label>
		<input type="text" class="form-control" name="hasil_aturan" value="<?php echo $data_aturan['hasil_aturan'] ?>">
	</div>

	<hr>
	<button class="btn btn-success" style="font-weight: bold; font-family: 'cambria'" name="simpan">SIMPAN</button>
</form>

<?php 
if (isset($_POST['simpan']))
{
	$hasil = $aturan->ubah($_POST['nama_aturan'], $_POST['hasil_aturan'], $id_aturan);

	if ($hasil=="sukses") {
		echo "<script>alert('Data Berhasil Ditambahkan')</script>";
		echo "<script>location='?aturan'</script>";
	}
	else

	{
		echo "<script>alert('Data yang Ditambahkan Gagal!!')/script>";
	}
}
  ?>
