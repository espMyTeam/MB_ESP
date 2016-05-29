window.onload=function (){
	
		//verifier s'il y'a une notification à recevoir
		setInterval(function(){
			//requestServer("request", "demande_notification.php");
			
		},
		10000
	);
	
}


function comptePackSimple(){
	var div_pack = document.getElementById("divPackSimple");
	var div_compte = document.getElementById("divCompteSimple");
	div_pack.type = "hidden";
	div_compte.type = "show";

	//recuperer le numero du compte à l'appui du bouton valider
	var btm = document.getElementById("btnPackSimple");
	var numCompte = document.getElementById("numCompteSimple").value;
	btm.onclick = requestServer("pack=simple&compte="+numCompte, "acheterPack.php", function(){

	});
}

function comptePackPreminium(){
	var pack = document.getElementById("btnPackPreminium");
}

function comptePackGold(){
	var pack = document.getElementById("btnPackGold");
}


/*
	authentification du client
*/
function sauthentifier(){
	var login = document.getElementById("login").value;
	var pwd = document.getElementById("password").value;
	var data = "login="+login+"&password="+pwd;

	//pour le débugage: admin et admin (juste pour la présentation)
	if(login=="admin" && pwd=="admin"){
		document.location.href="client.html";
	}else{
			requestServer(data, "authentification.php", function(){

		});
	}

	
}

function consulterSolde(){
	console.log("lslksks,")
	var compte = document.getElementById("numCompte").value;
	var data = "numCompte="+compte;
	requestServer(data, "consulterSolde.php", function(){

	});

}

/*
	transferer du credit compte à compte
*/
function transfert(){
	var source = document.getElementById("numCompte1").value;
	var dest = document.getElementById("numCompte2").value;
	var code = document.getElementById("codeSecret").value;
	var montant = document.getElementById("montant").value;
	var data = "source="+source+"&dest="+dest+"&code="+code+"&montant="+montant;
	requestServer(data, "transfert.php");
}

/*
	Approuver le pack
*/
function approuver_check(){
	var compte = document.getElementById("numCompte").value;
	var data = "compte="+compte;
	requestServer(data, "trait_approuvercheck.php");
}

/*
	notification de mouvement
*/
function notification(){
	var quetsion = 6;
}

/*
	verifier le pack
*/
function verifier_pack(){

}

function acheter_pack(){

}

function se_desabonner(){

}

function callback_authen(){

}

function callback_transfert(){

}

function callback_pack(){

}


function requestServer(data, page, callback){
	var xhr; 

		    try {  
		    	xhr = new ActiveXObject('Msxml2.XMLHTTP');   
		  
		    }catch (e) {
		        try {   
		        	xhr = new ActiveXObject('Microsoft.XMLHTTP'); 
		        }
		        catch (e2) {
		           try {  
		           	xhr = new XMLHttpRequest();  
		           }
		           catch(e3) {  
		           	xhr = false;
		           }
		        }
		    }

		    if(xhr!=null){
		  		xhr.followsRedirect=false;          
         	   xhr.withCredentials=true;
        	}

		    
		    xhr.onreadystatechange  = function() { 
		       if(xhr.readyState  == 4){
			       	
			        if(xhr.status  == 200) {
			        	var valeur = xhr.responseText;
			           
			          // document.getElementById("res1").innerText = valeur;
			           document.body.innerHTML = valeur;
			       	}
			        else{
			           // label.innerText ="Error code " + xhr.status;
			        }
		        }
		    }; 
		 
		xhr.open("POST", "http://192.168.1.110/mb_esp/serveur/"+page,  true); 
        xhr.setRequestHeader("Access-Control-Allow-Methods", "REQUEST,GET,HEAD,OPTIONS,POST,PUT");
        xhr.setRequestHeader("Access-Control-Allow-Headers","Content-Type, Access-Control-Allow-Headers,Access-Control-Allow-Origin, Authorization, X-Requested-With, Access-Control-Allow-Methods");
        xhr.setRequestHeader("Content-type","application/x-www-form-urlencoded");
       // console.log(data);
		xhr.send(data);
		 	
}

