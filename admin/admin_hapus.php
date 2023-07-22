<?php

include "koneksi.php";

$id_admin = $_GET['id_admin'];

$query = "DELETE FROM admin WHERE id_admin='".$id_admin."'";
$sql = mysqli_query($connect, $query);
if($sql){
	echo "<script>
		document.location.href='?p=admin'
	</script>";
}else{
	echo "Data Gagal di Hapus. <a href='?p=admin'>Kembali</a>";
}
?>