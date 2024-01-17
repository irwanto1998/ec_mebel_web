<section class="content-header">
  <h1>DATA PELANGGAN</h1>
</section>

<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-xs-12">
      <div class="box">
        <div class="box-header">
          <a href="?page=pelanggan/tambah" class="btn btn-sm btn-success pull-right">
           <i class="fa fa-plus"></i>
         </a>
       </div>
       <!-- /.box-header -->
       <div class="box-body" style="overflow-x: auto !important;">
        <table id="example1" class="table table-bordered table-hover" style="width: 1200px">
          <thead>
            <tr>
              <th><center>No</center></th>
              <th><center>Nama</center></th>
              <th><center>Telepon</center></th>
              <th><center>Email</center></th>
              <th><center>Password</center></th>
              <th><center>Status Akun</center></th>
              <th><center>Alamat</center></th>
              <th><center>Aksi</center></th>
            </tr>
          </thead>
          <tbody>
            <?php 
                    $no = 1;
                    $mysql = mysqli_query($koneksi, "SELECT * FROM pelanggan");
                    while ($data = mysqli_fetch_array($mysql)) {
                   ?>
            <tr>
              <td><center><?php echo $no++ ?></center></td>
              <td><center><?php echo $data['nama_p'] ?></center></td>
              <td><center><?php echo $data['hp_p'] ?></center></td>
              <td><center><?php echo $data['email_p'] ?></center></td>
              <td><center><?php echo $data['password_p'] ?></center></td>
              <td>

                <center>
                  <?php

                    if ($data['stts_daftar']=='Baru') {
                       echo "
                        <a href='#konfirmasiBaru$data[id_p]' data-toggle='modal'>
                          <span class='label label-warning'>Menunggu konfirmasi</span>
                        </a>
                       ";
                    }else if($data['stts_daftar']=='Aktif'){
                       echo "
                        <a href='#konfirmasiNonaktif$data[id_p]' data-toggle='modal'>
                          <span class='label label-success'>Aktif</span>
                        </a>
                       ";
                    }else if($data['stts_daftar']=='Nonaktif'){
                      echo "
                        <a href='#konfirmasiAktif$data[id_p]' data-toggle='modal'>
                          <span class='label label-danger'>Nonaktif</span>
                        </a>
                       ";
                    }

                  ?>
                </center>
              </td>
              <td><center><?php echo $data['alamat_p'] ?></center></td>
              <td>
                <center>
                  <a href="?page=pelanggan/edit&id=<?php echo $data['id_p'] ?>" class="btn btn-sm btn-primary">
                   <i class="fa fa-edit"></i>
                 </a>
                 <a href="?page=pelanggan/hapus&id_p=<?php echo $data['id_p'] ?>" class="btn btn-sm btn-danger" onclick="return confirm('Yakin ingin menghapus data ini ?!');">
                   <i class="fa fa-trash"></i>
                 </a>
               </center>
             </td>
           </tr>


           <!-- Modal aktifkan akun baru -->
           <div class="modal modal-warning fade" id="konfirmasiBaru<?php echo $data['id_p'] ?>">
             <div class="modal-dialog modal-sm">
              <form action="" method="post">
                <input type="hidden" name="id_p" value="<?php echo $data['id_p'] ?>">
              <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Yakin ingin mengaktifkan akun ini ?!</h4>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Batal</button>
                    <button type="submit" name="aktifkan" class="btn btn-outline">Aktifkan</button>
                  </div>
                </div>
                </form>
              </div>
            </div>
            <!-- #END# Modal aktifkan akun baru -->

            <!-- Modal Nonaktifkan akun baru -->
            <div class="modal modal-danger fade" id="konfirmasiNonaktif<?php echo $data['id_p'] ?>">
             <div class="modal-dialog modal-sm">
              <form action="" method="post">
                <input type="hidden" name="id_p" value="<?php echo $data['id_p'] ?>">
              <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Yakin ingin menonaktifkan akun ini ?!</h4>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Batal</button>
                    <button type="submit" name="nonaktifkan" class="btn btn-outline">Nonaktifkan</button>
                  </div>
                </div>
                </form>
              </div>
            </div>
            <!-- #END# Modal aktifkan akun baru -->

            <!-- Modal Nonaktifkan akun baru -->
           <div class="modal modal-success fade" id="konfirmasiAktif<?php echo $data['id_p'] ?>">
             <div class="modal-dialog modal-sm">
              <form action="" method="post">
                <input type="hidden" name="id_p" value="<?php echo $data['id_p'] ?>">
              <div class="modal-content">
                  <div class="modal-header">
                    <h4 class="modal-title">Yakin ingin mengaktifkan akun ini ?!</h4>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Batal</button>
                    <button type="submit" name="aktifkan" class="btn btn-outline">Aktifkan</button>
                  </div>
                </div>
                </form>
              </div>
            </div>
            <!-- #END# Modal aktifkan akun baru -->




         <?php } ?>
         </tbody>
       </table>
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


if (isset($_POST['aktifkan'])) {

  $id_p = $_POST['id_p'];
  $u=mysqli_query($koneksi,"UPDATE pelanggan SET stts_daftar='Aktif' WHERE id_p='$id_p'");

  if ($u AND $mysql) {
  
    echo "<script>alert('Sukses mengaktifkan akun')</script>";
    echo "<meta http-equiv='refresh' content='0; url=?page=pelanggan/index'></script>";

  }else{

    echo "<script>alert('Terjadi kesalahan coba ulangi kembali')</script>";
    echo "<meta http-equiv='refresh' content='0; url=?page=pelanggan/index'></script>";

  }


}

if (isset($_POST['nonaktifkan'])) {

  $id_p = $_POST['id_p'];
  $u=mysqli_query($koneksi,"UPDATE pelanggan SET stts_daftar='Nonaktif' WHERE id_p='$id_p'");

  if ($u AND $mysql) {
  
    echo "<script>alert('Sukses menongaktifkan akun')</script>";
    echo "<meta http-equiv='refresh' content='0; url=?page=pelanggan/index'></script>";

  }else{

    echo "<script>alert('Terjadi kesalahan coba ulangi kembali')</script>";
    echo "<meta http-equiv='refresh' content='0; url=?page=pelanggan/index'></script>";

  }


}



?>
