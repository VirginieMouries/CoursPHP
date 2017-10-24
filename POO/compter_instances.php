<?php

class Compteur{

	// je déclare une variable
	private static $_compteur;


public function __construct()
  {
    // $this->setCompteur();
    self::$_compteur += 1;
  }

 public function setCompteur()
  {
  	self::$_compteur += 1;
  }


public static function direCompteur()
  {

   return self::$_compteur;
  }
	
}

$essai1 = new Compteur;
$essai2 = new Compteur;
$essai3 = new Compteur;
$essai4 = new Compteur;

echo "La classe Compteur a été instanciée ";
echo Compteur::direCompteur();
echo " fois ! ";