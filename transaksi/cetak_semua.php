        <?php

          function TanggalIndo($date){
            $BulanIndo = array("Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember");
 
            $tahun = substr($date, 0, 4);
            $bulan = substr($date, 5, 2);
            $tgl   = substr($date, 8, 2);
 
            $result = $tgl . " " . $BulanIndo[(int)$bulan-1] . " ". $tahun;   
              return($result);
            }         
            $timezone = "Asia/Jakarta";
            if(function_exists('date_default_timezone_set')) date_default_timezone_set($timezone);
            $date=date('Y-m-d');
            @ini_set('display_errors', 0);
        ?>
        <!DOCTYPE html>
          <html>
          <head>
            <title>Cetak Semua Laporan</title>
          </head>
          <body>
               <th colspan="4" style="border:none">
                <center>
                  
                <div class="row">
             <img src="palaa.jpg" style="height:150px;weight:150px">
             <h1 style="font-size:20px">Data Laundry</h1>
                </center>
                </th>

                <?php
                        include "../koneksi.php";
                ?>
            
                <center><table colspan="7" border="1" style="width:800px">
           
                  <tr>
                     <th>No</th>
                     <th>Nama Pelanggan</th>
                     <th>Tanggal Terima</th>
                     <th>Tanggal Selesai</th>
                     <th>Nama Paket</th>
                     <th>Berat</th>
                     <th>Harga</th>
                     <th>Total</th>
                    </tr>
                    
                    <?php
                      $query="SELECT * FROM transaksi"; //query menampilkan data
                      $no = 1;
                      $sql= mysqli_query($connect, $query); //run query

                          while($data=mysqli_fetch_assoc($sql)){
                      ?>
                          <tr>
                          <td><?php echo $no++;?></td>
                          <td><?php echo $data['nama_pelanggan'];?></td>
                          <td><?php echo TanggalIndo($data['tgl_terima']);?></td>
                          <td><?php echo TanggalIndo($data['tgl_selesai']);?></td>
                          <td><?php echo $data['nama_paket'];?></td>
                          <td><?php echo $data['berat'];?></td>
                          <td><?php echo "Rp ".number_format("$data[harga]",'0','.','.')?></td>
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

