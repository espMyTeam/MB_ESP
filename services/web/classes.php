<?php
class Compte {
	private $base;
	function __construct($base){
		$this->base=$base;
	}

	function  consultation($numcpt){
		$check=$this->base->prepare("select solde from compte WHERE idCompte=:n1");
		$check->execute(array(
			':n1' => $numcpt
		));

		return $check;//->fetch();
	}
}

