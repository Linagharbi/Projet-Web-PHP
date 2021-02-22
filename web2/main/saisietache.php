<?php
try
{
	$bdd = new PDO('mysql:host=localhost;dbname=application;charset=utf8', 'root', '');
}
catch(Exception $e)
{
        die('Erreur : '.$e->getMessage());
}
		
if((isset($_POST['ajout']) && isset($_POST['sujet']) && isset($_POST['date1']) && isset($_POST['date2'])&& isset($_POST['description'])&& isset($_POST['statut'])&& isset($_POST['responsable'])&& isset($_POST['projet'])))
{
    $s=$_POST['sujet'];
	$d1= $_POST['date1'];
	$d2= $_POST['date2'];
	$d= $_POST['description'];
	$st= $_POST['statut'];
    $p= $_POST['responsable'];
	$pr= $_POST['projet'];
	
	
	 echo $s.'<br />';
	 echo $d.'<br />';
	 echo $d1.'<br />';
     echo $d2.'<br />';
	echo $p.'<br />';
	echo $st.'<br />';

     
	  if($s&&$d&&$d1&&$d2&&$st&&$p&&$pr) 
    {
             
    } else echo"Veuillez saisir tous les champs";
	

}

//echo "INSERT INTO tache (sujet, description , statut, date_debut, date_fin, utilisateur ,projet) VALUES ($s, $d, $st, $d1, $d2,$p ,$pr)" ;
$req = $bdd->prepare("INSERT INTO tache (sujet, description , statut, date_debut, date_fin, utilisateur ,projet) VALUES (:sujet, :description, :statut, :date1, :date2,:utilisateur ,:projet)");
    $req->execute(array(
            "sujet" => $s, 
			"description" => $d, 
			"statut" => $st, 
			"date1" => $d1,
            "date2" => $d2,
            "utilisateur" => $p,
			 "projet" => $pr
            ));
			
			
if ($req)
{	header('location: taches.php?id='.$pr);
}
 


?>
 