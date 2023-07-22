<?php

include "koneksi.php";

$id_det = $_GET['id_det'];

$query = "DELETE FROM detail WHERE id_det='".$id_det."'";
$sql = mysqli_query($connect, $query);
if($sql){
	echo "<script>
		document.location.href='?p=detail_transaksi'
	</script>";
}else{
	echo "Data Gagal di Hapus. <a href='?p=detail_transaksi'>Kembali</a>";
}
?>