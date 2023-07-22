<!DOCTYPE html>
          <html>
          <head>
            <title>Cetak Laporan</title>
          </head>
          <body>
               <th colspan="4" style="border:none">
                <center>
                  
                <div class="row">
            
            <div class="col-md-3">
            
         
                    <img src="palaa.jpg" style="height:150px;weight:150px">
                    <h1 style="font-size:20px">Nota Transaksi</h1>
                </center>
                </th>

                <?php
                        include "../koneksi.php";
                ?>
                <center><table colspan="7" border="1" style="width:800px">
                  <tr>
                     <th>No</th>
                     <th>ID Transaksi</th>
                     <th>Customer</th>
                     <th>Berat</th>
                     <th>Paket</th>
                     <th>Total</th>
                     <th>Bayar</th>
                     <th>Kembalian</th>
                    </tr>
                    
                    <?php
                      $id_det = $_GET["id_det"];
                      $query="SELECT * FROM detail WHERE id_det= $id_det";  //query menampilkan data
                      $no = 1;
                      $sql= mysqli_query($connect, $query); //run query

                          while($data=mysqli_fetch_assoc($sql)){
                      ?>
                          <tr>
                          <td><?php echo $no++;?></td>
                          <td><?php echo $data['id_trans'];?></td>
                          <td><?php echo $data['nama_pelanggan'];?></td>
                          <td><?php echo $data['berat'];?></td>
                          <td><?php echo $data['nama_paket'];?></td>
                          <td><?php echo $data['bayar'];?></td>
                          <td><?php echo "Rp ".number_format("$data[kembalian]",'0','.','.')?></td>
                          <td><?php echo "Rp ".number_format("$data[total]",'0','.','.')?></td>
                          </tr>

<?php         
    } 
?>
</table>
</center>
          </body>
          </html>

<script>
    window.print();
</script>  

