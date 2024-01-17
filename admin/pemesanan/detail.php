<?php 
  $id_p = $_GET['kode'];
  $mysql = mysqli_query($koneksi, "SELECT * FROM pemesanan JOIN pelanggan ON pemesanan.id_p=pelanggan.id_p JOIN biaya ON pemesanan.kode_pesan=biaya.kode_pesan WHERE pemesanan.kode_pesan='$id_p'");
  $data = mysqli_fetch_array($mysql);

  $kode_pesan = $data['kode_pesan'];
  $id_p = $data['id_p'];

  $jenis = $data['jenis'];
  $bahan = $data['bahan'];
  $warna = $data['warna'];
  $ukuran = $data['ukuran'];

  $ket_pesan = $data['ket_pesan'];
  $design_pesan = $data['design_pesan'];
  $banyak_pesan = $data['banyak_pesan'];
  $tgl_pesan = $data['tgl_pesan'];
  $status_pesan = $data['status_pesan'];
  $harga_satuan = $data['harga_satuan'];
  $jumlah_harga = $data['jumlah_harga'];
  $dp = $data['dp'];
  $sisa_biaya = $data['sisa_biaya'];
  $bukti = $data['bukti'];
  $lama_pengerjaan = $data['lama_pengerjaan'];
  $nama_p = $data['nama_p'];
  $hp_p = $data['hp_p'];
  $alamat_p = $data['alamat_p'];
  $email_p = $data['email_p'];
  $password_p = $data['password_p'];


