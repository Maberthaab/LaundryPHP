        <section class="content-header">
          <h1>
             PEMBELIAN
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-user"></i>  pembelian</a></li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="box-header">
                <a href="?p=input_pembelian">
                  <button type="button" class="btn btn-primary">Tambah Data</button>
                </a>
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
                        <th>Kode Pembelian</th>
                        <th>Tanggal Pembelian</th>
                        <th>Nama Barang</th>
                        <th>Stok</th>
                        <th>Harga</th>
                        <th>Supplier</th>
                        <th>Aksi</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>

                    <?php  
                        include "koneksi.php";
                        $cari ="";
                        if (isset($_POST['cari'])) {
                          $cari = $_POST['cari'];
                        }
                        $query = "SELECT * FROM pembelian where nama_barang like '%".$cari."%'";
                        $no = 1;
                        $sql = mysqli_query($connect, $query);

                        if(mysqli_num_rows($sql) >0){ //hitung jumlah baris
                            while($data=mysqli_fetch_assoc($sql)){
                          ?>
                          <tr>
                          <td><?php echo $no++;?></td>
                          <td><?php echo $data['kode_pembelian'];?></td>
                          <td><?php echo TanggalIndo($data['tgl_pembelian']);?></td>
                          <td><?php echo $data['nama_barang'];?></td>
                          <td><?php echo $data['stok'];?></td>
                          <td><?php echo $data['harga'];?></td>
                          <td><?php echo $data['supplier'];?></td>
                          <td>
                          <a href="index.php?p=hapus_pembelian&kode_pembelian=<?php echo $data["kode_pembelian"]; ?>" onclick=" return confirm('Anda Yakin Menghapus Data Ini');" class="btn btn-danger"><i class="fa fa-trash"></i> Hapus</a>
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