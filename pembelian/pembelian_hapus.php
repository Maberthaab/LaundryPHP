<?php

include "koneksi.php";

$kode_pembelian = $_GET['kode_pembelian'];

$query = "DELETE FROM pembelian WHERE kode_pembelian='".$kode_pembelian."'";
$sql = mysqli_query($connect, $query);
if($sql){
	echo "<script>
		document.location.href='?p=pembelian'
	</script>";
}else{
	echo "Data Gagal di Hapus. <a href='?p=pembelian'>Kembali</a>";
}
?>