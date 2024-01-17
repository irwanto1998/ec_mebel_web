<?php 

// hitung pemesanan baru
$sql_baru = mysqli_query($koneksi, "SELECT count(*) AS baru FROM pemesanan WHERE status_pesan='Terkirim'");
$data_baru = mysqli_fetch_array($sql_baru);
$baru = $data_baru['baru'];

// hitung pemesanan proses
$sql_proses = mysqli_query($koneksi, "SELECT count(*) AS proses FROM pemesanan WHERE status_pesan='Diproses'");
$data_proses = mysqli_fetch_array($sql_proses);
$proses = $data_proses['proses'];

// hitung pemesanan selesai
$sql_selesai = mysqli_query($koneksi, "SELECT count(*) AS selesai FROM pemesanan WHERE status_pesan='Selesai'");
$data_selesai = mysqli_fetch_array($sql_selesai);
$selesai = $data_selesai['selesai'];

// hitung pelanggan
$sql_pelanggan = mysqli_query($koneksi, "SELECT count(*) AS pelanggan FROM pelanggan");
$data_pelanggan = mysqli_fetch_array($sql_pelanggan);
$pelanggan = $data_pelanggan['pelanggan'];


 ?>




<section class="content-header">
      <h1>DASHBOARD</h1>
    </section>

    <!-- Main content -->
    <section class="content">
            <div class="row">
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3><?php echo $baru ?></h3>

              <p>Orderan Baru</p>
            </div>
            <div class="icon">
              <i class="ion ion-bag"></i>
            </div>
             <a href="?page=pemesanan/baru" class="small-box-footer">Lihat <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <h3><?php echo $proses ?></h3>

              <p>ORDERAN PROSES</p>
            </div>
            <div class="icon">
              <i class="ion ion-bag"></i>
            </div>
             <a href="?page=pemesanan/proses" class="small-box-footer">Lihat <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
              <h3><?php echo $selesai ?></h3>

              <p>ORDERAN SELESAI</p>
            </div>
            <div class="icon">
              <i class="ion ion-bag"></i>
            </div>
             <a href="?page=pemesanan/selesai" class="small-box-footer">Lihat <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">
              <h3><?php echo $pelanggan ?></h3>

              <p>TOTAL PELANGGAN</p>
            </div>
            <div class="icon">
              <i class="ion ion-person-add"></i>
            </div>
             <a href="?page=pelanggan/index" class="small-box-footer">Lihat <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
      </div>

    </section>