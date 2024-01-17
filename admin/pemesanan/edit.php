<?php 
  $id_pesan = $_GET['id_pesan'];
  $mysql_detail = mysqli_query($koneksi, "SELECT * FROM pemesanan JOIN pelanggan ON pemesanan.id_p=pelanggan.id_p JOIN biaya ON pemesanan.kode_pesan=biaya.kode_pesan WHERE pemesanan.id_pesan='$id_pesan'");
  $data_detail = mysqli_fetch_array($mysql_detail);

  $kode_pesan = $data_detail['kode_pesan'];
  $id_p = $data_detail['id_p'];
  $nama_p = $data_detail['nama_p'];
  $ket_pesan = $data_detail['ket_pesan'];
  $design_pesan = $data_detail['design_pesan'];
  $banyak_pesan = $data_detail['banyak_pesan'];
  $status_pesan = $data_detail['status_pesan'];
  $harga_satuan = $data_detail['harga_satuan'];
  $jumlah_harga = $data_detail['jumlah_harga'];
  $dp = $data_detail['dp'];
  $sisa_biaya = $data_detail['sisa_biaya'];
  $lama_pengerjaan = $data_detail['lama_pengerjaan'];
 
?>



<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-xs-12">
       <form method="POST" action="" enctype="multipart/form-data">
      <div class="box">
        <div class="box-header text-center">
          <h3 class="box-title">FORM EDIT DATA PEMESANAN</h3>
        </div>
        <!-- /.box-header -->

          <div class="box-body body-pemesanan">
            <table class="table table-pemesanan">
              <tr>
                <td>
                  <label>Kode Pesanan</label>
                  <input type="text" name="kode_pesan" value="<?php echo $kode_pesan  ?>" class="form-control" placeholder="Nama .." required="" autocomplete="off" readonly></input>
                </td>
              </tr>
              <tr>
                <td>
                  <label>Nama Pemesan</label>
                   <input type="text" name="banyak_p" value="<?php echo $nama_p  ?>" class="form-control" readonly></input>
               </td>
             </tr>
             <tr>
              <td>
                <label>Banyak pesanan</label>
                <input type="number" name="banyak_pesan" id="banyak_pesan" value="<?php echo $banyak_pesan  ?>" onkeyup="sum();" class="form-control" placeholder="Banyak pesanan .." required="" autocomplete="off"></input>
              </td>
            </tr>
            <tr>
              <td>
                <label>Detail Pesanan</label>
                <div class="pad">
                  <textarea name="ket_pesan" class="textarea form-control" placeholder="Isikan ukuran, jenis bahan, warna Dll ..."
                  style="width: 100%; height: 200px; font-size: 12px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"><?php echo $ket_pesan  ?></textarea>
                </div>
              </td>
            </tr>
            <tr>
              <td>
                <label>Ganti Gambar Desain</label>
                <input type="file" name="design_pesan" class="form-control" placeholder="Design.." autocomplete="off"></input>
              </td>
            </tr>
          </table>
          <table class="table table-pemesanan">
            <tr>
              <td>
                <label>Harga Satuan</label>
                <input type="text" name="harga_satuan" id="harga_satuan" value="<?php echo $harga_satuan  ?>" onkeyup="sum();" class="form-control" placeholder="Harga satuan .." required="" autocomplete="off"></input>
              </td>
            </tr>
            <tr>
              <td>
                <label>Total Harga</label>
                <input type="text" name="jumlah_harga" id="jumlah_harga" value="<?php echo $jumlah_harga  ?>" class="form-control" placeholder="Jumlah harga .." required="" autocomplete="off" readonly></input>
              </td>
            </tr>
            <tr>
              <td>
                <label>Uang Muka (DP)</label>
                <input type="text" name="dp" id="dp" value="<?php echo $dp  ?>" class="form-control" onkeyup="hitung();" placeholder="Uang muka .." required="" autocomplete="off"></input>
              </td>
            </tr>
            <tr>
              <td>
                <label>Sisa yang harus dibayar</label>
                <input type="text" name="sisa_biaya" id="sisa" value="<?php echo $sisa_biaya  ?>" class="form-control" placeholder="Sisa yang harus dibayar .." required="" autocomplete="off" readonly=""></input>
              </td>
            </tr>
            <tr>
              <td>
                <label>Lama pengerjaan</label>
                <input type="text" name="lama_pengerjaan" value="<?php echo $lama_pengerjaan  ?>" class="form-control" placeholder=" 1 Hari .." required="" autocomplete="off"></input>
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




  

  if (empty($nama_gambar)) {


    mysqli_query($koneksi, "UPDATE pemesanan SET ket_pesan='$ket_pesan', banyak_pesan='$banyak_pesan' WHERE kode_pesan='$kode_pesan'");

    mysqli_query($koneksi, "UPDATE biaya SET harga_satuan='$harga_satuan', jumlah_harga='$jumlah_harga', dp='$dp', sisa_biaya='$sisa_biaya', lama_pengerjaan='$lama_pengerjaan' WHERE kode_pesan='$kode_pesan'");

    echo "<script>alert('Sukses')</script>";
    echo "<meta http-equiv='refresh' content='0; url=?page=pemesanan/detail&kode=$kode_pesan'></script>";
  }else{

    $u=mysqli_query($koneksi,"SELECT * FROM pemesanan  WHERE kode_pesan='$kode_pesan'");
    $us=mysqli_fetch_array($u);

    file_exists("pemesanan/gambar/".$us['design_pesan']);
    unlink("pemesanan/gambar/".$us['design_pesan']);
    move_uploaded_file($tempat_gambar, "pemesanan/gambar/".$nama_gambar);

    mysqli_query($koneksi, "UPDATE pemesanan SET ket_pesan='$ket_pesan', banyak_pesan='$banyak_pesan', ket_pesan='$ket_pesan',  design_pesan='$nama_gambar' WHERE kode_pesan='$kode_pesan'");

    mysqli_query($koneksi, "UPDATE biaya SET harga_satuan='$harga_satuan', jumlah_harga='$jumlah_harga', dp='$dp', sisa_biaya='$sisa_biaya', lama_pengerjaan='$lama_pengerjaan' WHERE kode_pesan='$kode_pesan'");

     
      echo "<script>alert('Sukses')</script>";
      echo "<meta http-equiv='refresh' content='0; url=?page=pemesanan/detail&kode=$kode_pesan'></script>";

  }




}

?>