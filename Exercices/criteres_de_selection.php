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

// Je compte le nombre de jeu
$reponse = $bdd->query('SELECT COUNT(*) AS nb_jeux FROM jeux_video');
$result= $reponse->fetch();
$nb_jeux = $result['nb_jeux'];
// echo 'Nombre de jeux: ' . $nb_jeux . '<br>';

// J'en déduis le nombre de pages
$jeuxParPage=10; // 10 jeux par page
$nombreDePages=ceil($nb_jeux/$jeuxParPage);// Je récupère le nombre entier supérieur

if(isset($_GET['page'])) // Si la variable $_GET['page'] existe...
{
     $pageActuelle=intval($_GET['page']);
 
     if($pageActuelle>$nombreDePages) // Si la valeur de $pageActuelle (le numéro de la page) est plus grande que $nombreDePages...
     {
          $pageActuelle=$nombreDePages;
     }
}
else // Sinon
{
     $pageActuelle=1; // La page actuelle est la n°1    
}

$premiereEntree=($pageActuelle-1)*$jeuxParPage; // Je calcule la première entrée à lire

// echo "Je lis à partir de " . $premiereEntree;

$reponse = $bdd->query('SELECT id, nom, possesseur, console, prix FROM jeux_video LIMIT '.$premiereEntree.', '.$jeuxParPage.'');

// echo '<p>Voici les 10 premières entrées de la table jeux_video :</p>';

echo '<h1>Voici les jeux contenus dans la table jeux_video :</h1><br><br>';

// On affiche chaque entrée une à une
while ($donnees = $reponse->fetch())
{
?>
    <p>
    <strong>Jeu <?php echo $donnees['id']; ?> </strong> : <?php echo $donnees['nom']; ?> appartient à <?php echo $donnees['possesseur']; ?> fonctionne sur <?php echo $donnees['console']; ?> et vaut <?php echo $donnees['prix']; ?> €
   </p>
<?php
}

echo '<p align="center">Page : '; //Pour l'affichage, on centre la liste des pages
for($i=1; $i<=$nombreDePages; $i++) //On fait notre boucle
{
     //On va faire notre condition
     if($i==$pageActuelle) //Si il s'agit de la page actuelle...
     {
         echo ' [ '.$i.' ] '; 
     }	
     else //Sinon...
     {
          echo ' <a href="criteres_de_selection.php?page='.$i.'">'.$i.'</a> ';
     }
}
echo '</p>';

$reponse->closeCursor(); // Termine le traitement de la requête

?>
