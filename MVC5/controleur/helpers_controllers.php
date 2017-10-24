<?php

function test_existence_fichiers ($view) {

	try
	{


		$function = str_replace(".php", "", $view);
		//$function = ($function == "index") ? "posts" : $function;

		if (!function_exists($function)) {

			throw new RuntimeException("Cette fonction n'existe pas!!!!!");

		}

		//contrôle existence fichier "modele/blog/" . $view
		if (!file_exists("modele/blog/" . $view)) {

			throw new RuntimeException("Ce fichier modèle n'existe pas!!!!!");	

		}
		
		include_once("modele/blog/" . $view);

		//contrôle existence fichier "view/blog/" . $view
		if (!file_exists("vue/blog/" . $view)) {

			throw new RuntimeException("Ce fichier de vue n'existe pas!!!!!");	

		}

	}
	catch (Exception $e)
	{
		// En cas d'erreur, on affiche un message et on arrête tout
	    die('Erreur : '.$e->getMessage());	
	}

}




