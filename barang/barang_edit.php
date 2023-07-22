                  <?php
                  include "koneksi.php";

                 $kode_barang = $_GET['kode_barang'];

                  $query ="SELECT * FROM barang WHERE kode_barang='".$kode_barang."'";
                  $sql = mysqli_query($connect, $query);
                  $data = mysqli_fetch_array($sql);
                ?>

        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Paket
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Persediaan Barang</a></li>
             <li><a href="#">Form Edit Persediaan</a></li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="box-header">
                 <h4>Form Edit Persediaan</h4>
                </div><!-- /.box-header -->
                <div class="box-body">
              <div class="row">
            <!-- left column -->
            <div class="col-md-12">      
                <!-- form start -->
                <form role="form" method="post" enctype="multipart/form-data">
                  <div class="box-body">
                    <div class="form-group">
                      <label>Kode Barang</label>
                     <input type="text" class="form-control" id="exampleIDPelanggan" name="kode_barang" value="<?php echo $data['kode_barang'];?>" >
                    </div>
                    <div class="form-group">
                      <label>Nama Barang</label>
                      <input type="text" class="form-control" id="exampleNamaPelanggan" name="nama_barang" value="<?php echo $data['nama_barang'];?>" >
                    </div>
                    <div class="form-group">
                      <label>Stok</label>
                      <input type="text" class="form-control" id="exampleInputTelepon" name="stok" value="<?php echo $data['stok'];?>" >
                    </div>
                  </div><!-- /.box-body -->

                  <div class="box-footer">
                      <button type="submit" name="submit" class="btn btn-primary">Simpan</button>
                    <a href="barang_index.php">
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

$kode_barang = $_GET['kode_barang'];
$nama_barang = $_POST['nama_barang'];
$stok = $_POST['stok'];

$query = "UPDATE barang SET nama_barang='$nama_barang',stok='$stok' WHERE kode_barang='$kode_barang'";
$sql = mysqli_query($connect, $query);

 if (mysqli_affected_rows($connect) > 0 ) {
    echo "<script>
        alert('Anda Berhasil Mengubah');
        document.location.href = '?p=barang'
        </script>
    ";
  }else{
    echo "<script>
        alert('Anda Gagal Mengubah');
        document.location.href = '?p=barang'
        </script>
    ";
  }
  }

?>