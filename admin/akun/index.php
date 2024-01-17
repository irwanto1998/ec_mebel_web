<section class="content-header">
  <h1>AKUN</h1>
</section>

<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-xs-4">
      <div class="box">
        <div class="box-header text-center">
          <img src="akun/gambar/<?php echo $gambar ?>" style="width: 100px;height: 100px;border:3px solid #dedede;border-radius: 100px;padding: 3px;">
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <ul class="list-acount">
            <li class="acount-item">
              <span class="acount-item-name">
                <i class="glyphicon glyphicon-user"></i> Nama
              </span>
              <span class="acount-item-dest">
                <?php echo $nama ?>
              </span>
            </li>
            <li class="acount-item">
              <span class="acount-item-name">
                <i class="glyphicon glyphicon-envelope"></i> Email
              </span>
              <span class="acount-item-dest">
                <?php echo $email ?>
              </span>
            </li>
            <li class="acount-item">
              <span class="acount-item-name">
                <i class="glyphicon glyphicon-qrcode"></i> Username
              </span>
              <span class="acount-item-dest">
                <?php echo $username ?>
              </span>
            </li>
            <li class="acount-item">
              <span class="acount-item-name">
                <i class="glyphicon glyphicon-barcode"></i> Password
              </span>
              <span class="acount-item-dest">
                <?php echo $password ?>
              </span>
            </li>
          </ul>

        </div>
        <!-- /.box-body -->
        <div class="box-footer">
          <a href="#edit<?php echo $id ?>" class="btn btn-sm btn-block btn-primary" data-toggle="modal">Edit akun</a>
        </div>
    </div>
    <!-- /.box -->
  </div>
  <!-- /.col -->
</div>
<!-- /.row -->
</section>


 <div class="modal fade" id="edit<?php echo $id ?>">
  <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header text-center">
         <b>EDIT AKUN</b>
        </div>
        <div class="modal-body">
          <form method="POST" action="" enctype="multipart/form-data">
            <input type="hidden" name="id_admin" value="<?php echo $id ?>"></input>
            <table class="table">
              <tr>
              <td>
                <label>Nama</label>
                <input type="text" name="nama_admin" value="<?php echo $nama ?>" class="form-control" required="" autocomplete="off"></input>
              </td>
            </tr>
           <tr>
              <td>
                <label>Email</label>
                <input type="text" name="email_admin" value="<?php echo $email ?>" class="form-control" required="" autocomplete="off"></input>
              </td>
            </tr>
            <tr>
              <td>
                <label>Username</label>
                <input type="text" name="username_admin" value="<?php echo $username ?>" class="form-control" required="" autocomplete="off"></input>
              </td>
            </tr>
            <tr>
              <td>
                <label>Password</label>
                <input type="text" name="password_admin" value="<?php echo $password ?>" class="form-control" required="" autocomplete="off"></input>
              </td>
            </tr>
            <tr>
              <td>
                <label>Ganti foto</label>
                <input type="file" name="gambar_admin" class="form-control"></input>
              </td>
            </tr>
            <tr>
              <td align="right">
                <button type="submit" name="edit" class="btn btn-primary">Edit</button>
              </td>
            </tr>
            </table>
          </form>
        </div>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
  <!-- /.modal -->

<?php 

if (isset($_POST['edit'])) {


  $id_admin = $_POST['id_admin'];
  $nama_admin = $_POST['nama_admin'];
  $email_admin = $_POST['email_admin'];
  $username_admin = $_POST['username_admin'];
  $password_admin = $_POST['password_admin'];




  $nama_gambar = $_FILES['gambar_admin']['name'];
  $tempat_gambar = $_FILES['gambar_admin']['tmp_name'];




  

  if (empty($nama_gambar)) {


    mysqli_query($koneksi, "UPDATE admin SET nama_admin='$nama_admin', email_admin='$email_admin', username_admin='$username_admin', password_admin='$password_admin' WHERE id_admin='$id_admin'");

    echo "<script>alert('Sukses')</script>";
    echo "<meta http-equiv='refresh' content='0; url=?page=akun/index'></script>";
  }else{

    $u=mysqli_query($koneksi,"SELECT * FROM admin WHERE id_admin='$id_admin'");
    $us=mysqli_fetch_array($u);

    file_exists("akun/gambar/".$us['gambar_admin']);
    unlink("akun/gambar/".$us['gambar_admin']);
    move_uploaded_file($tempat_gambar, "akun/gambar/".$nama_gambar);

    mysqli_query($koneksi, "UPDATE admin SET nama_admin='$nama_admin', email_admin='$email_admin', username_admin='$username_admin', password_admin='$password_admin', gambar_admin='$nama_gambar' WHERE id_admin='$id_admin'");

     
      echo "<script>alert('Sukses')</script>";
    echo "<meta http-equiv='refresh' content='0; url=?page=akun/index'></script>";

  }




}

?>