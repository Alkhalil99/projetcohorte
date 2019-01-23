<?php
session_start();
 extract($_POST);
//inclure le fihier de connexion à la base de données
require_once 'db_config.php';

// veriffication des données de l utilisateur
$stmt = $DBcon->prepare("SELECT user_email, user_password from users WHERE user_email='".$_POST['user_email']."' && user_password='".$_POST['user_password']."'");
$stmt->execute();
$row = $stmt->rowCount();
// Démarrage de la session
$_SESSION['start'] = time(); 
if ($row > 0){
	
    echo "correct";
	$_SESSION['login']  = $user_email;
	$_SESSION['expire'] = $_SESSION['start'] + (30 *60);
	// heure d expiration de la session
} else{
    echo 'wrong';
}


