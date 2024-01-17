<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>REGISTER NEW MEMBER</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="tempelate/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="tempelate/bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="tempelate/bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="tempelate/dist/css/AdminLTE.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="tempelate/plugins/iCheck/square/blue.css">


  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition register-page">
<div class="register-box">
  <div class="register-logo">
    <a href="#"><b>REGISTRASI</b></a>
  </div>

  <div class="register-box-body">
    <p class="login-box-msg">Isi data anda dengan benar</p>

    <form action="" method="post">
      <div class="form-group has-feedback">
        <input type="text" name="nama_p" class="form-control" placeholder="Nama lengkap ..." required="">
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="number" name="hp_p" class="form-control" placeholder="Telepon / HP" required="">
        <span class="glyphicon glyphicon-phone form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="email" name="email_p" class="form-control" placeholder="Email" required="">
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" name="password_p" class="form-control" placeholder="Password" required="">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <textarea name="alamat_p" class="form-control" id="" cols="30" rows="5" placeholder="Alamat lengkap ..." required=""></textarea>
      </div>
      <div class="row">
        <div class="col-xs-6">
         <a href="index.php" class="btn btn-warning btn-block btn-flat">BERANDA</a>
        </div>
        <!-- /.col -->
        <div class="col-xs-6">
          <button type="submit" name="register" class="btn btn-primary btn-block btn-flat">Register</button>
        </div>
        <!-- /.col -->
      </div>
    </form>

<br>

    <a href="login.php" class="text-center" style="display: block;text-align: center;">Saya sudah memiliki akun, <b>Login disini</b></a>
  </div>
  <!-- /.form-box -->
</div>
<!-- /.register-box -->

<!-- jQuery 3 -->
<script src="tempelate/bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="tempelate/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- iCheck -->
<script src="tempelate/plugins/iCheck/icheck.min.js"></script>
<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' /* optional */
    });
  });
</script>
</body>
</html>

<?php 

include 'koneksi.php';

if (isset($_POST['register'])) {


  $nama_p = $_POST['nama_p'];
  $hp_p = $_POST['hp_p'];
  $alamat_p = $_POST['alamat_p'];
  $email_p = $_POST['email_p'];
  $password_p = $_POST['password_p'];



  $cek = mysqli_query($koneksi, "SELECT * FROM pelanggan WHERE email_p='$email_p'");
  $ada = mysqli_num_rows($cek);

      if ($ada == 1) {
        echo "<script>alert('Nama $email_p sudah ada, silahkan inputkan, nama yang lain.')</script>";
        echo "<meta http-equiv='refresh' content='0; url=register.php'></script>";
     }else{
      $simpan = mysqli_query($koneksi, "INSERT INTO pelanggan VALUES('', '$nama_p', '$hp_p', '$alamat_p', '$email_p', '$password_p','Baru');");

      if ($simpan) {
        echo "<script>alert('Registrasi berhasil')</script>";
        echo "<meta http-equiv='refresh' content='0; url=login.php'></script>";
      }else{
        echo "<script>alert('Terjadi kesalahan coba ulangi kembali')</script>";
        echo "<meta http-equiv='refresh' content='0; url=register.php'></script>";
      }
    }

}

?>
