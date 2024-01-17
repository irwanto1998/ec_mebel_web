
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MEBEL</title>
    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    
  <link href="assets/css/material-icons.css" rel="stylesheet" type="text/css">
  <link href="assets/css/google-fonts.css" rel="stylesheet" type="text/css">
  <link rel="stylesheet" href="assets/css/bootstrap/dist/css/bootstrap.css">
    <link rel="stylesheet" href="assets/css/materialize.min.css">
    <link rel="stylesheet" href="assets/css/material.css">
    <link rel="stylesheet" href="assets/css/custom.css">
            
</head>
<body id="home">

<nav class="brown darken-1">
    <div class="nav-wrapper container">
      <a href="#!" class="brand-logo">MEBEL KARYA BERKAH</a>
      <a href="#" data-target="mobile-demo" class="sidenav-trigger"><i class="material-icons">menu</i></a>
      <ul class="right hide-on-med-and-down">
        <li><a href="#home">Home</a></li>
        <li><a href="#produk">Furniture</a></li>
        <li><a href="login.php">Registrasi & Login</a></li>
        <li><a href="#kontak">Kontak Kami</a></li>
        <li><a href="#faq">FAQ</a></li>
      </ul>
    </div>
  </nav>

  <ul class="sidenav" id="mobile-demo">
  <li><a href="#home">Home</a></li>
        <li><a href="#produk">Furniture</a></li>
        <li><a href="login.php">Registrasi & Login</a></li>
        <li><a href="#kontak">Kontak Kami</a></li>
        <li><a href="#faq">FAQ</a></li>
  </ul>


  <div class="slider">
    <ul class="slides">
      <li>
        <img src="assets/img/2.jpg"> <!-- random image -->
        <div class="caption center-align">
          <h3></h3>
          <h5 class="light grey-text text-lighten-3"></h5>
        </div>
      </li>

      
    </ul>
  </div>


<!--<section class="feature">
    <h3 class="feature-title center grey-text">INFORMASI</h3>

    <div class="container">
        <div class="row">
            <div class="col m4">
                <div class="card-icons">
                    <i class="material-icons">person</i>
                    <span class="card-icons-title">Pemilik Mebel</span>
                    <p>Syarif Zubli</p>
                </div>
            </div>
            <div class="col m4">
                <div class="card-icons">
                    <i class="material-icons">person</i>
                    <span class="card-icons-title">Lorem</span>
                    <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Necessitatibus, modi?</p>
                </div>
            </div>
            <div class="col m4">
                <div class="card-icons">
                    <i class="material-icons">person</i>
                    <span class="card-icons-title">Lorem</span>
                    <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Necessitatibus, modi?</p>
                </div>
            </div>
        </div>
    </div>
</section>-->

