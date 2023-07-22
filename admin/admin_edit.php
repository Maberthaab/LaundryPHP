                <?php
                  include "koneksi.php";

                 $id_admin = $_GET['id_admin'];

                  $query ="SELECT * FROM admin WHERE id_admin= $id_admin";
                  $sql = mysqli_query($connect, $query);
                  $data = mysqli_fetch_array($sql);

                  if(mysqli_num_rows($sql)< 1){
                  die("data tidak ditemukan...");
                  }
                ?>

 <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Data Admin
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Admin</a></li>
             <li><a href="#">Form Edit Admin</a></li>
          </ol>
        </section>
        <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="box-header">
                 <h4>Form Edit Admin</h4>
                </div><!-- /.box-header -->
                <div class="box-body">
              <div class="row">
            <!-- left column -->
            <div class="col-md-12">      
                <!-- form start -->
               <form role="form" method="POST" action="" enctype="multipart/form-data">
                  <div class="box-body">
                    <div class="form-group">
                      <label>NIK</label>
                      <input type="text" class="form-control" name="nik" value="<?php echo $data['nik'];?>" >
                    </div>
                    <div class="form-group">
                      <label>Nama Pelanggan</label>
                      <input type="text" class="form-control" name="nama" value="<?php echo $data['nama'];?>" >
                    </div>
                    <div class="form-group">
                      <label>Jenis Kelamin</label>
                      <br>
                      <?php $jk = $data['jenis_kelamin'];?>
                      <label><input type="radio" name="jenis_kelamin" style="cursor: pointer;margin-left:10px;" value="Laki-Laki"<?php echo ($jk =='Laki-Laki')?"checked" :""?>>Laki-Laki</label>
                      <label><input type="radio" name="jenis_kelamin" style="cursor: pointer;margin-left:10px;" value="Perempuan"<?php echo ($jk =='Perempuan')?"checked" :""?>>Perempuan</label>
                    </div>
                    <div class="form-group">
                      <label>Telepon</label>
                      <input type="text" class="form-control" id="exampleInputTelepon" name="telp" value="<?php echo $data['telp'];?>" >
                    </div>
                    <div class="form-group">
                      <label>Alamat</label>
                      <input type="text" class="form-control" id="exampleAlamat" name="alamat" value="<?php echo $data['alamat'];?>" >
                    </div>
                  </div><!-- /.box-body -->

                  <div class="box-footer">
                       <button type="submit" name="submit" class="btn btn-primary" value="Simpan">Simpan</button>
                    <a href="?=admin">
                      <button type="submit" class="btn btn-danger">Batal</button>
                   </a>
                  </div>
                </form>
              </div><!-- /.box -->
                </div><!-- /.box-body -->
              </div><!-- /.box -->               
                  </table>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->

    <?php

if (isset($_POST['submit'])) {
$nik = $_POST['nik'];
$nama = $_POST['nama'];
$jenis_kelamin = $_POST['jenis_kelamin'];
$telp = $_POST['telp'];
$alamat = $_POST['alamat'];

$query = "UPDATE admin SET nik='$nik', nama='$nama' ,jenis_kelamin='$jenis_kelamin' ,telp='$telp' ,alamat='$alamat' WHERE id_admin ='$id_admin'";
$sql = mysqli_query($connect, $query);

if (mysqli_affected_rows($connect) > 0 ) {
    echo "<script>
        alert('Anda Berhasil Mengubah');
        document.location.href = '?p=admin'
        </script>
    ";
  }else{
    echo "<script>
        alert('Anda Gagal Mengubah');
        document.location.href = '?p=admin'
        </script>
    ";
  }
  }

  ?>