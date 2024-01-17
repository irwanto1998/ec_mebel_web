<?php 


$u=mysqli_query($koneksi,"DELETE FROM pelanggan WHERE id_p='$_GET[id_p]'");
$mysql = mysqli_query($koneksi, "DELETE FROM pemesanan WHERE id_p='$_GET[id_p]'");

if ($u AND $mysql) {
	
    echo "<script>alert('Sukses')</script>";
    echo "<meta http-equiv='refresh' content='0; url=?page=pelanggan/index'></script>";
  }else{
    echo "<script>alert('Terjadi kesalahan coba ulangi kembali')</script>";
    echo "<meta http-equiv='refresh' content='0; url=?page=pelanggan/index'></script>";
  }

?>
