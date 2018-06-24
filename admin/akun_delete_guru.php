<?php 
include 'koneksi.php';
$id_guru= $_GET['id_guru'];
mysqli_query($con,"DELETE FROM login_guru WHERE id_guru='$id_guru'")or die(mysqli_error());
 
header("location:akun_guru.php?pesan=hapus");
?>