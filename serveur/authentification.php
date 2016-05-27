
	<?php

		header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Access-Control-Allow-Methods,Content-Type, Authorization, X-Requested-With,Access-Control-Allow-Credentials,Access-Control-Allow-Origin');
		header('Access-Control-Allow-Origin: ' . $_SERVER['HTTP_ORIGIN']);
		header('Access-Control-Allow-Credentials: true');
		header('Access-Control-Allow-Methods:REQUEST, GET, POST');


		$login=$_POST['login'];
		echo "$login";
		$password=$_POST['password'];
		mysql_connect('localhost','root','admin');
		mysql_select_db('sms_banking');
		$req="select login,password,Type_Profil from utilisateurs where login='$login' and password='$password'";
		$rs=mysql_query($req);
		$row=mysql_fetch_row($rs);
		$log=$row[0];
		echo "$log";
		$pas=$row[1];
		$profil=$row[2];

		if($log!=NULL && $pas!=NULL){
			if($profil == "client"){
				echo "<br><br><div align=\"center\"><h2><font color=\"green\">AUTHENTIFICATION REUSSIE</font></h2>";
				echo "<form action= \"client.html\"method=REQUEST><br><input type=\"submit\" value=\"SUIVANT\">";
			}
			else echo "<br><br><div align=\"center\"><h2><font color=\"red\"><blink>LOGIN OU MOT DE PASSE INCORRECT</blink>
			</font></h2><form action=\"index.php\" method=POST><input type=\"submit\" value=\"RETOUR\">";
		}

		else echo "<br><br><div align=\"center\"><h2><font color=\"red\"><blink>LOGIN OU MOT DE PASSE INCORRECT</blink>
		</font></h2><form action=\"index.php\" method=POST><input type=\"submit\" value=\"RETOUR\">";
	?>

