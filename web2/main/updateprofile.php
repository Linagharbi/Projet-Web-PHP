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


$req1 = $bdd->prepare('SELECT * FROM utilisateur WHERE ID_utilisateur='.$id);
$req1->execute() ;

if( isset($_POST['apassword']) && isset($_POST['password']))
{

$apass=$_POST['apassword'];
$pass= $_POST['password'];
$cpass= $_POST['cpassword'];


//echo 'UPDATE utilisateur(password) SET('.$password.')WHERE ID_utilisateur='.$_SESSION['ID_utilisateur'])';
	
	$donnees1 = $req1->fetch();
if (($apass==$donnees1['password']))
{   if($pass == $cpass)
	{$req = $bdd->prepare('UPDATE utilisateur set
	password=?
	WHERE ID_utilisateur=?'); 
  
    $req->execute(array(
	$pass,
	$id
	
	));
	
	if ($req)
	{ header("Location: profil.php");
	}
	}
	else echo"Veuillez saisir le meme mot de passe";
		
}

else echo "Mot de passe incorrecte";
		

} else echo"Veuillez saisir tous les champs";
		

	
?>