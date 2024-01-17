

<h3 class="content-title grey-text">FURNITURE <a href="#pesan" class="btn btn-primary pull-right" data-toggle="modal">Pesan Furniture Custom</a></h3>
<div class="row">
<?php 
            $no = 1;
            $mysql = mysqli_query($koneksi, "SELECT * FROM furniture");
            while ($data = mysqli_fetch_array($mysql)) {
             ?>
 <div class="col-md-3">
   <div class="box">
     <div class="box-header no-padding">
       <img class="feature-img" src="admin/furniture/gambar/<?php echo $data['gambar_f'] ?>">
     </div>
     <div class="box-body">
      <p class="font-16 font-bold m-t-20 col-brown"><?php echo $data['nama_f'] ?></p>
      <p class="font-22 font-bold col-green"><?php echo rupiah($data['harga']) ?></p>
      <p><?php echo $data['ket_f'] ?></p>
    </div>
     <div class="box-footer">
      <a href="#livepesan<?php echo $data['id_f'] ?>" class="btn btn-success btn-block" data-toggle="modal">Order furniture ini</a>
      <a href="#detail<?php echo $data['id_f'] ?>" class="btn btn-info btn-block" data-toggle="modal">Detail furniture</a>
      </div>
   </div>
 </div>

<!-- Modal live pesan -->
<div class="modal fade" id="livepesan<?php echo $data['id_f'] ?>">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title text-center">FORM PESAN FURNITURE</h3>
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
                <label>Jenis</label>
                <input type="text" name="jenis" value="<?php echo $data['jenis'] ?>" class="form-control" placeholder="Pintu, Jendela, dll ..." required="" autocomplete="off"></input>
              </td>
            </tr>
            <tr>
              <td>
                <label>Bahan</label>
                <select name="bahan" class="form-control" required="">
                    <option value="" <?php if ($data['bahan']=='') {
                      echo "selected";
                    } ?>>...Pilih Bahan ...</option>
                    <option value="Kayu Sendiri" <?php if ($data['bahan']=='Kayu Sendiri') {
                      echo "selected";
                    } ?>>Kayu Sendiri</option>
                    <option value="Kayu Ulin" <?php if ($data['bahan']=='Kayu Ulin') {
                      echo "selected";
                    } ?>>Kayu Ulin</option>
                    <option value="Kayu Lokal" <?php if ($data['bahan']=='Kayu Lokal') {
                      echo "selected";
                    } ?>>Kayu Lokal</option>
                    <option value="Kayu Merantik" <?php if ($data['bahan']=='Kayu Merantik') {
                      echo "selected";
                    } ?>>Kayu Merantik</option>
                    <option value="Kayu Bengkirai" <?php if ($data['bahan']=='Kayu Bengkirai') {
                      echo "selected";
                    } ?>>Kayu Bengkirai</option>
                    <option value="Kayu Perepat" <?php if ($data['bahan']=='Kayu Perepat') {
                      echo "selected";
                    } ?>>Kayu Perepat</option>
                    <option value="Kayu Punak" <?php if ($data['bahan']=='Kayu Punak') {
                      echo "selected";
                    } ?>>Kayu Punak</option>
                    <option value="Kayu Bedaru" <?php if ($data['bahan']=='Kayu Bedaru') {
                      echo "selected";
                    } ?>>Kayu Bedaru</option>
                </select>
              </td>
            </tr>
             <tr>
              <td>
                <label>Warna</label>
                <input type="text" name="warna" value="<?php echo $data['warna'] ?>" class="form-control" placeholder="Warna ..." required="" autocomplete="off"></input>
              </td>
            </tr>
             <tr>
              <td>
                <label>Ukuran</label>
                <input type="text" name="ukuran" value="<?php echo $data['ukuran'] ?>" class="form-control" placeholder="Ukuran ..." required="" autocomplete="off"></input>
              </td>
            </tr>
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
                  <textarea name="ket_pesan" class="textarea form-control" placeholder="Keterangan detail furnitur yang akan dipesan ..."
                  style="width: 100%; height: 100px; font-size: 12px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                </div>
              </td>
            </tr>
            <tr>
              <td>
                <label>Gambar Desain furnitur</label>
                <img src="admin/furniture/gambar/<?php echo $data['gambar_f'] ?>" alt="" class="m-t-10" style="width: 100%;height: 200px">
                <a href="admin/furniture/gambar/<?php echo $data['gambar_f'] ?>" download="<?php echo $data['gambar_f'] ?>"  class="btn btn-info m-t-10">
                    Download gambar design ini
                </a>
                <p class="col-red m-t-20">Note : Jika ingin menggunakan gambar design ini silahkan download terlebih dahulu, kemudian di upload kembali</p>
              </td>
            </tr>
            <tr>
              <td>
                <label>Upload design</label>
                <input type="file" name="design_pesan" value="admin/furniture/gambar/<?php echo $data['gambar_f'] ?>" class="form-control" autocomplete="off"></input>
              </td>
            </tr>
            <tr>
              <td align="right">
                <button type="submit" name="pesanlive" class="btn btn-primary">Kirim</button>
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

<style>
  .ul-modal-body{
    padding: 0;
  }
  .ul-modal-body li{
    list-style: none;
    padding: 10px 0;
    border-bottom: 1px solid #dedede;
  }
  .ul-modal-body li span.left{
    font-size: 14px;
    display: block;
    float: left;
    width: 100px;
    color: #a3a3a3;
  }
  .ul-modal-body li span.right{
    font-size: 14px;
    font-weight: bold;
  }
</style>
<!-- Modal detail -->
<div class="modal fade" id="detail<?php echo $data['id_f'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-body">
        <p class="font-16 font-bold m-t-20 col-brown"><?php echo $data['nama_f'] ?></p>
        <p class="font-22 font-bold col-green"><?php echo rupiah($data['harga']) ?></p>
        <ul class="ul-modal-body">
          <li>
            <li>
              <span class="left">Bahan</span>
              <span class="right"><?php echo $data['bahan'] ?></span>
            </li>
            <li>
              <span class="left">Warna</span>
              <span class="right"><?php echo $data['warna'] ?></span>
            </li>
            <li>
              <span class="left">Ukuran</span>
              <span class="right"><?php echo $data['ukuran'] ?></span>
            </li>
            <li>
              <span class="left">Keterangan</span>
              <span class="right"><?php echo $data['ket_f'] ?></span>
            </li>
          </li>
        </ul>
        <button type="button" class="btn btn-secondary m-t-20" data-dismiss="modal">Close</button>

      </div>
    </div>
  </div>
</div>



<?php } ?>
</div>


