<?php
include "koneksi.php";

if(isset($_GET['nisn'])){
//getting nim from url
$nisn = $_GET['nisn'];
 
//deleting the row from table
$sql = "DELETE FROM data_nilai WHERE nisn=:nisn";
$query = $db->prepare($sql);
$query->execute(array(':nisn' => $nisn));
 
//redirecting to the display page (index.php in our case)
header("Location:nilai.php");

}