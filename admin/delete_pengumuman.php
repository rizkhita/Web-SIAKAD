<?php 
include 'koneksi.php';
$id= $_GET['id'];
mysqli_query($con,"DELETE FROM data_pengumuman WHERE id='$id'")or die(mysqli_error());
 
header("location:pengumuman.php?pesan=hapus");
?>