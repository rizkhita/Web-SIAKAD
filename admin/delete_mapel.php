<?php 
include 'koneksi.php';
$id= $_GET['id'];
mysqli_query($con,"DELETE FROM data_mapel WHERE id='$id'")or die(mysqli_error());
 
header("location:mapel.php?pesan=hapus");
?>