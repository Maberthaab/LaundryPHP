<?php

include "koneksi.php";

$id_trans = $_GET['id_trans'];

$query = "DELETE FROM transaksi WHERE id_trans='".$id_trans."'";
$sql = mysqli_query($connect, $query);
if($sql){
	echo "<script>
        document.location.href = '?p=transaksi'
        </script>
    ";
  }else{
    echo "<script>
        document.location.href = '?p=transaksi'
        </script>
    ";
}
?>
