<?php  

$data_karyawan = $karyawan->tampil('id_karyawan DESC');

?>

<h1 class="text-center" style="font-weight: bold;font-family: 'Agency FB'">Data Karyawan</h1>
<hr>
<br>
<a href="?karyawan=tambah" class="btn btn-success" style="font-weight: bold;font-family: 'cambria';width: 140px;">TAMBAH</a>
<a href="?karyawan=hitung" class="btn btn-primary" style="font-weight: bold;font-family: 'cambria';width: 140px;">HITUNG</a>
<div class="table-responsive">
	
	<table class="table table-bordered" id="table-data-admin">
		<thead>
			<tr>
				<th width="15px">No.</th>
				<th width="25px">NIP</th>
				<th>Nama Karyawan</th>
				<th>Jenis Kelamin</th>
				<th width="50px">Email</th>
				<th>No. HP</th>
				<th width="90px">Alamat</th>
				<th width="15%">Aksi</th>
			</tr>
		</thead>
		<tbody>
			<?php foreach ($data_karyawan as $key => $value): ?>
				<tr>
					<td class="text-center"><?php echo $key+1 ?>.</td>
					<td><?php echo $value['nip'] ?></td>
					<td><?php echo $value['nama_karyawan'] ?></td>
					<td><?php echo $value['jk_karyawan'] ?></td>
					<td><?php echo $value['email'] ?></td>
					<td><?php echo $value['no_hp_karyawan'] ?></td>
					<td><?php echo $value['alamat_karyawan'] ?></td>
					<td class="text-center">
						<a class= "btn btn-sm btn-primary" href="?karyawan=detail&id=<?php echo $value["id_karyawan"] ?>"><i class="fas fa-info"></i></a>
						<a class="btn btn-sm btn-warning" href="?karyawan=ubah&id=<?php echo $value["id_karyawan"] ?>" onclick="return confirm('Apakah anda yakin ingin Mengubah Data?')"><i class="fas fa-edit"></i></a>
						<a class="btn btn-sm btn-danger" href="?karyawan=hapus&id=<?php echo $value["id_karyawan"] ?>" onclik="return confirm('Apakah anda yakin ingin Menghapus Data?')"><i class="fa fa-calendar-times"></i></a>
						<hr>
						<?php $cek = $nilai_karyawan->tampil($value['id_karyawan']) ?>
						<?php if (empty($cek)) : ?>
							<a style="font-family: cambria" class="btn btn-sm btn-info" href="?karyawan=input&id=<?php echo $value["id_karyawan"] ?>" onclik="return confirm('Apakah anda ingin Menginput Nilai Karyawan?')">Input Nlai</a>
						<?php else: ?>
							<a style="font-family: cambria" href="?karyawan=ubah_nilai&id=<?php echo $value['id_karyawan'] ?>" class="btn btn-info">Ubah Nilai</a>
						<?php endif ?>
					
					</td>
				</tr>
			<?php endforeach ?>
			<br>
		</tbody>
	</table>
</div>