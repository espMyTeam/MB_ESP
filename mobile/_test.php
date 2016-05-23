<?php
	
	//header("Access-Control-Request-Headers: Accept, Authorization, Content-Type, If-None-Match, Accept-language");
	//header("Access-Control-Allow-Headers: *");
	//header("Access-Control-Allow-Origin: *");
	header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Access-Control-Allow-Methods,Content-Type, Authorization, X-Requested-With,Access-Control-Allow-Credentials,Access-Control-Allow-Origin');
	header('Access-Control-Allow-Origin: ' . $_SERVER['HTTP_ORIGIN']);
   // header('Access-Control-Allow-Methods: GET, PUT, POST, DELETE, OPTIONS');
    //header('Access-Control-Max-Age: 1000');*/
    header('Access-Control-Allow-Credentials: true');
    
    
	$a = "bonjour";
	print_r($a);
?>
