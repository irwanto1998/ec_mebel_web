<?php
// error_reporting(0);
session_start();
//cek apakah user sudah login
if(!isset($_SESSION['id_p'])){
echo '<script language="javascript">
                alert ("Maaf, Anda belum login silahkan login terlebih dahulu.");
                window.location="login.php";
     </script>';//jika belum login jangan lanjut..
}else{



include 'koneksi.php';


$sql_pelanggan = mysqli_query($koneksi, "SELECT * FROM pelanggan where id_p='$_SESSION[id_p]'");
$pelanggan = mysqli_fetch_array($sql_pelanggan);

$id = $pelanggan['id_p'];
$nama = $pelanggan['nama_p'];
$hp = $pelanggan['hp_p'];
$alamat = $pelanggan['alamat_p'];
$email = $pelanggan['email_p'];
$password = $pelanggan['password_p'];
$stts = $pelanggan['stts_daftar'];

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
  <title>PELANGGAN</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->

  <link href="assets/css/material-icons.css" rel="stylesheet" type="text/css">
  <link href="assets/css/google-fonts.css" rel="stylesheet" type="text/css">
  <link rel="stylesheet" href="assets/css/bootstrap/dist/css/bootstrap.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="tempelate/bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="tempelate/bower_components/Ionicons/css/ionicons.min.css">
     <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="tempelate/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.css">

  <link rel="stylesheet" href="assets/css/usercustom.css">
  <link rel="stylesheet" href="assets/css/material.css">

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<!-- ADD THE CLASS layout-top-nav TO REMOVE THE SIDEBAR. -->
<body>                                       



  <aside class="leftbar brown darken-2">
    <a href="#" class="leftbar-brand">MEUBEL KARYA BERKAH</a>
    <ul class="rights">
      <?php 

              $snot = mysqli_query($koneksi, "SELECT count(*) AS Notif FROM pemesanan JOIN pelanggan ON pemesanan.id_p=pelanggan.id_p WHERE pemesanan.status_pesan='Diproses' AND pemesanan.id_p='$id'");
              $dnot = mysqli_fetch_array($snot);
              $jumnot = $dnot['Notif'];
      ?>
      <!-- Messages: style can be found in dropdown.less-->
          <li class="dropdown messages-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-envelope-o"></i>
              <span class="label label-success"><?php echo $jumnot ?></span>
            </a>
            <ul class="dropdown-menu" style="list-style: none !important;">
              <li class="header">Pesanan Diproses</li>
              <li>
                <!-- inner menu: contains the actual data -->
                <ul class="menu">
            <?php 
              $snot1 = mysqli_query($koneksi, "SELECT * FROM pemesanan JOIN pelanggan ON pemesanan.id_p=pelanggan.id_p JOIN biaya ON pemesanan.kode_pesan=biaya.kode_pesan WHERE pemesanan.status_pesan='Diproses' AND pemesanan.id_p='$id'");
              while ($dnot1 = mysqli_fetch_array($snot1)) {
            ?>
                  <!-- start message -->
                  <li>
                    <a href="?page=detail&kode_pesan=<?php echo $dnot1['kode_pesan'] ?>">
                      <div class="pull-left">
                        <img src="admin/pemesanan/gambar/<?php echo $dnot1['design_pesan'] ?>" class="img-circle" alt="User Image">
                      </div>
                      <h4>
                        <?php echo $dnot1['jenis'] ?>
                        <small><i class="fa fa-calendar"></i> <?php echo $dnot1['tgl_pesan'] ?></small>
                      </h4>
                      <p class="col-green"> Kode : <?php echo $dnot1['kode_pesan'] ?></p>
                    </a>
                  </li>
                  <!-- end message -->    
                  <?php } ?>            
                </ul>
              </li>

            </ul>
          </li>
      <li><a href="pelanggan.php">Home</a></li>
      <li><a href="?page=histori">Histori pesanan</a></li>
      <li><a href="?page=akun">Akun</a></li>
      <li><a href="logout.php" onclick="return confirm('Yakin ingin keluar dari sistem ini ?');">Logout</a></li>
    </ul>
  </aside>

  <aside class="content">
      <?php 

      include 'koneksi.php';

      if (isset($_GET["page"])) {
        $page = $_GET["page"];
        $file = "$page.php";

        if (!file_exists($file)) {
          include ("furniture.php");
        }else{
          include ("$page.php");
        }
        
      }else{
        include ("furniture.php");
      }

      ?>


  </aside>

<div class="notifications">
  
</div>




  <!-- jQuery 3 -->
  <script src="tempelate/bower_components/jquery/dist/jquery.min.js"></script>
  <!-- Bootstrap 3.3.7 -->
  <script src="tempelate/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
  <!-- SlimScroll -->
  <script src="tempelate/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
  <!-- FastClick -->
  <script src="tempelate/bower_components/fastclick/lib/fastclick.js"></script>
  <!-- AdminLTE App -->
  <script src="tempelate/dist/js/adminlte.min.js"></script>
  <!-- AdminLTE for demo purposes -->
  <script src="tempelate/dist/js/demo.js"></script>
   <!-- CK Editor -->
  <script src="tempelate/bower_components/ckeditor/ckeditor.js"></script>
  <!-- Bootstrap WYSIHTML5 -->
  <script src="tempelate/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
   <script> 
    $(function () {

    CKEDITOR.replace('editor1');

    $('.textarea').wysihtml5();

  })
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