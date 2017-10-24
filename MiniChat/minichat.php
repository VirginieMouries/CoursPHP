<!-- 

	minichat.php

	Description:
		TP OpenClassRooms du minichat
		Affichage des 10 derniers messages


	Auteur: VMS
	Date : 11/07/2017
-->

<!doctype html>

<html lang="fr">
	<head>
		<meta charset="utf-8">
	 	<title>Minichat</title>
	 	<link rel="stylesheet" type="text/css" href="minichat.css">
	  
	</head>

	<body>

		<h1> MiniChat </h1>

		<!-- Formulaire pour la saisie d'un message -->
	    <form method="post" action="minichat_post.php">
		 
			<p>
				Pseudo : </br>		    
		    	<input type="text" name="pseudo" placeholder="pseudo"/>
		    	</br>

		    	Message : </br>		    
		    	<textarea type="text" name="message"> </textarea>
		    	</br>

		    	<input type="submit" value="Envoyer" />

			</p>		 
		</form>

		<!-- Zone d'affichage des 10 derniers messages -->
		<?php

		// Connexion à la base de données
		try
		{
			$bdd = new PDO('mysql:host=localhost;dbname=test;charset=utf8', 'root', '');
		}
		catch(Exception $e)
		{
		        die('Erreur : '.$e->getMessage());
		}

		// Récupération des 10 derniers messages
		$reponse = $bdd->query('SELECT pseudo, message FROM minichat ORDER BY ID DESC LIMIT 0, 10');

		// Affichage de chaque message (toutes les données sont protégées par htmlspecialchars)
		while ($donnees = $reponse->fetch())
		{
			echo '<p><strong>' . htmlspecialchars($donnees['pseudo']) . '</strong> : ' . htmlspecialchars($donnees['message']) . '</p>';
		}

		$reponse->closeCursor();

		?>


	</body>
</html>




