<?php

class Ville{

	private $_nom;
	private $_departement;

	public function __construct($nomVille,$numDepartement){
		$this->setNom($nomVille);
		$this->setDepartement($numDepartement);
	}


	public function setNom($nomVille){
		$this->_nom = $nomVille;
	}


	public function setDepartement($numDepartement){
		$this->_departement = $numDepartement;
	}

	public function getNom(){
		return $this->_nom;
	}

	public function getDepartement(){
		return $this->_departement;
	}

	public function affichage(){
			
		$texte = "<br> La ville de " . $this->getNom() . " est dans le département " . $this->getDepartement() . "<br>" ;	
		return $texte;
	}

}


$ville1 = new Ville("Thionville","57");

echo("Ville 1 : ");
echo($ville1->getNom());
echo(" ");
echo($ville1->getDepartement());
echo("<br>");


$ville2 = new Ville("Metz","57");
echo($ville2->affichage());

$ville3 = new Ville("Nancy","54");
echo($ville3->affichage());


$ville4 = new Ville("Charmois l'orgueilleux","88");
echo($ville4->affichage());
