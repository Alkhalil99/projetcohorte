<?php
// Connexion a la base de donnees
$host = "localhost"; 
$user = "root"; 
$password = ""; 
$dbname = "cohorte"; 

$con = mysqli_connect ($host, $user, $password, $dbname);
// Vérifier la connexion
if(!$con){
 die ("La connexion a échoué:". mysqli_connect_error ());
}
?>