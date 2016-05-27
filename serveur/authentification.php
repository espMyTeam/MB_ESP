
	<?php

		header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Access-Control-Allow-Methods,Content-Type, Authorization, X-Requested-With,Access-Control-Allow-Credentials,Access-Control-Allow-Origin');
		header('Access-Control-Allow-Origin: ' . $_SERVER['HTTP_ORIGIN']);
		header('Access-Control-Allow-Credentials: true');
		header('Access-Control-Allow-Methods:REQUEST, GET, POST');


		//$_POST['login'] = "kama";
		//$_POST['password'] = "passer";

		if(isset($_POST['login']) && isset($_POST['password'])){

			$login=$_POST['login'];
			$password=$_POST['password'];


			require("connexion.php");
    		require ("classes.php");


    		$bdd = new Base($base);
        	$retour=$bdd->authentifier($login, $password);

        	if($retour!=NULL){
        		if($retour[2] == "client"){
					echo "<br><br><div align=\"center\"><h2><font color=\"green\">AUTHENTIFICATION REUSSIE $retour[0]</font></h2>";
					echo "<form action= \"client.html\"method=REQUEST><br><input type=\"submit\" value=\"SUIVANT\">";
				}
				else echo "<br><br><div align=\"center\"><h2><font color=\"red\"><blink>LOGIN OU MOT DE PASSE INCORRECT</blink>
				</font></h2><form action=\"index.html\" method=POST><input type=\"submit\" value=\"RETOUR\">";
        	}else 
        		echo "<br><br><div align=\"center\"><h2><font color=\"red\"><blink>LOGIN OU MOT DE PASSE INCORRECT</blink>
				</font></h2><form action=\"index.html\" method=POST><input type=\"submit\" value=\"RETOUR\">";
		}
		
	?>

