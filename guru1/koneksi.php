<?php 
	$host = "localhost";
	$username ="root";
	$pass ="";
	$db_name ="a_siakad";
	try {
		$db = new PDO("mysql:host=".$host.";dbname=".$db_name, $username, $pass);
		$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	} catch (PDOException $e) {
		echo "error". $e->getMessage();
	}

 ?>