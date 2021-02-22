<?php

try
{
	$bdd = new PDO('mysql:host=localhost;dbname=application;charset=utf8', 'root', '');
}
catch(Exception $e)
{
        die('Erreur : '.$e->getMessage());
}

$id =$_POST['id'];
$prenom= $_POST['prenom'];
$nom= $_POST['nom'];
$email= $_POST['email'];
$date= $_POST['date'];
$role= $_POST['role'];
$login= $_POST['login'];
//echo 'UPDATE utilisateur(nom, prenom, email, date_naissance, role, login) SET('.$nom.', '.$prenom.', '.$email.','.$date.','.$role.','.$login.')WHERE ID_utilisateur='.$id.')';
  
$req = $bdd->prepare('UPDATE utilisateur
  SET nom=?,
  prenom=?,
  email=?,
  date_naissance=?,
  role=?,
  login=?  WHERE ID_utilisateur=?'); 
  
    $req->execute(array(
    $_POST['nom'],
    $_POST['prenom'],
	$_POST['email'],
    $_POST['date'],
    $_POST['role'],
	$_POST['login'],
	$id
	)) ;
	
if ($req) 
{  header("Location: employes.php");
}
?>