<!--

	Exercice:

	Creer une script pour inserer une entr&e dans la table jeux_video
	- Nom du jeu  : jeu de l’IFA 
	- Prix : moyenne des prix de tous les jeux 
	- Nbre_joueurs_max : max enregistré dans la table 
	- Commentaires : meilleur jeu de l’IFA 
	- Date_enregistrement : date courante, heure courante 
	- Id_proprietaire: nouveau proprietaire = IFA 
	- Id_console: nouvelle console : console IFA

	Auteur: Virginie Mouriès

	Date : 02/08/2017

-->

<?php

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

/*************************
	Console
*************************/

// nom de ma console
$nom_console = "Console IFA";
echo"CONSOLE : <br> je cherche si <strong> " . $nom_console . " </strong> existe.";


// vérification existance
$req1 = $bdd->prepare('SELECT id_console FROM console WHERE nom_console = :nom');
$req1->bindParam(':nom', $nom_console);
$req1->execute();

$existe = $req1->rowCount();

echo "<br>existe = " . $existe;

// Si elle existe, je récupère son id
if ($existe > 0)
{
	$donnees=$req1->fetch();
	$id_console = $donnees['id_console'];

	echo "<br>" . $nom_console . " existe avec l'index " . $id_console;

} else {
	// insertion d'une nouvelle console
	$req2 = $bdd->prepare('INSERT INTO console (nom_console) VALUES (:nom)');
	$req2->bindParam(':nom', $nom_console);
	$req2->execute();

	$id_console = $bdd->lastInsertId(); 

	echo "<br>" . $nom_console . " a été inséré avec l'index " . $id_console;
}

/*************************
	Propriètaire
*************************/

// nom de mon propriètaire
$nom_proprietaire = "IFA";
echo"<br> PROPRIETAIRE : <br>je cherche si <strong> " . $nom_proprietaire . " </strong> existe.";


// vérification existance
$req1 = $bdd->prepare('SELECT id_proprietaire FROM proprietaire WHERE nom_proprietaire = :nom');
$req1->bindParam(':nom', $nom_proprietaire);
$req1->execute();

$existe = $req1->rowCount();

echo "<br>existe = " . $existe;

// Si elle existe, je récupère son id
if ($existe > 0)
{
	$donnees=$req1->fetch();
	$id_proprietaire = $donnees['id_proprietaire'];

	echo "<br>" . $nom_proprietaire . " existe avec l'index " . $id_proprietaire;

} else {
	// insertion d'un nouveau proprietaire
	$req2 = $bdd->prepare('INSERT INTO proprietaire (nom_proprietaire) VALUES (:nom)');
	$req2->bindParam(':nom', $nom_proprietaire);
	$req2->execute();

	$id_proprietaire = $bdd->lastInsertId(); 

	echo "<br>" . $nom_proprietaire . " a été inséré avec l'index " . $id_proprietaire;
}


/*************************
	Prix du jeu
*************************/

echo "<br>PRIX :"; 

// j'utilise un fonction d'agregat pour calculer le prix moyen
$reponse = $bdd->query('SELECT AVG(prix) AS prix_moyen FROM jeux_video');
// j'ai une seule réponse
$donnees = $reponse->fetch();

$prix = $donnees['prix_moyen'];

echo "<br> le prix moyen est de " . $prix;

/*************************
	Nombre de joueurs
*************************/
echo "<br>NB JOUEURS :"; 

// j'utilise un fonction d'agregat pour calculer le prix moyen
$reponse = $bdd->query('SELECT MAX(nbre_joueurs_max) AS nbre_joueurs FROM jeux_video');
// j'ai une seule réponse
$donnees = $reponse->fetch();

$nbre_joueurs_max = $donnees['nbre_joueurs'];

echo "<br> le nombre de joueurs max est " . $nbre_joueurs_max;

/********************************

	Ajout du jeux dans la table jeux_video

********************************/

echo "<br>ENREGISTREMENT JEU :"; 

// Nom du jeu  : jeu de l’IFA 
$nom_jeu = "jeu de l’IFA";
// Prix : moyenne des prix de tous les jeux , contenu dans $prix

// Nbre_joueurs_max : max enregistré dans la table , contenu dans $nbre_joueurs_max

// Commentaires : meilleur jeu de l’IFA 
$commentaire_jeu = "meilleur jeu de l’IFA";

// Date_enregistrement : date courante, date du jour sql : DATE( NOW() )

// Id_proprietaire: nouveau proprietaire = IFA , contenu dans $id_proprietaire

// Id_console: nouvelle console : console IFA, contenu dans $id_console

$req3 = $bdd->prepare('INSERT INTO jeux_video (nom,prix,nbre_joueurs_max,commentaires,date_enregistrement,id_proprietaire,id_console) VALUES (:nom,:prix, :nbre_joueurs,:commentaires,DATE(NOW()),:proprietaire, :console)');
$req3->bindParam(':nom', $nom_jeu);
$req3->bindParam(':prix', $prix);
$req3->bindParam(':nbre_joueurs', $nbre_joueurs_max);
$req3->bindParam(':commentaires', $commentaire_jeu);
$req3->bindParam(':proprietaire', $id_proprietaire);
$req3->bindParam(':console',$id_console);

$req3->execute();

$id_jeu = $bdd->lastInsertId(); 

	echo "<br>" . $nom_jeu . " a été inséré avec l'index " . $id_jeu;


$req1->closeCursor();
$req2->closeCursor();
$req3->closeCursor();
$reponse->closeCursor();

?>


