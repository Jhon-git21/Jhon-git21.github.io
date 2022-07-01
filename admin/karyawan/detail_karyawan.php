<?php  
$id_karyawan = $_GET['id'];
$data_karyawan = $karyawan->ambil_karyawan($_GET['id']);
$data_kriteria = $kriteria->tampil();

$perhitungan->hitung();

$detail_nilai = $karyawan->ambil_detail_nilai($id_karyawan);

if(!empty($detail_nilai))
{
	$detail_nilai = json_decode($detail_nilai['detail_nilai'], true);
} else {
	$detail_nilai = ['jam_kerja'=>[],'kehadiran'=>[],'jam_lembur'=>[]];
}


// echo "<pre>";
// print_r ($detail_nilai);
// echo "</pre>";

?>

<style>
	.gambar
	{
		border-color: black;
		border-radius: 2%;
		border-style: solid;
		border-width: 3px; 
	}
</style>

<p class="text-center">
	<img src="gambar/<?php echo $data_karyawan['foto_karyawan'] ?>" alt="Foto Tidak Tersedia" width="300px" class="gambar">
	
</p>

<table class="table">
	<thead>
		<tr>
			<th width="20%" style= "font-family: 'cambria'">NIP</th>
			<th width="1%"></th>
			<td><?php echo $data_karyawan['nip'] ?></td>
		</tr>
		<tr>
			<th width="20%" style="font-family: 'cambria'">Nama</th>
			<th width="1%"></th>
			<td><?php echo $data_karyawan['nama_karyawan'] ?></td>
		</tr>
		<tr>
			<th width="20%" style="font-family: 'cambria'">Jenis Kelamin</th>
			<th width="1%"></th>
			<td><?php echo $data_karyawan['jk_karyawan'] ?></td>
		</tr>
		<tr>
			<th width="20%" style="font-family: 'cambria'">Tanggal Lahir</th>
			<th width="1%"></th>
			<td><?php echo $data_karyawan['tgl_lahir'] ?></td>
		</tr>
		<tr>
			<th width="20%">Alamat</th>
			<th width="1%"></th>
			<td><?php echo $data_karyawan['alamat_karyawan'] ?></td>
		</tr>
		<tr>
			<th width="20%" style="font-family: 'cambria'">No. Handphone</th>
			<th width="1%"></th>
			<td><?php echo $data_karyawan['no_hp_karyawan'] ?></td>
		</tr>
		<tr>
			<th width="20%" style="font-family: 'cambria'">Email</th>
			<th width="1%"></th>
			<th><?php echo $data_karyawan['email'] ?></th>
		</tr>
		<tr>
			<th width="20%" style="font-family: 'cambria'">Ranking</th>
			<th width="1%"></th>
			<th><?php echo $data_karyawan['ranking'] ?></th>
		</tr>
	</thead>
</table>

<table class="table table-bordered">
	<thead>
		<tr>
			<!-- <th rowspan="2" style="vertical-align: middle;" class="text-center">Ranking</th> -->
			<th colspan="<?php echo count($data_kriteria) ?>" style="vertical-align: middle;" class="text-center">Kriteria</th>
			<th rowspan="2" style="vertical-align: middle;" class="text-center">Hasil Akhir</th>
			<th rowspan="2" style="vertical-align: middle;" class="text-center">Status</th>
		</tr>

		<tr>
			<?php foreach ($data_kriteria as $key => $value): ?>
				<th class="text-center"><?php echo $value['nama_kriteria'] ?></th>
			<?php endforeach ?>
		</tr>
	</thead>
	
	<tbody>
		<tr>
			<!-- <td><?php echo $data_karyawan['ranking'] ?></td> -->
			<?php foreach ($data_kriteria as $key_k => $value_k): ?>
				<?php $nilai_kl = $nilai_karyawan->cek_nilai($_GET['id'], $value_k['id_kriteria']) ?>
				<td class="text-center"><?php echo $nilai_kl['nilai'] ?></td>
			<?php endforeach ?>
			<td class="text-center"><?php echo $data_karyawan['nilai'] ?></td>
			<td class="text-center"><?php echo $data_karyawan['status'] ?></td>
		</tr>
	</tbody>

</table>


<!-- <h3>Riwayat Terakhir</h3>

<table class="table table-bordered">
	<thead>
		<tr>
			<th width="5%" class="text-center">Tanggal</th>
			<th>Jam Kerja</th>
			<th>Absensi Karyawan</th>
			<th>Tambahan Jam Lembur</th>
		</tr>
	</thead>
	<tbody>
		<?php $total_jamkerja = 0; $total_kehadiran = 0; $total_lembur = 0; ?>
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
 -->


