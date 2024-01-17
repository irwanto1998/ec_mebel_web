<?php 

	$kode_pesan = $_GET['kode_pesan'];
	$mysql = mysqli_query($koneksi, "SELECT * FROM pemesanan JOIN pelanggan ON pemesanan.id_p=pelanggan.id_p JOIN biaya ON pemesanan.kode_pesan=biaya.kode_pesan WHERE pemesanan.kode_pesan='$kode_pesan'");
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
  $ket_biaya = $data['ket_biaya'];

?>

<h3 class="content-title grey-text">DETAIL ORDERAN #<?php echo $kode_pesan ?></h3>


  <div class="row">
    <div class="col-xs-12">
      <h2 class="page-header">
        <small class="pull-right">Tanggal Pesanan : <?php echo $tgl_pesan ?></small><br>
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
      <b>Status Pesanan:</b> <b style="color: orange"><?php echo $status_pesan ?></b><br>
      
    </div>
    <!-- /.col -->
  </div>
  <!-- /.row -->

  <div class="row">
    <!-- accepted payments column -->
    <div class="col-xs-6">
      <p class="lead">KETERANGAN PESANAN</p>
      <img src="admin/pemesanan/gambar/<?php echo $design_pesan ?>" alt="Visa" width="100%">

      <ul class="mt-5">
        <li><?php echo $jenis ?></li>
        <li><?php echo $bahan ?></li>
        <li><?php echo $warna ?></li>
        <li><?php echo $ukuran ?></li>
        <li><?php echo $ket_pesan ?></li>
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
            <td><?php echo rupiah($harga_satuan) ?></td>
          </tr>
          <tr>
            <th>Jumlah Harga</th>
            <td><?php echo rupiah($jumlah_harga) ?></td>
          </tr>
          <tr>
            <th>Uang Muka (DP)</th>
            <td><?php echo rupiah($dp) ?></td>
          </tr>
          <tr>
            <th>Sisa Pembayaran</th>
            <td><?php echo rupiah($sisa_biaya) ?></td>
          </tr>
          <tr>
            <th>Catatan dari admin</th>
              <td style="color: orange">
              <?php 

                if ($status_pesan=='Diproses') {
                  echo "$ket_biaya";
                }else{
                  echo "-";
                }

               ?>
            </td>
          </tr>
           <tr>
            <td>
              <p><b>Bukti pembayaran</b></p>
              <p>
                <img src="admin/pemesanan/gambar/<?php echo $bukti ?>" alt="" width="250" height="100">
              </p>
            </td>
          </tr>
        </table>
      </div>
    </div>

    <?php 
     if($data['status_pesan']=="Bayar"){
    ?>
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
                    &nbsp;<img src="assets/img/bulat1.png" alt="" width="5%"> <?php $datapp['proses_pesanan']; ?>

                <?php } ?>

                <?php }?>

                    Pemilihan Barang</b><br>
                    &emsp;<img src="assets/img/batang.png" alt="" width="1%">

                <?php
                    $kode_pesan = $data['kode_pesan'];
                    $k=$koneksi->query("SELECT * FROM proses_pemesanan WHERE kode_pesan='$kode_pesan'");
                    while($datapp=mysqli_fetch_assoc($k)){   
                ?>
    <?php 
      if($datapp['proses_pesanan'] == "Pemilihan Bahan"){
    ?>
                    &emsp;(<i><?php echo $datapp['time']; ?><?php  $datapp['proses_pesanan']; ?></i>)
                    &nbsp;<img src="assets/img/chek.png" alt="" width="5%">

    <?php } else if($datapp['proses_pesanan'] == ""){
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
                    &nbsp;<img src="assets/img/bulat1.png" alt="" width="5%"> <?php $datapp['proses_pesanan']; ?>

                <?php } ?>

                <?php }?>
                    Pemotongan Bahan</b><br>
                    &emsp;<img src="assets/img/batang.png" alt="" width="1%">

                <?php
                    $kode_pesan = $data['kode_pesan'];
                    $k=$koneksi->query("SELECT * FROM proses_pemesanan WHERE kode_pesan='$kode_pesan'");
                    while($datapp=mysqli_fetch_assoc($k)){   
                ?>

    <?php 
      if($datapp['proses_pesanan'] == "Pemotongan Bahan"){
    ?>
                    &emsp;(<i><?php echo $datapp['time']; ?><?php  $datapp['proses_pesanan']; ?></i>)
                    &nbsp;<img src="assets/img/chek.png" alt="" width="5%">

    <?php } else if($datapp['proses_pesanan'] == ""){
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
                    &nbsp;<img src="assets/img/bulat1.png" alt="" width="5%"><?php $datapp['proses_pesanan']; ?>

                <?php } ?>

                <?php }?>
                    Perakitan Bahan</b><br>
                    &emsp;<img src="assets/img/batang.png" alt="" width="1%">

                <?php
                    $kode_pesan = $data['kode_pesan'];
                    $k=$koneksi->query("SELECT * FROM proses_pemesanan WHERE kode_pesan='$kode_pesan'");
                    while($datapp=mysqli_fetch_assoc($k)){   
                ?>

    <?php 
      if($datapp['proses_pesanan'] == "Perakitan Bahan"){
    ?>
                    &emsp;(<i><?php echo $datapp['time']; ?><?php $datapp['proses_pesanan']; ?></i>)
                    &nbsp;<img src="assets/img/chek.png" alt="" width="5%">

    <?php } else if($datapp['proses_pesanan'] == ""){
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

                    &nbsp;<img src="assets/img/bulat1.png" alt="" width="5%"><?php $datapp['proses_pesanan']; ?>

                <?php } ?>

                <?php }?>
                    Pengecatan Furniture</b><br>
                    &emsp;<img src="assets/img/batang.png" alt="" width="1%">

                <?php
                    $kode_pesan = $data['kode_pesan'];
                    $k=$koneksi->query("SELECT * FROM proses_pemesanan WHERE kode_pesan='$kode_pesan'");
                    while($datapp=mysqli_fetch_assoc($k)){   
                ?>

    <?php 
      if($datapp['proses_pesanan'] == "Pengecatan Furniture"){
    ?>
                    &emsp;(<i><?php echo $datapp['time']; ?><?php  $datapp['proses_pesanan']; ?></i>)
                    &nbsp;<img src="assets/img/chek.png" alt="" width="5%">

    <?php } else if($datapp['proses_pesanan'] == ""){
    ?>
    <?php  }  ?>

                <?php } ?>

        <br>

