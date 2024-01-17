<?php 


$u=mysqli_query($koneksi,"SELECT * FROM furniture WHERE id_f='$_GET[id]'");
$us=mysqli_fetch_array($u);
$id = $us['id_f'];
file_exists("furniture/gambar/".$us['gambar_f']);
$hapus = unlink("furniture/gambar/".$us['gambar_f']);

if ($hapus) {
	$mysql = mysqli_query($koneksi, "DELETE FROM furniture WHERE id_f='$_GET[id]'");
    echo "<script>alert('Sukses')</script>";
    echo "<meta http-equiv='refresh' content='0; url=?page=furniture/index'></script>";
  }else{
    echo "<script>alert('Terjadi kesalahan coba ulangi kembali')</script>";
    echo "<meta http-equiv='refresh' content='0; url=?page=furniture/index'></script>";
  }

?>
