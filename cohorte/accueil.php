

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>COHORTE_QUIESTLA</title> 
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
<script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.4.8/angular.min.js"></script>
<LINK rel="stylesheet" type="text/css" href="css/index.css" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>accueil</title>

<style type="text/css">
#apDiv4 {
	position:absolute;
	width:200px;
	height:115px;
	z-index:1;
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
</style>
</head>

<body >
<div id="apDiv3">

<h1><?php 
require_once('modele.php'); 
session_start();
// demarrage de la session
if (isset($_SESSION['login'])) { 
  $username= $_SESSION['login'];
   $id_user = recup_id($username);
   foreach($id_user  as $row)
	{
 $info =  $row['id'];
	}
	
	//var_dump($info);
  $now = time(); // recuperer l heure actuel.

        if ($now > $_SESSION['expire']) {
            session_destroy();
  echo "<SCRIPT type='text/javascript'>
        alert('$message');
        window.location.replace('index.php');
    </SCRIPT>";
 
		}

	 }
 ?>
</h1>

</div>


<div class="container">
<h3 align="center" style="color:#930000">MATIERES ENSEIGNEES</h3>
	<div ng-app="sa_display" ng-controller="controller" ng-init="display_data()">
  <table class="table table-bordered">
			<tr>
				<th>NOM DE LA MATIERE</th>
				<th>NOMBRE D ABSENTS</th>
				
				
			</tr>
			<tr ng-repeat="x in names">
				<td height="41" > <a style="color:#930000" href="vue/cours.php?efgezrghrthntyynukkçluuefqvdbynuyvrbrtbbtbtbtbytntybterbr=<?php echo $info ?>">{{x.MIN}} </a></td>
			  <td>{{x.CN}}</td>
				
			
			</tr>
	  </table>
	</div>
</div>
<div id="apDiv2">
  <div id="apDiv4"><img src="image/3.PNG" width="202" height="115" />
  
  
  
  
  </div> 

</div>
<h1>&nbsp;</h1>

<div id="apDiv1">
<a href="lock.php" id="dec" >se deconnecter</a>
</div>


<!-- Script: pour afficer la liste des matieres contenu dans data -->  
<script>
    var app = angular.module("sa_display", []);
    app.controller("controller", function($scope, $http) {
        $scope.display_data = function() {
            $http.get("display.php")
                .success(function(data) {
                    $scope.names = data;
                });
        }
    });
</script> 
</body>
</html>

