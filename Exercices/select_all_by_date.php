<?php
ini_set("display_errors", 1);
error_reporting(E_ALL);
//phpinfo();


try
{
	// On se connecte à MySQL
	$bdd = new PDO('mysql:host=localhost;dbname=sta12;charset=utf8','sta12','11pjgcSwcCVjJYmN');
}
catch(Exception $e)
{
	// En cas d'erreur, on affiche un message et on arrête tout
    die('Erreur : '.$e->getMessage());

}

// Si tout va bien, on peut continuer

$reponse = $bdd->query('SELECT ID,nom,possesseur,console,nbre_joueurs_max,DATE_FORMAT(date_enregistrement,\'%d/%m/%Y\') AS date_enregistrement_fr FROM jeux_video ORDER BY date_enregistrement DESC');

/*   */


while ($donnees = $reponse->fetch())
{
 ?>
    <p>
    <strong>Jeu <?php echo $donnees['ID']; ?> </strong> : <?php echo $donnees['nom']; ?> appartient à <?php echo $donnees['possesseur']; ?> et enregistré le <?php echo $donnees['date_enregistrement_fr']; ?> 
     </p>

 <?php    
}

// Je compte le nombre de jeu par année
$reponse = $bdd->query('SELECT COUNT(*) AS nb_jeux, YEAR(date_enregistrement) AS annee FROM jeux_video GROUP BY annee');
while ($donnees = $reponse->fetch())
{
    
    $nb_jeux = $donnees['nb_jeux'];
    $annee = $donnees['annee'];
?>
    <p>
    Il y a eu <?php echo $nb_jeux; ?> enregistrés l'année <?php echo $annee; ?>
    </p>
<?php
}




?>
