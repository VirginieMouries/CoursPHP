<!doctype html>

<html lang="fr">
	<head>
		<meta charset="utf-8">
	 	<title>PHP Formulaires</title>
	  
	</head>

	<body>

		<h1> Test sur les formulaires </h1>

		<p>
		    Cette page ne contient que du HTML.<br />
		    
		</p>



		<form method="post" action="cible.php">
		 
			<p>
				Veuillez taper votre prénom : </br>
		    
		    	<input type="text" name="prenom" />
		    	</br>

		    	Vous avez des suggestions ? </br>

		    	<textarea name="message" rows="8" cols="45">
		    	Votre message ici.
		    	</textarea>

		    	</br>

		    	<select name="choix">
		    	    <option value="choix1">Choix 1</option>
		    	    <option value="choix2">Choix 2</option>
		    	    <option value="choix3">Choix 3</option>
		    	    <option value="choix4">Choix 4</option>
		    	</select>

		    	</br>
		    	</br>

		    	Choisis ton menu, stp </br>

		    	<input type="checkbox" name="case1" id="case1" value="Salade" /> 
		    		<label for="case1">Salade</label>
		    		</br>
		    	<input type="checkbox" name="case2" id="case2" value="Américain" />
		    		<label for="case2">Américain</label>

		    	</br></br>

		    	Aimez-vous les frites ?
		    	<input type="radio" name="frites" value="oui" id="oui" checked="checked" /> 
		    		<label for="oui">Oui</label>
		    	<input type="radio" name="frites" value="non" id="non" /> 
		    		<label for="non">Non</label>

		    	</br>
		    	</br>

		    	<input type="submit" value="Valider" />

			</p>
		 
		</form>

		<form action="cible_envoi.php" method="post" enctype="multipart/form-data">
		        <p>
		                Formulaire d'envoi de fichier :<br />
		                <input type="file" name="monfichier" /><br />
		                <input type="submit" value="Envoyer le fichier" />
		        </p>
		</form>

	</body>
</html>		