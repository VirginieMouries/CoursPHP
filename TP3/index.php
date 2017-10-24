<?php
include('fonctions.php');
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
ini_set("display_errors", 1);
error_reporting(E_ALL);
if (isset($_POST['send'])){
	$array_client = [];
	if(!empty($_POST['firstname']) AND !empty($_POST['lastname'])){
		//Supression balise html pour les string
		$firstname = strip_tags($_POST['firstname']);
		$lastname = strip_tags($_POST['lastname']); 
		// $residence = strip_tags($_POST['residence']); 
		$email = strip_tags($_POST['email']); 
		//$city = strip_tags($_POST['city']); 
		$phone = strip_tags($_POST['phone']); 
		// $cellphone = strip_tags($_POST['cellphone']);
		// $job = strip_tags($_POST['job']);
		//Vérifications sur la partie "ETAT CIVIL"

		$array_client['date'] = date('d/m/Y');
		$array_client['firstname'] = VerifString($firstname);
		$array_client['lastname'] = VerifString($lastname);
		
		$array_client['birthday'] = VerifDate($_POST['birthday']);
		

		VerifNationalite($_POST['nationality'], $firstname, $lastname);
		$array_client['nationality'] = $_POST['nationality'];
		

		$array_client['email'] = VerifString($email);		
		
		$array_client['phone'] = VerifString($phone);
		
		

		// Connexion à la base de données
		try{
			// On se connecte à MySQL
			$bdd = new PDO('mysql:host=localhost;dbname=sta12;charset=utf8','sta12','11pjgcSwcCVjJYmN');

			
				// ,array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION ));
				    /* $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); */
		}
		catch(PDException $e)
		{
			// En cas d'erreur, on affiche un message et on arrête tout
		    die('Erreur line '. $e->getLine() .' :</b> '.$e->getMessage());
		}

		// Enregistrement du nouveau contact
		$req = $bdd->prepare('INSERT INTO Contacts (contact_nom, contact_prenom,contact_naiss,contact_nationalite,contact_tel, contact_mail) VALUES(:lastname,:firstname,:birthday,:nationality,:phone,:email)');
		
		$req->bindParam(':lastname', $array_client['lastname']);
		$req->bindParam(':firstname', $array_client['firstname']);
		$req->bindParam(':birthday',$array_client['birthday']);
		$req->bindParam(':nationality',$array_client['nationality'] );
		$req->bindParam(':phone' , $array_client['phone'] );
		$req->bindParam(':email', $array_client['email']);	
		
 	
		$req->execute() or die(print_r($req->errorInfo(), TRUE));
		echo "Le contact " . $array_client['lastname'] . " " . $array_client['firstname'] . " a été enregistré dans la table des contacts." ;			
		

		echo "<br> Voici la liste de vos contacts : ";
		$req = $bdd->prepare('SELECT contact_nom, contact_prenom FROM Contacts');
		$req->execute() or die(print_r($req->errorInfo(), TRUE));
		while ($donnees = $req->fetch())
		{
?>
		<p>
			<?php echo $donnees['contact_nom']; ?> <?php echo $donnees['contact_prenom']; ?>
		</p>

<?php
		}
	}
}

?>

	</body>
</html>		