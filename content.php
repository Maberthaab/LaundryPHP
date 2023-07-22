<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
			<?php
                    $p=isset($_GET['p'])?$_GET['p']:null;
                    switch($p){
                        default:
                        echo'
                        <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="box-header">
                <center>
                 <h1 style="font-weight:bold;font-family:Comic Sans MS">SISTEM ADMIN</h1></center>
                 <center><div style="width:300px">
                 <h2 style="font-family:Comic Sans MS;"><marquee>Laundry Jaya</marquee></h2> 
                 </div></center>
                <center><img src="dist/img/mesin.jpg" style="border-radius:20px;height:370px"></center>
                </div><!-- /.box-header -->
                <div class="box-body">
              <div class="row">
            <!-- left column -->
            <div class="col-md-12">      
                              </div><!-- /.box -->
                </div><!-- /.box-body -->
              </div><!-- /.box -->               
                  </table>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->';
                break;
                        case "home":                        
include "home/home.php";
                            break;
                        case "transaksi":						
include "transaksi/transaksi_index.php";
                            break;
                        case "input_transaksi":                       
include "transaksi/transaksi_input.php";
                            break;
                        case "hapus_transaksi":                       
include "transaksi/transaksi_hapus.php";
                            break;
                        case "edit_transaksi":                       
include "transaksi/transaksi_edit.php";
                            break;
                        case "cetak_fil":                       
include "transaksi/index_fil.php";
                            break;
                        case "pelanggan":                       
include "pelanggan/pelanggan_index.php";
                            break;
                       case "input_pelanggan":                       
include "pelanggan/pelanggan_input.php";
                            break;
                       case "edit_pelanggan":                       
include "pelanggan/pelanggan_edit.php";
                            break;
                        case "hapus_pelanggan":                       
include "pelanggan/pelanggan_hapus.php";
                            break;
                        case "paket":                       
include "paket/paket_index.php";
                            break;
                        case "input_paket":                       
include "paket/paket_input.php";
                            break;
                        case "edit_paket":                       
include "paket/paket_edit.php";
                            break;
                        case "hapus_paket":                       
include "paket/paket_hapus.php";
                            break;
                        case "detail_transaksi":                       
include "detail/detail_transaksi_index.php";
                            break;
                        case "hapus_detail":                       
include "detail/detail_transaksi_hapus.php";
                            break;
                        case "edit_detail":                       
include "detail/detail_transaksi_edit.php";
                            break;
                        case "cetak":                       
include "detail/cetak_isi.php";
                            break;
                            case "supplier":                       
include "supplier/supplier_index.php";
                            break;
                            case "input_supplier":                       
include "supplier/supplier_input.php";
                            break;
                            case "hapus_supplier":                       
include "supplier/supplier_hapus.php";
                            break;
                            case "edit_supplier":                       
include "supplier/supplier_edit.php";
                            break;
                            case "karyawan":                       
include "karyawan/karyawan_index.php";
                            break;
                            case "input_karyawan":                       
include "karyawan/karyawan_input.php";
                            break;
                            case "edit_karyawan":                       
include "karyawan/karyawan_edit.php";
                            break;
                            case "hapus_karyawan":                       
include "karyawan/karyawan_hapus.php";
                            break;
                            case "pemakaian":                       
include "pemakaian/pemakaian_index.php";
                            break;
                            case "input_pemakaian":                       
include "pemakaian/pemakaian_input.php";
                            break;
                            case "hapus_pemakaian":                       
include "pemakaian/pemakaian_hapus.php";
                            break;
                            case "edit_pemakaian":                       
include "pemakaian/pemakaian_edit.php";
                            break;
                            case "pembelian":                       
include "pembelian/pembelian_index.php";
                            break;
                            case "input_pembelian":                       
include "pembelian/pembelian_input.php";
                            break;
                            case "edit_pembelian":                       
include "pembelian/pembelian_edit.php";
                            break;
                            case "hapus_pembelian":                       
include "pembelian/pembelian_hapus.php";
                            break;
                            case "barang":                       
include "barang/barang_index.php";
                            break;
                            case "input_barang":                       
include "barang/barang_input.php";
                            break;
                            case "edit_barang":                       
include "barang/barang_edit.php";
                            break;
                            case "hapus_barang":                       
include "barang/barang_hapus.php";
                            break;
                             case "admin":                       
include "admin/admin_index.php";
                            break;
                            case "input_admin":                       
include "admin/admin_input.php";
                            break;
                            case "edit_admin":                       
include "admin/admin_edit.php";
                            break;
                            case "hapus_admin":                       
include "admin/admin_hapus.php";
                            break;
                            
                            









	}
					
	?>
</body>
</html>