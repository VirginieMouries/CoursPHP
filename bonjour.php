<!-- <p>Bonjour <?php echo $_GET['prenom'] . ' ' . $_GET['nom']; ?> !</p> -->

<?php

echo "Les données de l'URL :" . $_GET['prenom'] . ' ' . $_GET['nom']. ' ' . $_GET['age'] .'<br>';


// On a  des données pour le nom, le prénom et l'âge
if (isset($_GET['prenom']) AND isset($_GET['nom']) AND isset($_GET['age'])){
	
	/* $_GET['prenom']= htmlspecialchars($_GET['prenom']);
	$_GET['nom']= htmlspecialchars($_GET['nom']);
	*/
	$_GET['age']=(int)$_GET['age'];
	
	if(is_string($_GET['prenom']) AND is_string($_GET['nom']) && $_GET['age']>0 AND $_GET['age']<100 ){

	echo 'Bonjour ' . $_GET['prenom'] . ' ' . $_GET['nom'] . '! Tu as ' . $_GET['age'] . ' ?';
	}
}
else // Il manque des paramètres, on avertit le visiteur
{
	echo 'Il faut renseigner un nom, un prénom et un âge inférieur à 100 ans !';
}
?>