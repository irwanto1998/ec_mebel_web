<?php 
	$mysql = mysqli_query($koneksi, "SELECT * FROM furniture WHERE id_f='$_GET[id]'");
	$data = mysqli_fetch_array($mysql);
?>


<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-xs-6">
      <div class="box">
        <div class="box-header text-center">
          <h3 class="box-title">FORM EDIT DATA INFORMASI FURNITURE</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <form method="POST" action="" enctype="multipart/form-data">
          	<input type="hidden" name="id_f" value="<?php echo $data['id_f'] ?>"></input>
            <table class="table">
              <tr>
                <td>
                  <label>Nama</label>
                  <input type="text" name="nama_f" value="<?php echo $data['nama_f'] ?>" class="form-control" placeholder="Nama .." required="" autocomplete="off"></input>
                </td>
              </tr>
               <tr>
                <td>
                  <label>Jenis</label>
                  <input type="text" name="jenis" value="<?php echo $data['jenis'] ?>" class="form-control" placeholder="Jenis .." required="" autocomplete="off"></input>
                </td>
              </tr>
              <tr>
                <td>
                  <label>Bahan</label>
                  <select name="bahan" class="form-control" required="">
                    <option <?php if ($data['bahan']=='') {
                      echo "selected";
                    } ?>>... Pilih bahan ...</option>
                    <option value="Kayu Sendiri" <?php if ($data['bahan']=='Kayu Sendiri') {
                      echo "selected";
                    } ?>>Kayu Sendiri</option>
                    <option value="Kayu Ulin" <?php if ($data['bahan']=='Kayu Ulin') {
                      echo "selected";
                    } ?>>Kayu Ulin</option>
                    <option value="Kayu Lokal" <?php if ($data['bahan']=='Kayu Lokal') {
                      echo "selected";
                    } ?>>Kayu Lokal</option>
                    <option value="Kayu Meranti" <?php if ($data['bahan']=='Kayu Meranti') {
                      echo "selected";
                    } ?>>Kayu Mernti</option>
                    <option value="Kayu Bengkirai" <?php if ($data['bahan']=='Kayu Bengkirai') {
                      echo "selected";
                    } ?>>Kayu Bengkirai</option>
                    <option value="Kayu Perapat" <?php if ($data['bahan']=='Kayu Perapat') {
                      echo "selected";
                    } ?>>Kayu Perapat</option>
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
                  <input type="text" name="warna" value="<?php echo $data['warna'] ?>" class="form-control" placeholder="Warna .." required="" autocomplete="off"></input>
                </td>
              </tr>
              <tr>
                <td>
                  <label>Ukuran</label>
                  <input type="text" name="ukuran" value="<?php echo $data['ukuran'] ?>" class="form-control" placeholder="Ukuran .." required="" autocomplete="off"></input>
                </td>
              </tr>
              <tr>
                <td>
                  <label>Harga</label>
                  <input type="text" name="harga" value="<?php echo $data['harga'] ?>" class="form-control" placeholder="Harga .." required="" autocomplete="off"></input>
                </td>
              </tr>
              <tr>
                <td>
                  <label>keterangan</label>
                  <div class="pad">
                    <textarea name="ket_f" class="textarea form-control" placeholder="Keterangan ..."
                          style="width: 100%; height: 200px; font-size: 12px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"><?php echo $data['ket_f'] ?></textarea>
                  </div>
                </td>
              </tr>
             <tr>
                <td>
                  <label>Ganti Gambar</label>
                  <input type="file" name="gambar_f" class="form-control" placeholder="Gambar .." autocomplete="off"></input>
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
          	<div class="col-xs-6">
	      <div class="box no-padding">
	      	<img src="furniture/gambar/<?php echo $data['gambar_f'] ?>" width="100%" height="250">
	      </div>
  		</div>
  </div>
  <!-- /.row -->
</section>

<?php 

if (isset($_POST['simpan'])) {

  $id_f = $_POST['id_f'];
  $nama_f = $_POST['nama_f'];
  $jenis = $_POST['jenis'];
  $bahan = $_POST['bahan'];
  $warna = $_POST['warna'];
  $ukuran = $_POST['ukuran'];
  $harga = $_POST['harga'];
  $ket_f = $_POST['ket_f'];
  $nama_gambar = $_FILES['gambar_f']['name'];
  $tempat_gambar = $_FILES['gambar_f']['tmp_name'];





  if (empty($nama_gambar)) {
  	 mysqli_query($koneksi, "UPDATE furniture SET nama_f='$nama_f', jenis='$jenis', bahan='$bahan', warna='$warna', ukuran='$ukuran', ket_f='$ket_f', harga='$harga' WHERE id_f='$id_f'");
    echo "<script>alert('Sukses')</script>";
    echo "<meta http-equiv='refresh' content='0; url=?page=furniture/edit&id=$id_f'></script>";
 }else{

$u=mysqli_query($koneksi,"SELECT * FROM furniture WHERE id_f='$id_f'");
$us=mysqli_fetch_array($u);
file_exists("furniture/gambar/".$us['gambar_f']);
unlink("furniture/gambar/".$us['gambar_f']);

move_uploaded_file($tempat_gambar, "furniture/gambar/".$nama_gambar);

  $simpan = mysqli_query($koneksi, "UPDATE furniture SET nama_f='$nama_f', jenis='$jenis', bahan='$bahan', warna='$warna', ukuran='$ukuran', ket_f='$ket_f', harga='$harga', nama_gambar='$nama_gambar' WHERE id_f='$id_f'");

  if ($simpan) {
    echo "<script>alert('Sukses')</script>";
    echo "<meta http-equiv='refresh' content='0; url=?page=furniture/edit&id=$id_f'></script>";
  }else{
    echo "<script>alert('Terjadi kesalahan coba ulangi kembali')</script>";
    echo "<meta http-equiv='refresh' content='0; url=?page=furniture/edit&id=$id_f'></script>";
  }
}




}

?>