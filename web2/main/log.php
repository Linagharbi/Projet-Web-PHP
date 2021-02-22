<?php
try
{
 $bdd = new PDO('mysql:host=localhost;dbname=application;charset=utf8', 'root', '');
}
catch (Exception $e) // Si erreur
{
        die('Erreur : ' . $e->getMessage());
}
 
 
//Je choisis les champs
$email=$_POST['email'];

$reponse = $bdd->query('SELECT * FROM utilisateur where email="'.$email.'"');

while ($donnees = $reponse->fetch()) 
{
		   session_start();
		   $_SESSION['ID_utilisateur']=$donnees['ID_utilisateur'];

if ($_POST['email'] == $donnees['email'])
{ header("Location: index.php");
} else 
		{echo 'Erreur' ; }
}

?>