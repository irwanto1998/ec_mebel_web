

<h3 class="content-title grey-text">HISTORI PESANAN</h3>
<div class="row">
<?php 
    $no = 1;
    $mysql = mysqli_query($koneksi, "SELECT * FROM furniture");
    while ($data = mysqli_fetch_array($mysql)) {
?>
 <div class="col-md-12">
   <div class="box box-warning">
     <div class="box-body">
       <table id="example2" class="table table-bordered">
          <thead>
            <tr>
              <th><center>No</center></th>
              <th><center>Banyak</center></th>
              <th><center>Tanggal</center></th>
              <th><center>Status Pesan</center></th>
              <th><center>Aksi</center></th>
            </tr>
          </thead>
          <tbody>
            <?php 
              $no = 1;
              $mysql = mysqli_query($koneksi, "SELECT * FROM pemesanan JOIN pelanggan USING(id_p) WHERE pemesanan.id_p='$id' GROUP BY pemesanan.id_pesan DESC");
              while ($data = mysqli_fetch_array($mysql)) {
            ?>
            <tr>
              <td><center><?php echo $no++ ?></center></td>
              <td><center><?php echo $data['banyak_pesan'] ?></center></td>
              <td><center><?php echo $data['tgl_pesan'] ?></center></td>
               <td>
                <center>
                  
                  
                  <?php 

                    if ($data['status_pesan']=="Terkirim") {

                      echo "<p style='color:orange'>Terkirim</p>";

                    }elseif ($data['status_pesan']=="Diproses") {
                      
                      echo "<p style='color:blue'>Diproses</p>";

                    }elseif ($data['status_pesan']=="Selesai") {
                      
                       echo "<p style='color:green'>Selesai</p>";

                    }elseif ($data['status_pesan']=="Bayar") {
                      
                      echo "<p style='color:red'>Bayar (<i>Proses Pengerjaan</i>)</p>";

                    }


                   ?>
                </center>
              <td>
                <center>
                  <?php 

                    if ($data['status_pesan']=="Terkirim") {

                      echo "<a href='?page=detail&kode_pesan=$data[kode_pesan]' class='btn btn-warning'>Detail</a>";

                    }elseif ($data['status_pesan']=="Diproses") {
                      
                      echo "<a href='?page=konfirmasi-pembayaran&kode_pesan=$data[kode_pesan]' class='btn btn-warning'>Konfirmasi pembayaran</a>";

                    }elseif ($data['status_pesan']=="Selesai") {
                      
                       echo "<a href='?page=detail&kode_pesan=$data[kode_pesan]' class='btn btn-info'>Detail</a>";

                    }elseif ($data['status_pesan']=="Bayar") {
                      
                      echo "<a href='?page=detail&kode_pesan=$data[kode_pesan]' class='btn btn-info'>Detail</a>";

                    }


                   ?>
            
              </td>
           </tr>
         <?php } ?>
         </tbody>
       </table>
     </div>
   </div>
 </div>
<?php } ?>
</div>

<div class="row">
  <div class="col-md-6">
    <div class="box">
      <div class="box-body">
        <ul class="ket-ul">
          <li>
            <h3>Keterangan warna histori pesanan</h3>
          </li>
          <li>
            <span class="ket bg-orange"></span> Terkirim (Menunggu persetujuan admin untuk mengkonfirmasi pesanan)
          </li>
          <li>
            <span class="ket bg-blue"></span> Proses (Menunggu pembayaran uang muka dan kirim bukti transfer)
          </li>
          <li>
            <span class="ket bg-red"></span> bayar (Telah melakukan pembayaran uang muka dan menunggu barang selesai dikerjakan)
          </li>
          <li>
            <span class="ket bg-green"></span> selesai (Barang selesai dikerjakan dan menunggu pelunasan pembayaran)
          </li>
        </ul>
      </div>
    </div>
  </div>
</div>


<!-- Modal pesan -->
<div class="modal fade" id="pesan">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title text-center">FORM PESAN FURNITUR</h3>
      </div>
      <div class="modal-body">
        <form action="" method="post" enctype="multipart/form-data">
          <input type="hidden" name="tgl_pesan" value="<?php echo date('Y-m-d') ?>"></input>
          <input type="hidden" name="status_pesan" value="<?php echo "Terkirim"; ?>"></input>
          <input type="hidden" name="kode_pesan" value="<?php echo $kode  ?>"></input>
          <input type="hidden" name="id_p" value="<?php echo $id  ?>"></input>
          <table class="table table-pemesanan">
             <tr>
              <td>
                <label>Banyak pesanan</label>
                <input type="number" name="banyak_pesan" id="banyak_pesan" onkeyup="sum();" class="form-control" placeholder="Banyak pesanan .." required="" autocomplete="off"></input>
              </td>
            </tr>
            <tr>
              <td>
                <label>Detail Pesanan</label>
                <div class="pad">
                  <textarea name="ket_pesan" class="textarea form-control" placeholder="Isikan ukuran, jenis bahan, warna Dll ..."
                  style="width: 100%; height: 200px; font-size: 12px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                </div>
              </td>
            </tr>
            <tr>
              <td>
                <label>Gambar Desain</label>
                <input type="file" name="design_pesan" class="form-control" placeholder="Design.." required="" autocomplete="off"></input>
              </td>
            </tr>
            <tr>
              <td align="right">
                <button type="submit" name="pesan" class="btn btn-primary">Kirim</button>
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

