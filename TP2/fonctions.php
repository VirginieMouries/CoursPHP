<?php

	/* Amelie WIDLOECHER, Virginie MOURIES, Mathieu LAUER */
	
	//Vérifie que la valeur existe bien et que c'est une chaîne de caractères
	function VerifString($var)
	{
		if(!empty($var)) 
		{
			if(isset($var) AND is_string($var))
			{
				return $var;
			}
		}
		/*
		elseif(empty($var))
		{
			echo "Vous n'avez saisi aucune valeur !<br>";
		}*/
	}

	//Vérifie que la valeur saisie existe et est bien un entier
	function VerifInt($var)
	{
		$var = (int) $var;

		if(!empty($var)) 
		{
			if(isset($var) AND is_int($var))
			{
				return $var;
			}
		}
		/*else
		{
			echo "Vous devez saisir un nombre !<br>";
		}*/
	}

	//vérifie que l'utilisateur a bien choisit une valeur pour un choix obligatoire
	function VerifRadio($var)	
	{
		if(!isset($var))
		{
			echo "Vous n'avez pas séléctionner de réponse pour la valeur " .$var." !<br>";
		}
	}

	//Vérifie les valeurs cochées dans les checkbox
	function VerifCheckbox($var)
	{
		if (isset($var))
		{
			return;
		}
	}

	//Vérifie que la date du jour est correct
	function VerifDate($date)
	{
		if(!empty($date))
		{
			if(isset($date) AND (date('d/m/Y') < $date))
			{
				return $date;
			}
		}
		/*else
		{
			echo "Vous n'avez pas saisit de date !<br>";
		}*/
		
	}

	//Vérifie la nationalité de l'utilisateur . 
	// cf TP PHP 04-07-2017.pdf, paragraphe II b

	function VerifNationalite($nationalite, $prenom, $nom)
	{
		if ($nationalite == 'Française') 
		{
			$array_client_france = array(
				'prenom' => $prenom,
				'nom' => $nom,
				'nationalite' => $nationalite);


			/*foreach ($array_client_france as $element) 
			{
				echo $element.'<br>';
			}*/
		}
		elseif ($nationalite == 'Luxembourgeoise')
		{
			$array_client_luxembourg = array(
				'prenom' => $prenom,
				'nom' => $nom,
				'nationalite' => $nationalite);

			/*foreach ($array_client_luxembourg as $element) 
			{
				echo $element.'<br>';
			}*/

		}

		echo "<br> Vous êtes ".$nom." ".$prenom." et vous êtes de nationalité ".$nationalite.". ( Test sur la nationalité ) <br>";
	}

	//Vérifie que le taux de crédit est un float
	
	function CheckRate($taux)
	{

		$taux = (float) $taux;		

		if(!empty($taux))
		{

			if(isset($taux) AND is_float($taux))
			{
				return $taux;
			}
		}
		/*else
		{
			echo "Vous devez saisir un nombre !<br>";
		}*/
	}

?>