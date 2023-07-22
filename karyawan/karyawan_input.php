        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Data Karyawan
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-user"></i> Data Karyawan</a></li>
            <li><a href="#"> tambah Karyawan</a></li>
          </ol>
        <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="box-header">
                 <h4>Tambah Karyawan</h4> 
                </div><!-- /.box-header -->
                <div class="box-body">
              <div class="row">
            <!-- left column -->
            <div class="col-md-12">      
                <!-- form start -->
                <?php
                  include "koneksi.php";
              ?>

                <form role="form" method="post" enctype="multipart/form-data">
                  <div class="box-body">
                    <div class="form-group">
                      <label>NIK</label>
                      <input type="text" class="form-control" placeholder="Enter NIK" name="nik">
                    </div>
                    <div class="form-group">
                      <label>Nama Karyawan</label>
                      <input type="text" class="form-control" placeholder="Enter Nama Karyawan" name="nama">
                    </div>
                    <div class="form-group">
                      <label>Alamat</label>
                      <input type="text" class="form-control" placeholder="Enter Alamat" name="alamat">
                    </div>
                    <div class="form-group">
                      <label>Telepon</label>
                      <input type="text" class="form-control" placeholder="Enter Telepon" name="telp">
                    </div>
                    <div class="form-group">
                      <label>Jenis Kelamin</label>
                      <br>
                        <td><input type="radio" name="jk" value="Laki-Laki" style="cursor: pointer;margin-left:10px;">Laki-Laki</td>
                        <td><input type="radio" name="jk" value="Perempuan" style="cursor: pointer; margin-left:10px;">Perempuan</td>
                    </div>
                    
                  </div><!-- /.box-body -->

                  <div class="box-footer">
                      <button type="submit" name="submit" class="btn btn-primary" value="Simpan">Submit</button>
                      <a href="?=karyawan">
                      <button type="button" class="btn btn-danger" value="Batal">Batal</button>
                      </a>
                  </div>
                  </form>
                 </div><!-- /.box -->              
                  </table>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->
        </section>
      
        <?php

          if(isset($_POST['submit'])){
          $nik = $_POST['nik'];
          $nama = $_POST['nama'];
          $jk = $_POST['jk'];
          $telp = $_POST['telp'];
          $alamat = $_POST['alamat'];

            $query ="INSERT INTO karyawan VALUES ('','$nik','$nama','$jk','$telp', '$alamat')";
            $sql = mysqli_query($connect , $query);

            if (mysqli_affected_rows($connect) > 0 ) {
              echo "<script>
                alert('Anda Berhasil Menambahkan');
                document.location.href = '?p=karyawan'
              </script>
              ";
            }else{
              echo "<script>
                alert('Anda Gagal Menambahkan');
                document.location.href = '?p=karyawan'
              </script>
              ";
            }
            }
            ?>