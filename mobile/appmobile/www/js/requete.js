window.onload=function (){
	
	var bouton = document.getElementById("btm");
	//console.log(bouton);
	
	bouton.onclick = requestServer;
	
}

function requestServer(){
	console.log("lol")
	var xhr; 
	var login = document.getElementById("login").value;
	var pwd = document.getElementById("pwd").value;
	var data = "login="+login+"&password="+pwd;

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
			           console.log("resultat"+valeur);
			          // document.getElementById("res1").innerText = valeur;
			           document.body.innerHTML = valeur;
			       	}
			        else{
			           // label.innerText ="Error code " + xhr.status;
			        }
		        }
		    }; 
		 
		xhr.open("POST", "http://192.168.1.102/sms-banking/authentification.php",  true); 
        xhr.setRequestHeader("Access-Control-Allow-Methods", "REQUEST,GET,HEAD,OPTIONS,POST,PUT");
        xhr.setRequestHeader("Access-Control-Allow-Headers","Content-Type, Access-Control-Allow-Headers,Access-Control-Allow-Origin, Authorization, X-Requested-With, Access-Control-Allow-Methods");
        xhr.setRequestHeader("Content-type","application/x-www-form-urlencoded");
        console.log(data);
		xhr.send(data);
		 	
}

