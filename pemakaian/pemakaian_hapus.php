<?php

include "koneksi.php";

$kode_pemakaian = $_GET['kode_pemakaian'];

$query = "DELETE FROM pemakaian WHERE kode_pemakaian='".$kode_pemakaian."'";
$sql = mysqli_query($connect, $query);
if($sql){
	echo "<script>
		document.location.href='?p=pemakaian'
	</script>";
}else{
	echo "Data Gagal di Hapus. <a href='?p=pemakaian'>Kembali</a>";
}
?>