<!-- Modal pesan -->
<div class="modal fade" id="pesan">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title text-center">FORM PESAN FURNITURE</h3>
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
                <label>Jenis</label>
                <input type="text" name="jenis" class="form-control" placeholder="Pintu, jendela, dll ..." required="" autocomplete="off"></input>
              </td>
            </tr>
            <tr>
              <td>
                <label>Bahan</label>
                <select name="bahan" class="form-control" required="">
                    <option value="">...Pilih Bahan ...</option>
                    <option value="Kayu Sendiri">Kayu Sendiri</option>
                    <option value="Kayu Ulin">Kayu Ulin</option>
                    <option value="Kayu Lokal">Kayu Lokal</option>
                    <option value="Kayu Merantik">Kayu Merantik</option>
                    <option value="Kayu Bengkirai">Kayu Bengkirai</option>
                    <option value="Kayu Perepat">Kayu Perepat</option>
                    <option value="Kayu Punak">Kayu Punak</option>
                    <option value="Kayu Bedaru">Kayu Bedaru</option>
                </select>
              </td>
            </tr>
             <tr>
              <td>
                <label>Warna</label>
                <input type="text" name="warna" class="form-control" placeholder="Warna ..." required="" autocomplete="off"></input>
              </td>
            </tr>
             <tr>
              <td>
                <label>Ukuran</label>
                <input type="text" name="ukuran" class="form-control" placeholder="Ukuran ..." required="" autocomplete="off"></input>
              </td>
            </tr>
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

<?php 

