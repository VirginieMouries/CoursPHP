<!doctype html>

<html lang="fr">
	<head>
		<meta charset="utf-8">
	 	<title>PHP Cible Formulaires</title>
	  
	</head>

	<body>

		<p>Bonjour !</p>

		<?php

		// Affichage des erreurs pendant le debugage
		ini_set("display_errors",1);
		error_reporting(E_ALL);

		// pour empêcher la malveillance, je teste que mes données viennent bien de formulaire.html
		if(isset($_POST['tache']) && (string)$_POST['tache'] == "formulaire" ){

			// Je teste si le formulaire a été validé
			if(isset($_POST['valider'])){

				// Je teste les variables avant l'affichage
				// Test sur le nom
				if(!empty($_POST['nom'])){
					if(is_string($_POST['nom'])){ // marche pas !!!!
						echo "Valeur de POST nom : " . $_POST['nom'] ."<br>" ;
						$nom = $_POST['nom'];	
					}else{
						echo "le <strong>nom</strong> doit être une chaine de caractères <br>";
					}
				}else{				
					echo "Je n'ai pas reçu d'information pour le <strong>nom</strong> <br>";
				}

				// Test sur le prénom
				if(!empty($_POST['prenom'])){
					echo "Valeur de POST prenom : " . $_POST['prenom'] ."<br>" ;
					$prenom = $_POST['prenom'];	
					
				}else{
					echo "Je n'ai pas reçu d'information pour le <strong>prénom</strong> <br>";
				}

				// Test sur l'age
				if(!empty($_POST['age']) AND is_int($_POST['age']) AND $_POST['age']>0 ){
					echo "Valeur de POST age : " . $_POST['age'] ."<br>" ;
					$age = $_POST['age'];	
					
				}else{
					echo "Je n'ai pas reçu d'information pour l'<strong>âge</strong> OU l'âge doit être une entier positif<br>";
				}


				if(isset($_POST['sexe'])){
					echo "Valeur de POST sexe : " . $_POST['sexe'] ."<br>" ;
					$sexe = $_POST['sexe'];	
					
				}else{				
					echo "Je n'ai pas reçu d'information pour le <strong>sexe</strong> <br>";
				}
				
			}
		}
		else
		{
			// l'utilisateur ne vient pas du formulaire
			echo "Vous n'êtes pas autorisé à accèder à cette page";
		}

		?>


		<p>Je sais comment tu t'appelles, hé hé. Tu t'appelles 
			<?php echo '<strong> ' . htmlspecialchars($_POST['prenom']) . '</strong> et tu es ' .$_POST['sexe'];  ?>
		</p>

		


		<p>Si tu veux changer de prénom, <a href="formulaire.html">clique ici</a> pour revenir à la page formulaire.php.</p>

	</body>
</html>		