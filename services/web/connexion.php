<?php
	require("config.php");
	$req = "mysql:host=" . HOSTNAME . ";dbname=" . BASENAME . "";
	$base="";
	try
	{
		$base = new PDO($req, USERNAME, PASSWORD);

		//echo "reussi";
	}catch(Exception $e){
		echo "erreur: " . $e->getMessage();
	}

	
	$req = "SET NAMES UTF8";
	try
	{
		$envoie=$base->prepare($req);
		$envoie->execute();

	}catch(Exception $e){
		echo "erreur : " . $e->getMessage();
	}
?>
