<?php 
$id_himpunan = $_GET['id']; 
$data_himpunan = $himpunan->ambil_himpunan($id_himpunan);
$id_kriteria = $data_himpunan['id_kriteria'];
?>


<h1 style="font-family: 'Agency FB'">Ubah Nilai Himpunan</h1>
<Hr>
<form method="POST" enctype="multipart/form-data">
	
	<div class="form-group">
		<label>Nama Himpunan</label>
		<input type="text" class="form-control" name="nama" value="<?php echo $data_himpunan['nama_himpunan'] ?>">
	</div>

	<div class="form-group">
		<label>Batas Bawah</label>
		<input type="text" class="form-control" name="bb" value="<?php echo $data_himpunan['batas_bawah_himpunan']?>">
	</div>
	
	<div class="form-group">
		<label>Batas Tengah 1</label>
		<input type="text" class="form-control" name="bt1" value="<?php echo $data_himpunan['batas_tengah1_himpunan']?>">
	</div>

	<div class="form-group">
		<label>Batas Tengah 2</label>
		<input type="text" class="form-control" name="bt2" value="<?php echo $data_himpunan['batas_tengah2_himpunan']?>">
	</div>

	<div class="form-group">
		<label>Batas Atas</label>
		<input type="text" class="form-control" name="ba" value="<?php echo $data_himpunan['batas_atas_himpunan']?>" >
	</div>

	<button class="btn btn-success" style="font-weight: bold; font-family: 'cambria'" name="simpan">SIMPAN</button>

</form>

<?php 

if (isset($_POST['simpan']))
{
	$himpunan->ubah($_POST['nama'], $_POST['ba'], $_POST['bt1'], $_POST['bt2'], $_POST['bb'], $id_himpunan);

	echo "<script>alert('Data Berhasil Diubah')</script>";
	echo "<script>location='?kriteria=himpunan&id=$id_kriteria'</script>";
}

 ?>