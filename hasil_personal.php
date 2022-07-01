<?php 
$idkaryawan1 = $_SESSION['karyawan']['id']; 
$data_karyawan = $karyawan->ambil_karyawan($idkaryawan1);
$data_kriteria = $kriteria->tampil();
?>

<h1 style="font-weight: bold;font-family: 'cambria'" class="mt-4">Hasil Personal</h1>
<hr>
<ol class="breadcrumb mb-4">
	<li style="font-weight: bold;font-family: 'cambria'" class="breadcrumb-item"><a href="?beranda_pelamar">Beranda</a></li>
	<li style="font-weight: bold;font-family: 'cambria'" class="breadcrumb-item active">Hasil Personal</li>
</ol>
<div class="card mb-4">
	<div class="card-body">
		<!-- <h1 class="text-center">HASIL PERSONAL</h1> -->
		<h3 style="font-weight: bold;font-family: 'cambria'" >Nama : <?php echo $data_karyawan['nama_karyawan']?></h3>
		<hr>
		<div class="table-responsive">
			<table class="table table-bordered">
				<thead>
					<tr>
						<!-- <th rowspan="2" style="vertical-align: middle;" class="text-center">Ranking</th> -->
						<th colspan="<?php echo count($data_kriteria) ?>" style="vertical-align: middle;" class="text-center">Kriteria</th>
						<th rowspan="2" style="vertical-align: middle;" class="text-center">Hasil Akhir</th>
						<!-- <th rowspan="2" style="vertical-align: middle;" class="text-center">Status</th> -->
					</tr>

					<tr>
						<?php foreach ($data_kriteria as $key => $value): ?>
							<th class="text-center"><?php echo $value['nama_kriteria'] ?></th>
						<?php endforeach ?>
					</tr>
				</thead>

				<tbody>
					<tr>
						<!-- <td class="text-center"><?php echo $data_karyawan['ranking'] ?></td> -->
						<?php foreach ($data_kriteria as $key_k => $value_k): ?>
							<?php $nilai_kl = $nilai_karyawan->cek_nilai($idkaryawan1, $value_k['id_kriteria']) ?>
							<td class="text-center"><?php echo $nilai_kl['nilai'] ?></td>
						<?php endforeach ?>
						<td class="text-center"><?php echo $data_karyawan['nilai'] ?></td>
						<!-- <td class="text-center"><?php echo $data_karyawan['status'] ?></td> -->
					</tr>
				</tbody>

			</table>
		</div>
	</div>
</div>