<section class="feature" id="produk">
    <h3 class="feature-title center grey-text m-b-100 m-t-100" >FURNITURE</h3>

        <div class="row">

            <?php 
              include 'koneksi.php';
              function rupiah($angka){
  
  $hasil_rupiah = "Rp " . number_format($angka,2,',','.');
  return $hasil_rupiah;
 
}
              $mysql = mysqli_query($koneksi, "SELECT * FROM furniture");
              while ($data = mysqli_fetch_array($mysql)) {
             ?>
            <div class="col m3">
             <div class="box">
               <div class="box-header no-padding">
                 <img class="feature-img" src="admin/furniture/gambar/<?php echo $data['gambar_f'] ?>">
               </div>
               <div class="box-body">
                <ul class="ul-desc">
                  <li class="font-16 font-bold col-brown">
                    <?php echo $data['nama_f'] ?>
                  </li>
                  <li class="font-22 font-bold col-green">
                    <?php echo rupiah($data['harga']) ?>
                  </li>
                </ul>
              </div>
              <div class="box-footer">
                <a href="#detail<?php echo $data['id_f'] ?>" class="btn btn-info btn-block" data-toggle="modal">Detail furniture</a>
              </div>
            </div>
            </div>


<style>
  .ul-modal-body{
    padding: 0;
  }
  .ul-modal-body li{
    list-style: none;
    padding:  10px 0 10px 0;
    border-bottom: 1px solid #dedede;
  }
  .ul-modal-body li span{
    display: block;
  }
  .ul-modal-body li span.lefts{
    font-size: 14px;   
    width: 100px;
    color: #a3a3a3;
  }
  .ul-modal-body li span.rights{
    font-size: 14px;
    font-weight: bold;
    display: block;
  }
  .modal-content{
    width:400px
  }
</style>
<!-- Modal detail -->
<div class="modal fade" id="detail<?php echo $data['id_f'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content m-t-100">
      <div class="modal-body">
        <p class="font-16 font-bold m-t-20 col-brown"><?php echo $data['nama_f'] ?></p>
        <p class="font-22 font-bold col-green"><?php echo rupiah($data['harga']) ?></p>
        <ul class="ul-modal-body">
            <li>
              <span class="lefts">Bahan</span>
              <span class="rights"><?php echo $data['bahan'] ?></span>
            </li>
            <li>
              <span class="lefts">Warna</span>
              <span class="rights"><?php echo $data['warna'] ?></span>
            </li>
            <li>
              <span class="lefts">Ukuran</span>
              <span class="rights"><?php echo $data['ukuran'] ?></span>
            </li>
            <li>
              <span class="lefts">Keterangan</span>
              <span class="rights"><?php echo $data['ket_f'] ?></span>
            </li>
            
        </ul>
       
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary pull-right" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

          <?php } ?>

        </div>

</section>

<section class="feature">
    <h3 class="feature-title center grey-text" id="faq">FAQ</h3>
    <div class="container">
        <div class="row">

            <?php 
              include 'koneksi.php';
              $mysql = mysqli_query($koneksi, "SELECT * FROM faq");
              while ($data = mysqli_fetch_array($mysql)) {
             ?>
            <div class="col m12">
                <div class="card">
                        <div class="card-content">
                            <?php echo $data['isi_faq'] ?>
                        </div>
                </div>
            </div>






          <?php } ?>

        </div>
    </div>
</section>




<footer class="page-footer brown darken-1" id="kontak">
          <div class="container">
            <div class="row">
              <div class="col l6 s12">
                <h5 class="white-text">Alamat Mebel</h5>
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2880.073281032958!2d109.98447074792423!3d-1.8755285892126516!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e05178563f46759%3A0xa2e6faafbe5ad2a7!2sJl.%20Rahadi%20Ismail%2C%20Padang%2C%20Benua%20Kayong%2C%20Kabupaten%20Ketapang%2C%20Kalimantan%20Barat%2078822!5e0!3m2!1sid!2sid!4v1610288715788!5m2!1sid!2sid" width="600" height="200" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
              </div>

              <div class="col l4 offset-l2 s12">
                <h5 class="white-text">Sosial Media</h5>
                <ul>
                    <li class="social-icons">
                      <a class="grey-text text-lighten-3" href="#!">
                          <i class="fa fa-facebook"></i>
                          <span>Meubel karya berkah</span>
                      </a>
                    </li>
                    <li class="social-icons">
                      <a class="grey-text text-lighten-3" href="#!">
                          <i class="fa fa-whatsapp"></i>
                          <span>+6285245715253</span>
                      </a>
                    </li>
                    <li class="social-icons">
                      <a class="grey-text text-lighten-3" href="#!">
                          <i class="fa fa-bank"></i>
                          <span>6013014055698263</span>
                      </a>
                    </li>
                    <li class="social-icons">
                      <a class="grey-text text-lighten-3" href="#!">
                          <i class="fa fa-phone"></i>
                          <span>+6285245715253</span>
                      </a>
                    </li>
                </ul>
              </div>
            </div>
          </div>
          <div class="footer-copyright">
            <div class="container">
            © <?php echo date('Y') ?>
            <a class="grey-text text-lighten-4 right" href="#!">Nizar Rahman Syahab</a>
            </div>
          </div>
        </footer>



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
  <script src="assets/js/materialize.min.js"></script>
    <script src="assets/js/custom.js"></script>
</body>
</html>
