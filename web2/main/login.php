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
$login=$_POST['login'];


$reponse = $bdd->query('SELECT * FROM utilisateur where login="'.$login.'"'); // 


//Je vérifie tout mes champs
while ($donnees = $reponse->fetch()) // ICI INTERVIENT L'ERREUR!!!!!!!
{
	

    if ($_POST['password'] == $donnees['password']) // Si mon login et password du formulaire == login et password de la base de données alors :
    {
		   session_start();
		   $_SESSION['ID_utilisateur']=$donnees['ID_utilisateur'];
			header("Location: index.php");
			
	
		
        
		
		
    } else  header("Location: pageserreur.php");
}
$reponse->closeCursor(); // Termine le traitement de la requête

 
?>
