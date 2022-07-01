<?php  

$id_karyawan = $_SESSION['karyawan']['id'];

$data_karyawan = $karyawan->ambil_karyawan($id_karyawan);

?>

<h1 style="font-weight: bold; font-family: Agency FB" class="mt-4">Ubah Biodata</h1>
<!-- <ol class="breadcrumb mb-4">
	<li class="breadcrumb-item"><a href="?beranda_pelamar">Beranda</a></li>
	<li class="breadcrumb-item"><a href="?biodata">Biodata</a></li>
	<li class="breadcrumb-item active">Ubah</li>
</ol> -->


<div class="card mb-4">
	<div class="card-body">
		<!-- <h1 style="font-family: cambria">Ubah Biodata</h1> -->
		<br>
		<form method="POST" enctype="multipart/form-data">
			<div class="form-group">
				<img src="./admin/gambar/<?php echo $data_karyawan["foto_karyawan"] ?>" alt="Foto Karyawan" width="200">
			</div>

			<div class="form-group">
				<label>Nama</label>
				<input type="text" class="form-control" name="nama" value="<?php echo $data_karyawan['nama_karyawan'] ?>">
			</div>

			<div class="form-group">
				<label>NIP</label>
				<input type="number" class="form-control" name="nip" value="<?php echo $data_karyawan['nip'] ?>">
			</div>

			<div class="form-group">
				<label>Jenis Kelamin</label>
				<select class="form-control" name="jenis_kelamin">
					<option value="Laki - Laki" <?php if ($data_karyawan['jk_karyawan'] == 'Laki - Laki'){
						echo "selected";
					}?>>Laki - Laki</option>
					<option value="Perempuan" <?php if ($data_karyawan['jk_karyawan'] == 'Perempuan'){
						echo "selected";
					}?>>Perempuan</option>  
				</select>
			</div>

			<div class="form-group">
				<label>Tanggal Lahir</label>
				<input type="date" class="form-control" name="tgl_lahir" value="<?php echo date('Y-m-d', strtotime($data_karyawan['tgl_lahir'])) ?>">
			</div>

			<div class="form-group">
				<label>Alamat</label>
				<textarea class="form-control" name="alamat" ><?php echo $data_karyawan['alamat_karyawan'] ?></textarea>
			</div>

			<div class="form-group">
				<label>Email</label>
				<input type="email" class="form-control" name="email" value="<?php echo $data_karyawan['email'] ?>">
			</div>

			<div class="form-group">
				<label>No. HP</label>
				<input type="number" class="form-control" name="no_hp" value="<?php echo $data_karyawan['no_hp_karyawan'] ?>">
			</div>

			<button style="font-family: cambria" class="btn btn-success" name="simpan">SIMPAN</button>
			<a style="font-family: cambria" href="?karyawan" class="btn btn-danger">KEMBALI</a>

		</form>
	</div>
</div>

<?php  

if (isset($_POST['simpan'])) 
{
	$hasil = $karyawan->ubah($_POST['nip'], $_POST['nama'], $_POST['jenis_kelamin'], $_POST['tgl_lahir'], $_POST['alamat'], $_POST['no_hp'], $_POST['email'], $_FILES['foto'], $id_karyawan);

	if ($hasil=="sukses")
	{
		echo "<script>alert('Data Berhasil Disimpan')</script>";
		echo "<script>location='?biodata'</script>";
	}
	else
	{
		echo "<script>alert('Ubah Data Gagal, Harap ubah Kembali Data yang ingin Diubah')</script>";
		echo "<script>location='?biodata=ubah_karyawan'</script>";
	}
}
?>