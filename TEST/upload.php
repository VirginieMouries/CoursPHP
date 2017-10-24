<?php
	if(isset($_FILES['table'])){ 
	    $dossier = 'upload/';
	    $fichier = basename($_FILES['table']['name']);
	    echo "<br> Le fichier " .$dossier.$fichier;

	    //Si la fonction renvoie TRUE, c'est que ça a fonctionné...
	    if(move_uploaded_file($_FILES['table']['tmp_name'], $dossier . $fichier)){
	    	//on accepte que les extensions .csv
			$extensions = '.csv';
			// récupère la partie de la chaine à partir du dernier "." pour connaître l'extension.
			$extension = strrchr($_FILES['table']['name'], '.');

			echo "<br> l'extension du fichier est " . $extension;
			
			//Ensuite on teste
			//Si l'extension n'est pas dans le tableau
			if( $extension !== $extensions ) 
			{
			    $erreur = 'Vous devez uploader un fichier de type .csv';
			    echo '<br> Vous devez uploader un fichier de type .csv';
			}else{
				$row = 1;
				if (($handle = fopen($dossier.$fichier, "r")) !== FALSE) {
					$tableName = strstr($_FILES['table']['name'], '.',true);
					
				    while (($data = fgetcsv($handle, 1000, ";")) !== FALSE) {
				        $num = count($data);
				        echo "<p> $num champs à la ligne $row: <br /></p>\n";
				        $row++;

				        for($c=1; $c < $num; $c++) {

				            echo "INSERT INTO " . $tableName . " VALUES ('" . $data[$c] . "' ) <br />\n";

				        }
				    }
				    fclose($handle);
				}

				echo 'Upload effectué avec succès !';
			}
			//Sinon (la fonction renvoie FALSE).	
	    	}else{	          
	    	    echo 'Echec de l\'upload !';
	    	}
	}
?>