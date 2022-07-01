<?php  

$hasil = $karyawan->hapus($_GET["id"]);
if (empty($hasil)) 
{
	echo "<script>alert(Data Berhasil Dihapus)</script>";
	echo "<script>location='?karyawan'</script>";
} 
else
{
	echo "<script>alert('Data Tidak Dapat Dihapus')</script>";
	echo "<script>location='?karyawan'</script>";
}
?>