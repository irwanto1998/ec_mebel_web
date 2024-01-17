
<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-xs-6">
      <div class="box">
        <div class="box-header text-center">
          <h3 class="box-title">FORM TAMBAH DATA PELANGGAN</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <form method="POST" action="">
            <table class="table">
              <tr>
                <td>
                  <label>Nama</label>
                  <input type="text" name="nama_p" class="form-control" placeholder="Nama .." required="" autocomplete="off"></input>
                </td>
              </tr>
              <tr>
                <td>
                  <label>Telepon / Hp</label>
                  <input type="number" name="hp_p" class="form-control" placeholder="No.Telepon/HP .." required="" autocomplete="off"></input>
                </td>
              </tr>
              <tr>
                <td>
                  <label>Email</label>
                  <input type="email" name="email_p" class="form-control" placeholder="Email .." required="" autocomplete="off"></input>
                </td>
              </tr>
              <tr>
                <td>
                  <label>Password</label>
                  <input type="text" name="password_p" class="form-control" placeholder="Password .." required="" autocomplete="off"></input>
                </td>
              </tr>
              <tr>
                <td>
                  <label>Alamat</label>
                  <textarea rows="5" name="alamat_p" class="form-control" placeholder="Alamat lengkap .." required="" autocomplete="off"></textarea>
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


  $nama_p = $_POST['nama_p'];
  $hp_p = $_POST['hp_p'];
  $alamat_p = $_POST['alamat_p'];
  $email_p = $_POST['email_p'];
  $password_p = $_POST['password_p'];



  $cek = mysqli_query($koneksi, "SELECT * FROM pelanggan WHERE nama_p='$nama_p'");
  $ada = mysqli_num_rows($cek);

  if ($ada == 1) {
    echo "<script>alert('Nama $nama_p sudah ada, silahkan inputkan, nama yang lain.')</script>";
    echo "<meta http-equiv='refresh' content='0; url=?page=pelanggan/tambah'></script>";
 }else{
  $simpan = mysqli_query($koneksi, "INSERT INTO pelanggan VALUES('', '$nama_p', '$hp_p', '$alamat_p', '$email_p', '$password_p', 'Baru');");

  if ($simpan) {
    echo "<script>alert('Sukses')</script>";
    echo "<meta http-equiv='refresh' content='0; url=?page=pelanggan/index'></script>";
  }else{
    echo "<script>alert('Terjadi kesalahan coba ulangi kembali')</script>";
    echo "<meta http-equiv='refresh' content='0; url=?page=pelanggan/tambah'></script>";
  }
}




}

?>