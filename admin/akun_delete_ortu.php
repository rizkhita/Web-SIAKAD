<?php 
include 'koneksi.php';
$id_ortu= $_GET['id_ortu'];
mysqli_query($con,"DELETE FROM login_ortu WHERE id_ortu='$id_ortu'")or die(mysqli_error());
 
header("location:akun_ortu.php?pesan=hapus");
?>