<?php
try
{
	$bdd = new PDO('mysql:host=localhost;dbname=application;charset=utf8', 'root', '');
}
catch(Exception $e)
{
        die('Erreur : '.$e->getMessage());
}
		
if((isset($_POST['ajout']) && isset($_POST['nom']) && isset($_POST['date1']) && isset($_POST['date2']) && isset($_POST['description'])&& isset($_POST['statut'])&& isset($_POST['user'])))
{
    $n=$_POST['nom'];
	$d1= $_POST['date1'];
	$d2= $_POST['date2'];
	$des= $_POST['description'];
	$s= $_POST['statut'];
	$u= $_POST['user'];

	 echo $n.'<br />';
	 echo $d1.'<br />';
     echo $d2.'<br />';
	 echo $des.'<br />';
	echo $u.'<br />';

	 if($n&&$d1&&$d2&&$des&&$s&&$u) 
    {
        
    } else echo"Veuillez saisir tous les champs";
	
	
    $req = $bdd->prepare("INSERT INTO projet (nom, date_debut, date_fin, description ,statut ,user) VALUES (:nom, :date1, :date2, :description, :statut,:user)");
    $req->execute(array(
            "nom" => $n, 
			"date1" => $d1, 
			"date2" => $d2,
            "description" => $des,
			"statut" => $s,
            "user" => $u
            )) ;
		

 
if ($req) 
{  header('location: projets.php');
}
   
	   
     
} 
?>