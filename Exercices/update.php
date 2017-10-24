<?php
ini_set("display_errors", 1);
error_reporting(E_ALL);
//phpinfo();

try
{
	// On se connecte à MySQL
	$bdd = new PDO('mysql:host=localhost;dbname=sta12;charset=utf8','sta12','11pjgcSwcCVjJYmN');
	
	// puis je donne le paramètre à PDO::setAttribute() : je veux voir les warning et exceptions
	// $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
}
catch(Exception $e)
{
	// En cas d'erreur, on affiche un message et on arrête tout
    die('Erreur : '.$e->getMessage());
}

try{
	// j'initialise mes données
	$nouveauNom = "Florent";
	$ancienNom = "Michel";

	// je prépare ma requete
	$req = $bdd->prepare('UPDATE jeux_video SET possesseur = :newPossesseur WHERE possesseur = :oldPossesseur');

	$req->execute(array('newPossesseur' => $nouveauNom, 'oldPossesseur' => $ancienNom));

	// $messages = $req->fetchAll(PDO::FETCH_OBJ);

	$nb_modifs = $req->rowCount();

	
}
catch(Exception $e)
{
	// En cas d'erreur, on affiche un message et on arrête tout
    die('Erreur : '.$e->getMessage());
}

echo $nb_modifs . ' entrées ont été modifiées !';

?>

<p><a href="select_all.php">cliquez ici pour voir la liste complète</a></p>


