<?php

class Model{

	protected $db;

	public function __construct(){
		// dans mon contructeur je fais la connection à la bdd
		include('modele/connexion_sql.php');
		$this->db = $bdd;
	}
}

?>