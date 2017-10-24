<!--

	Creer une script pour mettre à jour l'id_proprietaire des différents possesseur de la 
	table possesseur dans la table jeux_video

	Pour chqaue prorpiètaire de la table propriètaire, je mets à jour dans la table jeux_video

-->

<?php

try
{
	// On se connecte à MySQL
	$bdd = new PDO('mysql:host=localhost;dbname=sta12;charset=utf8','sta12','11pjgcSwcCVjJYmN');

}
catch(Exception $e)
{
	// En cas d'erreur, on affiche un message et on arrête tout
    die('Erreur : '.$e->getMessage());
}

$req = $bdd->prepare('SELECT * FROM proprietaire');
$req->execute();


$req2 = $bdd->prepare('UPDATE jeux_video SET id_proprietaire = :id WHERE possesseur = :nom');

while ($proprio = $req->fetch())
{
	echo "<br> ID : " . $proprio['id_proprietaire'] . " nom: "  . $proprio['nom_proprietaire'];
	$req2->bindParam(':id', $proprio['id_proprietaire']); 
	$req2->bindParam(':nom', $proprio['nom_proprietaire']);
	$req2->execute();
}