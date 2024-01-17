<?php 


$koneksi = mysqli_connect("localhost", "root", "", "mebel");

$KaraketrRandom = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz123456789';
$kode  = substr(str_shuffle($KaraketrRandom),0,10);

 ?>