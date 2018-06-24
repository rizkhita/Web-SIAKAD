<?php
include"koneksi.php";
if($_POST){
	$kode_mapel = $_POST['kode_mapel'];
    $nama_mapel = $_POST['nama_mapel'];
    $deadline = $_POST['deadline'];
    $keterangan = $_POST['keterangan'];
    $q=$db->prepare("insert into data_tugas (kode_mapel,nama_mapel,deadline,keterangan)values(?,?,?,?)");
    $q->execute(array($kode_mapel,$nama_mapel,$deadline,$keterangan));
    header("Location:tugas.php");
}


?>