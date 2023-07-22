	        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Transaksi
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-download"></i> Transaksi</a></li>
          </ol>

             <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-xs-12">
              <div class="box">
              <div class=""></div>
                <div class="box-header">
					<form action="transaksi/cetak_filter.php" method="POST">
					<div class="row">
						<div class="col-md-3">
							<label>Dari</label>
							<input type="date" class="form-control" name="tgl1">
                        <small style="color:red">*masukkan tanggal terima saja.</small>
						</div>
						<div class="col-md-3">
							<label>Sampai</label>
							<input type="date" class="form-control" name="tgl2">
						</div>
					</div>
					<br/>
						<input type="submit" class="btn btn-primary" name="tampilkan" value="Print">
					</form>
                </div><!-- /.box-header -->
              
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
                    <br>
                    <tbody>
                      <tr>
                      <?php
                      include 'koneksi.php';
                        $query="SELECT * FROM transaksi where nama_pelanggan like '%".$cari."%' ORDER BY id_trans ASC"; //query menampilkan data
                        $no = 1;
                        $sql= mysqli_query($connect, $query); //run query

                        if(mysqli_num_rows($sql) >0){ //hitung jumlah baris
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
