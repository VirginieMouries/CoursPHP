<?php
class Personnage
{
  private $_force;
  private $_localisation;
  private $_experience = 50;
  private $_degats;

  public function gagnerExperience($valeur)
  {
  	$this->_experience += $valeur;
  }

  public function afficherExperience(){  	
  	echo $this->_experience;
  }

  public function afficherDegats(){  	
  	echo $this->_degats;
  }

  public function recevoirDegats($valeur){
  	$this->_degats += $valeur;
  }


  public function frapper($adversaire){
  	echo "<br> experience Frappeur : ";
  	$this->gagnerExperience(5);
  	$this->afficherExperience();
  	echo "<br> dégats Frappé : ";
  	$adversaire->recevoirDegats(5);
  	$adversaire->afficherDegats();

  }
}

$perso1 = new Personnage;
$perso2 = new Personnage;

echo "Perso 1 : experience + 15 : " ;
$perso1->gagnerExperience(15);
$perso1->afficherExperience();

echo "<br> Perso 1 frappe Perso 2 : " ;
$perso1->frapper($perso2);
