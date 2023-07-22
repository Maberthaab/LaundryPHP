<?php

include "koneksi.php";

$id_pelanggan = $_GET['id_pelanggan'];

$query = "DELETE FROM pelanggan WHERE id_pelanggan='".$id_pelanggan."'";
$sql = mysqli_query($connect, $query);
if($sql){
	echo "<script>
		document.location.href='?p=pelanggan'
	</script>";
}else{
	echo "Data Gagal di Hapus. <a href='?p=pelanggan'>Kembali</a>";
}
?>