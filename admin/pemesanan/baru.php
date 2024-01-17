<section class="content-header">
  <h1>DATA PEMESANAN BARU</h1>
</section>

<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-xs-12">
      <div class="box">
       <!-- /.box-header -->
       <div class="box-body">
        <table id="example1" class="table table-bordered">
          <thead>
            <tr>
              <th><center>No</center></th>
              <th><center>Aksi</center></th>
              <th><center>Pelanggan</center></th>
              <th><center>Banyak</center></th>
              <th><center>Tanggal</center></th>
              <th><center>Status Pesan</center></th>
            </tr>
          </thead>
          <tbody>
            <?php 
              $no = 1;
              $mysql = mysqli_query($koneksi, "SELECT * FROM pemesanan JOIN pelanggan USING(id_p) WHERE pemesanan.status_pesan='Terkirim' GROUP BY pemesanan.id_pesan DESC");
              while ($data = mysqli_fetch_array($mysql)) {
            ?>
            <tr>
              <td><center><?php echo $no++ ?></center></td>
              <td>
                <center>
                  <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown">
                    <span class="caret"></span>
                    <span class="sr-only">Toggle Dropdown</span>
                  </button>
                  <ul class="dropdown-menu dropdown-actions" role="menu">
                    <li class="background-info">
                      <a href="?page=pemesanan/detail&kode=<?php echo $data['kode_pesan'] ?>">Detail pesanan</a>
                    </li>
                    <li class="background-info">
                      <a href="?page=pemesanan/edit&id_pesan=<?php echo $data['id_pesan'] ?>">Edit pesanan</a>
                    </li>
                  </ul>
               </center>
             </td>
              <td><center><?php echo $data['nama_p'] ?></center></td>
              <td><center><?php echo $data['banyak_pesan'] ?></center></td>
              <td><center><?php echo $data['tgl_pesan'] ?></center></td>
              <td>
                <center>
                  <?php 
                    if ($data['status_pesan']=='Terkirim') {
                      echo "Baru";
                    }
                  ?>
                </center>
              </td>
           </tr>
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