          <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Data Admin
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-user"></i> Data Admin</a></li>
            <li><a href="#"> tambah Admin</a></li>
          </ol>
        <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="box-header">
                 <h4>Tambah Admin</h4> 
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
                      <input type="text" class="form-control" placeholder="Enter NIK" name="nik" >
                    </div>
                    <div class="form-group">
                      <label>Nama</label>
                      <input type="text" class="form-control" placeholder="Enter Nama Admin" name="nama">
                    </div>
                    <div class="form-group">
                      <label>Jenis Kelamin</label>
                      <br>
                        <td><input type="radio" name="jenis_kelamin" value="Laki-Laki" style="cursor: pointer;margin-left:10px;">Laki-Laki</td>
                        <td><input type="radio" name="jenis_kelamin" value="Perempuan" style="cursor: pointer; margin-left:10px;">Perempuan</td>
                    </div>
                    <div class="form-group">
                      <label>Telepon</label>
                      <input type="text" class="form-control" placeholder="Enter Telepon" name="telp">
                    </div>
                    <div class="form-group">
                      <label>Alamat</label>
                      <textarea type="text" class="form-control" placeholder="Enter Alamat" name="alamat"></textarea>
                    </div>
                  </div><!-- /.box-body -->

                  <div class="box-footer">
                      <button type="submit" name="submit" class="btn btn-primary" value="Simpan">Simpan</button>
                      <a href="?=admin">
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
          $jenis_kelamin = $_POST['jenis_kelamin'];
          $telp = $_POST['telp'];
          $alamat = $_POST['alamat'];

            $query ="INSERT INTO admin VALUES ('','$nik','$nama','$jenis_kelamin','$telp', '$alamat')";
            $sql = mysqli_query($connect , $query);

            if (mysqli_affected_rows($connect) > 0 ) {
              echo "<script>
                alert('Anda Berhasil Menambahkan');
                document.location.href = '?p=admin'
              </script>
              ";
            }else{
              echo "<script>
                alert('Anda Gagal Menambahkan');
                document.location.href = '?p=admin'
              </script>
              ";
            }
            }
            ?>