        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Barang
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-table"></i> BARANG</a></li>
            <li><a href="#">tambah barang</a></li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="box-header">
                 <h4>Tambah Barang</h4> 
                </div><!-- /.box-header -->
                <div class="box-body">
              <div class="row">
              <?php
                include 'koneksi.php';
              ?>
            <!-- left column -->
            <div class="col-md-12">      
                <!-- form start -->
                <form role="form" method="post" enctype="multipart/form-data">
                  <div class="box-body">
                  <?php
                      include "koneksi.php";
                       $id = "SELECT kode_barang FROM barang 
                              ORDER BY kode_barang DESC";
                      $data = mysqli_query($connect, "SELECT*FROM barang");
                      $jsArray = "var kode_barang = new Array();\n";
                      
                       $sql = mysqli_query($connect, $id);
                       $id_transaksi = mysqli_fetch_array($sql);
                       $kd = $id_transaksi['kode_barang'];

                       $trans =substr($kd, 6, 3);
                       $tambah = (int) $trans +1;
                       $bln = date("m");
                       $thn = date("y");

                       if (strlen($tambah)==1) {
                         $format = "B".$bln.$thn."00".$tambah;
                       }elseif (strlen($tambah)==2) {
                         $format = "B".$bln.$thn."0".$tambah;
                       }else{
                        $format = "B".$bln.$thn.$tambah;
                        }
                      ?>

                    <div class="form-group">
                      <label>Kode Barang</label>
                      <input type="text" class="form-control" name="kode_barang" value="<?php echo $format;?>">
                    </div>
                    <div class="form-group">
                      <label>Nama Barang</label>
                      <input type="text" class="form-control" placeholder="Enter Nama Barang" name="nama_barang">
                    </div>
                      <div class="form-group">
                      <label>Stok</label>
                      <input type="text" class="form-control" placeholder="Enter Stok" name="stok">
                    </div>
                  </div><!-- /.box-body -->

                  <div class="box-footer">
                      <button type="submit" name="submit" class="btn btn-primary" value="Simpan">Submit</button>
                      <a href="?p=barang">
                      <button type="button" class="btn btn-danger" value="Batal">Batal</button>
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

if(isset($_POST['submit'])){
$kode_barang = $_POST['kode_barang'];
$nama_barang = $_POST['nama_barang'];
$stok = $_POST['stok'];

$query ="INSERT INTO barang VALUES ('$kode_barang','$nama_barang','$stok')";
$sql = mysqli_query($connect , $query);
if (mysqli_affected_rows($connect) > 0 ) {
    echo "<script>
        alert('Anda Berhasil Menambahkan');
        document.location.href = '?p=barang'
        </script>
    ";
  }else{
    echo "<script>
        alert('Anda Gagal Menambahkan');
        document.location.href = '?p=barang'
        </script>
    ";
  }
}
?>