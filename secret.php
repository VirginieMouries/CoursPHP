<!-- ************************
	secret.php
************************** -->

<!doctype html>

<html lang="fr">
	<head>
		<meta charset="utf-8">
	 	<title>Page d'accès </title>
	  
	</head>

	<body>

		<h1> Mes secrets </h1>


		<?php

		if(isset($_POST['idt']) && isset($_POST['pwd']) && ($_POST['pwd'] == "kangourou")){

		?>	

		<p> Le mot de passe est correct : voici mes secrets </p>

		<?php

			} else{

				echo "Pirate !!!!";
			}

		?>	
	</body>
</html>

