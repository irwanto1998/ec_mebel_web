<section class="content-header">
  <h1>DATA FAQ SISTEM</h1>
</section>

<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-xs-12">
      <div class="box">
       <!-- /.box-header -->
       <div class="box-body">
        <table id="example1" class="table table-bordered table-hover">
          <thead>
            <tr>
              <th><center>Text</center></th>
              <th><center>Aksi</center></th>
            </tr>
          </thead>
          <tbody>
            <?php 
                    $mysql = mysqli_query($koneksi, "SELECT * FROM faq");
                    while ($data = mysqli_fetch_array($mysql)) {
                   ?>
            <tr>
              <td><center><?php echo $data['isi_faq'] ?></center></td>
              <td>
                <center>
                  <a href="#edit<?php echo $data['id_faq'] ?>" class="btn btn-sm btn-primary" data-toggle="modal">
                   <i class="fa fa-edit"></i>
                 </a>
               </center>
             </td>
           </tr>


           <!-- Modal aktifkan akun baru -->
           <div class="modal modal-primary fade" id="edit<?php echo $data['id_faq'] ?>">
             <div class="modal-dialog modal-lg">
              <form action="" method="post">
                <input type="hidden" name="id_faq" value="<?php echo $data['id_faq'] ?>">
              <div class="modal-content">
                  <div class="modal-header">
                    <h4 class="modal-title">UPDATE DATA FAQ</h4>
                  </div>
                   <div class="modal-body">
                      <div class="row">
                        <div class="col-md-12">
                            <div class="pad">
                              <textarea name="isi_faq" class="textarea form-control" placeholder="Deskripsi FAQ ..."
                              style="width: 100%; height: 200px; font-size: 12px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"><?php echo $data['isi_faq'] ?></textarea>
                            </div>
                        </div>
                      </div>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Batal</button>
                    <button type="submit" name="update" class="btn btn-outline">Update</button>
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


if (isset($_POST['update'])) {

  $id_faq = $_POST['id_faq'];
  $isi_faq = $_POST['isi_faq'];
  $u=mysqli_query($koneksi,"UPDATE faq SET isi_faq='$isi_faq' WHERE id_faq='$id_faq'");

  if ($u) {
  
    echo "<script>alert('Sukses')</script>";
    echo "<meta http-equiv='refresh' content='0; url=?page=faq/index'></script>";

  }else{

    echo "<script>alert('Terjadi kesalahan coba ulangi kembali')</script>";
    echo "<meta http-equiv='refresh' content='0; url=?page=faq/index'></script>";

  }


}




?>
