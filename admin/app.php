<?php
error_reporting(0);
session_start();
//cek apakah user sudah login
if(!isset($_SESSION['id_admin'])){
echo '<script language="javascript">
                alert ("Maaf, Anda belum login silahkan login terlebih dahulu.");
                window.location="index.php";
     </script>';//jika belum login jangan lanjut..
}else{



include '../koneksi.php';


$s_admin = mysqli_query($koneksi, "SELECT * FROM admin where id_admin='$_SESSION[id_admin]'");
$admin = mysqli_fetch_array($s_admin);

$id = $admin['id_admin'];
$nama = $admin['nama_admin'];
$email = $admin['email_admin'];
$username = $admin['username_admin'];
$password = $admin['password_admin'];
$gambar = $admin['gambar_admin'];

function rupiah($angka){
  
  $hasil_rupiah = "Rp " . number_format($angka,2,',','.');
  return $hasil_rupiah;
 
}


?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>MEBEL</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="../tempelate/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../tempelate/bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="../tempelate/bower_components/Ionicons/css/ionicons.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="../tempelate/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../tempelate/dist/css/AdminLTE.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
   folder instead of downloading all of them to reduce the load. -->
   <link rel="stylesheet" href="../tempelate/dist/css/skins/_all-skins.min.css">
   <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="../tempelate/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.css">

  <link rel="stylesheet" href="../tempelate/dist/css/custom.css">


<!-- Google Font -->
<link rel="stylesheet"
href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition skin-blue sidebar-mini">
  <div class="wrapper">

    <header class="main-header">
      <!-- Logo -->
      <a href="" class="logo">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class="logo-mini"><b>A</b>M</span>
        <!-- logo for regular state and mobile devices -->
        <span class="logo-lg"><b>Admin</b> MEBEL</span>
      </a>
      <!-- Header Navbar: style can be found in header.less -->
      <nav class="navbar navbar-static-top">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </a>

        <div class="navbar-custom-menu">
          <ul class="nav navbar-nav">
             <!-- Messages: style can be found in dropdown.less-->
            <?php 
              $mysqlHitungBaru = mysqli_query($koneksi, "SELECT count(*) AS pesanBaru FROM pemesanan JOIN pelanggan USING(id_p) WHERE pemesanan.status_pesan='Terkirim'");
              $dataHitungBaru = mysqli_fetch_array($mysqlHitungBaru);
              $notifpesanBaru = $dataHitungBaru['pesanBaru'];
            ?>
          <li class="dropdown messages-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-envelope-o"></i>
              <span class="label label-danger"><?php echo $notifpesanBaru ?></span>
            </a>
            <ul class="dropdown-menu">
              <li class="header">PESANAN BARU</li>
              <li>
                <!-- inner menu: contains the actual data -->
                <ul class="menu">
                  <?php 
              $no = 1;
              $mysqlq = mysqli_query($koneksi, "SELECT * FROM pemesanan JOIN pelanggan USING(id_p) WHERE pemesanan.status_pesan='Terkirim' GROUP BY pemesanan.id_pesan DESC");
              while ($dataq = mysqli_fetch_array($mysqlq)) {
            ?>
                  <li style="padding: 0 !important"><!-- start message -->
                    <a href="?page=pemesanan/detail&kode=<?php echo $dataq['kode_pesan'] ?>">
                      <h4>
                        <?php echo $dataq['nama_p'] ?>
                        <small><i class="fa fa-calendar"></i> <?php echo $dataq['tgl_pesan'] ?></small>
                      </h4>
                      <p>Banyak Pesanan : <span><?php echo $dataq['banyak_pesan'] ?></span></p>
                    </a>
                  </li>
                  <!-- end message -->
                  <?php } ?>
                </ul>
              </li>
              <li class="footer"><a href="?page=pemesanan/baru">Lihat semua</a></li>
            </ul>
          </li>
          <!-- Notifications: style can be found in dropdown.less -->

          <!-- Messages: style can be found in dropdown.less-->
            <?php 
              $sqlPelangganBaru = mysqli_query($koneksi, "SELECT count(*) AS pelangganBaru FROM pelanggan WHERE stts_daftar='Baru'");
              $dataHitungBaru = mysqli_fetch_array($sqlPelangganBaru);
              $notifpelangganBaru = $dataHitungBaru['pelangganBaru'];
            ?>
          <li class="dropdown messages-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-group"></i>
              <span class="label label-danger"><?php echo $notifpelangganBaru ?></span>
            </a>
            <ul class="dropdown-menu">
              <li class="header text-center">PELANGGAN BARU</li>
              <li>
                <!-- inner menu: contains the actual data -->
                <ul class="menu">
                  <?php 
              $mysqlz = mysqli_query($koneksi, "SELECT * FROM pelanggan WHERE stts_daftar='Baru'");
              while ($dataz = mysqli_fetch_array($mysqlz)) {
            ?>
                  <li style="padding: 0 !important">
                    <a href="">
                      <h4>
                        <?php echo $dataz['nama_p'] ?>
                      </h4>
                      <p><span><?php echo $dataz['email_p'] ?></span></p>
                    </a>
                  </li>
                  <!-- end message -->
                  <?php } ?>
                </ul>
              </li>
              <li class="footer"><a href="?page=pelanggan/index">Lihat semua</a></li>
            </ul>
          </li>
          <!-- Notifications: style can be found in dropdown.less -->


            <!-- User Account: style can be found in dropdown.less -->
            <li class="dropdown user user-menu">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <img src="akun/gambar/<?php echo $gambar ?>" class="user-image" alt="User Image">
                <span class="hidden-xs"><?php echo $nama ?></span>
              </a>
              <ul class="dropdown-menu">
                <!-- User image -->
                <li class="user-header">
                  <img src="akun/gambar/<?php echo $gambar ?>" class="img-circle" alt="User Image">

                  <p>
                    <?php echo $nama ?>
                    <small><?php echo $email ?></small>
                  </p>
                </li>
                <!-- Menu Body -->
                <!-- Menu Footer-->
                <li class="user-footer">
                  <div class="pull-left">
                    <a href="?page=akun/index" class="btn btn-default btn-flat">Profile</a>
                  </div>
                  <div class="pull-right">
                    <a href="logout.php" class="btn btn-default btn-flat" onclick="return confirm('Yakin ingin keluar dari sistem ini ?');">Sign out</a>
                  </div>
                </li>
              </ul>
            </li>
            <!-- Control Sidebar Toggle Button -->
            <li>
              <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
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
        <div class="user-panel">
          <div class="pull-left image">
            <img src="akun/gambar/<?php echo $gambar ?>" class="img-circle" alt="User Image">
          </div>
          <div class="pull-left info">
            <p><?php echo $nama ?></p>
            <a href="#"><i class="fa fa-circle text-success"></i> Admin</a>
          </div>
        </div>

        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu" data-widget="tree">
          <li class="header text-center">LABELS</li>
          <li class="<?php if ($_GET['page']=='') {echo 'active';} ?>">
            <a href="app.php">
              <i class="fa fa-dashboard"></i> 
              <span>DASHBOARD</span>
            </a>
          </li>
          <li class="<?php if ($_GET['page']=='furniture/index') {echo 'active';} ?>">
            <a href="?page=furniture/index">
              <i class="fa fa-home"></i> 
              <span>INFORMASI FURNITURE</span>
            </a>
          </li>
          <li class="<?php if ($_GET['page']=='pelanggan/index') {echo 'active';} ?>">
            <a href="?page=pelanggan/index">
              <i class="fa fa-group"></i> 
              <span>DATA PELANGGAN</span>
            </a>
          </li>
          <li class="treeview">
          <a href="#">
            <i class="fa fa-folder"></i> <span>DATA PEMESANAN</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu <?php if ($_GET['page']=='pemesanan/index') {echo 'active';} ?>">
            <li>
              <a href="?page=pemesanan/index">
                <i class="fa fa-circle-o"></i> Semua Pesanan
              </a>
            </li>
           <li>
              <a href="?page=pemesanan/baru">
                <i class="fa fa-circle-o"></i> Pesanan Baru
              </a>
            </li>
            <li>
              <a href="?page=pemesanan/proses">
                <i class="fa fa-circle-o"></i> Pesanan Proses
              </a>
            </li>
            <li>
              <a href="?page=pemesanan/bayar">
                <i class="fa fa-circle-o"></i> Pesanan Bayar
              </a>
            </li>
            <li>
              <a href="?page=pemesanan/selesai">
                <i class="fa fa-circle-o"></i> Pesanan Selesai
              </a>
            </li>
          </ul>
        </li>
         <li class="<?php if ($_GET['page']=='faq/index') {echo 'active';} ?>">
            <a href="?page=faq/index">
              <i class="fa fa-group"></i> 
              <span>DATA FAQ</span>
            </a>
          </li>
        </ul>
      </section>
      <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->

      <?php 


      if (isset($_GET["page"])) {
        $page = $_GET["page"];
        $file = "$page.php";

        if (!file_exists($file)) {
          include ("dashboard.php");
        }else{
          include ("$page.php");
        }
        
      }else{
        include ("dashboard.php");
      }

      ?>
      <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    <footer class="main-footer">

      <strong>Copyright &copy; <?php echo date('Y') ?> <a href="#">Nizar</a>.</strong> All rights
      reserved.
    </footer>

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
      <!-- Create the tabs -->
      <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
        
      </ul>
      <!-- Tab panes -->
      <div class="tab-content">
        <!-- Home tab content -->
        <div class="tab-pane" id="control-sidebar-home-tab">

        </div>
        <!-- /.tab-pane -->
        <!-- Stats tab content -->
        <div class="tab-pane" id="control-sidebar-stats-tab">Stats Tab Content</div>
        <!-- /.tab-pane -->
        <!-- Settings tab content -->
        <div class="tab-pane" id="control-sidebar-settings-tab">
          
        </div>
        <!-- /.tab-pane -->
      </div>
    </aside>
    <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
   immediately after the control sidebar -->
   <div class="control-sidebar-bg"></div>
 </div>
 <!-- ./wrapper -->

 <!-- jQuery 3 -->
 <script src="../tempelate/bower_components/jquery/dist/jquery.min.js"></script>
 <!-- Bootstrap 3.3.7 -->
 <script src="../tempelate/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
 <!-- DataTables -->
 <script src="../tempelate/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
 <script src="../tempelate/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
 <!-- SlimScroll -->
 <script src="../tempelate/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
 <!-- FastClick -->
 <script src="../tempelate/bower_components/fastclick/lib/fastclick.js"></script>
 <!-- AdminLTE App -->
 <script src="../tempelate/dist/js/adminlte.min.js"></script>
 <!-- AdminLTE for demo purposes -->
 <script src="../tempelate/dist/js/demo.js"></script>
 <!-- CK Editor -->
<script src="../tempelate/bower_components/ckeditor/ckeditor.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="../tempelate/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
 <!-- page script -->
 <script>
  $(function () {
    $('#example1').DataTable();

    CKEDITOR.replace('editor1')

    $('.textarea').wysihtml5()
  })
  function sum() {
      var banyak = document.getElementById('banyak_pesan').value;
      var harga = document.getElementById('harga_satuan').value;
      var kaliKan = parseInt(banyak) * parseInt(harga);
      if (!isNaN(kaliKan)) {
         document.getElementById('jumlah_harga').value = kaliKan;
      }
  } 
  function hitung(){
    var jumlahHarga = document.getElementById('jumlah_harga').value;
    var dp = document.getElementById('dp').value;
    var sisaHarga = parseInt(jumlahHarga) - parseInt(dp);
    if (!isNaN(sisaHarga)) {
         document.getElementById('sisa').value = sisaHarga;
      }
  }
</script>
</body>
</html>
<?php } ?>
