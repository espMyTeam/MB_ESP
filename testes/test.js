function comptePackSimple(){
	var div_pack = document.getElementById("div_pack");
	var div_compte = document.getElementById("div_compte");
	div_pack.type = "hidden";
	div_compte.type = "show";

	//recuperer le numero du compte à l'appui du bouton valider
	var btm = document.getElementById("btnPackSimple");
	var numCompte = document.getElementById("numCompteSimple").value;
	btm.onclick = requestServer("pack=simple&compte="+numCompte, "trait_pack.php", function(){

	});
}

function comptePackPreminium(){
	var pack = document.getElementById("btnPackPreminium");
}

function comptePackGold(){
	var pack = document.getElementById("btnPackGold");
}