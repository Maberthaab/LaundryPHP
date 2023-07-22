        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            PEMAKAIAN
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-table"></i> pemakaian</a></li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="box-header">
                  <a href="?p=input_pemakaian">
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
                        <th>Kode Pemakaian</th>
                        <th>Tgl Pemakaian</th>
                        <th>Nama Karyawan</th>
                        <th>Nama Barang</th>
                        <th>Jumlah</th>
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
                       $query = "SELECT *FROM pemakaian where nama_barang like '%".$cari."%'";
                       $no = 1;
                       $sql = mysqli_query($connect, $query);
                         while($data = mysqli_fetch_array($sql)){
                        ?>
                          <tr>
                          <td><?php echo $no++;?></td>
                          <td><?php echo $data['kode_pemakaian'];?></td>
                          <td><?php echo TanggalIndo($data['kode_pemakaian']);?></td>
                          <td><?php echo $data['nama_karyawan'];?></td>
                          <td><?php echo $data['nama_barang'];?></td>
                          <td><?php echo $data['stok'];?></td>
                          <td>
                          <a href="index.php?p=hapus_pemakaian&kode_pemakaian=<?php echo $data["kode_pemakaian"]; ?>" onclick=" return confirm('Anda Yakin Menghapus Data Ini');" class="btn btn-danger"><i class="fa fa-trash"></i> Hapus</a></td>
                          </td>
                          </tr>
                      <?php
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