<!------------------------------------>

          <b>
                    
                    Selesai</b><br>  
  </div>
  <?php } else if($data['status_pesan'] == "Selesai"){
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
                    &nbsp;<img src="assets/img/bulat1.png" alt="" width="5%">
                    &nbsp;<?php echo $datapp['proses_pesanan']; ?></b><br>
                    &emsp;&nbsp;<img src="assets/img/batang.png" alt="" width="1%">
                    &emsp;(<i><?php echo $datapp['time']; ?></i>)
                    &nbsp;<img src="assets/img/chek.png" alt="" width="5%">
                 <?php } ?>

                <?php
                    $kode_pesan = $data['kode_pesan'];
                    $p=$koneksi->query("SELECT * FROM proses_selesai WHERE kode_pesan='$kode_pesan'");
                    while($s=mysqli_fetch_assoc($p)){  
                ?> 
                <br> &nbsp;<img src="assets/img/bulat1.png" alt="" width="5%">
                     <b>&nbsp;<?php echo $s['status']; ?></b><br>
                     &emsp;&emsp;&emsp;(<i><?php echo $s['time']; ?></i>)
                     &nbsp;<img src="assets/img/chek.png" alt="" width="5%">
                <?php } ?>
  </div>
  <?php  }  ?>
    <!-- /.col -->
  </div>
  <!-- /.row -->
