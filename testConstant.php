<!-- **********************

	testConstant.php

************************ -->

<!doctype html>

<html lang="fr">
	<head>
		<meta charset="utf-8">
	 	<title>PHP Fonctions</title>
	  
	</head>

	<body>

		<h1> Essai sur les constantes </h1>

	    <h2> Test du cours</h2>

		<?php
		  define("CONSTANTE", "Bonjour le monde.</br>");
		  echo CONSTANTE; // affiche "Bonjour le monde."
		  echo Constante; // affiche "Constante" et une notice.
		?>

		<?php
		// Fonctionne depuis PHP 5.3.0
		const CONSTANT = '</br>Bonjour le monde !';

		echo CONSTANT;

		// Fonctionne depuis PHP 5.6.0
		const ANOTHER_CONST = CONSTANT.'; Aurevoir le monde !';
		echo ANOTHER_CONST;

		const ANIMALS = array('chien', 'chat', 'oiseaux');
		echo "</br>" . ANIMALS[1]; // affiche "chat"

		// Fonctione depuis PHP 7
		define('ANIMALS', array('chien','chat','oiseaux'));
		echo"</br>" . ANIMALS[1]; // affiche "chat"
		?>

		<h2> Définition de PI </h2>

		<?php
		// Ci-dessous, la fonction qui calcule le volume du cône

		define('PI', pi());
		// const PI = pi(); // On ne peut pas mettre une fonction dans une contante
		echo "Valeur de la contante PI : " . PI . "<br/>";
		
		function VolumeCone($rayon, $hauteur)		        
		{	
			
			echo "<br />";
			if (!is_numeric($rayon) || !is_numeric($hauteur)){
				return "Les paramètres doivent être des nombres <br/>";
			
			} elseif ($rayon==0 || $hauteur==0) {
					return "Les paramètres doivent être différents de 0 <br/>";

			}
			else
			{
		   		$volume = pow($rayon,2) * PI * $hauteur * (1/3); // calcul du volume
		   		$volume = round($volume,2);
		   		return 'Le volume d\'un cône de rayon ' . $rayon . ' et de hauteur ' . $hauteur . ' est de ' . $volume . ' <br/>'; 
		   	}
		}

		echo VolumeCone(4, 2);
		echo VolumeCone(4.5, 2.1);
		echo VolumeCone(0, 2);
		echo VolumeCone('toto', 2);

		
		
		?>	

	</body>
</html>