?>
<script>
function myFunction() {
    var x = document.getElementById("proses_pesanan");
    x.value = x.value.toUpperCase();
}
</script>
<section class="content">
<section class="invoice">
  <!-- title row -->
  <div class="row">
    <div class="col-xs-12">
      <h2 class="page-header">
        DETAIL PESANAN <b style="color: green">#<?php echo $kode_pesan ?></b>
        <small class="pull-right">Tanggal Pesanan : <?php echo $tgl_pesan ?></small>
      </h2>
    </div>
    <!-- /.col -->
  </div>
  <!-- info row -->
  <div class="row invoice-info">
    <div class="col-sm-4 invoice-col">
      <address>
        <p><b><?php echo $nama_p ?></b></p>
        <p>Telepon : <?php echo $hp_p ?></p>
        <p>Email : <?php echo $email_p ?></p>
        <p>Password : <?php echo $password_p ?></p>
        <p>Alamat : <?php echo $alamat_p ?></p>
      </address>
    </div>
    <!-- /.col -->
    <div class="col-sm-4 invoice-col">
    </div>
    <!-- /.col -->
    <div class="col-sm-4 invoice-col">
      <b>Order ID:</b> <b style="color: green"><?php echo $kode_pesan ?></b><br>
      <b>Lama Pengerjaan:</b> <?php echo $lama_pengerjaan ?><br>
      <b>Status Pesanan:</b> <b style="color: orange"><?php echo $status_pesan ?></b>
    </div>
    <!-- /.col -->
  </div>
  <!-- /.row -->

  <div class="row">
    <!-- accepted payments column -->
    <div class="col-xs-6">
      <p class="lead">KETERANGAN PESANAN</p>
      <img src="pemesanan/gambar/<?php echo $design_pesan ?>" alt="Visa" width="100%">
      <ul style="list-style: none padding:0;">
        <li><?php echo $jenis; ?></li>
        <li><?php echo $bahan; ?></li>
        <li><?php echo $warna; ?></li>
        <li><?php echo $ukuran; ?></li>
        <li> <?php echo $ket_pesan ?></li>
      </ul>
    </div>
    <!-- /.col -->
    <div class="col-xs-6">
      <p class="lead">BIAYA PESANAN</p>

      <div class="table-responsive">
        <table class="table">
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
            <td><?php echo $dp ?></td>
          </tr>
          <tr>
            <th>Sisa Pembayaran</th>
            <td><?php echo $sisa_biaya ?></td>
          </tr>
           <tr>
            <td>
              <p><b>Bukti pembayaran</b></p>
              <p>
                <img src="pemesanan/gambar/<?php echo $bukti ?>" alt="" width="250" height="100">
              </p>
            </td>
          </tr>
        </table>
      </div>
    </div>


    <?php 
     if($data['status_pesan']=="Selesai"){
    ?>
  <div class="col-xs-6">
     <div class="modal-header text-center">
         <h4><b>DETAIL PROSES PENGERJAAN</b></h4>
      </div>
                <?php
                    $kode_pesan = $data['kode_pesan'];
                    $k=$koneksi->query("SELECT * FROM proses_pemesanan WHERE kode_pesan='$kode_pesan'");
                    while($datapp=mysqli_fetch_assoc($k)){   
                ?> 
                <br>
                  <b>
                    &nbsp;<img src="pemesanan/gambar/bulat1.png" alt="" width="5%">
                    &nbsp;&nbsp;<?php echo $datapp['proses_pesanan']; ?></b><br>
                    &emsp;<img src="pemesanan/gambar/batang.png" alt="" width="1%">
                    &emsp;(<i><?php echo $datapp['time']; ?></i>)
                    &nbsp;<img src="pemesanan/gambar/chek.png" alt="" width="5%">
                 <?php } ?>

         <div class="modal fade" id="selesai<?php echo $kode_pesan ?>">
            <form method="POST" action="" enctype="multipart/form-data">
                            <input type="hidden" name="kode_pesan" value="<?php echo $kode_pesan  ?>" class="form-control" placeholder="Nama .." required="" autocomplete="off" readonly ></input>
                            <input type="hidden" id="status" name="status" class="form-control" placeholder="Masukan Proses Pengerjaan.." required="" onkeyup="myFunction()"></input><br>
                  
            </form>
        </div>           
                <?php
                    $kode_pesan = $data['kode_pesan'];
                    $p=$koneksi->query("SELECT * FROM proses_selesai WHERE kode_pesan='$kode_pesan'");
                    while($s=mysqli_fetch_assoc($p)){  
                ?> 
                <br> &nbsp;<img src="pemesanan/gambar/bulat1.png" alt="" width="5%">
                     <b>&nbsp;&nbsp;<?php echo $s['status']; ?></b><br>
                     &emsp;&emsp;&nbsp;&nbsp;(<i><?php echo $s['time']; ?></i>)
                     &nbsp;<img src="pemesanan/gambar/chek.png" alt="" width="5%">
                <?php } ?>
  </div>
  <?php } else if($data['kosong'] == "kosong"){
  ?>
  <?php  }  ?>
    <!-- /.col -->
  </div>
  <!-- /.row -->

  <!-- this row will not appear when printing -->
  <?php 
     if($data['status_pesan']=="Bayar"){
   ?>
  <div class="col-xs-6">
    <br><form method="POST" action="pemesanan/aksi_proses_pesanan.php" enctype="multipart/form-data">
                <h4><b>PROSES PENGERJAAN</b></h4>
                    <input type="hidden" name="kode_pesan" value="<?php echo $kode_pesan  ?>" class="form-control" placeholder="Nama .." required="" autocomplete="off" readonly ></input>
                
                    <select name="proses_pesanan" class="form-control" title="Proses Pesanan" required oninvalid="this.setCustomValidity('Pilih Dahulu!')" oninput="setCustomValidity('')">
                      <option value="">- Pilih Proses -</option>
                      <option value="Pemilihan Bahan">Pemilihan Bahan</option>
                      <option value="Pemotongan Bahan">Pemotongan Bahan</option>
                      <option value="Perakitan Bahan">Perakitan Bahan</option>
                      <option value="Pengecatan Furniture">Pengecatan Furniture</option>
                    </select><br>
            <td align="right">
                    <button type="submit" name="simpan" class="btn btn-primary">SIMPAN</button>
            </td>
    </form>
  </div>
  <div class="col-xs-6">
     <div class="modal-header text-center">
         <h4><b>DETAIL PROSES PENGERJAAN</b></h4>
      </div>
 
       <br>
          <b>
                <?php
                    $kode_pesan = $data['kode_pesan'];
                    $k=$koneksi->query("SELECT * FROM proses_pemesanan WHERE kode_pesan='$kode_pesan'");
                    while ($datapp=mysqli_fetch_assoc($k)){   
                ?>
                
                <?php 
                  if($datapp['proses_pesanan'] == "Pemilihan Bahan"){
                ?>
                    &nbsp;<img src="pemesanan/gambar/bulat1.png" alt="" width="5%"> <?php $datapp['proses_pesanan']; ?>

                <?php } ?>

                <?php }?>

                    &nbsp;&nbsp;Pemilihan Barang</b><br>
                    &emsp;<img src="pemesanan/gambar/batang.png" alt="" width="1%">

                <?php
                    $kode_pesan = $data['kode_pesan'];
                    $k=$koneksi->query("SELECT * FROM proses_pemesanan WHERE kode_pesan='$kode_pesan'");
                    while($datapp=mysqli_fetch_assoc($k)){   
                ?>
    <?php 
      if($datapp['proses_pesanan'] == "Pemilihan Bahan"){
    ?>
                    &emsp;(<i><?php echo $datapp['time']; ?><?php  $datapp['proses_pesanan']; ?></i>)
                    &nbsp;<img src="pemesanan/gambar/chek.png" alt="" width="5%">
    <?php } else if($datapp['kosong'] == "kosong"){
    ?>
    <?php  }  ?>

                <?php } ?>

      <br>

<!------------------------------------>

          <b>
                <?php
                    $kode_pesan = $data['kode_pesan'];
                    $k=$koneksi->query("SELECT * FROM proses_pemesanan WHERE kode_pesan='$kode_pesan'");
                    while ($datapp=mysqli_fetch_assoc($k)){   
                ?>

                <?php 
                  if($datapp['proses_pesanan'] == "Pemotongan Bahan"){
                ?>
                    &nbsp;<img src="pemesanan/gambar/bulat1.png" alt="" width="5%"> <?php $datapp['proses_pesanan']; ?>

                <?php } ?>

                <?php }?>
                    &nbsp;&nbsp;Pemotongan Bahan</b><br>
                    &emsp;<img src="pemesanan/gambar/batang.png" alt="" width="1%">

                <?php
                    $kode_pesan = $data['kode_pesan'];
                    $k=$koneksi->query("SELECT * FROM proses_pemesanan WHERE kode_pesan='$kode_pesan'");
                    while($datapp=mysqli_fetch_assoc($k)){   
                ?>

    <?php 
      if($datapp['proses_pesanan'] == "Pemotongan Bahan"){
    ?>
                    &emsp;(<i><?php echo $datapp['time']; ?><?php  $datapp['proses_pesanan']; ?></i>)
                    &nbsp;<img src="pemesanan/gambar/chek.png" alt="" width="5%">

    <?php } else if($datapp['kosong'] == "kosong"){
    ?>
    <?php  }  ?>

                <?php } ?>

       <br>

<!------------------------------------>

          <b>
                <?php
                    $kode_pesan = $data['kode_pesan'];
                    $k=$koneksi->query("SELECT * FROM proses_pemesanan WHERE kode_pesan='$kode_pesan'");
                    while ($datapp=mysqli_fetch_assoc($k)){  
                ?>
                <?php 
                  if($datapp['proses_pesanan'] == "Perakitan Bahan"){
                ?>
                    &nbsp;<img src="pemesanan/gambar/bulat1.png" alt="" width="5%"><?php $datapp['proses_pesanan']; ?>

                <?php } ?>

                <?php }?>
                    &nbsp;&nbsp;Perakitan Bahan</b><br>
                    &emsp;<img src="pemesanan/gambar/batang.png" alt="" width="1%">

                <?php
                    $kode_pesan = $data['kode_pesan'];
                    $k=$koneksi->query("SELECT * FROM proses_pemesanan WHERE kode_pesan='$kode_pesan'");
                    while($datapp=mysqli_fetch_assoc($k)){   
                ?>

    <?php 
      if($datapp['proses_pesanan'] == "Perakitan Bahan"){
    ?>
                    &emsp;(<i><?php echo $datapp['time']; ?><?php $datapp['proses_pesanan']; ?></i>)
                    &nbsp;<img src="pemesanan/gambar/chek.png" alt="" width="5%">

    <?php } else if($datapp['kosong'] == "kosong"){
    ?>
    <?php  }  ?>

                <?php } ?>    

        <br>

<!------------------------------------>

          <b>
                <?php
                    $kode_pesan = $data['kode_pesan'];
                    $k=$koneksi->query("SELECT * FROM proses_pemesanan WHERE kode_pesan='$kode_pesan'");
                    while ($datapp=mysqli_fetch_assoc($k)){  
                ?>
                <?php 
                  if($datapp['proses_pesanan'] == "Pengecatan Furniture"){
                ?>

                    &nbsp;<img src="pemesanan/gambar/bulat1.png" alt="" width="5%"><?php $datapp['proses_pesanan']; ?>

                <?php } ?>

                <?php }?>
                    &nbsp;&nbsp;Pengecatan Furniture</b><br>
                    &emsp;<img src="pemesanan/gambar/batang.png" alt="" width="1%">

                <?php
                    $kode_pesan = $data['kode_pesan'];
                    $k=$koneksi->query("SELECT * FROM proses_pemesanan WHERE kode_pesan='$kode_pesan'");
                    while($datapp=mysqli_fetch_assoc($k)){   
                ?>

    <?php 
      if($datapp['proses_pesanan'] == "Pengecatan Furniture"){
    ?>
                    &emsp;(<i><?php echo $datapp['time']; ?><?php  $datapp['proses_pesanan']; ?></i>)
                    &nbsp;<img src="pemesanan/gambar/chek.png" alt="" width="5%">

    <?php } else if($datapp['kosong'] == "kosong"){
    ?>
    <?php  }  ?>

                <?php } ?>
        <br>
<!------------------------------------>
          <b>
                    &nbsp;&nbsp;Selesai</b><br>  
               
  </div>
  <?php } else if($data['kosong'] == "kosong"){
  ?>
  <?php  }  ?>

  <div class="row no-print"><br>
    <div class="col-xs-12">
       <?php 

          if ($data['status_pesan']=="Terkirim") {?>

            <a href="#konfirmasi<?php echo $kode_pesan ?>" data-toggle="modal" class="btn btn-default pull-right"> Konfirmasi</a>

          <?php }elseif ($data['status_pesan']=="Diproses") {?>
            
            <a href="#selesai<?php echo $kode_pesan ?>" data-toggle="modal" class="btn btn-default pull-right"><i class="fa fa-print"></i> Selesai</a>

          <?php }elseif ($data['status_pesan']=="Selesai") { ?>
            
            

          <?php }elseif ($data['status_pesan']=="Bayar") {  ?>

            <a href="#selesai<?php echo $kode_pesan ?>" data-toggle="modal" class="btn btn-info pull-right"> Selesaikan orderan</a>

        <?php } ?>
      
    </div>
  </div>
