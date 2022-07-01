<?php 
$data_k1 = $karyawan->tampil();
$data_k = $kriteria->tampil();
?>

<h1 style="font-weight: bold;font-family: 'cambria'" class="mt-4">Hasil Kinerja Karyawan</h1>
<hr>
<ol class="breadcrumb mb-4">
	<li style="font-weight: bold;font-family: 'cambria'" class="breadcrumb-item"><a href="?beranda_pelamar">Beranda</a></li>
	<li style="font-weight: bold;font-family: 'cambria'" class="breadcrumb-item active">Hasil Kinerja Karyawan</li>
</ol>

<div class="card mb-4">
	<div class="card-body">
		<!-- <h1 class="text-center">HASIL UMUM KARYAWAN BERPRESTASI</h1> -->
		<!-- <hr> -->
		<div class="table-responsive">
			<table class="table table-bordered" id="table-data-admin">
				<thead>
					<tr>
						<!-- <th rowspan="2" style="vertical-align: middle;" class="text-center">Ranking</th> -->
						<th rowspan="2" style="vertical-align: middle;" class="text-center">Nama Karyawan</th>
						<th colspan="<?php echo count($data_k) ?>" style="vertical-align: middle;" class="text-center">Kriteria</th>
						<!-- <th rowspan="2" style="vertical-align: middle;" class="text-center">Hasil Akhir</th> -->
						<!-- <th rowspan="2" style="vertical-align: middle;" class="text-center">Status</th> -->
					</tr>
					<tr>
						<?php foreach ($data_k as $key => $value): ?>
							<th class="text-center"><?php echo $value['nama_kriteria'] ?></th>
						<?php endforeach ?>
					</tr>
				</thead>
				<tbody>
					<?php foreach ($data_k1 as $key => $value): ?>
						<tr>
							<!-- <td><?php echo $value['ranking'] ?></td> -->
							<td><?php echo $value['nama_karyawan'] ?></td>
							<?php foreach ($data_k as $key_k => $value_k): ?>
								<?php $nilai_kl = $nilai_karyawan->cek_nilai($value['id_karyawan'], $value_k['id_kriteria']) ?>
								<td class="text-center"><?php echo $nilai_kl['nilai'] ?></td>
							<?php endforeach ?>
							<!-- <td><?php echo $value['nilai'] ?></td> -->
							<!-- <td><?php echo $value['status'] ?></td> -->
						</tr>
					<?php endforeach ?>
				</tbody>
			</table>
		</div>

	</div>
</div>