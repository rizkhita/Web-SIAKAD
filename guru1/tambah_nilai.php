<?php
include"koneksi.php";
if($_POST){
    $kode_mapel = $_POST['kode_mapel'];
    $nisn = $_POST['nisn'];
    $nilai_uts = $_POST['nilai_uts'];
    $nilai_uas = $_POST['nilai_uas'];
    $nilai_ulha = $_POST['nilai_ulha'];
    $nilai_tugas = $_POST['nilai_tugas'];
    $nilai_akhir = $_POST['nilai_akhir'];
    $q=$db->prepare("insert into data_nilai (kode_mapel,nisn,nilai_uts,nilai_uas,nilai_ulha,nilai_tugas,nilai_akhir)values(?,?,?,?,?,?,?)");
    $q->execute(array($kode_mapel,$nisn,$nilai_uts,$nilai_uas,$nilai_ulha,$nilai_tugas,$nilai_akhir));
    header("Location:nilai.php");
}
?>