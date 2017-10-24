<!--

	Creer une script pour mettre à jour l'id_console des différentes console de la 
	table console dans la table jeux_video

	Pour chaque console de la table console, je mets à jour id_console dans la table jeux_video

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

$req = $bdd->prepare('SELECT * FROM console');
$req->execute();


$req2 = $bdd->prepare('UPDATE jeux_video SET id_console = :id WHERE console = :nom');

while ($console = $req->fetch())
{
	echo "<br> ID : " . $console['id_console'] . " nom: "  . $console['nom_console'];
	$req2->bindParam(':id', $console['id_console']); 
	$req2->bindParam(':nom', $console['nom_console']);
	$req2->execute();
}