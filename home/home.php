       <?php
       include 'koneksi.php';
       $sql1 = mysqli_query($connect, "SELECT * FROM transaksi");
       $sql2 = mysqli_query($connect, "SELECT * FROM detail");
       $sql3 = mysqli_query($connect, "SELECT * FROM paket");
       $sql4 = mysqli_query($connect, "SELECT * FROM barang");


       $transaksi = mysqli_num_rows($sql1);
       $detail = mysqli_num_rows($sql2);
       $paket = mysqli_num_rows($sql3);
       $persediaan = mysqli_num_rows($sql4);
       ?>
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Dashboard
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
          </ol>

        <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-xs-12">
              <div class="box">
                
               <div class="box-body">
                <div class="row">
            <div class="col-md-3 col-sm-6 col-xs-12">
            <a href="transaksi.html">
              <div class="info-box">
                <span class="info-box-icon bg-aqua"><i class="fa fa-money"></i></span>
                <div class="info-box-content">
                  <span class="info-box-text" style="color: #000;font-size: 16pt;font-weight: bold;">Transaksi</span>
                  <span class="info-box-number" style="color: #000;font-size: 12pt;font-weight: bold;">
                       <?php
                        echo $transaksi;
                       ?>   
                  </span>                
                </div><!-- /.info-box-content -->
                </a>
              </div><!-- /.info-box -->
            </div><!-- /.col -->
            <div class="col-md-3 col-sm-6 col-xs-12">
              <div class="info-box">
              <a href="detail_transaksi.html">
                <span class="info-box-icon bg-red"><i class="fa fa-print"></i></span>
                <div class="info-box-content">
                  <span class="info-box-text" style="color: #000;font-size: 16pt;font-weight: bold;">Faktur</span>
                  <span class="info-box-number" style="color: #000;font-size: 12pt;font-weight: bold;">
                    <?php
                      echo $detail;
                    ?>
                  </span>
                </div><!-- /.info-box-content -->
                </a>
              </div><!-- /.info-box -->
            </div><!-- /.col -->

            <!-- fix for small devices only -->
            <div class="clearfix visible-sm-block"></div>

            <div class="col-md-3 col-sm-6 col-xs-12">
            <a href="paket.html">
              <div class="info-box">
               <span class="info-box-icon bg-green"><i class="fa fa-file"></i></span>
                <div class="info-box-content">
                  <span class="info-box-text" style="color: #000;font-size: 16pt;font-weight: bold;">Paket</span>
                  <span class="info-box-number" style="color: #000;font-size: 12pt;font-weight: bold;">
                    <?php
                    echo $paket;
                    ?>
                  </span>
                </div><!-- /.info-box-content -->
                </a>
              </div><!-- /.info-box -->
            </div><!-- /.col -->
            <div class="col-md-3 col-sm-6 col-xs-12">
             <a href="paket.html">
              <div class="info-box">
                <span class="info-box-icon bg-yellow"><i class="fa fa-download"></i></span>
                <div class="info-box-content">
                  <span class="info-box-text"  style="color: #000;font-size: 16pt;font-weight: bold;">Persediaan</span>
                  <span class="info-box-number" style="color: #000;font-size: 12pt;font-weight: bold;">
                    <?php
                    echo $persediaan;
                    ?>
                  </span>
                </div><!-- /.info-box-content -->
                </a>
              </div><!-- /.info-box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
          </div>
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->
      