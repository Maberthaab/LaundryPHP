                <?php
                  include "koneksi.php";

                 $id_supplier = $_GET['id_supplier'];

                  $query ="SELECT * FROM supplier WHERE id_supplier= $id_supplier";
                  $sql = mysqli_query($connect, $query);
                  $data = mysqli_fetch_array($sql);

                  if(mysqli_num_rows($sql)< 1){
                  die("data tidak ditemukan...");
                  }
                ?>

 <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Data Supplier
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Supplier</a></li>
             <li><a href="#">Form Edit Supplier</a></li>
          </ol>
        </section>
        <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="box-header">
                 <h4>Form Edit Supplier</h4>
                </div><!-- /.box-header -->
                <div class="box-body">
              <div class="row">
            <!-- left column -->
            <div class="col-md-12">      
                <!-- form start -->
               <form role="form" method="POST" action="" enctype="multipart/form-data">
                  <div class="box-body">
                    <div class="form-group">
                      <label>Nama Supplier</label>
                      <input type="text" class="form-control" id="exampleNamaSupplier" name="nama" value="<?php echo $data['nama'];?>" >
                    </div>
                    <div class="form-group">
                      <label>Alamat</label>
                      <input type="text" class="form-control" id="exampleAlamat" name="alamat" value="<?php echo $data['alamat'];?>" >
                    </div>
                     <div class="form-group">
                      <label>Telepon</label>
                      <input type="text" class="form-control" id="exampleInputTelepon" name="telp" value="<?php echo $data['telp'];?>" >
                    </div>
                    <div class="form-group">
                      <label>Jenis Kelamin</label>
                      <br>
                      <?php $jk = $data['jk'];?>
                      <label><input type="radio" name="jk" style="cursor: pointer;margin-left:10px;" value="Laki-Laki"<?php echo ($jk =='Laki-Laki')?"checked" :""?>>Laki-Laki</label>
                       <label><input type="radio" name="jk" style="cursor: pointer;margin-left:10px;" value="Perempuan"<?php echo ($jk =='Perempuan')?"checked" :""?>>Perempuan</label>
                    </div>
                   
                    
                  </div><!-- /.box-body -->

                  <div class="box-footer">
                       <button type="submit" name="submit" class="btn btn-primary" value="Simpan">Simpan</button>
                    <a href="?=supplier">
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
$nama= $_POST['nama'];
$alamat = $_POST['alamat'];
$telp = $_POST['telp'];
$jk = $_POST['jk'];

$query = "UPDATE supplier SET nama='$nama' ,jk='$jk' ,telp='$telp' ,alamat='$alamat' WHERE id_supplier ='$id_supplier'";
$sql = mysqli_query($connect, $query);

if (mysqli_affected_rows($connect) > 0 ) {
    echo "<script>
        alert('Anda Berhasil Mengubah');
        document.location.href = '?p=supplier'
        </script>
    ";
  }else{
    echo "<script>
        alert('Anda Gagal Mengubah');
        document.location.href = '?p=supplier'
        </script>
    ";
  }
  }

  ?>