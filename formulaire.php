<!-- ************************
	formulaire.php
************************** -->

<!doctype html>

<html lang="fr">
	<head>
		<meta charset="utf-8">
	 	<title>TP1</title>
	  
	</head>

	<body>

		<h1> Formulaire qui protège mes secrets </h1>

	    <form method="post" action="secret.php">
		 
			<p>
				Veuillez taper votre identifiant : </br>
		    
		    	<input type="text" name="idt" />
		    	</br>

		    	Veuillez taper votre mot de passe : </br>
		    
		    	<input type="text" name="pwd" />
		    	</br>



		    	<input type="submit" value="Valider" />

			</p>
		 
		</form>

		<?php

		?>	

	</body>
</html>