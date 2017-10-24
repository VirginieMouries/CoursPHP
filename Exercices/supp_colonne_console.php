<!--

	Creer une script pour supprimer la colonne console de la table jeux_video

-->

<?php

try
{
	// On se connecte à MySQL
	$bdd = new PDO('mysql:host=localhost;dbname=sta12;charset=utf8','sta12','11pjgcSwcCVjJYmN'); 
	$bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $bdd->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
}
catch( PDOException $e ) {
    echo $e->getMessage();
}

$bdd->exec('ALTER TABLE jeux_video DROP COLUMN console');
