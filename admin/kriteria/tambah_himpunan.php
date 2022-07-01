<h1 style="font-family: 'Agency FB'">Tambah Himpunan</h1>
<Hr>
<form method="POST" enctype="multipart/form-data">
	
	<div class="form-group">
		<label>Nama Himpunan</label>
		<input type="text" class="form-control" name="nama">
	</div>

	<div class="form-group">
		<label>Batas Atas</label>
		<input type="text" class="form-control" name="ba">
	</div>
	
	<div class="form-group">
		<label>Batas Tengah 1</label>
		<input type="text" class="form-control" name="bt1">
	</div>

	<div class="form-group">
		<label>Batas Tengah 2</label>
		<input type="text" class="form-control" name="bt2">
	</div>
	
	<div class="form-group">
		<label>Batas Bawah</label>
		<input type="text" class="form-control" name="bb">
	</div>

	<button class="btn btn-success" style="font-weight: bold; font-family: 'cambria'" name="simpan">SIMPAN</button>

</form>

<?php 

$id_kriteria = $_GET['id'];
$data_kriteria = $kriteria->ambil_kriteria($id_kriteria);

if (isset($_POST['simpan']))
{
	$himpunan->tambah_himpunan($id_kriteria, $_POST['nama'], $_POST['ba'], $_POST['bt1'], $_POST['bt2'], $_POST['bb']);

	echo "<script>alert('Data Berhasil Disimpan')</script>";
	echo "<script>location='?kriteria'</script>";
}

 ?>