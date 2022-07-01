<?php 
$data_himpunan = $himpunan->tampil($_GET['id']);
$data_kriteria = $kriteria->ambil_kriteria($_GET['id']);
?>

<h1 style="font-weight: bold; font-family: 'Agency FB'">Data Nilai Batasan Himpunan</h1>
<hr>
<?php if (!empty($data_himpunan)): ?>
	<table class="table table-bordered">
		<thead>
			<tr>
				<th style="font-family: cambria" class="text-center">No.</th>
				<th style="font-family: cambria" class="text-center">Nama</th>
				<th style="font-family: cambria" class="text-center">Batas Bawah</th>
				<th style="font-family: cambria" class="text-center">Batas Tengah - 1</th>
				<th style="font-family: cambria" class="text-center">Batas Tengah - 2</th>
				<th style="font-family: cambria" class="text-center">Batas Atas</th>
				<th style="font-family: cambria">Aksi</th>
			</tr>
		</thead>

		<tbody>

			<?php foreach ($data_himpunan as $key => $value): ?>

				<tr>
					<td class="text-center"><?php echo $key+1 ?>.</td>
					<td class="text-center"><?php echo $value['nama_himpunan'] ?></td>
					<td class="text-center"><?php echo $value['batas_bawah_himpunan'] ?></td>
					<td class="text-center"><?php echo $value['batas_tengah1_himpunan'] ?></td>
					<td class="text-center"><?php echo $value['batas_tengah2_himpunan'] ?></td>
					<td class="text-center"><?php echo $value['batas_atas_himpunan'] ?></td>
					<td>
						<a style="font-family: cambria" href="?kriteria=ubah_himpunan&id=<?php echo $value['id_himpunan'] ?>" onclick="return confirm('Apakah anda yakin ingin mengubah data?')" class="btn btn-primary">Ubah</a>
						<a style="font-family: cambria" href="?kriteria=hapus_himpunan&id=<?php echo $value['id_himpunan'] ?>" onclick="return confirm('Apakah anda yakin ingin menghapus data?')"class="btn btn-danger">Hapus</a>
					</td>
				</tr>
			<?php endforeach ?>

			<?php else: ?>
				<h4>Data Masih Kosong, Silakan Tambahkan Data!</h4>
			<?php endif ?>
		</tbody>
	</table>
	<hr>
	<a href="?kriteria=tambah_himpunan&id=<?php echo $data_kriteria['id_kriteria'] ?>" class="btn btn-success" style="font-weight: bold; font-family: 'cambria'" >TAMBAH</a>