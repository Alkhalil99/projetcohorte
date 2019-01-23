<?php
$DB_host = "localhost";
$DB_user = "root";
$DB_pass = "";
$DB_name = "cohorte";
//Connexion avec la base de donnée Cohorte
 try
 {
     $DBcon = new PDO("mysql:host={$DB_host};dbname={$DB_name}",$DB_user,$DB_pass);
     $DBcon->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	//var_dump($DBcon);
 }
 catch(PDOException $e)
 {
     echo "ERROR : ".$e->getMessage();
 }
 
 ?>