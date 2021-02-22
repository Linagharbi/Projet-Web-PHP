<?php

try
{
	$bdd = new PDO('mysql:host=localhost;dbname=application;charset=utf8', 'root', '');
}
catch(Exception $e)
{
        die('Erreur : '.$e->getMessage());
}

$de =$_POST['destinataire'];

$rep = $bdd->query('SELECT * FROM utilisateur WHERE email="'.$de.'"'); 
$donnees1 = $rep->fetch();

if(isset($_POST['envoyer']) )
{ 
	$des=$donnees1['ID_utilisateur'] ;
	$exp =$_POST['expediteur'];

	$obj =$_POST['objet'];
	$s =$_POST['sujet'];
	$f =$_FILES['file']['name'];
	$d=date("Y-m-d");

	$chemin="C:/wamp642/www/web/main/images/".$f;
	print_r ($f);
   if($exp&&$des&&$obj&&$s&&$d&&$f) 
    {
             
    } else echo"Veuillez saisir tous les champs";
	


//echo "INSERT INTO message (id_dest, id_exp, sujet, objet, date_env ,file ) VALUES ($des, $exp, $s, $obj, $d, $f)" ;
$req = $bdd->prepare("INSERT INTO message (id_dest, id_exp, sujet, objet, date_env, file ) VALUES (:id_dest, :id_exp, :sujet, :objet, :date_env, :file)");
    $req->execute(array(
            "id_dest" => $des, 
			"id_exp" => $exp, 
			"sujet" => $s, 
			"objet" => $obj,
            "date_env" => $d,
			"file" => $chemin
            ));




if ($req)
{	header('location: emailenv.php ');
}


}


?>