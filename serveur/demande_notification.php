<?php

		header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Access-Control-Allow-Methods,Content-Type, Authorization, X-Requested-With,Access-Control-Allow-Credentials,Access-Control-Allow-Origin');
		header('Access-Control-Allow-Origin: ' . $_SERVER['HTTP_ORIGIN']);
		header('Access-Control-Allow-Credentials: true');
		header('Access-Control-Allow-Methods:REQUEST, GET, POST');


		if(isset($_POST['source']) && isset($_POST['dest']) && isset($_POST['montant']) && isset($_POST['code'])){
			$code = $_POST['code'];
			$source = $_POST['source'];
			$dest = $_POST['dest'];
			$montant = $_POST['montant'];

			mysql_connect('localhost','root','admin');
			mysql_select_db('sms_banking');
			$req="SELECT  FROM compte WHERE codeSecret='$code' AND idCompte='$source'";
			$rs=mysql_query($req);
			$row_source=mysql_fetch_row($rs);

			$req="SELECT idCompte,codeSecret,solde,decouverte,typeCompte,idClient,idGerant FROM compte WHERE idCompte='$dest'";
			$rs=mysql_query($req);
			$row_dest=mysql_fetch_row($rs);

			if(isset($row_source[0]) && $row_source[0] != ""){ //si le compte source existe bien et le code secret correct

				if(isset($row_dest[0]) && $row_dest[0] != ""){  //si le compte destinataire n'existe pas

					if(double($row_source[2])>=$montant){ //si le transfert est bien possible

						$montant_source = double($row_source[2]);
						$montant_dest = double($row_dest[2]);
						$source = $row_source[0];
						$dest = $row_dest[0];

						//effectuer le transfert
						$montant_source -= $montant;
						$montant_dest += $montant;

						//mise à jour de la base de données
						$req="UPDATE compte SET solde='$montant_source' WHERE idCompte='$source'";
						$rs=mysql_query($req);
						$req="UPDATE compte SET solde='$montant_dest' WHERE idCompte='$dest'";
						$rs=mysql_query($req);


							
					}else{

					}

				}else{

				}

			}else{ //le compte source n'existe pas ou le code secret est incorrect

			}
			
			
			
		}
		

?>

