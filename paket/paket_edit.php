                  <?php
                  include "koneksi.php";

                 $kode_paket = $_GET['kode_paket'];

                  $query ="SELECT * FROM paket WHERE kode_paket='".$kode_paket."'";
                  $sql = mysqli_query($connect, $query);
                  $data = mysqli_fetch_array($sql);
                ?>

        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Paket
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Paket</a></li>
             <li><a href="#">Form Edit Pelanggan</a></li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="box-header">
                 <h4>Form Edit Paket</h4>
                </div><!-- /.box-header -->
                <div class="box-body">
              <div class="row">
            <!-- left column -->
            <div class="col-md-12">      
                <!-- form start -->
                <form role="form" method="post" enctype="multipart/form-data">
                  <div class="box-body">
                    <div class="form-group">
                      <label>Kode Paket</label>
                     <input type="text" class="form-control" id="exampleIDPelanggan" name="kode_paket" disabled value="<?php echo $data['kode_paket'];?>" >
                    </div>
                    <div class="form-group">
                      <label>Nama Paket</label>
                      <input type="text" class="form-control" id="exampleNamaPelanggan" name="nama_paket" value="<?php echo $data['nama_paket'];?>" >
                    </div>
                    <div class="form-group">
                      <label>Harga</label>
                      <input type="text" class="form-control" id="exampleInputTelepon" name="harga_paket" value="<?php echo $data['harga_paket'];?>" >
                    </div>
                  </div><!-- /.box-body -->

                  <div class="box-footer">
                      <button type="submit" name="submit" class="btn btn-primary">Simpan</button>
                    <a href="paket_index.php">
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

        <?php
if (isset($_POST['submit'])) {

$kode_paket = $_GET['kode_paket'];
$nama_paket = $_POST['nama_paket'];
$harga_paket = $_POST['harga_paket'];

$query = "UPDATE paket SET nama_paket='$nama_paket',harga_paket='$harga_paket' WHERE kode_paket='$kode_paket'";
$sql = mysqli_query($connect, $query);

 if (mysqli_affected_rows($connect) > 0 ) {
    echo "<script>
        alert('Anda Berhasil Mengubah');
        document.location.href = '?p=paket'
        </script>
    ";
  }else{
    echo "<script>
        alert('Anda Gagal Mengubah');
        document.location.href = '?p=paket'
        </script>
    ";
  }
  }

?>