<!doctype html>

<html lang="fr">
	<head>
		<meta charset="utf-8">
	 	<title>PHP Fonctions</title>
	  
	</head>

	<body>

	    <h1> Essai sur les fonctions </h1>

	    <h2> Test strlen et str_shuffle</h2>

	    <?php 
	    $ma_variable = str_replace('p','b', 'Pim pam poum');
	    echo $ma_variable .'<br />';


	    $chaine = 'Attention ca va secouer !';
	    $chaine = str_shuffle($chaine);
	     
	    echo $chaine.'<br />';   

	    ?>

	    <h2> Test sur ma fonction DireBonjour</h2>

	    <?php

	    $utilisateurs = array('Marie','Patrice','Edouard','Pascale','François', 'Benoît','Père Noël');
	    
	    function DireBonjour($listeNoms)
	    {
	    	foreach ($listeNoms as $value) {
	    		echo 'Bonjour ' . $value . ' !<br />';
	    	}
	        
	    }

	    DireBonjour($utilisateurs);
	    ?>

	    <h2> Test sur ma fonction VolumeCone</h2>

	    <?php
	    // Ci-dessous, la fonction qui calcule le volume du cône
	    function VolumeCone($rayon, $hauteur)		        
	    {
	    	echo "<br />";
	    	if (!is_numeric($rayon) || !is_numeric($hauteur)){
	    		return "Les paramètres doivent être des nombres <br />";
	    	
	    	} elseif ($rayon==0 || $hauteur==0) {
	    			return "Les paramètres doivent être différents de 0 <br />";

	    	}
	    	else
	    	{
	       		$volume = pow($rayon,2) * pi() * $hauteur * (1/3); // calcul du volume
	       		$volume = round($volume,2);
	       		return 'Le volume d\'un cône de rayon ' . $rayon . ' et de hauteur ' . $hauteur . ' est de ' . $volume . ' <br />'; 
	       	}
	    }

	    echo VolumeCone(4, 2);
	    

	    echo VolumeCone(4.5, 2.1);
	    

	    echo VolumeCone(0, 2);

	    echo VolumeCone('toto', 2);
	    
	    ?>	

	    <h2> Test inverser une chaine de caractères</h2>
	    
	    <?php
	    $chaine='Bonjour tout le monde';    
	    echo "Chaine d'origine : " . $chaine . "<br />";

	    $chaineInversee=strrev($chaine);
	    echo "Chaine inversée : " . $chaineInversee . "<br />";

	    ?>

	    <h2> Test si un nombre est un multiple de 3 ou 5 </h2>

	    <?php  

	    function MultipleDe3ou5($monNombre)
	    {
	    	echo "<br />";
	    	if ($monNombre % 3 == 0 && $monNombre % 5 == 0){
		    	echo $monNombre . " est un multiple de 3 et de 5<br />";
		    } elseif ($monNombre % 3 == 0){
		    	echo $monNombre . " est un multiple de 3<br />";	    	
		    } elseif ($monNombre % 5 == 0){
		    	echo $monNombre . " est un multiple de 5<br />";	    	
		    } else //   if ($monNombre % 3 != 0 && $monNombre % 5 != 0)
		    {
		    	echo $monNombre . " n'est multiple ni de 3 et ni de 5<br />";

		    }
		}

		MultipleDe3ou5(1234546);
		MultipleDe3ou5(658865);
		MultipleDe3ou5(15);
		MultipleDe3ou5(20);

	    ?>

	    <h2> Test si femme entre 21 et 40 ans (exo 3)</h2>

	    <?php  

	    function rechercheFemme($nom,$sexe,$age)
	    {
	    	echo "<br />";
	    	/* Première version
	    	if ($sexe == 'F' && ( $age > 21 && $age < 40)){
		    	echo "Bonjour "   . $nom ."<br />";  	
		    } else 
		    {
		    	echo "Désolé " . $nom .", au revoir ! <br />";

		    }
		    */
		    switch ($sexe) {
		    	case 'M':
		    		echo "Désolé " . $nom .", les hommes ne sont pas acceptés ! <br />";
		    		break;

		    	case 'F':
		    		$belAge = (($age >= 21 && $age <= 40 )) ? true : false ; 

		    		switch ($belAge) {
		    			case true :
		    				echo "Bonjour "   . $nom ."<br />";
		    				break;
		    			
		    			default:
		    				echo "Désolé "   . $nom .", Tu n'as pas le bel age<br />";
		    				break;
		    		}
		    	
		    		break;	
		    	
		    	default:
		    		echo "Désolé " . $nom .", les extraterrestres ne sont pas acceptés ! <br />";
		    		break;
		    }
		}

		rechercheFemme('Pierre','M',23);
		rechercheFemme('Emilie','F',14);
		rechercheFemme('Virginie','F',38);
		rechercheFemme('Denis','X',38);
	    ?>

		<h2> Test avec des nombres aléatoires (exo 4)</h2>	    

		<!-- Effectuer une suite de tirages de nombres aléatoires jusqu'à obtenir une suite composée d'un nombre pair suivi de deux nombres impairs -->

		<?php  

		function suiteAleatoire(){
			$nbEssai=0;
			$suiteCorrecte = false;

			do{
				$nbEssai++;

				/* Première version

				if($nbEssai>100) break;
				$nombre1 = rand(0,1000);
				if($nombre1%2 == 0){
					$nombre2 = rand(0,1000);
					if($nombre2%2 != 0){						
						$nombre3 = rand(0,1000);									
						if($nombre3%2 != 0){							
							$suiteCorrecte = true;							
						}						
					}					
				} 
				*/

				if($nbEssai>100) break;

				$nombre1 = rand(0,1000);
				$nombre2 = rand(0,1000);
				$nombre3 = rand(0,1000);

				if($nombre1%2 == 0 && $nombre2%2 != 0 && $nombre3%2 != 0){							
					$suiteCorrecte = true;												
				} 



			}while ( $suiteCorrecte == false) ;

			echo "Après " .$nbEssai ." essai(s), j'ai obtenu la suite " . $nombre1 . " " . $nombre2 ." ". $nombre3 . "<br />";
		}

		suiteAleatoire();
		suiteAleatoire();
		suiteAleatoire();

		?>

		<h2> Test avec des nombres aléatoires Le RETOUR (exo 5)</h2>	    

		<!-- choisir un nombre de trois chiffres.
			Effectuer ensuite des tirages aléatoires et compter le nombre de tirages nécessaires pour obtnir le nombre initial.
			Arrêter les itrages et afficher le nombre de coups réalisés. 
		-->

		<h3> Test fonction nombreAleatoire() (exo 5 - v1)</h3>

		<?php 

		function nombreAleatoire(){
			$nbEssai=0;
			$nombre1 = rand(100,999);
			$trouve = false;

			while (!$trouve) {
				$nbEssai++;
				$nombre2 = rand(100,999);
				if($nombre1==$nombre2){
					$trouve = true;
				}
			}

			echo "Nombre " . $nombre1 . " a été trouvé en " . $nbEssai . " essai(s)<br />";

		}
		nombreAleatoire();
		nombreAleatoire();
		nombreAleatoire();
		nombreAleatoire();

		?> 

		<h3> Test fonction nombreAleatoireFor() (exo 5 - v2)</h3>

		<?php 

		function nombreAleatoireFor(){
			$nbEssai=0;
			$nombre1 = rand(100,999);
			$trouve = false;
			// echo "Premier nombre : ". $nombre1 . "<br/>";

			for($i=1;$i<5000;$i++) {
				if(!$trouve){
					//echo "valeur de trouvé :" . $trouve . "et de i :" . $i ." <br/>";
					$nombre2 = rand(100,999);
					// echo "Deuxième nombre : ". $nombre2 . "<br/>";
					if($nombre1==$nombre2){
						$nbEssai = $i;
						$trouve = true;
						
					} 
				}
			}			

			echo "Nombre " . $nombre1 . " a été trouvé en " . $nbEssai . " essai(s)<br />";

		}
		nombreAleatoireFor();
		nombreAleatoireFor();
		nombreAleatoireFor();
		nombreAleatoireFor();

		?> 

		<h2> Test d'un tableau multidimensionnel (exo 7)</h2>
		<?php
		$coordonnees = array(
			'Dupont' => array ('prenom' => 'Francois','ville' => 'Marseille', 'age' => 32),
			'Miller' => array ('prenom' => 'Nathalie','ville' => 'Nancy', 'age' => 21),
			'Roze' => array ('prenom' =>'Safina','ville' => 'Thionville', 'age' => 51)
			 );

		/*
			Autre façon de creer un tableau associatif

			$contacts["Dupont"]["prenom"] = "Francois";
			$contacts["Dupont"]["ville"] = "Marseille";
			$contacts["Dupont"]["age"] = "32";

			$contacts["Miller"]["prenom"] = "Nathalie";
			$contacts["Miller"]["ville"] = "Nancy";
			$contacts["Miller"]["age"] = "21";

			$contacts["Roze"]["prenom"] = "Safina";
			$contacts["Roze"]["ville"] = "Thionville";
			$contacts["Roze"]["age"] = "51";
		*/

		foreach($coordonnees as $key => $personne){
			echo "<br /> <br /> <strong>" . $key . "</strong>";
			foreach($personne as $cle => $element)
			{
		    	echo "<br />    " . $cle . " : " . $element ; 
			}
		}
		
		?> 



	    

	</body>
</html>