<section class="content-header">
  <h1>DATA INFORMASI FURNITURE</h1>
</section>

<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-xs-12">
      <div class="box">
        <div class="box-header">
          <a href="?page=furniture/tambah" class="btn btn-sm btn-success pull-right">
           <i class="fa fa-plus"></i>
         </a>
       </div>
       <!-- /.box-header -->
       <div class="box-body" style="overflow-x: auto !important;">
        <table id="example1" class="table table-bordered table-hover" style="width: 1200px">
          <thead>
            <tr>
              <th><center>No</center></th>
              <th><center>Gambar</center></th>
              <th><center>Nama</center></th>
              <th><center>Jenis</center></th>
              <th><center>Bahan</center></th>
              <th><center>Warna</center></th>
              <th><center>Ukuran</center></th>
              <th><center>Harga</center></th>
              <th><center>Aksi</center></th>
            </tr>
          </thead>
          <tbody>
            <?php 
            $no = 1;
            $mysql = mysqli_query($koneksi, "SELECT * FROM furniture");
            while ($data = mysqli_fetch_array($mysql)) {
             ?>
             <tr>
              <td><center><?php echo $no++ ?></center></td>
              <td>
                <center>
                  <a href="#detail<?php echo $data['id_f'] ?>" data-toggle="modal">
                    <img src="furniture/gambar/<?php echo $data['gambar_f'] ?>" class="table-img" alt="No image ...">
                  </a>
                </center>
              </td>
              <td><?php echo $data['nama_f'] ?></td>
              <td><?php echo $data['jenis'] ?></td>
              <td><?php echo $data['bahan'] ?></td>
              <td><?php echo $data['warna'] ?></td>
              <td><?php echo $data['ukuran'] ?></td>
              <td><?php echo $data['harga'] ?></td>
              <td>
                <center>
                  <a href="?page=furniture/edit&id=<?php echo $data['id_f'] ?>" class="btn btn-sm btn-primary">
                   <i class="fa fa-edit"></i>
                 </a>
                 <a href="?page=furniture/hapus&id=<?php echo $data['id_f'] ?>" class="btn btn-sm btn-danger" onclick="return confirm('Yakin ingin menghapus data ini ?!');">
                   <i class="fa fa-trash"></i>
                 </a>
               </center>
             </td>
           </tr>


           <div class="modal fade" id="detail<?php echo $data['id_f'] ?>">
            <div class="modal-dialog">
              <div class="modal-content">
                  <div class="modal-header no-padding">
                   <img src="furniture/gambar/<?php echo $data['gambar_f'] ?>" width="100%" height="250">
                  </div>
                  <div class="modal-body">
                    <p><b><?php echo $data['nama_f'] ?></b></p>
                    <p><?php echo $data['jenis'] ?></p>
                    <p><?php echo $data['bahan'] ?></p>
                    <p><?php echo $data['warna'] ?></p>
                    <p><?php echo $data['ukuran'] ?></p>
                    <p><?php echo $data['harga'] ?></p>
                    <p><?php echo $data['ket_f'] ?></p>
                  </div>
                </div>
                <!-- /.modal-content -->
              </div>
              <!-- /.modal-dialog -->
            </div>
            <!-- /.modal -->




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
