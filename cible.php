<!doctype html>

<html lang="fr">
	<head>
		<meta charset="utf-8">
	 	<title>PHP Cible Formulaires</title>
	  
	</head>

	<body>

		<p>Bonjour !</p>

		<p>Je sais comment tu t'appelles, hé hé. Tu t'appelles <?php echo '<strong> ' . htmlspecialchars($_POST['prenom']) . '</strong>'; ?> ! Tu as fais un choix : <?php echo '<strong> ' . $_POST['choix'] . '</strong>'; ?></p>

		<p>
			Tu as un message à deliver ?
			<?php echo '<strong> ' . $_POST['message'] . '</strong>'; ?>
		</p>

		<p>
			Tu aimerais manger 
			<?php 
				if(isset($_POST['case1'])){
					echo '<strong> ' . $_POST['case1'] . '</strong>'; 
				} 
				elseif(isset($_POST['case2'])){
					echo '<strong> ' . $_POST['case2'] . '</strong>'; 
				} 
				else{
					echo '<strong> RIEN </strong>'; 

				}

			?>

			<br>
			<p>
				Mmmmmm ! Je vois que tu 
				<?php 
				if($_POST['frites'] == 'oui'){
					echo '<strong> aimes </strong>'; 
				} else {
					echo '<strong> n\'aimes pas </strong>'; 
				}
				?>	
				les frites !!!

			</p>

		</p>


		<p>Si tu veux changer de prénom, <a href="formulaire.php">clique ici</a> pour revenir à la page formulaire.php.</p>

	</body>
</html>		