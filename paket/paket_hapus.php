<?php

include "koneksi.php";

$kode_paket = $_GET['kode_paket'];

$query = "DELETE FROM paket WHERE kode_paket='".$kode_paket."'";
$sql = mysqli_query($connect, $query);
if($sql){
	echo "<script>
		document.location.href='?p=paket'
	</script>";
}else{
	echo "Data Gagal di Hapus. <a href='?p=paket'>Kembali</a>";
}
?>