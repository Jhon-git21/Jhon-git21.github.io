<h1 style="font-weight: bold; font-family: 'Agency FB'">Detail Aturan Fuzzy</h1>

<?php  
$data_detail = $detail_aturan->tampil($_GET['id']);
$id_himpunan = array();
foreach ($data_detail as $key => $value) {
	$id_himpunan[] = $value['id_himpunan'];}?>

<form method="POST">
	
	<table class="table table-bordered">
		<thead>
			<th style="font-family: cambria" class="text-center" width="60px">No.</th>
			<th style="font-family: cambria">Kriteria</th>
			<th style="font-family: cambria">Himpunan</th>
		</thead>

		<tbody>
			<?php $data_kriteria = $kriteria->tampil() ?>
			<?php foreach ($data_kriteria as $key => $value): ?>
				<tr>
					<td class="text-center"><?php echo $key+1 ?>.</td>
					<td><?php echo $value['nama_kriteria'] ?></td>
					<td>
						<?php $data_himpunan = $himpunan->tampil($value['id_kriteria']) ?>
						<?php foreach ($data_himpunan as $key => $value): ?>
							<label class="radio">
								<div class="radio-inline">
									<input type="radio" name="id_himpunan[<?php echo $value['id_kriteria'] ?>]" value="<?php echo $value['id_himpunan'] ?>" <?php if (in_array($value['id_himpunan'], $id_himpunan)):echo "checked"; ?>
									<?php endif ?>><?php echo $value['nama_himpunan'] ?>
								</div>
							</label>
						<?php endforeach ?>				
					</td>
				</tr>
			<?php endforeach ?>
		</tbody>
	</table>

	<div class="form-group">
		<button class="btn btn-success" style="font-weight: bold; font-family: 'cambria'" name="simpan">SIMPAN</button>
	</div>
</form>

<?php  
if (isset($_POST['simpan'])) {
	$detail_aturan->simpan($_POST['id_himpunan'], $_GET['id']);
	echo "<script>location='?aturan'</script>";
}

?>