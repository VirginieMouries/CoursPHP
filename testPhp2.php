<!doctype html>

<html lang="fr">
	<head>
		<meta charset="utf-8">
	 	<title>Mon permier essai en PHP</title>
	  
	</head>

	<body>

	    <?php
	    	
	    	// Test sur les simples et doubles quotes

	    	$age = 42;
			$variable = "Mon \"nom\" est Mateo21 et j'ai $age ans <br/><br/>";
			echo $variable;

			$variable = 'Je m\'appelle Mateo21 et j\'ai $age ans <br/><br/>' ;
			echo $variable;

			$variable = 'Je m\'appelle Mateo21 et j\'ai '. $age . 'ans <br/><br/>' ;
			echo $variable;

		?>	
			
		
			// Test de l'instruction break dans une boucle

		<h4> <br/>Test sur break <br/> </h4>

		<?php

			for ($i=0; $i <= 10; $i++)
			{
				// On affiche la valeur du compteur
				echo '<br/>Compteur= ';
				// On sort de la boucle si on atteint le chiffre 5
				if($i>5)
				{
					break;
				}
				// affichage des nombres de 0 à 5
				echo $i  ;
			}

			// Test de l'instruction continue dans une boucle

			echo "<br/><br/>Test sur continue <br/>";

			for ($i=0; $i <= 10; $i++)
			{
				// On affiche pas les 5 premiers nombres
				echo '<br/>Compteur= ';
			
				if($i<=5)
				{
					continue;
				}
				// affichage des nombres de 0 à 5
				echo $i  ;
			}			

		?>	





	</body>
</html>
