
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            FAKTUR
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-download"></i> faktur</a></li>
          </ol>

     <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="box-header">
                
                </div><!-- /.box-header -->
                <div class="box-body">
                  <div class="col-md-12 col-sm-12">
                    <div style="float: right; width: 50%; padding: 10px; margin-top: -20px; margin-right: -230px;">
                      <form action="" method="post" class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md my-1 my-md-0">
                        <div class="input-group">
                          <input type="text" class="form-control" name="cari" autofocus placeholder="search for..." aria-label="search" aria-describedby="basic-addon2" autocomplete="off"  id="keyword">
                          
                       </div>
                     </form>
                  </div>
                  </div> 
                        <?php 
                        $cari="";
                        if(isset($_POST['cari'])){
                        $cari=$_POST['cari'];
                      }
                      ?> 
                  <table id="example2" class="table table-bordered table-hover">
                    <thead>
                      <tr>
                        <th>No</th>
                        <th>ID Transaksi</th>
                        <th>Nama Pelanggan</th>
                        <th>Nama Paket</th>
                        <th>Harga</th>
                        <th>Berat</th>
                        <th>Total</th>
                        <th>Bayar</th>
                        <th>Kembalian</th>
                        <th>Status</th>
                        <th>Aksi</th>
                      </tr>
                    </thead>
                    <tbody>
                       <?php
                       include "koneksi.php";
                        
                        $query="SELECT * FROM detail where nama_pelanggan like '%".$cari."%'"; //query menampilkan data
                        $no = 1;
                        $sql= mysqli_query($connect, $query); //run query

                        if(mysqli_num_rows($sql) >0){ //hitung jumlah baris
                            while($data=mysqli_fetch_assoc($sql)){
                        ?>
                          <tr>
                          <td><?php echo $no++;?></td>
                          <td><?php echo $data['id_trans'];?></td>
                          <td><?php echo $data['nama_pelanggan'];?></td>
                          <td><?php echo $data['nama_paket'];?></td>
                          <td><?php echo "Rp ".number_format("$data[harga]",'0','.','.')?></td>
                          <td><?php echo $data['berat'];?></td>
                          <td><?php echo "Rp ".number_format("$data[total]",'0','.','.')?></td>
                          <td><?php echo "Rp ".number_format("$data[bayar]",'0','.','.')?></td>
                          <td><?php echo "Rp ".number_format("$data[kembalian]",'0','.','.')?></td>
                          <td><?php echo $data['status'];?></td>
   
                          <td><a href="index.php?p=edit_detail&id_det=<?php echo $data["id_det"]; ?>" class="btn btn-warning"><i class="fa fa-edit"></i>Bayar</a>
                           <a href="index.php?p=hapus_detail&id_det=<?php echo $data["id_det"]; ?>" onclick=" return confirm('Anda Yakin Menghapus Data Ini');" class="btn btn-danger"><i class="fa fa-trash"></i> Hapus</a>
                           <a href="detail/cetak_isi.php?id_det=<?php echo $data['id_det']?>" target="_BLANK" class="btn btn-success" onclick="return confirm('Apakah Anda Yakin Untuk Print');"><i class="fa fa-print"></i>Print</a>
                          </td>
                          </tr>
                      <?php
                    }
                    }
                    ?>
                      </tbody>
                  </table>
                </div><!-- /.box-body -->
              </div><!-- /.box -->               
                  </table>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->