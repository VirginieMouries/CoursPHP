<!--

	Creer une script pour insèrer les noms des différents possesseur de la 
	table jeux_video dans la table possesseur

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

$req = $bdd->prepare('SELECT possesseur FROM jeux_video GROUP BY possesseur');

$req->execute();


$req2 = $bdd->prepare('INSERT INTO proprietaire (nom_proprietaire) VALUES (:nom)');

while ($donnees = $req->fetch())

{
	$req2->bindParam(':nom', $donnees['possesseur']);
	$req2->execute();
	
}


$req3 = $bdd->prepare('SELECT * FROM proprietaire');

$req3->execute();
echo "Voici le contenu de la table proprietaire :";

while ($proprio = $req3->fetch())
{
	echo "<br> ID : " . $proprio['id_proprietaire'] . " nom: "  . $proprio['nom_proprietaire']; 

}



?>