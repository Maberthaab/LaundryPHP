        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Data Pembelian
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-user"></i> Data Pembelian</a></li>
            <li><a href="#"> tambah pembelian</a></li>
          </ol>
        <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="box-header">
                 <h4>Tambah Pembelian</h4> 
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

                    <?php
                      include "koneksi.php";
                       $id = "SELECT kode_pembelian FROM pembelian 
                              ORDER BY kode_pembelian DESC";
                      $data = mysqli_query($connect, "SELECT*FROM pembelian");
                      $jsArray = "var kode_pembelian = new Array();\n";
                      
                       $sql = mysqli_query($connect, $id);
                       $id_transaksi = mysqli_fetch_array($sql);
                       $kd = $id_transaksi['kode_pembelian'];

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
                      <label>Kode Pembelian</label>
                      <input type="text" class="form-control" name="kode_pembelian" value="<?php echo $format;?>">
                    </div>
                    <div class="form-group">
                    <label>Nama Barang</label>                         
                    <?php
                    $result = mysqli_query($connect,"SELECT * FROM barang");
                    $jsArray = "var prdName = new Array();\n";
                    echo '
                          <select name="nama_barang" class="form-control" onchange="document.getElementById(\'prd_name\').value = prdName[this.value]">
                    <option>Pilih Nama Barang</option>';
                     while ($row = mysqli_fetch_array($result)) {
                    echo '
                    <option value="' . $row['nama_barang'] . '">' . $row['nama_barang'] . '</option>';
                    $jsArray .= "prdName['" . $row['nama_barang'] . "'] = '" . addslashes($row['kode_barang']) .  "';\n";
                     }
                    echo '
                    </select>';
                    ?>                             
                   </div>
                    <div class="form-group">
                      <label>Kode Barang</label>
                      <input type="text" class="form-control" placeholder="" name="kode_barang" id="prd_name">
                     <small style="color:red">* jangan rubah kode paket</small>
                    </div>
                       <script type="text/javascript">
                        <?php echo $jsArray; ?>
                    </script>

                    <div class="form-group">
                      <label>Stok</label>
                      <input type="text" class="form-control" placeholder="Enter Stok" name="stok">
                    </div>
                    <div class="form-group">
                      <label>Tanggal pembelian</label>
                      <input type="date" class="form-control"  name="tgl_pembelian" value="<?=date('Y-m-d')?>">
                    </div>
                    <div class="form-group">
                      <label>Harga</label>
                      <input type="text" class="form-control" placeholder="Enter harga" name="harga">
                    </div>
                    <div class="form-group">
                      <label>Supplier</label>
                            <select type="text" class="form-control" name="supplier" required>
                              <option value=""> - Pilih - </option>
                              <?php
                                $sql = mysqli_query($connect, "SELECT * FROM supplier")or die(mysqli_error($connect));
                                while($data = mysqli_fetch_array($sql)){
                                  echo '<option value="'.$data['nama'].'">'.$data['nama'].'</option>';
                                } 
                              ?>
                            </select>
                           
                        </div>

                    
                  </div><!-- /.box-body -->

                  <div class="box-footer">
                      <button type="submit" name="submit" class="btn btn-primary" value="Simpan">Submit</button>
                      <a href="?=pembelian">
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
          $kode_pembelian = $_POST['kode_pembelian'];
          $kode_barang = $_POST['kode_barang'];
          $nama_barang = $_POST['nama_barang'];
          $stok = $_POST['stok'];
          $tgl_pembelian = $_POST['tgl_pembelian'];
          $harga = $_POST['harga'];
          $supplier = $_POST['supplier'];


            $query ="INSERT INTO pembelian VALUES ('$kode_pembelian', '$kode_barang', '$nama_barang','$stok', '$tgl_pembelian', '$harga', '$supplier')";
            $sql = mysqli_query($connect , $query);

            if (mysqli_affected_rows($connect) > 0 ) {
              echo "<script>
                alert('Anda Berhasil Menambahkan');
                document.location.href = '?p=pembelian'
              </script>
              ";
            }else{
              echo "<script>
                alert('Anda Gagal Menambahkan');
                document.location.href = '?p=pembelian'
              </script>
              ";
            }
            }
            ?>