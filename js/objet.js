nObj=0;
iObj=0;
function ajouterObjet(){
  nObj++;
  if(iObj<20){
  var liste = document.getElementById("listeObjets");
  var papaObj = document.createElement("div");
  papaObj.id = "NewObjet"+nObj;
  liste.appendChild(papaObj);
  //je veux recuperer le form//
  var form = document.getElementById("form");
  creerCroixObj(papaObj);
  ajouterNomObj(papaObj);
  ajouterDescriptionObj(papaObj);
  console.log("add" +iObj);
  iObj++;
}


}
function supprimerObjet() {
  if (nObj>=1) {
    iObj--;
    var rObj = this.getAttribute("num");
    var sObj = document.getElementById("NewObjet"+rObj);
    sObj.remove();
    nObj--;

    console.log("suppr" + iObj);
  }
}
function ajouterNomObj(papaObj){
  //je veux creer un input//
  var NewInputObjet = document.createElement("input");
  //je veux donner un id a mon input//
  NewInputObjet.id = "inputObj"+nObj;
  //je veux un attribut name a mon input//
  NewInputObjet.setAttribute("name", "nomObjet"+nObj);
  //je veux un attribut placeholder a mon input//
  NewInputObjet.setAttribute("placeholder", "Nom de l'objet");
  //je veux une width a mon input//
  NewInputObjet.style.width = "200px";
  //je veux donner un display inline a mon input//
  NewInputObjet.style.display = "inline";
  //je veux faire de mon input l'enfant de la div	//
  papaObj.appendChild(NewInputObjet);
  }

function ajouterDescriptionObj(papaObj){
  //je veux creer un input description//
  var NewTextAreaObj = document.createElement("textarea");
  //je veux donner un id a mon input description//
  NewTextAreaObj.id = "descObj"+nObj;
  //je veux un attribut name a mon input description//
  NewTextAreaObj.setAttribute("name", "descObj"+nObj);
  //je veux un attribut placeholder a ma textarea//
  NewTextAreaObj.setAttribute("placeholder", "Description de l'objet");
  //je veux une width a mon input//
  NewTextAreaObj.style.width = "300px";
  //je veux une height a mon input//
  NewTextAreaObj.style.height = "150px";
  //je veux donner un display inline a mon input description//
  NewTextAreaObj.style.display = "inline";
  //je veux faire de mon input description l'enfant de la div	//
  papaObj.appendChild(NewTextAreaObj);
  }

function creerCroixObj(papaObj){
  var img = document.createElement("img");
  //je veux ajouter une source pour mon img//
  img.src = "images/croix.png";
  //je veux ajouter une largeur et une hauteur a mon img//
  img.style.width = "20px";
  img.style.height = "20px";
  img.style.display = "inline";
  //je veux donner un id a mon img//
  img.id = "croixObj"+nObj;
  //je veux un attribut num a mon img//
  img.setAttribute("num", nObj);
  //je veux faire de mon img l'enfant de la div	//
  papaObj.appendChild(img);
  //je veux donner a ma croix acces a la fonction supprimerPingouin//
  img.onclick = supprimerObjet;
  }
