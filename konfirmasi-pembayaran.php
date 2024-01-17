
<?php 
$kode_pesan = $_GET['kode_pesan'];
$mysql = mysqli_query($koneksi, "SELECT * FROM pemesanan JOIN pelanggan ON pemesanan.id_p=pelanggan.id_p JOIN biaya ON pemesanan.kode_pesan=biaya.kode_pesan WHERE pemesanan.kode_pesan='$kode_pesan'");
$data = mysqli_fetch_array($mysql);

$kode_pesan = $data['kode_pesan'];
$id_p = $data['id_p'];
$design_pesan = $data['design_pesan'];
$banyak_pesan = $data['banyak_pesan'];
$harga_satuan = $data['harga_satuan'];
$jumlah_harga = $data['jumlah_harga'];
$ket_biaya = $data['ket_biaya'];

?>
<h3 class="content-title grey-text">KONFIRMASI BIAYA ORDERAN <a href="pelanggan.php" class="btn btn-primary pull-right"><< Kembali ke beranda</a></h3>
<div class="row">
  <div class="col-md-3"><?php echo $ket_biaya ?></div>
  <div class="col-md-6">
   <div class="box box-warning">
     <div class="box-body">
      <form method="POST" action="" enctype="multipart/form-data">
        <table class="table tabel-konfirmasi">
          <tr>
            <th style="width:50%">Banyak</th>
            <td><?php echo $banyak_pesan ?></td>
          </tr>
          <tr>
            <th style="width:50%">Harga Satuan</th>
            <td><?php echo $harga_satuan ?></td>
          </tr>
          <tr>
            <th>Jumlah Harga</th>
            <td><?php echo $jumlah_harga ?></td>
          </tr>
          <tr>
            <th>Uang Muka (DP)</th>
            <td>
              <input type="hidden" name="kode_pesan" value="<?php echo $kode_pesan ?>"></input>
              <input type="hidden" id="jumlah_harga" value="<?php echo $jumlah_harga ?>"></input>
              <input type="text" name="dp" id="dp" class="form-control" onkeyup="hitung();" placeholder="Uang muka .." required="" autocomplete="off"></input>
            </td>
          </tr>
          <tr>
            <th>Sisa Pembayaran</th>
            <td>
              <input type="text" name="sisa_biaya" id="sisa" class="form-control" placeholder="Sisa yang harus dibayar .." required="" autocomplete="off" readonly=""></input>
            </td>
          </tr>
          <tr>
            <td colspan="3">
              <p><b>Upload bukti pembayaran</b></p>
              <p>
                <input type="file" name="bukti" class="form-control" required=""></input>
              </p>
            </td>
          </tr>
          <tr>
            <td colspan="3">
              <button type="submit" name="upload" class="btn btn-primary pull-right">Kirim</button>
            </td>
          </tr>
        </table>
      </form>
    </div>
  </div>
</div>
<div class="col-md-3"></div>

</div>

<?php 

if (isset($_POST['upload'])) {


  $kode_pesan = $_POST['kode_pesan'];
  $dp = $_POST['dp'];
  $sisa_biaya = $_POST['sisa_biaya'];

  $bukti_gambar = $_FILES['bukti']['name'];
  $tempat_gambar_bukti = $_FILES['bukti']['tmp_name'];




  $cek = move_uploaded_file($tempat_gambar_bukti, "admin/pemesanan/gambar/".$bukti_gambar);

  if ($cek) {


     mysqli_query($koneksi, "UPDATE biaya SET dp='$dp', sisa_biaya='$sisa_biaya', bukti='$bukti_gambar' WHERE kode_pesan='$kode_pesan'");
     mysqli_query($koneksi, "UPDATE pemesanan SET status_pesan='Bayar' WHERE kode_pesan='$kode_pesan'");
    echo "<script>alert('Terkirim')</script>";
    echo "<meta http-equiv='refresh' content='0; url=?page=histori'></script>";
  }else{

 
      echo "<script>alert('Terjadi kesalahan, coba ulangi kembali')</script>";
      echo "<meta http-equiv='refresh' content='0; url=?page=konfirmasi-pembayaran&kode_pesan=$kode_pesan'></script>";

  }




}

?>




