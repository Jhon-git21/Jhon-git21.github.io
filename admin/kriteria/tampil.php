<?php $data_kriteria = $kriteria->tampil(); ?>

<h1 style="font-weight: bold; font-family: 'Agency FB'" class="text-center">Data Kriteria</h1>
<hr>
<a href="?kriteria=tambah" class="btn btn-success" style="font-weight: bold;font-family: 'cambria'">TAMBAH</a>
<br>
<br>
<table class="table table-bordered" id="table-data-admin">
	<thead>
		<tr>
			<th width="15px">No.</th>
			<th width="200px">Nama Kriteria</th>
			<th width="150px">Nilai Minimal</th>
			<th width="150px">Nilai Maksimal</th>
			<th>Aksi</th>
		</tr>
	</thead>

	<tbody>
		<?php foreach ($data_kriteria as $key => $value): ?>
			<tr>
				<td class="text-center"><?php echo $key+1 ?>.</td>
				<td><?php echo $value['nama_kriteria'] ?></td>
				<td class="text-center"><?php echo $value['minimal_nilai'] ?></td>
				<td class="text-center"><?php echo $value['maksimal_nilai'] ?></td>
				<td>
					<a href="?kriteria=himpunan&id=<?php echo $value['id_kriteria'] ?>" class="btn btn-primary">Himpunan</a>
					<a href="?kriteria=ubah&id=<?php echo $value['id_kriteria'] ?>" class="btn btn-warning" onclick="return confirm('Apakah anda yakin ingin Mengubah Data?')" ><i class="fa fa-edit"></i></a>
					<a href="?kriteria=hapus&id=<?php echo $value['id_kriteria'] ?>" class="btn btn-danger" onclick="return confirm('Apakah anda yakin ingin Menghapus Data?')"><i class="fa fa-trash"></i></a>
				</td>
			</tr>
		<?php endforeach ?>
	</tbody>
</table>