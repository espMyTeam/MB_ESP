<?php
class Compte {
	private $base;
	
	function __construct($base){
		$this->base=$base;
	}

	//cete fonction permet a un abonne de consulter la banque
	function  consultation($numcpt){
		$check=$this->base->prepare("select solde from compte WHERE idCompte=:n1");
		$check->execute(array(
			':n1' => $numcpt
		));
		$value=$check->fetch();
		return $value[0]!=null ? $value[0]: Constantes::$NUM_COMPTE_INVALIDE;
	}

	function debiter($montant, $numcpt)
	{
		$solde=$this->consultation($numcpt);
		if($solde!=Constantes::$NUM_COMPTE_INVALIDE)
		{
			if($solde>$montant)
			{
				$newSolde=$solde-$montant;
				$req=$this->base->prepare("update compte set solde=:n2  WHERE idCompte=:n1");
				$req->execute(array(
					':n1' => $numcpt,
					':n2' => $newSolde
				));
				return Constantes::$SUCCES;
			}else return Constantes::$NUM_COMPTE_INVALIDE;

		}else
			return Constantes::$SOLDE_INSUFFISANT;
	}

	function crediter($montant, $numcpt){
		$solde=$this->consultation($numcpt);
		if($solde!=Constantes::$NUM_COMPTE_INVALIDE){
			$newSolde=$solde+$montant;
			$req=$this->base->prepare("update compte set solde=:n2  WHERE idCompte=:n1");
			$req->execute(array(
				':n1' => $numcpt,
				':n2' => $newSolde
			));
			return Constantes::$SUCCES;
		}else{
			return Constantes::$NUM_COMPTE_INVALIDE;
		}

	}

	function transfert($numcpt, $numcptdest, $montant){
		$solde=$this->consultation($numcpt);
		if($solde!=Constantes::$NUM_COMPTE_INVALIDE)
		{
			$verification=$this->debiter($montant,$numcpt);
			
			if($verification==Constantes::$SUCCES)
			{
				$var=$this->crediter($montant, $numcptdest);
				if($var!=Constantes::$SUCCES) 
				{
					$this->crediter($montant, $numcpt);
					return Constantes::$ERREUR_TRANSFERT;
				}
				return Constantes::$SUCCES;
			}
			elseif ($verification==Constantes::$NUM_COMPTE_INVALIDE) return Constantes::$COMPTE_SOURCE_INVALIDE; 
			
			else return Constantes::$SOLDE_INSUFFISANT;
					
		}else return Constantes::$ERREUR_TRANSFERT;
			
	}
}

