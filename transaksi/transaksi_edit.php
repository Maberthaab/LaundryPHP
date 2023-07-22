                <?php
                include 'koneksi.php';
                  $id_trans = $_GET["id_trans"];

                  $query ="SELECT * FROM transaksi WHERE id_trans= $id_trans";
                  $sql = mysqli_query($connect, $query);
                  $data = mysqli_fetch_assoc($sql);

                  if(mysqli_num_rows($sql)< 1){
                    die("data tidak ditemukan...");
                  }
                ?>

 <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Data Transaksi
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-download"></i> Transaksi</a></li>
             <li><a href="#">edit transaksi</a></li>
          </ol>
        </section>
        <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="box-header">
                 <h4>Form Edit Transaksi</h4>
                </div><!-- /.box-header -->
                <div class="box-body">
              <div class="row">
            <!-- left column -->
            <div class="col-md-12">      
                <!-- form start -->
                <form action="" method="POST" role="form">
                  <div class="box-body">
                    <div class="form-group">
                      <label>Nama Pelanggan</label>
                      <input type="text" class="form-control" name="nama_pelanggan" value="<?php echo $data['nama_pelanggan'];?>" >
                    </div>
                    <div class="form-group">
                      <label>Tanggal Terima</label>
                      <input type="date" class="form-control" name="tgl_terima" value="<?php echo $data['tgl_terima'];?>" >
                    </div>
                      <div class="form-group">
                      <label>Tanggal Selesai</label>
                      <input type="date" class="form-control"  name="tgl_selesai" value="<?php echo $data['tgl_selesai'];?>" >
                    </div>
                    <div class="form-group">
                      <label>Nama Paket</label>
                      <input type="text" class="form-control" name="nama_paket" value="<?php echo $data['nama_paket'];?>" >
                    </div>
                    <div class="form-group">
                      <label>Berat</label>
                      <input type="text" class="form-control"  name="berat" value="<?php echo $data['berat'];?>" >
                    </div>
                    <div class="form-group">
                      <label>Harga</label>
                      <input type="text" class="form-control"  name="harga" value="<?php echo $data['harga'];?>" >
                    </div>
                      <div class="form-group">
                      <label>Total</label>
                      <input class="form-control" name="total" value="<?php echo $data['total'];?>">
                    </div>
                  </div><!-- /.box-body -->

                  <div class="box-footer">
                       <button type="submit" name="submit" class="btn btn-primary" value="Simpan">Simpan</button>
                    <a href="transaksi_index.php">
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

if(isset($_POST['submit'])){
$nama_pelanggan = $_POST['nama_pelanggan'];
$tgl_terima = $_POST['tgl_terima'];
$tgl_selesai = $_POST['tgl_selesai'];
$nama_paket = $_POST['nama_paket'];
$berat = $_POST['berat'];
$harga = $_POST['harga'];
$total = $_POST['total'];


$query = "UPDATE transaksi SET nama_pelanggan ='$nama_pelanggan',tgl_terima ='$tgl_terima', tgl_selesai ='$tgl_selesai',nama_paket ='$nama_paket', berat ='$berat', harga ='$harga',total ='$total' WHERE id_trans ='$id_trans'";
$sql = mysqli_query($connect, $query);

 if (mysqli_affected_rows($connect) > 0 ) {
    echo "<script>
        alert('Anda Berhasil Mengubah');
        document.location.href = '?p=transaksi'
        </script>
    ";
  }else{
    echo "<script>
        alert('Anda Gagal Mengubah');
        document.location.href = '?p=transaksi'
        </script>
    ";
  }
  }
  ?>
