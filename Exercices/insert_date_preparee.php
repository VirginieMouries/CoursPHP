<?php
ini_set("display_errors", 1);
error_reporting(E_ALL);
//phpinfo();


try
{
	// On se connecte à MySQL
	$bdd = new PDO('mysql:host=localhost;dbname=sta12;charset=utf8','sta12','11pjgcSwcCVjJYmN');
    /* $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); */
}
catch(PDException $e)
{
	// En cas d'erreur, on affiche un message et on arrête tout
    die('Erreur : '.$e->getMessage());
}


try {

	$reponse = $bdd->query('SELECT ID FROM jeux_video');

	while ($donnees = $reponse->fetch()){

		/*
		$timestamp = mt_rand(1, time());
		//Format that timestamp into a readable date string.
		$datealeatoire = date(datetime, $timestamp);
		echo 'ID : ' . $donnees['ID'] . ' ' ;
		echo ' date ' . $datealeatoire . '<br>' ;
		*/
		// On ajoute une entrée dans la table jeux_video
		
		echo 'ID : ' . $donnees['ID'] . ' ' ;
		$essai = $bdd->exec('SELECT nom FROM jeux_video WHERE ID = ' . $donnees['ID']);
		$donnees = $essai->fetch();

		echo 'nom : ' . $donnees['nom'] . ' ' ;

		$req = $bdd->exec('UPDATE jeux_video SET date_enregistrement = FROM_UNIXTIME(FLOOR(RAND()*UNIX_TIMESTAMP())) WHERE ID = ' . $donnees['ID'] );
		/*		
		$req->bindParam(':datealeatoire', $datealeatoire);
		*/
		
		
		}

	}
	catch (Exception $e) {
		// En cas d'erreur, on affiche un message et on arrête tout
	    die('Erreur : '.$e->getMessage());	
	}

$reponse->closeCursor(); // Termine le traitement de la requête


echo 'La date d\'enregistrement a été mise à jour !';
?>

