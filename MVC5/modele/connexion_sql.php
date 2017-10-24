<?php

// Connexion à la base de données
try
{
	$bdd = new PDO('mysql:host=localhost;dbname=sta12;charset=utf8', 'sta12', '11pjgcSwcCVjJYmN');
}
catch(Exception $e)
{
    die('Erreur : '.$e->getMessage());
}
