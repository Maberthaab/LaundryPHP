<?php

include "koneksi.php";

$kode_barang = $_GET['kode_barang'];

$query = "DELETE FROM barang WHERE kode_barang='".$kode_barang."'";
$sql = mysqli_query($connect, $query);
if($sql){
	echo "<script>
		document.location.href='?p=barang'
	</script>";
}else{
	echo "Data Gagal di Hapus. <a href='?p=barang'>Kembali</a>";
}
?>