if (isset($_POST['pesanlive'])) {


  $kode_pesan = $_POST['kode_pesan'];
  $id_p = $_POST['id_p'];
  $jenis = $_POST['jenis'];
  $bahan = $_POST['bahan'];
  $warna = $_POST['warna'];
  $ukuran = $_POST['ukuran'];
  $ket_pesan = $_POST['ket_pesan'];
  $banyak_pesan = $_POST['banyak_pesan'];
  $tgl_pesan = $_POST['tgl_pesan'];
  $status_pesan = $_POST['status_pesan'];
  // $harga_satuan = $_POST['harga_satuan'];
  // $jumlah_harga = $_POST['jumlah_harga'];
  // $dp = $_POST['dp'];
  // $sisa_biaya = $_POST['sisa_biaya'];
  // $lama_pengerjaan = $_POST['lama_pengerjaan'];



  $nama_gambar = $_FILES['design_pesan']['name'];
  $tempat_gambar = $_FILES['design_pesan']['tmp_name'];
  // $bukti_gambar = $_FILES['bukti']['name'];
  // $tempat_gambar_bukti = $_FILES['bukti']['tmp_name'];




  $cek = move_uploaded_file($tempat_gambar, "admin/pemesanan/gambar/".$nama_gambar);

  if ($cek) {

    // move_uploaded_file($tempat_gambar_bukti, "pemesanan/gambar/".$bukti_gambar);

    $simpanPesan = mysqli_query($koneksi, "INSERT INTO pemesanan VALUES('', '$kode_pesan', '$id_p', '$jenis', '$bahan', '$warna', '$ukuran', '$ket_pesan', '$nama_gambar', '$banyak_pesan', '$tgl_pesan', '$status_pesan');");

    $simpanBiaya = mysqli_query($koneksi, "INSERT INTO biaya VALUES('', '$kode_pesan', '$id_p', '', '', '', '', '', '','');");
    echo "<script>alert('Sukses')</script>";
    echo "<meta http-equiv='refresh' content='0; url=?page=konfirmasi'></script>";
  }else{

 
      echo "<script>alert('File design gagal di upload, coba file yg lain')</script>";
      echo "<meta http-equiv='refresh' content='0; url=pelanggan.php'></script>";

  }




}

if (isset($_POST['pesan'])) {


  $kode_pesan = $_POST['kode_pesan'];
  $id_p = $_POST['id_p'];
  $jenis = $_POST['jenis'];
  $bahan = $_POST['bahan'];
  $warna = $_POST['warna'];
  $ukuran = $_POST['ukuran'];
  $ket_pesan = $_POST['ket_pesan'];
  $banyak_pesan = $_POST['banyak_pesan'];
  $tgl_pesan = $_POST['tgl_pesan'];
  $status_pesan = $_POST['status_pesan'];
  // $harga_satuan = $_POST['harga_satuan'];
  // $jumlah_harga = $_POST['jumlah_harga'];
  // $dp = $_POST['dp'];
  // $sisa_biaya = $_POST['sisa_biaya'];
  // $lama_pengerjaan = $_POST['lama_pengerjaan'];



  $nama_gambar = $_FILES['design_pesan']['name'];
  $tempat_gambar = $_FILES['design_pesan']['tmp_name'];
  // $bukti_gambar = $_FILES['bukti']['name'];
  // $tempat_gambar_bukti = $_FILES['bukti']['tmp_name'];




  $cek = move_uploaded_file($tempat_gambar, "admin/pemesanan/gambar/".$nama_gambar);

  if ($cek) {

    // move_uploaded_file($tempat_gambar_bukti, "pemesanan/gambar/".$bukti_gambar);

    $simpanPesan = mysqli_query($koneksi, "INSERT INTO pemesanan VALUES('', '$kode_pesan', '$id_p', '$jenis', '$bahan', '$warna', '$ukuran', '$ket_pesan', '$nama_gambar', '$banyak_pesan', '$tgl_pesan', '$status_pesan');");

    $simpanBiaya = mysqli_query($koneksi, "INSERT INTO biaya VALUES('', '$kode_pesan', '$id_p', '', '', '', '', '', '','');");
    echo "<script>alert('Sukses')</script>";
    echo "<meta http-equiv='refresh' content='0; url=?page=konfirmasi'></script>";
  }else{

 
      echo "<script>alert('File design gagal di upload, coba file yg lain')</script>";
      echo "<meta http-equiv='refresh' content='0; url=pelanggan.php'></script>";

  }




}

?>
