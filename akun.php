
<div class="col-md-9"></div>
<div class="col-md-3">
   <div class="box box-akun">
     <div class="box-header">
       <h2 class="text-center">AKUN</h2>
     </div>
     <div class="box-body">
      <ul class="akun-ul">
       <li>
        <span>Nama</span> <a class="grey-text"><?php echo $nama ?></a>
      </li>
      <li>
        <span>Telepon</span> <a class="grey-text"><?php echo $hp ?></a>
      </li>
      <li>
        <span>Email</span> <a class="grey-text"><?php echo $email ?></a>
      </li>
      <li>
        <span>Password</span> <a class="grey-text"><?php echo $password ?></a>
      </li>
      <li>
        <span>Alamat</span> <a class="grey-text"><?php echo $alamat ?>1</a>
      </li>
       <li>
        <span>Akun</span> 
        <?php

          if ($stts=='Aktif') {
             echo "
              <a class='green-text'>Aktif</a>
             ";
          }else if ($stts=='Nonaktif') {
             echo "
              <a class='red-text'>Nonaktif</a>
             ";
          }

        ?>
      </li>
    </ul>
  </div>
  <div class="box-footer">
   <a href="#edit<?php echo $id ?>" class="btn btn-block btn-flat btn-sm btn btn-primary" data-toggle="modal">Update Akun</a>
  </div>
  </div>
</div>


 <div class="modal fade" id="edit<?php echo $id ?>">
  <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header text-center">
         <b>UPDATE AKUN</b>
        </div>
        <div class="modal-body">
          <form action="" method="POST">
            <input type="hidden" name="id_p" value="<?php echo $id ?>"></input>
            <table class="table">
              <tr>
              <td>
                <label>Nama</label>
                <input type="text" name="nama_p" value="<?php echo $nama ?>" class="form-control"  required="" autocomplete="off" readonly></input>
              </td>
            </tr>
            <tr>
              <td>
                <label>No.Telepon / HP</label>
                <input type="text" name="hp_p" value="<?php echo $hp ?>" class="form-control" placeholder="Harga satuan .." required="" autocomplete="off"></input>
              </td>
            </tr>
            <tr>
              <td>
                <label>Email</label>
                <input type="text" name="email_p" value="<?php echo $email ?>" class="form-control" placeholder="Jumlah harga .." required="" autocomplete="off" readonly></input>
              </td>
            </tr>
             <tr>
              <td>
                <label>Password</label>
                <input type="text" name="password_p" value="<?php echo $password ?>" class="form-control" required="" autocomplete="off"></input>
              </td>
            </tr>
            <tr>
              <td>
                <label>Alamat</label>
                <textarea name="alamat_p" class="textarea form-control"
                  style="width: 100%; height: 200px; font-size: 12px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"><?php echo $alamat ?></textarea>
              </td>
            </tr>
            <tr>
              <td align="right">
                <button type="submit" name="konfirmasi" class="btn btn-primary">Update</button>
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

if (isset($_POST['konfirmasi'])) {


  $id_p = $_POST['id_p'];
  $nama_p = $_POST['nama_p'];
  $hp_p = $_POST['hp_p'];
  $alamat_p = $_POST['alamat_p'];
  $email_p = $_POST['email_p'];
  $password_p = $_POST['password_p'];
 



  $simpan = mysqli_query($koneksi, "UPDATE pelanggan SET nama_p='$nama_p', hp_p='$hp_p', alamat_p='$alamat_p', email_p='$email_p', password_p='$password_p' WHERE id_p='$id_p'");

  if ($simpan) {
    echo "<script>alert('Sukses')</script>";
    echo "<meta http-equiv='refresh' content='0; url=?page=akun'></script>";
  }else{
    echo "<script>alert('Terjadi kesalahan coba ulangi kembali')</script>";
    echo "<meta http-equiv='refresh' content='0; url=?page=akun'></script>";
  }





}

?>




