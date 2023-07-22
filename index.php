<?php
session_start();
if ($_SESSION['level']=="") {
  header("location:login_index.php");
}

function TanggalIndo($date){
  $BulanIndo = array("Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember");
 
  $tahun = substr($date, 0, 4);
  $bulan = substr($date, 5, 2);
  $tgl   = substr($date, 8, 2);
 
  $result = $tgl . " " . $BulanIndo[(int)$bulan-1] . " ". $tahun;   
  return($result);
}
$timezone = "Asia/Jakarta";
if(function_exists('date_default_timezone_set')) date_default_timezone_set($timezone);
$date=date('Y-m-d');
@ini_set('display_errors', 0);
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <link rel="icon" type="image/png" href="dist/img/avatar5.png">
    <title>Admin Laundry Jaya</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <!-- Bootstrap 3.3.2 -->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />    
    <!-- FontAwesome 4.3.0 -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <!-- Theme style -->
    <link href="dist/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />
    <!-- AdminLTE Skins. Choose a skin from the css/skins 
         folder instead of downloading all of them to reduce the load. -->
    <link href="dist/css/skins/_all-skins.min.css" rel="stylesheet" type="text/css" />
    <!-- iCheck -->
    <link href="plugins/iCheck/flat/purple.css" rel="stylesheet" type="text/css" />
    <!-- Morris chart -->
    <link href="plugins/morris/morris.css" rel="stylesheet" type="text/css" />
    <!-- jvectormap -->
    <link href="plugins/jvectormap/jquery-jvectormap-1.2.2.css" rel="stylesheet" type="text/css" />
    <!-- Date Picker -->
    <link href="plugins/datepicker/datepicker3.css" rel="stylesheet" type="text/css" />
    <!-- Daterange picker -->
    <link href="plugins/daterangepicker/daterangepicker-bs3.css" rel="stylesheet" type="text/css" />
    <!-- bootstrap wysihtml5 - text editor -->
    <link href="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css" rel="stylesheet" type="text/css" />

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
  </head>
  <body class="skin-red">
    <div class="wrapper">
      
      <header class="main-header">
        <!-- Logo -->
        <div style="background-color:#FFF">
          <a href="index2.html" class="logo" style="background-color:#8B0000"><b>LAUNDRY JAYA</b></a>
        </div>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" role="navigation" style="background-color:#8B0000">
          <!-- Sidebar toggle button-->
          
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
              <!-- Messages: style can be found in dropdown.less-->
              
             
             
              <!-- User Account: style can be found in dropdown.less -->
              <li class="dropdown user user-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  
                </a>
                <ul class="dropdown-menu">
                  <!-- User image -->
                  
                  <!-- Menu Footer-->
                  <li class="user-footer">
                    <div class="pull-right">
                      <a href="#" class="btn btn-default btn-flat">Logout</a>
                    </div>
                  </li>
                </ul>
              </li>
            </ul>
          </div>
        </nav>
      </header>

      <!-- Left side column. contains the logo and sidebar -->
      <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          <!-- Sidebar user panel -->
          
            
          <!-- search form -->
          
          <!-- /.search form -->
          <aside>
          <div id="sidebar"  class="nav-collapse ">
          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu">
            <li class="header"><span style="color:white">main navigation</span></li>
            <li class="" >
              <a href="?p=home">
               <span style="color:white; font-family:Comic Sans MS; font-size:13pt">Dashboard</span>
              </a>
            </li>

            <li class="treeview">
              <a href="?p=paket">
               <span style="color:white; font-family:Comic Sans MS; font-size:13pt">Paket</span> 
              </a>
            </li>

              <li class="treeview">
            <a href="#">
              <i class=""></i>
              <span style="color:white; font-family:Comic Sans MS; font-size:13pt">Transaksi</span>
              <span class="label label-primary pull-right">3</span>
            </a>
            <ul class="treeview-menu">
            <li><a href="?p=pelanggan"><span style="font-family:Comic Sans MS">Pelanggan</span></a></li>
            <li><a href="?p=transaksi"><span style="font-family:Comic Sans MS">Transaksi</span></a></li>
            <li><a href="?p=detail_transaksi"><span style="font-family:Comic Sans MS">Faktur</span></a></li>
            </ul></li>

            <li class="treeview">
            <a href="#">
              <i class=""></i>
              <span style="color:white; font-family:Comic Sans MS; font-size:13pt">Persediaan Barang</span>
              <span class="label label-primary pull-right">3</span>
            </a>
            <ul class="treeview-menu">
            <li><a href="?p=pembelian"><span style="font-family:Comic Sans MS">Pembelian</span></a></li>
            <li><a href="?p=pemakaian"><span style="font-family:Comic Sans MS">Pemakaian</span></a></li>
            <li><a href="?p=barang"><span style="font-family:Comic Sans MS">Persediaan</span></a></li>
            </ul></li>

            <li class="treeview">
            <a href="#">
              <i class=""></i>
              <span style="color:white; font-family:Comic Sans MS; font-size:13pt">User</span>
              <span class="label label-primary pull-right">3</span>
            </a>
            <ul class="treeview-menu">
            <li><a href="?p=admin"><span style="font-family:Comic Sans MS">Admin</span></a></li>
            <li><a href="?p=supplier"><span style="font-family:Comic Sans MS">Supplier</span></a></li>
            <li><a href="?p=karyawan"><span style="font-family:Comic Sans MS">Karyawan</span></a></li>
            </ul></li>
             
            <li class="treeview">
              <a href="login_index.php">
              <span style="color:white; font-family:Comic Sans MS; font-size:13pt">Longout</span>
              </a>
            </li>
         </ul>
        </section>


        <!-- /.sidebar -->

      </aside>
          <div class="content-wrapper" >

            
           <!-- Right side column. Contains the navbar and content of the page -->
          <?php include "content.php"; ?>
        <!-- Main content -->
             
        </div>

      <footer class="main-footer" >
        <div class="pull-right hidden-xs" >
          <b></b>Sistem Laundry
        </div>
        <strong>© 2020 Laundry jaya</strong>
      </footer>

    </div><!-- ./wrapper -->

    <!-- jQuery 2.1.3 -->
    <script src="plugins/jQuery/jQuery-2.1.3.min.js"></script>
    <!-- jQuery UI 1.11.2 -->
    <script src="http://code.jquery.com/ui/1.11.2/jquery-ui.min.js" type="text/javascript"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
      $.widget.bridge('uibutton', $.ui.button);
    </script>
    <!-- DATA TABES SCRIPT -->
    <script src="../../plugins/datatables/jquery.dataTables.js" type="text/javascript"></script>
    <script src="../../plugins/datatables/dataTables.bootstrap.js" type="text/javascript"></script>
    <!-- Bootstrap 3.3.2 JS -->
    <script src="bootstrap/js/bootstrap.min.js" type="text/javascript"></script>    
    <!-- Morris.js charts -->
    <script src="http://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
    <script src="plugins/morris/morris.min.js" type="text/javascript"></script>
    <!-- Sparkline -->
    <script src="plugins/sparkline/jquery.sparkline.min.js" type="text/javascript"></script>
    <!-- jvectormap -->
    <script src="plugins/jvectormap/jquery-jvectormap-1.2.2.min.js" type="text/javascript"></script>
    <script src="plugins/jvectormap/jquery-jvectormap-world-mill-en.js" type="text/javascript"></script>
    <!-- jQuery Knob Chart -->
    <script src="plugins/knob/jquery.knob.js" type="text/javascript"></script>
    <!-- daterangepicker -->
    <script src="plugins/daterangepicker/daterangepicker.js" type="text/javascript"></script>
    <!-- datepicker -->
    <script src="plugins/datepicker/bootstrap-datepicker.js" type="text/javascript"></script>
    <!-- Bootstrap WYSIHTML5 -->
    <script src="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js" type="text/javascript"></script>
    <!-- iCheck -->
    <script src="plugins/iCheck/icheck.min.js" type="text/javascript"></script>
    <!-- Slimscroll -->
    <script src="plugins/slimScroll/jquery.slimscroll.min.js" type="text/javascript"></script>
    <!-- FastClick -->
    <script src='plugins/fastclick/fastclick.min.js'></script>
    <!-- AdminLTE App -->
    <script src="dist/js/app.min.js" type="text/javascript"></script>

    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="dist/js/pages/dashboard.js" type="text/javascript"></script>

    <!-- AdminLTE for demo purposes -->
    <script src="dist/js/demo.js" type="text/javascript"></script>
     <script type="text/javascript">
      $(function () {
        $("#example1").dataTable();
        $('#example2').dataTable({
          "bPaginate": true,
          "bLengthChange": false,
          "bFilter": false,
          "bSort": true,
          "bInfo": true,
          "bAutoWidth": false
        });
      });
    </script>

  </body>
</html>