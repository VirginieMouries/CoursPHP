<!-- ****************************

		testFichier.php

********************************* -->


<!doctype html>

<html lang="fr">
	<head>
		<meta charset="utf-8">
	 	<title>PHP Fichiers</title>
	  
	</head>

	<body>

	    <h1> En Lecture et Ecriture sur un fichier </h1>
		<h2>Ecriture dans un fichier</h2>	    

		<?php
		// 1 : on ouvre le fichier
		$monfichier = fopen('fichier.txt', 'r+');

		// 2 : on écrit dans le fichier
		fputs($monfichier, 'Mon premier test'); 

		// 3 : quand on a fini de l'utiliser, on ferme le fichier
		fclose($monfichier);
		?>

		<h2>Lecture du fichier</h2>
		<?php
		// 1 : on ouvre le fichier
		$monfichier = fopen('fichier.txt', 'r+');

		// 2 : on lit dans le fichier
		$ligne = fgets($monfichier);
		echo $ligne;

		// 3 : quand on a fini de l'utiliser, on ferme le fichier
		fclose($monfichier);
		?>

		<h2>Ecriture dans un fichier - deuxième ligne </h2>	    

		<?php
		// 1 : on ouvre le fichier
		$monfichier = fopen('fichier.txt', 'r+');

		// 2 : on lit
		$ligne = fgets($monfichier);
		echo "Le fichier contient: " .$ligne . "<br>";
		fputs($monfichier, PHP_EOL .'Mon deuxième test'); 
		echo "J'écris dans mon fichier <br> ";
		// Je me replace au début du fichier
		// fseek($monfichier,0);		
		// 3 : quand on a fini de l'utiliser, on ferme le fichier
		fclose($monfichier);
		/*Ouvre le fichier et retourne un tableau contenant une ligne par élément*/
		$lines = file('fichier.txt');
		/*On parcourt le tableau $lines et on affiche le contenu de chaque ligne précédée de son numéro*/
		foreach ($lines as $lineNumber => $lineContent){
			echo $lineNumber,' ',$lineContent .'<br>';
		}
		
		?>
