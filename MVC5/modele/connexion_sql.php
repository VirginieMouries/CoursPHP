<?php

// Connexion � la base de donn�es
try
{
	$bdd = new PDO('mysql:host=localhost;dbname=sta12;charset=utf8', 'sta12', '11pjgcSwcCVjJYmN');
}
catch(Exception $e)
{
    die('Erreur : '.$e->getMessage());
}
