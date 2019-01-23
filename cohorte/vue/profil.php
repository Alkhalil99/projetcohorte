

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>COHORTE_QUIESTLA</title> 
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
<script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.4.8/angular.min.js"></script>
<LINK rel="stylesheet" type="text/css" href="../css/index.css" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<title>profile</title>

<style type="text/css">
#apDiv4 {
	position:absolute;
	width:200px;
	height:115px;
	z-index:5;
	left: 12px;
	top: 253px;
}
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
#apDiv5 {
	position:absolute;
	width:200px;
	height:115px;
	z-index:6;
}
</style>

</head>

<body >
<div id="apDiv5">

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
 
		}

	 }
	 
if (isset($_GET['aerrtyuukkppmlktrgrrrvszzdeeevvdbbgnnguunhbgnnyungnh'])) 
{
	if (isset($_GET['efgezrghrthntyynukkçluuefqvdbynuyvrbrtbbtbtbtbytntybterbr'])) 
{
$id = $_GET['efgezrghrthntyynukkçluuefqvdbynuyvrbrtbbtbtbtbytntybterbr'];
$id_etud = $_GET['aerrtyuukkppmlktrgrrrvszzdeeevvdbbgnnguunhbgnnyungnh'];
$id_user = recup_matiere($id);
$id_etudiant = recup_nom($id_etud);
$profil = recup_profil($id_etud);
   foreach($id_user  as $row)
	{
 $info =  $row['intitule'];
  //$int =  $row['intitule'];
	}
	
	foreach($id_etudiant  as $rows)
	{
 $nom =  $rows['nom'];
	}
	
foreach($profil  as $prf)
	{
  $avatar =  $prf['name'];	
 $nom_user =  $prf['nom'];
 $prenom_user =  $prf['prenom'];
  $form =  $prf['formation'];
   $nb =  $prf['nb_absences'];
	}
$cours = liste_matiere($id_etud,$id);

}	 
}
 ?>
 
</h1>

</div>


<div id="apDiv4">



<div style="background:#98bf21; height:102px; width:200px; position:absolute;"><img src="../image/<?php echo $avatar?>" width="200px" height="123" /></div>
<br /><br />

<h3 id="nom"><?php echo $nom_user?> &nbsp;

               <?php echo $prenom_user?></h3>
<h4 ><?php echo $form?> </h4>
<h5>Total Absences</h5><h6> <?php echo $nb?> </h6>
</div>
<div class="container">




  <h2 style="color:#930000"><?php echo $info ?></h2>
             
  <table class="table">
    <thead>
      <tr>
        <th>DATE</th>
				<th>HEURE DE DEBUT</th>
                <th>HEURE DE FIN</th>
                <th>PRESENCE</th>
                 
                
      </tr>
    </thead>
    <tbody>
      <tr>
      
        <?php
  foreach($cours as $pop)
	{
  ?>
	  <tr>
				<td height="41"> <?php echo $pop['date'] ?>  </td>
			  <td><?php echo $pop['heure_deb'] ?></td>
			    <td><?php echo $pop['heure_fin'] ?></td>
                 <td><?php echo $pop['present'] ?></td>
                  
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



</body>
<script> 
$(document).ready(function(){
    location.reload();
    var div = $("#apDiv4");  
    div.animate({left: '100px'}, "slow");
    div.animate({fontSize: '3em'}, "slow");
 window.stop();
});
</script> 
</html>

