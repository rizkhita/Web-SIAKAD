<?php
$localhost = "localhost";
$username = "root";
$password = "";
$database = "a_siakad";

$con = new mysqli($localhost, $username, $password, $database);

if($con -> connect_error){
  echo "Koneksi Database Gagal";
}
?>