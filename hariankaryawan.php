<?php 

$id_karyawan = $_SESSION['karyawan']['id'];
$detail = $karyawan->ambil_karyawan($id_karyawan);
$detail_nilai = $karyawan->ambil_detail_nilai($id_karyawan);

// echo "<pre>";
// print_r ($detail_nilai);
// echo "</pre>";

$teks_bulan = "";
if(!empty($detail_nilai))
{
	$riwayat = json_decode($detail_nilai['detail_nilai'], true);
	$teks_bulan = "Pada Bulan $detail_nilai[bulan_nilai] Tahun ".date('Y', strtotime($riwayat['waktu_hitung']));
} else {
	$riwayat = json_encode(['jam_kerja'=>[],'kehadiran'=>[],'jam_lembur'=>[]]);
}
// echo "<pre>";
// print_r ($detail_nilai);
// echo "</pre>";



?>
<?php
if(!empty($detail_nilai))
{
	$detail_nilai = json_decode($detail_nilai['detail_nilai'], true);
} else {
	$detail_nilai = ['jam_kerja'=>[],'kehadiran'=>[],'jam_lembur'=>[]];
}
?>

<h1 style="font-weight: bold; font-family: Agency FB" style="font-weight: bold;font-family: 'cambria'" class="mt-4">Riwayat Kehadiran Harian <?php echo $teks_bulan ?></h1>
<hr>
<ol class="breadcrumb mb-4">
	<li style="font-weight: bold;font-family: 'cambria'" class="breadcrumb-item"><a href="?beranda_pelamar">Beranda</a></li>
	<li style="font-weight: bold;font-family: 'cambria'" class="breadcrumb-item active">Riwayat Kehadiran</li>
</ol>
<div class="card mb-4">
	<div class="card-body">

		<table class="table table-bordered">
			<thead>
				<tr>
					<th width="5%" class="text-center">Hari</th>
					<th class="text-center">Kedisiplinan Waktu</th>
					<th class="text-center">Absensi Karyawan</th>
					<th class="text-center">Tambahan Jam Lembur</th>
				</tr>
			</thead>
			<tbody>
				<?php $total_kehadiran = 0; $total_jamkerja = 0; $total_lembur = 0; ?>
				<?php foreach ($detail_nilai['jam_kerja'] as $key => $jamkerja): ?>
					<?php 
					$total_jamkerja += $jamkerja['nilai'];
					$total_kehadiran += $detail_nilai['kehadiran'][$key]['nilai'];		
					$total_lembur += $detail_nilai['jam_lembur'][$key]['nilai'];
					?>
					<tr>
						<td class="text-center"><?php echo $jamkerja['tanggal'] ?></td>
						<td><?php 
						if(!empty($jamkerja['masuk']) && $jamkerja['masuk'] != "[object Object]") {
							echo "$jamkerja[masuk] - $jamkerja[pulang] / <b>$jamkerja[nilai]</b> jam kerja"; 
						} else {
							echo "-";
						}
						?>	
					</td>
					<td>
						<?php if($detail_nilai['kehadiran'][$key]['nilai'] == 0) 
						{
							echo "<b>Tidak Hadir</b>";
						} else {
							echo "Hadir";
						}

						?>
					</td>
					<td>
						<?php if($detail_nilai['jam_lembur'][$key]['nilai'] == 0) 
						{
							echo "Tidak Lembur";
						} else {
							echo "<b>Lembur</b>";
						}

						?>
					</td>
				</tr>
			<?php endforeach ?>
			<?php if (empty($detail_nilai['jam_kerja'])): ?>
				<tr>
					<td colspan="4" class="text-center">Riwayat masih kosong. Harap <b><a href="index.php?karyawan=ubah_nilai&id=<?php echo $id_karyawan ?>">inputkan</a></b> nilai harian terlebih dahulu lalu <b>simpan</b>.</td>
				</tr>
			<?php endif ?>
		</tbody>
		<tfoot>
			<tr>
				<th>Total</th>
				<th><?= $total_jamkerja ?> Jam Kerja</th>
				<th><?= $total_kehadiran ?> Hari Hadir</th>
				<th><?= $total_lembur ?>x Lembur</th>
			</tr>
		</tfoot>
	</table>

</div>
