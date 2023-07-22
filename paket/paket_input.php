        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Paket
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-table"></i> Paket</a></li>
            <li><a href="#">tambah paket</a></li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="box-header">
                 <h4>Tambah Transaksi</h4> 
                </div><!-- /.box-header -->
                <div class="box-body">
              <div class="row">
            <!-- left column -->
            <div class="col-md-12">      
                <!-- form start -->
                <form role="form" method="post" enctype="multipart/form-data" name="autosumform">
                  <div class="box-body">
                  <?php
                      include "koneksi.php";
                       $id = "SELECT kode_paket FROM paket 
                              ORDER BY kode_paket DESC";
                      $data = mysqli_query($connect, "SELECT*FROM paket");
                      $jsArray = "var kode_paket = new Array();\n";
                      
                       $sql = mysqli_query($connect, $id);
                       $id_transaksi = mysqli_fetch_array($sql);
                       $kd = $id_transaksi['kode_paket'];

                       $trans =substr($kd, 6, 3);
                       $tambah = (int) $trans +1;
                       $bln = date("m");
                       $thn = date("y");

                       if (strlen($tambah)==1) {
                         $format = "A".$bln.$thn."00".$tambah;
                       }elseif (strlen($tambah)==2) {
                         $format = "A".$bln.$thn."0".$tambah;
                       }else{
                        $format = "A".$bln.$thn.$tambah;
                        }
                      ?>
                    <div class="form-group">
                      <label>Kode Paket</label>
                      <input type="text" class="form-control" name="kode_paket" value="<?php echo $format;?>">
                    </div>
                    <div class="form-group">
                      <label>Nama Paket</label>
                      <input type="text" class="form-control" placeholder="Enter Nama Paket" name="nama_paket">
                    </div>
                      <div class="form-group">
                      <label>Harga</label>
                      <input type="text" class="form-control" placeholder="Enter Harga Paket" name="harga_paket">
                    </div>
                  </div><!-- /.box-body -->

                  <div class="box-footer">
                      <button type="submit" name="submit" class="btn btn-primary" value="Simpan">Submit</button>
                      <a href="?p=paket">
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
$kode_paket = $_POST['kode_paket'];
$nama_paket = $_POST['nama_paket'];
$harga_paket = $_POST['harga_paket'];

$query ="INSERT INTO paket VALUES ('$kode_paket','$nama_paket','$harga_paket')";
$sql = mysqli_query($connect , $query);
if (mysqli_affected_rows($connect) > 0 ) {
    echo "<script>
        alert('Anda Berhasil Menambahkan');
        document.location.href = '?p=paket'
        </script>
    ";
  }else{
    echo "<script>
        alert('Anda Gagal Menambahkan');
        document.location.href = '?p=paket'
        </script>
    ";
  }
}
?>