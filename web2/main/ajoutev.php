<?php
try
{
	$bdd = new PDO('mysql:host=localhost;dbname=application;charset=utf8', 'root', '');
}
catch(Exception $e)
{
        die('Erreur : '.$e->getMessage());
}
		
if((isset($_POST['ajout']) && isset($_POST['categories']) && isset($_POST['details']) && isset($_POST['date'])&& isset($_POST['expediteur'])&& isset($_POST['destinataire'])))
{
    $c=$_POST['categories'];
	$d= $_POST['details'];
	$d1= $_POST['date'];
	$exp =$_POST['expediteur'];
	$des= $_POST['destinataire'];
	
	
	 echo $c.'<br />';
	 echo $d.'<br />';
	 echo $d1.'<br />';
	echo $exp.'<br />';
	
	

     
	  if($c&&$d&&$d1&&$exp&&$des) 
    {
             
    } else echo"Veuillez saisir tous les champs";
	



//echo "INSERT INTO tache (sujet, description , statut, date_debut, date_fin, utilisateur ,projet) VALUES ($s, $d, $st, $d1, $d2,$p ,$pr)" ;
$req = $bdd->prepare("INSERT INTO event (ID_exp , details, date, categories) VALUES (:expediteur, :details, :date, :categories)");
    $req->execute(array(
			"expediteur" => $exp, 
			"details" => $d, 
			"date" => $d1,
            "categories" => $c
            ));
$req1 = $bdd->query('SELECT MAX(ID_event) AS nbr FROM event');
$req1->execute();

$donnees1=$req1->fetch();	
$id = $donnees1['nbr'] ;	
echo $id ;
foreach ($des as $value) {
							
$req2 = $bdd->prepare("INSERT INTO relation (ID_event , ID_dest) VALUES ($id,$value)");
    $req2->execute(array());			
			}
if ($req)
{header('location: index.php');
}
 
}


?>
 