        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            PEMAKAIAN
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-user"></i> PEMAKAIAN</a></li>
            <li><a href="#"> tambah pemakaian</a></li>
          </ol>
        <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="box-header">
                 <h4>Tambah Pemakaian</h4> 
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
                       $id = "SELECT kode_pemakaian FROM pemakaian 
                              ORDER BY kode_pemakaian DESC";
                      $data = mysqli_query($connect, "SELECT*FROM pemakaian");
                      $jsArray = "var kode_pemakaian = new Array();\n";
                      
                       $sql = mysqli_query($connect, $id);
                       $id_transaksi = mysqli_fetch_array($sql);
                       $kd = $id_transaksi['kode_pemakaian'];

                       $trans =substr($kd, 6, 3);
                       $tambah = (int) $trans +1;
                       $bln = date("m");
                       $thn = date("y");

                       if (strlen($tambah)==1) {
                         $format = "P".$bln.$thn."00".$tambah;
                       }elseif (strlen($tambah)==2) {
                         $format = "P".$bln.$thn."0".$tambah;
                       }else{
                        $format = "P".$bln.$thn.$tambah;
                        }
                      ?>


                    <div class="form-group">
                      <label>Kode Pemakaian</label>
                      <input type="text" class="form-control"  name="kode_pemakaian" value="<?php echo $format;?>">
                    </div>
                    <div class="form-group">
                            <label>Nama Karyawan</label>
                            <select type="text" class="form-control" name="nama_karyawan" id="nama_karyawan" required>
                              <option value=""> - Pilih - </option>
                              <?php
                                $sql = mysqli_query($connect, "SELECT * FROM karyawan")or die(mysqli_error($connect));
                                while($data = mysqli_fetch_array($sql)){
                                  echo '<option value="'.$data['nama'].'">'.$data['nama'].'</option>';
                                } 
                              ?>
                            </select>
                        </div>

                    <div class="form-group">
                      <label>Tanggal Pemakaian</label>
                      <input type="date" class="form-control"  name="tgl_pemakaian" value="<?=date('Y-m-d')?>">
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
                      <label>Jumlah</label>
                      <input type="text" class="form-control" placeholder="Enter Jumlah" name="stok">
                    </div>
                    
                  </div><!-- /.box-body -->

                  <div class="box-footer">
                      <button type="submit" name="submit" class="btn btn-primary" value="Simpan">Submit</button>
                      <a href="?=karyawan">
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
          $kode_pemakaian = $_POST['kode_pemakaian'];
          $nama_karyawan = $_POST['nama_karyawan'];
          $tgl_pemakaian = $_POST['tgl_pemakaian'];
          $kode_barang = $_POST['kode_barang'];
          $nama_barang = $_POST['nama_barang'];
          $stok = $_POST['stok'];

            $query ="INSERT INTO pemakaian VALUES ('$kode_pemakaian','$nama_karyawan','$tgl_pemakaian', '$kode_barang', '$nama_barang', '$stok')";
            $sql = mysqli_query($connect , $query);

            if (mysqli_affected_rows($connect) > 0 ) {
              echo "<script>
                alert('Anda Berhasil Menambahkan');
                document.location.href = '?p=pemakaian'
              </script>
              ";
            }else{
              echo "<script>
                alert('Anda Gagal Menambahkan');
                document.location.href = '?p=pemakaian'
              </script>
              ";
            }
            }
            ?>