<?php

try
{
	$bdd = new PDO('mysql:host=localhost;dbname=application;charset=utf8', 'root', '');
}
catch(Exception $e)
{
        die('Erreur : '.$e->getMessage());
}
$flag= $_POST['flag'];
$user =$_POST['user'];
echo $user ;

if ($user =="1") 
{
$id =$_POST['id'];
$n= $_POST['nom'];
$d1= $_POST['date1'];
$d2= $_POST['date2'];
$des= $_POST['description'];
$s= $_POST['statut'];
$r= $_POST['responsable'];

//echo 'UPDATE projet(nom , date_debut , date_fin , description, statut , user) SET('.$nom.' ,'.$date1.' ,'.$date2.' ,'.$description.' ,'.$statut.' ,'.$responsable.'  )WHERE ID_projet='.$id;
 
$req = $bdd->prepare('UPDATE projet
  SET nom=?,
  date_debut=?,
  date_fin=?,
  description=?,
  statut=?,
  user=? WHERE ID_projet=?'); 
  
    $req->execute(array(
    $_POST['nom'],
	$_POST['date1'],
    $_POST['date2'],
    $_POST['description'],
	$_POST['statut'],
    $_POST['responsable'],
	$id
	)) ;
	
	
} elseif  ($user =="2")

{
$id =$_POST['id'];
$s= $_POST['statut'];


  
$req1 = $bdd->prepare('UPDATE projet
  SET statut=?
   WHERE ID_projet=?'); 
  
    $req1->execute(array(
  
	$_POST['statut'],
	$id
	)) ;	
	
	
}



 
header('Location: projets.php');

?>