<?php
try
{
	$bdd = new PDO('mysql:host=localhost;dbname=application;charset=utf8', 'root', '');
}
catch(Exception $e)
{
        die('Erreur : '.$e->getMessage());
}
		
if((isset($_POST['ajout']) && isset($_POST['nom']) && isset($_POST['prenom']) && isset($_POST['email']) && isset($_POST['password']) && isset($_POST['repeatpassword'])&& isset($_POST['date'])&& isset($_POST['role'])&& isset($_POST['login'])))
{
	$n=$_POST['nom'];
	$pr= $_POST['prenom'];
	$e= $_POST['email'];
	$pass= $_POST['password'];
	$rpass= $_POST['repeatpassword'];
	$d= $_POST['date'];
	$r= $_POST['role'];
	$l= $_POST['login'];


	
	 
   if($n&&$pr&&$e&&$pass&&$rpass&&$d&&$r&&$l) 
    {
        if($pass == $rpass)
        {
             
        } else echo"Veuillez saisir le meme mot de passe";
    } else echo"Veuillez saisir tous les champs";
	



$req = $bdd->prepare('INSERT INTO utilisateur (nom, prenom, email, password, date_naissance,role,login) VALUES (:nom, :prenom, :email, :password,:date,:role,:login)');
    $req->execute(array(
            "nom" => $n, 
			"prenom" => $pr, 
			"email" => $e,
            "password" => $pass,
            "date" => $d,
			"role"=>$r,
			"login"=>$l
            ));
			
			


if ($req) 
{ header('location: employes.php');

}
	
	
}	 


	


?>