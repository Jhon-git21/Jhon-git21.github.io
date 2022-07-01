<?php 
$id_kriteria = $_GET['id'];
$data_kriteria = $kriteria->ambil_kriteria($id_kriteria);?>

<h1 style="font-family: 'Agency FB'">Ubah Kriteria</h1>
<hr>
<form method="POST">
	<div class="form-group">
		<label>Nama Kriteria</label>
		<input type="text" class="form-control" name="nama_kriteria" required="Harus Diisi" value="<?php echo $data_kriteria['nama_kriteria'] ?>">
	</div>

	<div class="form-group">
		<label>Nilai Minimal</label>
		<input type="number" class="form-control" name="minimal_nilai" value="<?php echo $data_kriteria['minimal_nilai'] ?>">
	</div>

	<div class="form-group">
		<label>Nilai Maksimal</label>
		<input type="number" class="form-control" name="maksimal_nilai" value="<?php echo $data_kriteria['maksimal_nilai'] ?>">
	</div>

	<hr>
	<button class="btn btn-success" style="font-weight: bold; font-family: 'cambria'" name="simpan">SIMPAN</button>
</form>

<?php 
if (isset($_POST['simpan']))
{
	$hasil = $kriteria->ubah($_POST['nama_kriteria'], $_POST['minimal_nilai'], $_POST['maksimal_nilai'], $id_kriteria);

	if ($hasil=="sukses") {
		echo "<script>alert('Data Berhasil Diubah')</script>";
		echo "<script>location='?kriteria'</script>";
	}
	else

	{
		echo "<script>alert('Data yang Ditambahkan Gagal!!')/script>";
	}
}
  ?>