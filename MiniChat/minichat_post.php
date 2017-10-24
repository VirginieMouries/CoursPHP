<!-- 

	minichat_post.php

	Description:
		TP OpenClassRooms du minichat
		Insère le message recu avec $_POST dans la base de données puis redirige vers minichat.php.


	Auteur: VMS
	Date : 11/07/2017
-->

<?php
// Connexion à la base de données
try
{
	$bdd = new PDO('mysql:host=localhost;dbname=test;charset=utf8', 'root', '');
}
catch(Exception $e)
{
        die('Erreur : '.$e->getMessage());
}

// Insertion du message à l'aide d'une requête préparée
$req = $bdd->prepare('INSERT INTO minichat (pseudo, message) VALUES(?, ?)');
$req->execute(array($_POST['pseudo'], $_POST['message']));

// Redirection du visiteur vers la page du minichat
header('Location: minichat.php');
?>


