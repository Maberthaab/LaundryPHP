<?php

include "koneksi.php";

$id_karyawan = $_GET['id_karyawan'];

$query = "DELETE FROM karyawan WHERE id_karyawan='".$id_karyawan."'";
$sql = mysqli_query($connect, $query);
if($sql){
	echo "<script>
		document.location.href='?p=karyawan'
	</script>";
}else{
	echo "Data Gagal di Hapus. <a href='?p=karyawan'>Kembali</a>";
}
?>