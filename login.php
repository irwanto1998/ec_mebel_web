<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>LOGIN NEW MEMBER</title>
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
    <a href="#"><b>LOGIN PELANGGAN</b></a>
  </div>

  <div class="register-box-body">
    <p class="login-box-msg">Register member baru</p>

    <form action="" method="post">

      <div class="form-group has-feedback">
        <input type="email" name="email_p" class="form-control" placeholder="Email" required="">
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" name="password_p" class="form-control" placeholder="Password" required="">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
     
      <div class="row">
        <div class="col-xs-6">
         <a href="index.php" class="btn btn-warning btn-block btn-flat">BERANDA</a>
        </div>
        <!-- /.col -->
        <div class="col-xs-6">
          <button type="submit" name="login" class="btn btn-primary btn-block btn-flat">LOG-IN</button>
        </div>
        <!-- /.col -->
      </div>
    </form>

<br><hr>
    <a href="register.php" class="text-center" style="display: block;text-align: center;">Belum punya akun ? <b>Registrasi disini</b></a>
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
error_reporting(0);

include 'koneksi.php';

// Simpan pelanggan
if (isset($_POST['login'])) {


  $email_p = $_POST['email_p'];
  $password_p = $_POST['password_p'];

  $log =  mysqli_query($koneksi, "SELECT * FROM pelanggan WHERE email_p='$email_p' AND password_p='$password_p'");
  $data = mysqli_fetch_array($log);
  $akun = $data['stts_daftar'];


  if ($akun=='Baru') {
    echo "<script>alert('Akun anda belum aktif, mohon bersabar ...')</script>";
    echo "<meta http-equiv='refresh' content='0; url=login.php'></script>";
  }else if ($akun=='Nonaktif') {
    echo "<script>alert('Mohon maaf akun anda telah di nonaktifkan ...')</script>";
    echo "<meta http-equiv='refresh' content='0; url=login.php'></script>";
  }else if ($akun=='Aktif') {
       if(mysqli_num_rows($log) == 1){
        session_start();
          $_SESSION['id_p'] = $data['id_p'];

        echo "<script>alert('Login Sukses')</script>";
        echo "<meta http-equiv='refresh' content='0; url=pelanggan.php'></script>";

      }else{
        echo "<script>alert('Periksa username dan password anda.')</script>";
        echo "<meta http-equiv='refresh' content='0; url=login.php'></script>";
      }
  }


}




 ?>