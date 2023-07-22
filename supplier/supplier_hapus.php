<?php

include "koneksi.php";

$id_supplier = $_GET['id_supplier'];

$query = "DELETE FROM supplier WHERE id_supplier='".$id_supplier."'";
$sql = mysqli_query($connect, $query);
if($sql){
	echo "<script>
		document.location.href='?p=supplier'
	</script>";
}else{
	echo "Data Gagal di Hapus. <a href='?p=supplier'>Kembali</a>";
}
?>