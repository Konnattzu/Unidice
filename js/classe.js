n=0;
i=0;
function ajouterClasse(){
  n++;
  if(i<20){
  var liste = document.getElementById("listeClasses");
  var papa = document.createElement("div");
  papa.id = "NewClasse"+n;
  liste.appendChild(papa);
  //je veux recuperer le form//
  var form = document.getElementById("form");
  creerCroix(papa);
  ajouterNom(papa);
  ajouterDescription(papa);
  console.log("add" +i);
  i++;
}


}
function supprimerClasse() {
  if (n>=1) {
    i--;
    var r = this.getAttribute("num");
    var s = document.getElementById("NewClasse"+r);
    s.remove();
    n--;

    console.log("suppr" + i);
  }
}
function ajouterNom(papa){
  //je veux creer un input//
  var NewInput = document.createElement("input");
  //je veux donner un id a mon input//
  NewInput.id = "input"+n;
  //je veux un attribut name a mon input//
  NewInput.setAttribute("name", "nomClasse"+n);
  //je veux un attribut placeholder a mon input//
  NewInput.setAttribute("placeholder", "Nom de la classe");
  //je veux une width a mon input//
  NewInput.style.width = "200px";
  //je veux donner un display inline a mon input//
  NewInput.style.display = "inline";
  //je veux faire de mon input l'enfant de la div	//
  papa.appendChild(NewInput);
  }

function ajouterDescription(papa){
  //je veux creer un input description//
  var NewTextArea = document.createElement("textarea");
  //je veux donner un id a mon input description//
  NewTextArea.id = "desc"+n;
  //je veux un attribut name a mon input description//
  NewTextArea.setAttribute("name", "descClasse"+n);
  //je veux un attribut placeholder a ma textarea//
  NewTextArea.setAttribute("placeholder", "Description de la classe");
  //je veux une width a mon input//
  NewTextArea.style.width = "300px";
  //je veux une height a mon input//
  NewTextArea.style.height = "150px";
  //je veux donner un display inline a mon input description//
  NewTextArea.style.display = "inline";
  //je veux faire de mon input description l'enfant de la div	//
  papa.appendChild(NewTextArea);
  }

function creerCroix(papa){
  var img = document.createElement("img");
  //je veux ajouter une source pour mon img//
  img.src = "images/croix.png";
  //je veux ajouter une largeur et une hauteur a mon img//
  img.style.width = "20px";
  img.style.height = "20px";
  img.style.display = "inline";
  //je veux donner un id a mon img//
  img.id = "croix"+n;
  //je veux un attribut num a mon img//
  img.setAttribute("num", n);
  //je veux faire de mon img l'enfant de la div	//
  papa.appendChild(img);
  //je veux donner a ma croix acces a la fonction supprimerPingouin//
  img.onclick = supprimerClasse;
  }
