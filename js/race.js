nRac=0;
iRac=0;
function ajouterRace(){
  nRac++;
  if(iRac<20){
  var liste = document.getElementById("listeRaces");
  var papaRace = document.createElement("div");
  papaRace.id = "NewRace"+nRac;
  liste.appendChild(papaRace);
  //je veux recuperer le form//
  var form = document.getElementById("form");
  creerCroixRace(papaRace);
  ajouterNomRace(papaRace);
  ajouterDescriptionRace(papaRace);
  console.log("add" +iRac);
  iRac++;
}


}
function supprimerRace() {
  if (nRac>=1) {
    iRac--;
    var rRac = this.getAttribute("num");
    var sRac = document.getElementById("NewRace"+rRac);
	console.log(sRac);
    sRac.remove();
    nRac--;

    console.log("suppr" + iRac);
  }
}
function ajouterNomRace(papaRace){
  //je veux creer un input//
  var NewInputRace = document.createElement("input");
  //je veux donner un id a mon input//
  NewInputRace.id = "inputRace"+nRac;
  //je veux un attribut name a mon input//
  NewInputRace.setAttribute("name", "nomRace"+nRac);
  //je veux un attribut placeholder a mon input//
  NewInputRace.setAttribute("placeholder", "Nom de la race");
  //je veux une width a mon input//
  NewInputRace.style.width = "200px";
  //je veux donner un display inline a mon input//
  NewInputRace.style.display = "inline";
  //je veux faire de mon input l'enfant de la div	//
  papaRace.appendChild(NewInputRace);
  }

function ajouterDescriptionRace(papaRace){
  //je veux creer un input description//
  var NewTextAreaRace = document.createElement("textarea");
  //je veux donner un id a mon input description//
  NewTextAreaRace.id = "descRac"+nRac;
  //je veux un attribut name a mon input description//
  NewTextAreaRace.setAttribute("name", "descRace"+nRac);
  //je veux un attribut placeholder a ma textarea//
  NewTextAreaRace.setAttribute("placeholder", "Description de la race");
  //je veux une width a mon input//
  NewTextAreaRace.style.width = "300px";
  //je veux une height a mon input//
  NewTextAreaRace.style.height = "150px";
  //je veux donner un display inline a mon input description//
  NewTextAreaRace.style.display = "inline";
  //je veux faire de mon input description l'enfant de la div	//
  papaRace.appendChild(NewTextAreaRace);
  }

function creerCroixRace(papaRace){
	console.log("oui");
  var img = document.createElement("img");
  //je veux ajouter une source pour mon img//
  img.src = "images/croix.png";
  //je veux ajouter une largeur et une hauteur a mon img//
  img.style.width = "20px";
  img.style.height = "20px";
  img.style.display = "inline";
  //je veux donner un id a mon img//
  img.id = "croixRac"+nRac;
  //je veux un attribut num a mon img//
  img.setAttribute("num", nRac);
  //je veux faire de mon img l'enfant de la div	//
  papaRace.appendChild(img);
  //je veux donner a ma croix acces a la fonction supprimerPingouin//
  img.onclick = supprimerRace;
  
  }
