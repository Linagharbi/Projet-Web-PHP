<?php

try
{
	$bdd = new PDO('mysql:host=localhost;dbname=application;charset=utf8', 'root', '');
}
catch(Exception $e)
{
        die('Erreur : '.$e->getMessage());
}
$id=$_POST['id'];
$d= $_POST['details'];
$d1= $_POST['date'];
$des= $_POST['destinataire'];

  
$req = $bdd->prepare('UPDATE event
 details=?, 
 date=? WHERE ID_event=?'); 
  
     $req->execute(array(
	$_POST['details'],
	$_POST['date'],
	$id
	)) ;
$req1 = $bdd->prepare('UPDATE relation
 ID_dest=?
 WHERE ID_event='.$id); 
  
     $req1->execute(array(
	$_POST['destinataire'],
	
	)) ;
	
if ($req) 
{ header('Location: index.php');
 }
?>