</section>
</section>


<div class="modal fade" id="selesai<?php echo $kode_pesan ?>">
  <div class="modal-dialog">
    <form action="" method="POST">
      <input type="hidden" name="kode_pesan" value="<?php echo $kode_pesan ?>"></input>
      <input type="hidden" name="dp" value="<?php echo $jumlah_harga ?>"></input>
      <div class="modal-content">
        <div class="modal-header text-center">
         <b>YAKIN INGIN MENYELESAIKAN ORDERAN INI ?!</b>
         <button type="submit" name="selesai" class="btn btn-default pull-right">YAKIN</button>
       </div>
     </div>
     <!-- /.modal-content -->
   </form>
 </div>
 <!-- /.modal-dialog -->
</div>
<!-- /.modal -->





 <div class="modal fade" id="konfirmasi<?php echo $kode_pesan ?>">
  <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header text-center">
         <b>KONFIRMASI BIAYA PESANAN INI</b>
        </div>
        <div class="modal-body">
          <form action="" method="POST">
            <input type="hidden" name="kode_pesan" value="<?php echo $kode_pesan ?>"></input>
            <table class="table">
              <tr>
              <td>
                <label>Banyak pesanan</label>
                <input type="number" name="banyak_pesan" value="<?php echo $banyak_pesan ?>" id="banyak_pesan" onkeyup="sum();" class="form-control" placeholder="Banyak pesanan .." required="" autocomplete="off" readonly></input>
              </td>
            </tr>
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
                <label>Lama pengerjaan</label>
                <input type="text" name="lama_pengerjaan" class="form-control" placeholder=" 1 Hari .." required="" autocomplete="off"></input>
              </td>
            </tr>
            <tr>
              <td>
                <label>Catatn untuk pelanggan</label>
                <textarea name="ket_biaya" class="textarea form-control" placeholder="Catatan untuk pelanggan ..."
                  style="width: 100%; height: 200px; font-size: 12px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
              </td>
            </tr>
            <tr>
              <td align="right">
                <button type="submit" name="konfirmasi" class="btn btn-primary">KONFIRMASI</button>
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


