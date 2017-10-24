<!doctype html>

<html lang="fr">
	<head>
		<meta charset="utf-8">
	 	<title>Test array PHP</title>
	  
	</head>

	<body>

		<?php

		// Test de la boucle for pour le parcours d'un tableau	NUMEROTE	
		echo "<br/><br/>Test sur for pour le parcours d'un tableau	NUMEROTE<br/><br/>";

		echo "Voici les membres de ma famille: <br/>";

		// On crée notre array $prenoms
		$prenoms = array ('Eric', 'Virginie', 'Alice', 'Emilie', 'Pierre');

		// Puis on fait une boucle pour tout afficher :
		for ($numero = 0; $numero < 5; $numero++)
		{
		    echo $prenoms[$numero] . '<br />'; // affichera $prenoms[0], $prenoms[1] etc.
		}
		

		// Test de la boucle foreach pour le parcours d'un tableau		

		echo "<br/><br/>Test sur foreach pour le parcours d'un tableau	NUMEROTE<br/><br/>";

		echo "Voici les membres de ma famille: <br/>";


		$prenoms = array ('Eric', 'Virginie', 'Alice', 'Emilie', 'Pierre');

		foreach($prenoms as $element)
		{
		    echo $element . '<br />'; // affichera $prenoms[0], $prenoms[1] etc.
		}

		// Test de la boucle foreach pour le parcours d'un tableau	ASSOCIATIF	

		echo "<br/><br/>Test sur foreach pour le parcours d'un tableau	ASSOCIATIF<br/><br/>";


		$coordonnees = array (
		    'prenom' => 'François',
		    'nom' => 'Dupont',
		    'adresse' => '3 Rue du Paradis',
		    'ville' => 'Marseille');

		foreach($coordonnees as $element)
		{
		    echo $element . '<br />';
		}
		
		// Test de la boucle foreach pour le parcours d'un tableau	ASSOCIATIF	avec affichage de la clé

		echo "<br/><br/>Test sur foreach pour le parcours d'un tableau	ASSOCIATIF ( affichage de la clé )<br/><br/>";

		$coordonnees = array (
		    'prenom' => 'François',
		    'nom' => 'Dupont',
		    'adresse' => '3 Rue du Paradis',
		    'ville' => 'Marseille');

		foreach($coordonnees as $cle => $element)
		{
		    echo '[' . $cle . '] vaut ' . $element . '<br />';
		}
		

		
		$coordonnees = array (
		    'prenom' => 'François',
		    'nom' => 'Dupont',
		    'adresse' => '3 Rue du Paradis',
		    'ville' => 'Marseille');

		echo '<br /> Print_r sans la balise ';
		print_r($coordonnees);
		
		
		echo '<br /><br /> Print_r avec la balise ';
		echo '<pre>';
		print_r($coordonnees);
		echo '</pre>';

		// Recherche d'une clé dans un tableau avec la fonction array_key_exists(key, array)

		echo "<br/><br/>Test de la fonction array_key_exists(key, array)<br/><br/>";


		$coordonnees = array (
		    'prenom' => 'François',
		    'nom' => 'Dupont',
		    'adresse' => '3 Rue du Paradis',
		    'ville' => 'Marseille');

		if (array_key_exists('nom', $coordonnees))
		{
		    echo 'La clé "nom" se trouve dans les coordonnées !';
		}

		if (array_key_exists('pays', $coordonnees))
		{
		    echo 'La clé "pays" se trouve dans les coordonnées !';
		}

		
		// Test de la fontion in_array

		echo "<br/><br/>Test de la fonction in_array(value, array)<br/><br/>";
		
		$fruits = array ('Banane', 'Pomme', 'Poire', 'Cerise', 'Fraise', 'Framboise');

		if (in_array('Myrtille', $fruits))
		{
		    echo 'La valeur "Myrtille" se trouve dans les fruits !';
		}

		if (in_array('Cerise', $fruits))
		{
		    echo 'La valeur "Cerise" se trouve dans les fruits !';
		}
		

		// Test de la fonction array_search

		echo "<br/><br/>Test de la fonction array_search(value, array)<br/><br/>";
		$fruits = array ('Banane', 'Pomme', 'Poire', 'Cerise', 'Fraise', 'Framboise');

		$position = array_search('Fraise', $fruits);
		echo '"Fraise" se trouve en position ' . $position . '<br />';

		$position = array_search('Banane', $fruits);
		echo '"Banane" se trouve en position ' . $position . '<br />';

		$position = array_search('Kiwi', $fruits);
		if ($position == false)
		{
			echo '"Kiwi" n\'est pas dans le tableau <br />';	
		}	
	?>

	<h4> Recherche dans un tableau associatif </h4>

	<?php
	$coordonnees = array (
	    'prenom' => 'François',
	    'nom' => 'Dupont',
	    'adresse' => '3 Rue du Paradis',
	    'ville' => 'Marseille');

	
	if (in_array('Paul', $coordonnees))
	{
		echo "Paul n'est pas dans le tableau <br />";
	} 
	elseif (in_array('François', $coordonnees))
	{
		$position = array_search('François', $coordonnees);
		echo "François est dans le tableau à la clé " . $position . '<br />';
	}
	
	/*
	$pos = array_search('Paul', $coordonnees);
	if($pos)
	{
		echo "Paul est dans le tableau à la clé " . $pos ."<br />";			
	} else {
		echo "Paul n'est pas dans le tableau <br />";			
		$pos = array_search('François', $coordonnees);
		if($pos){
			echo "François est dans le tableau à la clé " . $pos . '<br />';
		}
	}
	*/

	$nblignes=0;
	
	foreach($coordonnees as $cle => $element)
	{
		if($element){
	    	$nblignes += 1;
	    }
	}

	echo "Le tableau des coordonnees contient " . $nblignes ." lignes <br />";


	$nblignes = count($coordonnees);
	echo "La fonction count dit que le tableau des coordonnees contient " . $nblignes ." lignes <br />";

	$tableauinverse=array();

	foreach($coordonnees as $cle => $element)
	{
		if($element){
	    	$tableauinverse[$element]=$cle;
	    }
	}

	echo '<br /><br /> Le tableau coordonnées inversé avec foreach <br />'; 
	echo '<pre>';
	print_r($tableauinverse);
	echo '</pre>';



	$tableauinverse = array_flip($coordonnees);

	echo '<br /><br /> Le tableau coordonnées inversé avec array_flip';
		echo '<pre>';
		print_r($tableauinverse);
		echo '</pre>';
	
	?>

	</body>
</html>