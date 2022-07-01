<?php $data_aturan = $aturan->tampil(); ?>


<h1 style="font-weight: bold; font-family: Agency FB" class="text-center">Aturan Fuzzy Pemilihan Karyawan Berprestasi</h1>
<hr>
<a href="?aturan=tambah" class="btn btn-success" style=" font-weight: bold; font-family: 'cambria'">TAMBAH</a>
<br>
<br>
<table class="table table-bordered" id="table-data-admin">
	<thead>
		<tr>
			<th style="font-family: cambria" width="15px">No.</th>
			<th style="font-family: cambria" class="text-center" width="180px">Nama Aturan</th>
			<th style="font-family: cambria">Hasil Aturan</th>
			<th style="font-family: cambria">Opsi</th>
		</tr>
	</thead>

	<tbody>
		<?php foreach ($data_aturan as $key => $value): ?>
			<tr>
				<td class="text-center"><?php echo $key+1 ?>.</td>
				<td class="text-center"><?php echo $value['nama_aturan'] ?></td>
				<td><?php echo $value['hasil_aturan'] ?></td>
				<td>
					<a href="?aturan=detail_aturan&id=<?php echo $value['id_aturan'] ?>" class="btn btn-primary">Detail Aturan</a>
					<a href="?aturan=ubah&id=<?php echo $value['id_aturan'] ?>" class="btn btn-warning" onclick="return confirm('Apakah anda yakin ingin Mengubah Data?')"><i class="fa fa-edit"></i></a>
					<a href="?aturan=hapus&id=<?php echo $value['id_aturan'] ?>" class="btn btn-danger" onclick="return confirm('Apakah anda yakin ingin Menghapus Data?')"><i class="fa fa-trash"></i></a>
				</td>
			</tr>
		<?php endforeach ?>
	</tbody>
</table>