<?php
include "koneksi.php";

if(isset($_GET['kode_mapel'])){
//getting nim from url
$kode_mapel = $_GET['kode_mapel'];
 
//deleting the row from table
$sql = "DELETE FROM data_tugas WHERE kode_mapel=:kode_mapel";
$query = $db->prepare($sql);
$query->execute(array(':kode_mapel' => $kode_mapel));
 
//redirecting to the display page (index.php in our case)
header("Location:tugas.php");

}