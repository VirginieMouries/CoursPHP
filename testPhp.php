<!doctype html>
<html lang="fr">
	<head>
	  <meta charset="utf-8">
	  <title>Mon permier essai en PHP</title>
	  
	</head>
	<body>
		<!--
	  <?php echo "<br> <h1>la la la schtroumpf la la </h1> <br> <strong> Viens schtroumpfer en coeur <strong>" ;?> -->
	  <!-- Pour avoir des infos sur notre version de php -->
	  <!-- <?php phpinfo(); ?>  -->
		<h2>Affichage de texte avec PHP</h2>
	        
	    <p>
	        Cette ligne a été écrite entièrement en HTML.<br />
	        <?php echo "Celle-ci a été écrite entièrement en PHP."; ?>
	    </p>
	    
	    <?php
			$variable = "Mon \"nom\" est Mateo21";
			echo $variable;
			$variable2 = 'Je m\'appelle Mateo21';
			echo $variable2;
		?>

	</body>
</html>