if (isset($_POST['selesai'])) {

  $kode_pesan = $_POST['kode_pesan'];
  $dp = $_POST['dp'];

    $cek = mysqli_query($koneksi, "UPDATE biaya SET dp='$dp', sisa_biaya='0' WHERE kode_pesan='$kode_pesan'");

  if ($cek) {

         mysqli_query($koneksi, "UPDATE pemesanan SET status_pesan='Selesai' WHERE kode_pesan='$kode_pesan'");
    echo "<script>alert('Sukses')</script>";
    echo "<meta http-equiv='refresh' content='0; url=?page=pemesanan/detail&kode=$kode_pesan'></script>";

  }else{

      echo "<script>alert('Terjadi kesalahan, coba ulangi kembali')</script>";
      echo "<meta http-equiv='refresh' content='0; url=?page=pemesanan/detail&kode=$kode_pesan'></script>";

  }

}


if (isset($_POST['selesai'])) {

  $kode_pesan = $_POST['kode_pesan'];
  $status = $_POST['status'];

  $koneksi->query("INSERT INTO proses_selesai(kode_pesan,status) VALUES('$kode_pesan','SELESAI')");

}




if (isset($_POST['konfirmasi'])) {

  $kode_pesan = $_POST['kode_pesan'];
  $id_p = $_POST['id_p'];
  $banyak_pesan = $_POST['banyak_pesan'];
  $tgl_pesan = $_POST['tgl_pesan'];
  $harga_satuan = $_POST['harga_satuan'];
  $jumlah_harga = $_POST['jumlah_harga'];
  $lama_pengerjaan = $_POST['lama_pengerjaan'];
  $ket_biaya = $_POST['ket_biaya'];

  $cek = mysqli_query($koneksi, "UPDATE biaya SET harga_satuan='$harga_satuan', jumlah_harga='$jumlah_harga', lama_pengerjaan='$lama_pengerjaan', ket_biaya='$ket_biaya' WHERE kode_pesan='$kode_pesan'");

  if ($cek) {

         mysqli_query($koneksi, "UPDATE pemesanan SET status_pesan='Diproses' WHERE kode_pesan='$kode_pesan'");
    echo "<script>alert('Sukses')</script>";
    echo "<meta http-equiv='refresh' content='0; url=?page=pemesanan/detail&kode=$kode_pesan'></script>";

  }else{

      echo "<script>alert('Terjadi kesalahan, coba ulangi kembali')</script>";
      echo "<meta http-equiv='refresh' content='0; url=?page=pemesanan/detail&kode=$kode_pesan'></script>";

  }

}

?>
