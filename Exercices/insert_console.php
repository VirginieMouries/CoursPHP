<!--

	Creer une script pour insèrer les noms des différentes console de la 
	table jeux_video dans la table console

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

$req = $bdd->prepare('SELECT console FROM jeux_video GROUP BY console');

$req->execute();


$req2 = $bdd->prepare('INSERT INTO console (nom_console) VALUES (:nom)');

while ($donnees = $req->fetch())

{
	$req2->bindParam(':nom', $donnees['console']);
	$req2->execute();
	
}


$req3 = $bdd->prepare('SELECT * FROM console');

$req3->execute();
echo "Voici le contenu de la table console :";

while ($console = $req3->fetch())
{
	echo "<br> ID : " . $console['id_console'] . " nom: "  . $console['nom_console']; 

}



?>