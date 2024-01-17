<?php 
	$mysql = mysqli_query($koneksi, "SELECT * FROM pelanggan WHERE id_p='$_GET[id]'");
	$data = mysqli_fetch_array($mysql);
?>


<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-xs-6">
      <div class="box">
        <div class="box-header text-center">
          <h3 class="box-title">FORM EDIT DATA PELANGGAN</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <form method="POST" action="">
          	<input type="hidden" name="id_p" value="<?php echo $data['id_p'] ?>"></input>
            <table class="table">
              <tr>
                <td>
                  <label>Nama</label>
                  <input type="text" name="nama_p" value="<?php echo $data['nama_p'] ?>" class="form-control" placeholder="Nama .." required="" autocomplete="off"></input>
                </td>
              </tr>
              <tr>
                <td>
                  <label>Telepon / Hp</label>
                  <input type="number" name="hp_p" value="<?php echo $data['hp_p'] ?>" class="form-control" placeholder="No.Telepon/HP .." required="" autocomplete="off"></input>
                </td>
              </tr>
              <tr>
                <td>
                  <label>Email</label>
                  <input type="email" name="email_p" value="<?php echo $data['email_p'] ?>" class="form-control" placeholder="Email .." required="" autocomplete="off"></input>
                </td>
              </tr>
              <tr>
                <td>
                  <label>Password</label>
                  <input type="text" name="password_p" value="<?php echo $data['password_p'] ?>" class="form-control" placeholder="Password .." required="" autocomplete="off"></input>
                </td>
              </tr>
              <tr>
                <td>
                  <label>Alamat</label>
                  <textarea rows="5" name="alamat_p" class="form-control" placeholder="Alamat lengkap .." required="" autocomplete="off"><?php echo $data['alamat_p'] ?></textarea>
                </td>
              </tr>
             
              <tr>
                <td align="right">
                  <button type="submit" name="simpan" class="btn btn-primary">SIMPAN</button>
                </td>
              </tr>
            </table>
          </form>
        </div>
        <!-- /.box-body -->
      </div>
      <!-- /.box -->
    </div>
    <!-- /.col -->
  </div>
  <!-- /.row -->
</section>

<?php 

if (isset($_POST['simpan'])) {


  $id_p = $_POST['id_p'];
  $nama_p = $_POST['nama_p'];
  $hp_p = $_POST['hp_p'];
  $alamat_p = $_POST['alamat_p'];
  $email_p = $_POST['email_p'];
  $password_p = $_POST['password_p'];




  $simpan = mysqli_query($koneksi, "UPDATE pelanggan SET nama_p='$nama_p', hp_p='$hp_p', alamat_p='$alamat_p', email_p='$email_p', password_p='$password_p' WHERE id_p='$id_p'");

  if ($simpan) {
    echo "<script>alert('Sukses')</script>";
    echo "<meta http-equiv='refresh' content='0; url=?page=pelanggan/edit&id=$id_p'></script>";
  }else{
    echo "<script>alert('Terjadi kesalahan coba ulangi kembali')</script>";
    echo "<meta http-equiv='refresh' content='0; url=?page=pelanggan/edit&id=$id_p'></script>";
  }





}

?>