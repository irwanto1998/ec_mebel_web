
<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-xs-6">
      <div class="box">
        <div class="box-header text-center">
          <h3 class="box-title">FORM TAMBAH DATA INFORMASI FURNITURE</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <form method="POST" action="" enctype="multipart/form-data">
            <table class="table">
              <tr>
                <td>
                  <label>Nama</label>
                  <input type="text" name="nama_f" class="form-control" placeholder="Nama .." required="" autocomplete="off"></input>
                </td>
              </tr>
              <tr>
                <td>
                  <label>Jenis</label>
                  <input type="text" name="jenis" class="form-control" placeholder="Jenis .." required="" autocomplete="off"></input>
                </td>
              </tr>
              <tr>
                <td>
                  <label>Bahan</label>
                  <select name="bahan" class="form-control" required="">
                    <option>... Pilih bahan ...</option>
                    <option value="Kayu Sendiri">Kayu Sendiri</option>
                    <option value="Kayu Ulin">Kayu Ulin</option>
                    <option value="Kayu Lokal">Kayu Lokal</option>
                    <option value="Kayu Meranti">Kayu Meranti</option>
                    <option value="Kayu Bengkirai">Kayu Bengkirai</option>
                    <option value="Kayu Perapat">Kayu Perapat</option>
                    <option value="Kayu Punak">Kayu Punak</option>
                    <option value="Kayu Bedaru">Kayu Bedaru</option>
                  </select>
                </td>
              </tr>
              <tr>
                <td>
                  <label>Warna</label>
                  <input type="text" name="warna" class="form-control" placeholder="Warna .." required="" autocomplete="off"></input>
                </td>
              </tr>
              <tr>
                <td>
                  <label>Ukuran</label>
                  <input type="text" name="ukuran" class="form-control" placeholder="Ukuran .." required="" autocomplete="off"></input>
                </td>
              </tr>
              <tr>
                <td>
                  <label>Harga</label>
                  <input type="text" name="harga" class="form-control" placeholder="Harga .." required="" autocomplete="off"></input>
                </td>
              </tr>
              <tr>
                <td>
                  <label>keterangan</label>
                  <div class="pad">
                    <textarea name="ket_f" required="" class="textarea form-control" placeholder="Keterangan ..."
                          style="width: 100%; height: 200px; font-size: 12px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" ></textarea>
                  </div>
                </td>
              </tr>
             <tr>
                <td>
                  <label>Gambar Furniture</label>
                  <input type="file" name="gambar_f" class="form-control" placeholder="Nama .." required="" autocomplete="off"></input>
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
  </div>
  <!-- /.row -->
</section>

<?php 

if (isset($_POST['simpan'])) {


  $nama_f = $_POST['nama_f'];
  $jenis = $_POST['jenis'];
  $bahan = $_POST['bahan'];
  $warna = $_POST['warna'];
  $ukuran = $_POST['ukuran'];
  $harga = $_POST['harga'];
  $ket_f = $_POST['ket_f'];
  $nama_gambar = $_FILES['gambar_f']['name'];
  $tempat_gambar = $_FILES['gambar_f']['tmp_name'];




  $cek = mysqli_query($koneksi, "SELECT * FROM furniture WHERE nama_f='$nama_f'");
  $ada = mysqli_num_rows($cek);

  if ($ada == 1) {
    echo "<script>alert('Nama $nama_f sudah ada, silahkan inputkan, nama yang lain.')</script>";
    echo "<meta http-equiv='refresh' content='0; url=?page=furniture/tambah'></script>";
 }else{

  move_uploaded_file($tempat_gambar, "furniture/gambar/".$nama_gambar);
  $simpan = mysqli_query($koneksi, "INSERT INTO furniture VALUES('', '$nama_f', '$jenis', '$bahan', '$warna', '$ukuran','$harga','$ket_f', '$nama_gambar');");

  if ($simpan) {
    echo "<script>alert('Sukses')</script>";
    echo "<meta http-equiv='refresh' content='0; url=?page=furniture/index'></script>";
  }else{
    echo "<script>alert('Terjadi kesalahan coba ulangi kembali')</script>";
    echo "<meta http-equiv='refresh' content='0; url=?page=furniture/tambah'></script>";
  }
}




}

?>