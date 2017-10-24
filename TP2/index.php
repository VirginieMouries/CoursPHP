<?php
	/* Amelie WIDLOECHER, Virginie MOURIES, Mathieu LAUER */

		include('fonctions.php');

		
		setcookie('lastname', strip_tags($_POST['lastname']), time() + 365*24*3600, null, null, false, true ); 
		setcookie('firstname', strip_tags($_POST['firstname']), time() + 365*24*3600, null, null, false, true ); 

?>		

<!doctype html>

<html lang="fr">
	<head>
		<meta charset="utf-8">
	 	<title>PHP Formulaires</title>
	  
	</head>

	<body>

		<h1> Test sur les formulaires </h1>

<?php
		if (isset($_POST['send']))
		{
			$array_client = [];

			if(!empty($_POST['firstname']) AND !empty($_POST['lastname']))
			{
				//Supression balise html pour les string
				/*$firstname = strip_tags($_POST['firstname']);
				$lastname = strip_tags($_POST['lastname']); 
				$residence = strip_tags($_POST['residence']); 
				$email = strip_tags($_POST['email']); 
				$city = strip_tags($_POST['city']); 
				$phone = strip_tags($_POST['phone']); 
				$cellphone = strip_tags($_POST['cellphone']);
				$job = strip_tags($_POST['job']);
				$family = strip_tags($_POST['family']);

				$lastname_conjoint = strip_tags($_POST['lastname_conjoint']);
				$firstname_conjoint = strip_tags($_POST['firstname_conjoint']);
				$job_conjoint = strip_tags($_POST['job_conjoint']);
				*/
				//Vérifications sur la partie "ETAT CIVIL"

				$array_client['date'] = date('d/m/Y');
				$array_client['firstname'] = VerifString(strip_tags($_POST['firstname']));
				$array_client['lastname'] = VerifString(strip_tags($_POST['lastname']));
				$array_client['age'] = VerifInt(strip_tags($_POST['age']));
				$array_client['birthday'] = VerifDate(strip_tags($_POST['birthday']));


				VerifNationalite($_POST['nationality'], $array_client['firstname'], $array_client['lastname']);
				$array_client['nationality'] = strip_tags($_POST['nationality']);
				$array_client['residence'] = VerifString(strip_tags($_POST['residence']));
				$array_client['postal_code'] = VerifInt(strip_tags($_POST['postal_code']));
				$array_client['email'] = VerifString(strip_tags($_POST['email']));
				$array_client['city'] = VerifString(strip_tags($_POST['city']));
				$array_client['phone'] = VerifString(strip_tags($_POST['phone']));
				$array_client['cellphone'] = VerifString(strip_tags($_POST['cellphone']));
				$array_client['job'] = VerifString(strip_tags($_POST['job']));
				$array_client['income'] = VerifInt(strip_tags($_POST['income']));
				$array_client['family'] = VerifString(strip_tags($_POST['family']));

				// Conjoint
				$array_client['lastname_conjoint'] = VerifString(strip_tags($_POST['lastname_conjoint']));
				$array_client['firstname_conjoint'] = VerifString(strip_tags($_POST['firstname_conjoint']));
				$array_client['age_conjoint'] = VerifInt($_POST['age_conjoint']);
				$array_client['birthday_conjoint'] = VerifDate($_POST['birthday_conjoint']);
				$array_client['job_conjoint'] = VerifString(strip_tags($_POST['job_conjoint']));
				$array_client['income_conjoint'] = VerifInt($_POST['income_conjoint']);
				// Enfants
				for($i = 1; $i <= 3; $i++)
				{
					$array_client['lastname_children'.$i] = VerifString(strip_tags($_POST['lastname_children'.$i]));
					$array_client['firstname_children'.$i] = VerifString(strip_tags($_POST['firstname_children'.$i]));
					$array_client['birthday_children'.$i] = VerifDate($_POST['birthday_children'.$i]);
				}

				//Vérifications sur la partie "FISCALE"
				$array_client['tax_paid'] = VerifInt($_POST['tax_paid']);
				// VOUS
				// Déduction
				
				if(isset($_POST['el'])){
					$array_client['el'] = VerifCheckbox($_POST['el']);
				}
				
				if(isset($_POST['a110'])){
					$array_client['a110'] = VerifCheckbox($_POST['a110']);
				}
				if(isset($_POST['a111'])){
					$array_client['a111'] = VerifCheckbox($_POST['a111']);
				}
				if(isset($_POST['111b'])){
					$array_client['111b'] = VerifCheckbox($_POST['111b']);
				}
				if(isset($_POST['srd'])){
					$array_client['srd'] = VerifCheckbox($_POST['srd']);
				}

				// Pas de déclaration
				
				$array_client['interest'] = $_POST['interest'];
				
				// CONJOINT
				$array_client['tax_conjoint'] = VerifInt($_POST['tax_conjoint']);
				// Déduction
				if(isset($_POST['el_conjoint'])){
					$array_client['el_conjoint'] = VerifCheckbox($_POST['el_conjoint']);
				}
				if(isset($_POST['a110_conjoint'])){
					$array_client['a110_conjoint'] = VerifCheckbox($_POST['a110_conjoint']);
					}
				if(isset($_POST['a111_conjoint'])){
					$array_client['a111_conjoint'] = VerifCheckbox($_POST['a111_conjoint']);
					}
				if(isset($_POST['111b_conjoint'])){
					$array_client['111b_conjoint'] = VerifCheckbox($_POST['111b_conjoint']);
					}
				if(isset($_POST['srd_conjoint'])){
					$array_client['srd_conjoint'] = VerifCheckbox($_POST['srd_conjoint']);
				}
				
				// Pas de déclaration
				$array_client['interest2'] = $_POST['interest2'];


				//Vérifications sur la partie "CREDITS"
				// CREDITS
				for ($i=1; $i < 6; $i++) 
				{ 
					$array_client['nature_loaning'.$i] = VerifString(strip_tags($_POST['nature_loaning'.$i]));
					$array_client['monthly'.$i] = VerifInt($_POST['monthly'.$i]);
					$array_client['end_repayment'.$i] = VerifDate($_POST['end_repayment'.$i]);	
					$array_client['credit_rate'.$i] = CheckRate($_POST['credit_rate'.$i]);
					$array_client['remaining_capital'.$i] = VerifInt($_POST['remaining_capital'.$i]);
					$array_client['borrowed_capital'.$i] = VerifInt($_POST['borrowed_capital'.$i]);
				}
				
				// création du fichier au nom du client
				// si le fichier existe, il sera réutilisé mais les données précédentes sont écrasées
				$monfichier = fopen($array_client['firstname'] . "_" . $array_client['lastname'] . ".txt", "w");

				foreach ($array_client as $key => $value) 
				{
					if(!empty($value))
					{
					// on écrit dans le fichier
					fputs($monfichier, $key . " : " . $value . PHP_EOL);
					}
				}

				echo "<br> Bonjour " .  $_COOKIE['firstname'] . " " . $_COOKIE['lastname'] . ", merci de votre visite ( Test Cookies ) <br>";

				fclose($monfichier);

				

				echo '<br><a href="formulaire.html">Vers le formulaire</a>';

				 
			 
				
			}
			else
			{
?>
			<p>
				Vous devez compléter le formulaire pour que vos données soient enregistrées !
			</p>
			<a href="formulaire.html">Vers le formulaire</a>
<?php
			}
		}	
		else
		{
		?>	
			<a href="formulaire.html">Vers le formulaire</a>
		<?php	
		}	
	?>

		

		

	</body>
</html>		