
	<?php

		header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Access-Control-Allow-Methods,Content-Type, Authorization, X-Requested-With,Access-Control-Allow-Credentials,Access-Control-Allow-Origin');
		header('Access-Control-Allow-Origin: ' . $_SERVER['HTTP_ORIGIN']);
		header('Access-Control-Allow-Credentials: true');
		header('Access-Control-Allow-Methods:REQUEST, GET, POST');


		//$_POST['login'] = "kama";
		//$_POST['password'] = "passer";


		if(isset($_POST['numCompte'])){

			$numCompte=$_POST['numCompte'];


			require("connexion.php");
    		require ("classes.php");


    		$bdd = new Base($base);
        	$retour=$bdd->consulter($numCompte);
    
        	if($retour!=NULL){
        		echo "<br><br><div align=\"center\"><h2> Votre compte decouvert est: </h2> " . $retour[2] . "</div>";
				echo "<br><br><div align=\"center\"><h2> Le solde de votre compte est: </h2> " . $retour[1] . "</div>";
				echo "<br><br><div align=\"center\"><h2> type compte est: </h2>" . $retour[3] . "</div>";
				//echo "<form action= \"consulterSolde.html\"method=REQUEST><br><input type=\"submit\" value=\"SUIVANT\">";
        	}else 
        		echo "<br><br><div align=\"center\"><h2><font color=\"red\"><blink>LOGIN OU MOT DE PASSE INCORRECT</blink>
				</font></h2><form action=\"index.html\" method=POST><input type=\"submit\" value=\"RETOUR\">";
		}
		
	?>

