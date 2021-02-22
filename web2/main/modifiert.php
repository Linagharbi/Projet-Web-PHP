<?php

try
{
	$bdd = new PDO('mysql:host=localhost;dbname=application;charset=utf8', 'root', '');
}
catch(Exception $e)
{
        die('Erreur : '.$e->getMessage());
}
$user =$_POST['user'];
if ($user =="2") 
{
$pr =$_POST['pro'];
$id =$_POST['id'];
$s= $_POST['sujet'];
$des= $_POST['description'];
$st= $_POST['statut'];
$d1= $_POST['date1'];
$d2= $_POST['date2'];
$p= $_POST['responsable'];

  
$req = $bdd->prepare('UPDATE tache
  SET sujet=?,
  description=?,
  statut=?, 
  date_debut=?,
  date_fin=?,
  utilisateur=? WHERE ID_tache=?'); 
  
    $req->execute(array(
    $_POST['sujet'],
	$_POST['description'],
	$_POST['statut'],
	$_POST['date1'],
    $_POST['date2'],
    $_POST['responsable'],
	$id
	)) ;
} elseif  ($user =="3")
{
$pr =$_POST['pro'];
$id =$_POST['id'];
$st= $_POST['statut'];


  
$req1 = $bdd->prepare('UPDATE tache
  SET statut=?
   WHERE ID_tache=?'); 
  
    $req1->execute(array(
	$_POST['statut'],
	$id
	)) ;	
	
	
}


 
 header('Location: taches.php?id='.$pr);

?>