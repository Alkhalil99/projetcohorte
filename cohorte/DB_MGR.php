<?php

// CONNEXION ET METHODES D EXECUTION	
function connecte()
{
	return  mysqli_connect("localhost","root","","cohorte");
	/*if($exe)
	return true;
	else
	return false;*/
	}
	
/*function execute($req)
{
	$link=connecte();
	$exe= mysqli_query($link,$req);
	deconnecte($link);
	return $exe;
}*/

	//fonction avec parametre optionel
	function execute($req,$linq='')
	{
		if($linq=='')
		{$link=connecte();}
		return mysqli_query($link,$req);
		}
	
function parcoure($exe)
{
	$tab= mysqli_fetch_array($exe);
	return $tab;
	}
	
function nb_ligne($exe)
{
	$nb= mysqli_num_rows($exe);
	return $nb;
	}
	
	//formater un resultset en table
	function formatresultsettotable($exe)
	{
		$mat=array();
		while($row=mysqli_fetch_assoc($exe))
		{
			//ajouter un element a la fin du tableau
			array_push($mat,$row);
		}
		return $mat;
	}
	
function deconnecte($link)
{
	mysqli_close($link);
	}
?>
