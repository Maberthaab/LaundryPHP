        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Transaksi
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-download"></i> Transaksi</a></li>
            <li><a href="#"> tambah transaksi</a></li>
          </ol>
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
                <?php
                      include "koneksi.php";
                      ?>

                <form role="form" name='autoSumForm' method="post" enctype="multipart/form-data">
                  <div class="row">
                      <div class="panel-body">
                      
                        <div class="form-group">
                            <label>Nama Pelanggan</label>
                            <select type="text" class="form-control" name="nama_pelanggan" id="nama_pelanggan" required>
                              <option value=""> - Pilih - </option>
                              <?php
                                $sql = mysqli_query($connect, "SELECT * FROM pelanggan")or die(mysqli_error($connect));
                                while($data = mysqli_fetch_array($sql)){
                                  echo '<option value="'.$data['nama_pelanggan'].'">'.$data['nama_pelanggan'].'</option>';
                                } 
                              ?>
                            </select>
                           
                        </div>
                        <div class="form-group">
                          <label>Tanggal Terima</label>
                          <input type="date" class="form-control" name="tgl_terima" value="<?=date('Y-m-d')?>">
                        </div>
                        <div class="form-group">
                            <label>Tanggal Selesai</label>
                            <input type="date" class="form-control" name="tgl_selesai" id="tgl">
                        </div>
                        <div class="form-group">
                          <label>Nama Paket</label>
                            <?php
                            $result = mysqli_query($connect,"SELECT * FROM paket");
                            $jsArray = "var prdName = new Array();\n";
                            echo '
                                  <select name="nama_paket" class="form-control" onchange="document.getElementById(\'prd_name\').value = prdName[this.value]">
                            <option>- Pilih -</option>';
                             while ($row = mysqli_fetch_array($result)) {
                            echo '
                            <option value="' . $row['nama_paket'] . '">' . $row['nama_paket'] . '</option>';
                            $jsArray .= "prdName['" . $row['nama_paket'] . "'] = '" . addslashes($row['harga_paket']) .  "';\n";
                             }
                            echo '
                            </select>';
                            ?>
                        </div>
                                            
                          <div class="form-group">
                              <label>Berat</label>
                              <input type="text" class="form-control" placeholder="Masukkan Berat" onfocus="startCalc();" onblur="stopCalc();" name="berat">
                          </div>
                          <div class="form-group">
                              <label>Harga</label>
                              <input type="text" class="form-control" placeholder="Harga" id="prd_name" onfocus="startCalc();" onblur="stopCalc();" name="harga">
                          </div>
                          <script type="text/javascript">
                              <?php echo $jsArray; ?>
                          </script>
                          <script type="text/javascript">
                                  function startCalc(){
                                      interval = setInterval("calc()",1);
                                  }
                                  function calc(){
                                      one = document.autoSumForm.harga.value;
                                      two = document.autoSumForm.berat.value;
                                      document.autoSumForm.total.value = (one*1)*(two*1);
                                  }
                                  function stopCalc(){
                                      clearInterval(interval);
                                  }
                          </script>
                          <div class="form-group">
                              <label>Total</label>
                              <input class="form-control" readonly type="text" value="0" name="total" onchange="tryNumberFormat(this.form.twiceBox);" readonly>
                          </div>
                          <div class="button-group">
                              <button type="submit" name="submit" class="btn btn-primary" value="Simpan">Simpan</button>
                              <a href="?=transaksi">
                              <button class="btn btn-danger" type="button" value="Batal">Batal</button>
                              </a>
                          </div>

                          </div>
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
    $nama_pelanggan=$_POST['nama_pelanggan'];
    $tgl_terima=$_POST['tgl_terima'];
    $tgl_selesai=$_POST['tgl_selesai'];
    $nama_paket=$_POST['nama_paket'];
    $berat=$_POST['berat'];
    $harga=$_POST['harga'];
    $total=$_POST['total'];
    $status = 'Belum Lunas';

    $query="INSERT INTO transaksi VALUES('', '$nama_pelanggan', '$tgl_terima', '$tgl_selesai', '$nama_paket', '$berat', '$harga', '$total', '$status')";
    mysqli_query($connect, $query);

    if (mysqli_affected_rows($connect) > 0 ) {
    echo "<script>
        alert('Anda Berhasil Menambahkan');
        document.location.href = '?p=transaksi'
        </script>
    ";
  }else{
    echo "<script>
        alert('Anda Gagal Menambahkan');
        document.location.href = '?p=transaksi'
        </script>
    ";
  }
}
?>