<?php 
include 'koneksi.php';
$id_siswa= $_GET['id_siswa'];
mysqli_query($con,"DELETE FROM login_siswa WHERE id_siswa='$id_siswa'")or die(mysqli_error());
 
header("location:akun_siswa.php?pesan=hapus");
?>