nDe=0;
iDe=0;

function ajouterDe(){
  nDe++;
  if(iDe<16){
  var listeDe = document.getElementById("listeDes");
  var papaDe = document.createElement("div");
  papaDe.style.display = "inline";
  papaDe.id = "NewDe"+nDe;
  listeDe.appendChild(papaDe);
  //je veux recuperer le form//
  var form = document.getElementById("form");
  creerCroixDe(papaDe);
  ajouterNombreLances(papaDe);
  creerSpanDe(papaDe)
  ajouterValeur(papaDe);
  console.log("add" +iDe);
  iDe++;
}


}
function supprimerDe() {
  if (nDe>=1) {
    iDe--;
    var rDe = this.getAttribute("num");
    var sDe = document.getElementById("NewDe"+rDe);
        console.log(sDe);
    sDe.remove();
    nDe--;

    console.log("suppr" + iDe);
  }
}
function ajouterNombreLances(papaDe){
  //je veux creer un input//
  var NewInputDe = document.createElement("input");
  //je veux donner un id a mon input//
  NewInputDe.id = "Lance"+nDe;
  //je veux un attribut name a mon input//
  NewInputDe.setAttribute("name", "nombrelances"+nDe);
  //je veux un attribut name a mon input//
  NewInputDe.setAttribute("type", "number");
  //je veux un attribut name a mon input//
  NewInputDe.setAttribute("min", "1");
  //je veux un attribut name a mon input//
  NewInputDe.setAttribute("max", "100");
  //je veux un attribut placeholder a mon input//
  NewInputDe.setAttribute("placeholder", "Nombre de lances");
  //je veux une width a mon input//
  NewInputDe.style.width = "120px";
  //je veux donner un display inline a mon input// 
  NewInputDe.style.display = "inline";
  //je veux faire de mon input l'enfant de la div	//
  papaDe.appendChild(NewInputDe);
  }

function ajouterValeur(papaDe){
  //je veux creer un input description//
  var NewInputValeur = document.createElement("input");
  //je veux donner un id a mon input description//
  NewInputValeur.id = "Valeur"+nDe;
  //je veux un attribut name a mon input description//
  NewInputValeur.setAttribute("name", "Valeur"+nDe);
  //je veux un attribut placeholder a ma textarea//
  NewInputValeur.setAttribute("placeholder", "Valeur du de");
  //je veux un attribut name a mon input//
  NewInputValeur.setAttribute("type", "number");
  //je veux un attribut name a mon input//
  NewInputValeur.setAttribute("min", "2");
  //je veux un attribut name a mon input//
  NewInputValeur.setAttribute("max", "100");
  //je veux une width a mon input//
  NewInputValeur.style.width = "90px";
  //je veux donner un display inline a mon input description//
  NewInputValeur.style.display = "inline";
  //je veux faire de mon input description l'enfant de la div	//
  papaDe.appendChild(NewInputValeur);
  }

function creerSpanDe(papaDe){
  var span = document.createElement("span");
  span.style.display = "inline";
  span.style.margin = "0 10px";
  var newTextDe = document.createTextNode("d");
  span.appendChild(newTextDe);
  papaDe.appendChild(span);
}

function creerCroixDe(papaDe){
	console.log("oui");
  var img = document.createElement("img");
  //je veux ajouter une source pour mon img//
  img.src = "images/croix.png";
  //je veux ajouter une largeur et une hauteur a mon img//
  img.style.width = "20px";
  img.style.height = "20px";
  img.style.display = "flex";
  //je veux donner un id a mon img//
  img.id = "croixDe"+nDe;
  //je veux un attribut num a mon img//
  img.setAttribute("num", nDe);
  //je veux faire de mon img l'enfant de la div	//
  papaDe.appendChild(img);
  //je veux donner a ma croix acces a la fonction supprimerPingouin//
  img.onclick = supprimerDe;
  }
