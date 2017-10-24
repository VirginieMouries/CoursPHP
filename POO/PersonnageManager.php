<?php
class PersonnageManager
{

  private $_db; // instance de PDO

  public function __construct($db){
    $this->setDb($db)
  }

  public function add(Personnage $perso){

    $q = $this->_db->prepare('INSERT INTO personnages(nom, forcePerso, degats, niveau, experience) VALUES(:nom, :forcePerso, :degats, :niveau, :experience)');

    $q->bindValue(':nom', $perso->nom());
    $q->bindValue(':forcePerso', $perso->forcePerso(), PDO::PARAM_INT);
    $q->bindValue(':degats', $perso->degats(), PDO::PARAM_INT);
    $q->bindValue(':niveau', $perso->niveau(), PDO::PARAM_INT);
    $q->bindValue(':experience', $perso->experience(), PDO::PARAM_INT);

    $q->execute();

  }

  public function get($id){

  }

  public function getList(){

  }

  public function update(Personnage $perso){

  }

  public function delete(Personnage $perso){

  }  

  public function setDB(PDO $db){
    $this->_db = $db;
  }    

}