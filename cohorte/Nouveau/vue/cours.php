

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>COHORTE_QUIESTLA</title> 
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
<script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.4.8/angular.min.js">
</script>

<LINK rel="stylesheet" type="text/css" href="../css/index.css" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script language="JavaScript"> function imprime_zone(titre, obj) { // Définie la zone à imprimer
 var zi = document.getElementById(obj).innerHTML; // Ouvre une nouvelle fenetre 
 var f = window.open("", "ZoneImpr", "height=500, width=600,toolbar=0, menubar=0, scrollbars=1, resizable=1,status=0, location=0, left=10, top=10"); // Définit le Style de la page
  f.document.body.style.color = '#00000'; f.document.body.style.backgroundColor='#00CCFF';f.document.body.style.padding = "10px"; // Ajoute les Données
   f.document.title = titre; f.document.body.innerHTML += " " + zi + " "; // Imprime et ferme la fenetre 
   f.window.print(); f.window.close(); return true; } 
   </script>

<script src="../js/jquery-2.2.1.min.js"></script>
<script type="text/javascript" src="../js/backoff.js">
</script>
<style type="text/css">

#apDiv2 {
	position:relative;
	width:1364px;
	height:115px;
	z-index:1;
	left: 1px;
	top: -1px;
	background-color:#930000;
	margin-right:auto;
	margin-left:auto;
}
#apDiv4 {
	position:absolute;
	width:200px;
	height:115px;
	z-index:5;
}

</style>
</head>

<body >
<div id="apDiv4">
<img src="../image/3.PNG" width="202" height="115" />

</div>
<div id="apDiv3">

<h1><?php 
require_once('../modele.php'); 
session_start();

if (isset($_SESSION['login'])) { 
  $username= $_SESSION['login'];
   $id_user = recup_id($username);
   foreach($id_user  as $row)
	{
 $info =  $row['id'];
	}
  $now = time(); 

        if ($now > $_SESSION['expire']) {
            session_destroy();
			 $message = 'Votre session vient d expirer';
echo "<SCRIPT type='text/javascript'>
        alert('$message');
        window.location.replace('../index.php');
    </SCRIPT>";
 
		}

	 }
// recuperation des variables via la methode GET	 
if (isset($_GET['efgezrghrthntyynukkçluuefqvdbynuyvrbrtbbtbtbtbytntybterbr'])) 
{
$id = $_GET['efgezrghrthntyynukkçluuefqvdbynuyvrbrtbbtbtbtbytntybterbr'];
$id_user = recup_intitule($id);
   foreach($id_user  as $row)
	{
 $info =  $row['id'];
  $int =  $row['intitule'];
	}

$etud = liste_etudiant($info);



}	 
	 
 ?>
 
</h1>

</div>


<div class="container">

  <h2 style="color:#930000"><?php echo $int ?></h2>
             
  <table class="table">
    <thead>
      <tr>
      <th>INE</th>
        <th>PRENOM</th>
				<th>NOM</th>
                <th>FORMATION</th>
                <th>ABSCENCES</th>
                 <th>PROFIL</th>
      </tr>
    </thead>
    <tbody>
      <tr>
      
        <?php
		//affichage des donnees de l etudiant
  foreach($etud  as $pop)
	{
  ?>
			<tr>
            <td><?php echo $pop['ine'] ?></td>

				<td height="41"> <?php echo $pop['prenom'] ?>  </td>
			  <td><?php echo $pop['nom'] ?></td>
			    <td><?php echo $pop['formation'] ?></td>
                 <td><?php echo $pop['nb_absences'] ?></td>
                  <td><a href="profil.php?aerrtyuukkppmlktrgrrrvszzdeeevvdbbgnnguunhbgnnyungnh=<?php echo $pop['id'] ?>&&efgezrghrthntyynukkçluuefqvdbynuyvrbrtbbtbtbtbytntybterbr=<?php echo $info ?>"">  VOIR </a > </td>
			<tr>  <input type="button" value="Imprimer la feuille de presence" onClick="imprime_zone('Feuille', 'recette1');" id="imp"> </tr>
			</tr>
      <?php
	}
?>
    </tbody>
  </table>
</div>
<div id="apDiv2"> 
  
</div>
<h1>&nbsp;</h1>

<div id="apDiv1">
<a href="../lock.php" id="dec" >se deconnecter</a>
</div>


<div id='recette1'>
<table align="center" border='1'>
 <tr><td colspan="7" height="100px">
 <div> 
<div>
 <font face="Algerian" color="#ff8000" size="+3"> Université Paris XIII - Institut Galilée - PROMOTION 2018-2019 EI2D/PLS
</font>
</div>
<hr color="#000000" />
<div>  Meïli TCHANG: Gestionnaire pédagogique du Master Informatique et des Cours Communs  </div>
<div>  Contact :  Bureau D203 (Tel)
01 49 40 44 58 Institut Galilée 
(Email) info.master.galilee@univ-paris13.fr 
 </div>
<div align="right">    Le :<?php $date_cde=date('d/m/y'); echo $date_cde; ?>
</div>
<div>   Feuille de Présence   </div>

<div> Email du Professeur<?php echo"<font size='+1' face='Times New Roman, Times, serif'>". $_SESSION['login']."</font>";echo".....";echo "<font size='+1' face='Times New Roman, Times, serif'>";"</font>";?><br>
Doit   </div> </td></tr>

<tr>
<th> INE </th>
<th> PRENOM </th>
<th> NOM </th>
<th> FORMATION </th>
<th> NOMBRE D'ABSENCES </th>
</tr>


<tr>

<?php
//Affichage des donnees dans la feuille de presence
  foreach($etud  as $pop)
	{
  ?>
			<tr>
            <td><?php echo $pop['ine'] ?></td>

				<td height="41"> <?php echo $pop['prenom'] ?>  </td>
			  <td><?php echo $pop['nom'] ?></td>
			    <td><?php echo $pop['formation'] ?></td>
                 <td><?php echo $pop['nb_absences'] ?></td>
</tr>
 <?php
	}
?>
</table>
      
<div align="right">
</div>



</div>

  

</body>


</html>
