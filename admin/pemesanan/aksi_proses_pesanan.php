<?php
include "../../koneksi.php";

$kode_pesan = $_POST['kode_pesan'];
$proses_pesanan = $_POST['proses_pesanan'];

$koneksi->query("INSERT INTO proses_pemesanan(kode_pesan,proses_pesanan) VALUES('$kode_pesan','$proses_pesanan')");

?>
<script type="text/javascript">
	alert("Berhasil..");
	window.location = "../app.php?page=pemesanan/detail&kode=<?php echo $_POST['kode_pesan'] ?>";
</script>