
<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-xs-12">
       <form method="POST" action="" enctype="multipart/form-data">
      <div class="box">
        <div class="box-header text-center">
          <h3 class="box-title">FORM TAMBAH DATA PEMESANAN</h3>
        </div>
        <!-- /.box-header -->

          <input type="hidden" name="tgl_pesan" value="<?php echo date('Y-m-d') ?>"></input>
          <input type="hidden" name="status_pesan" value="<?php echo "Diproses"; ?>"></input>

          <div class="box-body body-pemesanan">
            <table class="table table-pemesanan">
              <tr>
                <td>
                  <label>Kode Pesanan</label>
                  <input type="text" name="kode_pesan" value="<?php echo $kode  ?>" class="form-control" placeholder="Nama .." required="" autocomplete="off" readonly></input>
                </td>
              </tr>
              <tr>
                <td>
                  <label>Nama Pemesan</label>
                  <select name="id_p" class="form-control" required="">
                    <option> --- Pilih ---</option>
                    <?php 
                    $mysql = mysqli_query($koneksi, "SELECT * FROM pelanggan GROUP BY id_p DESC");
                    while ($data = mysqli_fetch_array($mysql)) {
                     ?>
                     <option value="<?php echo $data['id_p'] ?>"><?php echo $data['nama_p'] ?></option>
                   <?php } ?>
                 </select>
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
                <label>Jenis</label>
                <input type="text" name="jenis" class="form-control" placeholder="Pintu, Jendela, dll ..." required="" autocomplete="off"></input>
              </td>
            </tr>
            <tr>
              <td>
                <label>Bahan</label>
                <select name="bahan" class="form-control" required="">
                    <option value="">...Pilih Bahan ...</option>
                    <option value="Kayu Sembiri">Kayu Sendiri</option>
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
                <label>Gambar Desain</label>
                <input type="file" name="design_pesan" class="form-control" placeholder="Design.." required="" autocomplete="off"></input>
              </td>
            </tr>
          </table>
          <table class="table table-pemesanan">
            <tr>
              <td>
                <label>Harga Satuan</label>
                <input type="text" name="harga_satuan" id="harga_satuan" onkeyup="sum();" class="form-control" placeholder="Harga satuan .." required="" autocomplete="off"></input>
              </td>
            </tr>
            <tr>
              <td>
                <label>Total Harga</label>
                <input type="text" name="jumlah_harga" id="jumlah_harga" class="form-control" placeholder="Jumlah harga .." required="" autocomplete="off" readonly></input>
              </td>
            </tr>
            <tr>
              <td>
                <label>Uang Muka (DP)</label>
                <input type="text" name="dp" id="dp" class="form-control" onkeyup="hitung();" placeholder="Uang muka .." required="" autocomplete="off"></input>
              </td>
            </tr>
            <tr>
              <td>
                <label>Sisa yang harus dibayar</label>
                <input type="text" name="sisa_biaya" id="sisa" class="form-control" placeholder="Sisa yang harus dibayar .." required="" autocomplete="off" readonly=""></input>
              </td>
            </tr>
             <tr>
              <td>
                <label>Bukti pembayaran</label>
                <input type="file" name="bukti" class="form-control"></input>
              </td>
            </tr>
            <tr>
              <td>
                <label>Lama pengerjaan</label>
                <input type="text" name="lama_pengerjaan" class="form-control" placeholder=" 1 Hari .." required="" autocomplete="off"></input>
              </td>
            </tr>
             <tr>
              <td>
                <label>Detail Pesanan</label>
                <div class="pad">
                  <textarea name="ket_pesan" class="textarea form-control" placeholder="Detail pesanan ..."
                  style="width: 100%; height: 100px; font-size: 12px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                </div>
              </td>
            </tr>
          </table>
        </form>
      </div>
      <!-- /.box-body -->
      <div class="box-footer">
        <button type="submit" name="simpan" class="btn btn-primary pull-right">SIMPAN</button>
      </div>
    </form>
  </div>
  <!-- /.box -->
</div>
<!-- /.col -->
</div>
<!-- /.row -->
</section>

<?php 

if (isset($_POST['simpan'])) {


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
  $harga_satuan = $_POST['harga_satuan'];
  $jumlah_harga = $_POST['jumlah_harga'];
  $dp = $_POST['dp'];
  $sisa_biaya = $_POST['sisa_biaya'];
  $lama_pengerjaan = $_POST['lama_pengerjaan'];



  $nama_gambar = $_FILES['design_pesan']['name'];
  $tempat_gambar = $_FILES['design_pesan']['tmp_name'];
  $bukti_gambar = $_FILES['bukti']['name'];
  $tempat_gambar_bukti = $_FILES['bukti']['tmp_name'];




  $cek = move_uploaded_file($tempat_gambar, "pemesanan/gambar/".$nama_gambar);

  if ($cek) {

    move_uploaded_file($tempat_gambar_bukti, "pemesanan/gambar/".$bukti_gambar);

    mysqli_query($koneksi, "INSERT INTO pemesanan VALUES('', '$kode_pesan', '$id_p', '$jenis', '$bahan', '$warna', '$ukuran', '$ket_pesan', '$nama_gambar', '$banyak_pesan', '$tgl_pesan', '$status_pesan');");

    mysqli_query($koneksi, "INSERT INTO biaya VALUES('', '$kode_pesan', '$id_p', '$harga_satuan', '$jumlah_harga', '$dp', '$sisa_biaya', '$lama_pengerjaan', '','$bukti_gambar');");

    echo "<script>alert('Sukses')</script>";
    echo "<meta http-equiv='refresh' content='0; url=?page=pemesanan/tambah'></script>";

  }else{

    echo "<script>alert('File design gagal di upload, coba file yg lain')</script>";
    echo "<meta http-equiv='refresh' content='0; url=?page=pemesanan/tambah'></script>";

  }




}

?>