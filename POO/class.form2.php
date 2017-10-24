<?php
ini_set("display_errors", 1);
error_reporting(E_ALL);

require ('class.form.php');

class Form2 extends form
{
	protected $coderadio; 
	protected $codecase;

	// La fonction reçoit un tableau associatif name -> libellé
	public function setRadioButtons($buttons){
		foreach ($button as $name => $libelle) {
			$this->coderadio .= '<INPUT type= "radio" name="' . $name . '" value="' . $name . '">' . $libelle ;
		}
	}

	// La fonction reçoit un tableau associatif name -> libellé
	public function setCheck($buttons){
		foreach ($button as $name => $libelle) {
			$this->codecase .= '<INPUT type= "checkbox" name="' . $name . '" value="' . $name . '">' . $libelle ;
		}
	}

	public function getform()
	 {
		$this->code = "";
		$this->code .= $this->codeinit;
		$this->code .= $this->codetext;
		$this->code .= $this->coderadio;
		$this->code .= $this->codecase;
		$this->code .= $this->codesubmit;
		$this->code .= '</fieldset></form>';
		 	
		echo $this->code;
	 }

}

