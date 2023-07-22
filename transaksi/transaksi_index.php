
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            TRANSAKSI
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-download"></i> transaksi</a></li>
          </ol>

     <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="box-header">
                <a href="?p=input_transaksi">
                  <button type="button" class="btn btn-primary">Tambah Data</button>
                </a>

                <button type="button" class="btn btn-info" data-toggle="modal" data-target="#myModal">Print Laporan</button>

                <!--Modal-->
                <div id="myModal" class="modal fade" role="dialog">
                <div class="modal-dialog">
                <div class="modal-content">
                 <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                  <h4 class="modal-title">Print Laporan</h4>
                </div>
                  <div class="modal-body">
                  <div class="button-group">
                  <center>
                    <a href="transaksi/cetak_semua.php">
                      <button type="button" class="btn btn-info">Cetak Semua PDF</button>
                    </a>
                    <a href="?p=cetak_fil">
                      <button type="button" class="btn btn-primary">Print Filter</button>
                    </a>
                    <a href="transaksi/cetak_excel.php">
                      <button type="button" class="btn btn-danger">Cetak Semua EXCEL</button>
                    </a>
                  </center>
                  </div>

                  <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">CLOSE</button>
                  </div>
                  </div>
                </div>
                </div>
                </div>

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
                        <th>Tanggal Terima</th>
                        <th>Tanggal Selesai</th>
                        <th>Nama Paket</th>
                        <th>Berat</th>
                        <th>Harga</th>
                        <th>Total</th>
                        <th>Aksi</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                      <?php
                      include 'koneksi.php';
                        $query="SELECT * FROM transaksi where nama_pelanggan like '%".$cari."%'"; //query menampilkan data
                        $no = 1;
                        $sql= mysqli_query($connect, $query); //run query

                        if(mysqli_num_rows($sql) >0){ //hitung jumlah baris
                            while($data=mysqli_fetch_assoc($sql)){
                        ?>
                          <tr>
                          <td><?php echo $no++;?></td>
                          <td><?php echo $data['id_trans'];?></td>
                          <td><?php echo $data['nama_pelanggan'];?></td>
                          <td><?php echo TanggalIndo($data['tgl_terima']);?></td>
                          <td><?php echo TanggalIndo($data['tgl_selesai']);?></td>
                          <td><?php echo $data['nama_paket'];?></td>
                          <td><?php echo $data['berat'];?></td>
                          <td><?php echo "Rp ".number_format("$data[harga]",'0','.','.')?></td>
                          <td><?php echo "Rp ".number_format("$data[total]",'0','.','.')?></td>
                          <td><a href="index.php?p=edit_transaksi&id_trans=<?php echo $data["id_trans"]; ?>" class="btn btn-success"><i class="fa fa-edit"></i>Ubah</a>
                          <a href="index.php?p=hapus_transaksi&id_trans=<?php echo $data["id_trans"]; ?>" onclick=" return confirm('Anda Yakin Menghapus Data Ini');" class="btn btn-danger"><i class="fa fa-trash"></i> Hapus</a>
                          </td>
                          </td>
                          </tr>
                          <?php
                        }
                      }
                      ?>
                      </tr>
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
       </section>
