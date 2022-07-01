<?php  
$idkaryawan1 = $_SESSION['karyawan']['id'];
$datakaryawan1 = $karyawan->ambil_karyawan($idkaryawan1);?>

<h1 style="font-weight: bold;font-family: 'Agency FB'" class="mt-4">Biodata Karyawan</h1>
<ol class="breadcrumb mb-4">
	<li style="font-weight: bold;font-family: 'cambria'" class="breadcrumb-item"><a href="?beranda_pelamar">Beranda</a></li>
	<li style="font-weight: bold;font-family: 'cambria'" class="breadcrumb-item active">Biodata</li>
</ol>


<div class="card mb-4">
	<div class="card-body">
		<!-- <h1 style="font-weight: bold;font-family: 'cambria'"> <a href="?biodata=ubah_karyawan" class= "btn btn-success"><i class="fa fa-edit mr-1"></i> Ubah</a> -->
		</h1>
		<p class="text-center">
			<img src="Admin/gambar/<?php echo $datakaryawan1['foto_karyawan'] ?>" alt="Foto Tidak Tersedia" width="20%">
		</p>
		<table class="table">
			<thead>
				<tr>
					<th width="20%">NIP</th>
					<th width="1%"></th>
					<td><?php echo $datakaryawan1['nip'] ?></td>
				</tr>
				<tr>
					<th width="20%">Nama</th>
					<th width="1%"></th>
					<td><?php echo $datakaryawan1['nama_karyawan'] ?></td>
				</tr>
				<tr>
					<th width="20%">Jenis Kelamin</th>
					<th width="1%"></th>
					<td><?php echo $datakaryawan1['jk_karyawan'] ?></td>
				</tr>
				<tr>
					<th width="20%">Tanggal Lahir</th>
					<th width="1%"></th>
					<td><?php echo $datakaryawan1['tgl_lahir'] ?></td>
				</tr>
				<tr>
					<th width="20%">Alamat</th>
					<th width="1%"></th>
					<td><?php echo $datakaryawan1['alamat_karyawan'] ?></td>
				</tr>
				<tr>
					<th width="20%">No HP</th>
					<th width="1%"></th>
					<td><?php echo $datakaryawan1['no_hp_karyawan'] ?></td>
				</tr>
				<tr>
					<th width="20%">Email</th>
					<th width="1%"></th>
					<th><?php echo $datakaryawan1['email'] ?></th>
				</tr>
			</thead>
		</table>
	</div>
</div>