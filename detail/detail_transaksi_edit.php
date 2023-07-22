 <?php
                include 'koneksi.php';
                  $id_det = $_GET["id_det"];

                  $query ="SELECT total FROM detail WHERE id_det='".$id_det."'";
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
                <form action="" method="POST" name='autoSumForm' role="form">
                  <div class="box-body">
                    <div class="form-group">
                      <div class="form-group">
                      <label>Total</label>
                      <input class="form-control" name="total" onfocus="startCalc();" onblur="stopCalc();" value="<?php echo $data['total'];?>">
                    </div>
                     <div class="form-group">
                      <label>Bayar</label>
                      <input type="text" class="form-control" name="bayar" onfocus="startCalc();" onblur="stopCalc();">
                    </div>
                    <script type="text/javascript">
                        function startCalc(){
                            interval = setInterval("calc()",1);
                        }
                        function calc(){
                            one = document.autoSumForm.total.value;
                            two = document.autoSumForm.bayar.value;
                            document.autoSumForm.kembalian.value = (two*1)-(one*1);
                        }
                        function stopCalc(){
                            clearInterval(interval);
                        }
                    </script>
                    <div class="form-group">
                        <label>Kembalian</label>
                        <input class="form-control" readonly type="text" value="0" name="kembalian" onchange="tryNumberFormat(this.form.twiceBox);" readonly>
                    </div>
                  </div><!-- /.box-body -->

                  <div class="box-footer">
                       <button type="submit" name="submit" class="btn btn-primary" value="Simpan">Simpan</button>
                    <a href="detail_transaksi_index.php">
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
$total = $_POST['total'];
$bayar = $_POST['bayar'];
$kembalian = $_POST['kembalian'];
$status = "Lunas";

$query = "UPDATE detail SET total ='$total', bayar ='$bayar', kembalian ='$kembalian', status='$status' WHERE id_det ='$id_det'";
$sql = mysqli_query($connect, $query);

 if (mysqli_affected_rows($connect) > 0 ) {
    echo "<script>
        alert('Anda Berhasil Membayar');
        document.location.href = '?p=detail_transaksi'
        </script>
    ";
  }else{
    echo "<script>
        alert('Anda Gagal Mengubah');
        document.location.href = '?p=detail_transaksi'
        </script>
    ";
  }
  }
  ?>
