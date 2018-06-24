<?php 
include 'koneksi.php';
$id= $_GET['id'];
mysqli_query($con,"DELETE FROM anggota_kelas WHERE id='$id'")or die(mysqli_error());
 
header("location:data_anggota.php?pesan=hapus");
?>