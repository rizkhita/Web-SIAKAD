<?php 
include 'koneksi.php';
$id_admin= $_GET['id_admin'];
mysqli_query($con,"DELETE FROM login_admin WHERE id_admin='$id_admin'")or die(mysqli_error());
 
header("location:akun_admin.php?pesan=hapus");
?>