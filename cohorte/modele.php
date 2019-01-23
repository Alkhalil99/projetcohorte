<?php
// définiton de l' ensemble des methodes utilisées
require_once("DB_MGR.php");
 function recup_id($username)
{
	$req="select id from users where user_email='".$username."'";
	$exe=execute($req);
	return formatresultsettotable($exe);
 }  
 
 
 function recup_nom($id)
{
	$req="SELECT nom from users
  WHERE id= $id";
	$exe=execute($req);
	return formatresultsettotable($exe);
 }  
 
  function recup_intitule($id)
{
	$req=" select  id, intitule from matiere where professeur_id = $id";
	$exe=execute($req);
	return formatresultsettotable($exe);
 }  
 
  function recup_matiere($id)
{
	$req=" select intitule from matiere where id = $id";
	$exe=execute($req);
	return formatresultsettotable($exe);
 }  
 function liste_etudiant($id)
{
	$req="SELECT U.ine ,U.prenom, U.nom, U.formation, U.nb_absences, U.id from Users U
WHERE U.ID IN (SELECT user_id FROM `cours_user` WHERE cours_id =$id)";
	$exe=execute($req);
	return formatresultsettotable($exe);
 }  
 
 function liste_matiere($etud,$mat)
{
	$req="SELECT C.date, C.heure_deb, C.heure_fin, P.present
  FROM cours C JOIN presence P ON C.id = P.cours_id
  WHERE P.etudiant_id = $etud AND C.matiere_id = $mat;
  ";
	$exe=execute($req);
	return formatresultsettotable($exe);
 }  
 
 
 function recup_profil($id)
{
	$req="SELECT i.name, u.nom, u.prenom, u.formation, u.nb_absences from users u join image i where u.avatar_id = i.id and u.id= $id";
	$exe=execute($req);
	return formatresultsettotable($exe);
 }  
 ?> 
 