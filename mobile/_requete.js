window.onload=function (){
	
	var bouton = document.getElementById("btm");
	//console.log(bouton);
	
	bouton.onclick = requestServer;
	
}

function requestServer(){
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

		    //xhr.setRequestHeader("Content-type","application/x-www-form-urlencoded");
			//xhr.setRequestHeader("crossDomain",true);
			//xhr.setRequestHeader("Access-Control-Allow-Origin", "https://)");
		 	//xhr.setRequestHeader("Access-Control-Allow-Credentials", true);
			xhr.open("GET", "http://localhost/mb_esp/mobile/test.php",  true); 
			//xhr.setRequestHeader("Access-Control-Allow-Origin", "*");
		//	xhr.setRequestHeader("Origin", "http://127.0.0.1/mb_esp/mobile/");

           xhr.setRequestHeader("Access-Control-Allow-Credentials", "true");
            xhr.setRequestHeader("Access-Control-Allow-Methods", "GET,HEAD,OPTIONS,POST,PUT");
         //   xhr.setRequestHeader("Access-Control-Request-Headers","accept, content-type");
         xhr.setRequestHeader("Access-Control-Allow-Headers","Content-Type, Access-Control-Allow-Headers,Access-Control-Allow-Origin, Authorization, X-Requested-With");
            xhr.setRequestHeader("Content-type","application/x-www-form-urlencoded");
			//xhr.setRequestHeader("Cross-domain","true");
			xhr.send(null);
		    
		    
		    xhr.onreadystatechange  = function() { 
		       if(xhr.readyState  == 4){
			       	
			       	
			       	
			        if(xhr.status  == 200) {
			        	var valeur = xhr.responseText;
			           console.log("resultat"+valeur);
			           
			       	}
			        else{
			           // label.innerText ="Error code " + xhr.status;
			        }
		        }
		    }; 
		 
		 	
            
			
			//console.log(xhr);
			
			//xhr.send(null); 


}

