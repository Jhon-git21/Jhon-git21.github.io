<?php 
	include_once '../config/mysqli.php';
function base_url($param='')
{
	return "http://localhost/spk_fuzzy_tsukamoto/" . $param;
}

$data_k1 = $karyawan->tampil('ranking ASC');
$data_k = $kriteria->tampil();
?>

<h1 style="font-weight: bold; font-family: 'cambria'">Laporan 
	<!-- <a href="?karyawan=riwayat_nilai" class="btn btn-success btn-sm float-right"><i class="fas fa-fw fa-search"></i> Detail</a> -->
	<a style="font-weight: bold; font-family: 'cambria'" href="./laporan/cetak.php" class="btn btn-info btn-sm"><i class="fas fa-print fa-fw"></i> Cetak</a>
</h1>

<div class="table-responsive">
	<table class="table table-bordered" id="table-data-admin">
		<thead>
			<tr>
				<th rowspan="2" style="vertical-align: middle;" class="text-center">Ranking</th>
				<th rowspan="2" style="vertical-align: middle;" class="text-center">Nama</th>
				<th rowspan="2" style="vertical-align: middle;" class="text-center">Status</th>
				<th rowspan="2" style="vertical-align: middle;" class="text-center">Hasil</th>
				<th rowspan="2" style="vertical-align: middle;" class="text-center">Tanggal</th>
			</tr>
		</thead>
		<tbody>
			<?php foreach ($data_k1 as $key => $value): ?>
				<tr>
					<td><?php echo $value['ranking'] ?></td>
					<td><?php echo $value['nama_karyawan'] ?></td>
					<td><?php echo $value['status'] ?></td>
					<td><?php echo $value['nilai'] ?></td>
					<td class="text-center"><?php echo date("d-m-Y", strtotime($value['tgl_hitung'])) ?></td>
				</tr>
			<?php endforeach ?>
		</tbody>
	</table>
</div>

