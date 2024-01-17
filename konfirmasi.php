

<div class="row">

<div class="col-md-4"></div>
 <div class="col-md-4">
   <div class="box box-warning">
     
     <div class="box-body text-center">
       <b>Terimakasih telah memesan produk di mebel kami</b>
       <p>Pesanan anda sedang di proses, tunggu hingga kami selesai menghitung biaya pembayaran </p>
       <p class="red-text">Silahkan lihat di histori pesanan anda</p>
       <p>
          <a href="pelanggan.php" class="btn btn-primary mb-5">Kembali ke beranda</a>
       </p>
     </div>

   </div>
 </div>
<div class="col-md-4"></div>
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


