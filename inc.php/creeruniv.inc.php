<?php
if(defined("constante")){
	if(isset($_POST['univers'])){
		$_SESSION['currentuniv'] = $_POST['univers'];
		echo'<script>localStorage.clear();</script>';
		$req = mysqli_query($_SESSION["mysqli"], 'SELECT * FROM univers WHERE univers_id = '.$_SESSION["currentuniv"].';');
		while($univ = $req->fetch_assoc()){
			$unid = $univ['univers_id'];
			$nom = $univ['univers_nom'];
			$description = $univ['univers_desc'];
		}
	}
	echo'<div id="body_cre">';
	include('header.php');
	echo'
	<div id="contenu_creuniv"><div id="contenu_creuniv_cadre">
		<div id="contenu_creuniv_form">

			<form id="univform" method="post" action="" enctype="multipart/form-data">
					<h1>Créer un Univers</h1>
						<div id="nomEtImage">
				<div id="nom">
        <label>Nom:</label>
          <input type="text" name="nomuniv" class="aligne input" id="nomuniv" placeholder="Nom de l&apos;univers" value="'.$nom.'">
          <input type="hidden" name="univers" value="'.$unid.'">
        </div>
				<div id="droite">
					<label class="profile_pic">
					<div class="box"><p>+ UNE IMAGE</p>
						<input tabindex="0" type="file" class="input" name="prof_pic" style="display:none">
					</div>
					</label>
				</div>
				</div>
				<div>
					<label >Description:</label>
				</div>
        <div >
				 <textarea name="univdesc" id="description" rows="5" cols="50" maxlength="512" placeholder="Décrivez votre univers...">'.$description.'</textarea><br>

					</div>
					<label>Tags de votre univers:</label>
					<div class="container">
					  <div class="tag-container">
					    <input name="tags" onkeypress="return bar(event)">
					    <script type="text/javascript">
					function bar(evt){
					return (evt.keyCode||evt.which) != 13;
					}
					</script>
					  </div>

					</div>

				 <script src="js/de.js"></script>
					<div class="AddRemove" onclick="ajouterDe()">Ajouter un dé</div>
					<div>
					<ul id="listeDes">
					</ul>
					</div>

		<script src="js/classe.js"></script>
		<div class="AddRemove" onclick="ajouterClasse()">Ajouter une classe</div>
          <div>
		<ul id="listeClasses">
		</ul>
		</div>
		<script src="js/race.js"></script>
		<div class="AddRemove" onclick="ajouterRace()">Ajouter une race</div>
          <div>
		<ul id="listeRaces">
		</ul>
		</div>
		<script src="js/objet.js"></script>
		<div class="AddRemove" onclick="ajouterObjet()">Ajouter un objet</div>
          <div>
		<ul id="listeObjets">
		</ul>
		</div>
					<div id="EnvoyerEtReset">
						<input tabindex="0" type="reset" name="reset" class="input" value="Reset" id="reset">
				<label>
							<input tabindex="0" type="submit" class="input" name="submit" value="Enregistrer">
					<input tabindex="0" type="hidden" name="length" value="5">
					</label>
				</div>
			</form>
          </div>
				</div>


     </div>

		 <script>
		 const tagContainer = document.querySelector(".tag-container");
		 const taginput = document.querySelector(".tag-container input");
		 var univform = document.getElementById("univform");
		 getinputs();

		addrembtn = document.getElementsByClassName("AddRemove");
		 for(var i=0;i<addrembtn.length;i++){
				console.log(addrembtn[i]);
				addrembtn[i].addEventListener("click", getinputs, false);
			}
		 function getinputs(){
			input = document.querySelectorAll("input");
			textarea = document.querySelectorAll("textarea");
			input = Array.from(input).concat(Array.from(textarea));
			for(var i=0;i<input.length;i++){
				input[i].addEventListener("change", function(e){ setTimeout( function(input){ console.log(e.srcElement); provisave(e.srcElement); }, 10); }, false);
				input[i].addEventListener("click", inputclick, false);
				if(typeof(localStorage.getItem(input[i].getAttribute("name")))!="undefined" && localStorage.getItem(input[i].getAttribute("name")) != null){
					if(input[i].nodeName == "TEXTAREA"){
						console.log(input[i]);
						console.log(localStorage.getItem(input[i].getAttribute("name")));
						input[i].innerText = localStorage.getItem(input[i].getAttribute("name"));
					}else{
						console.log(input[i]);
						console.log(localStorage.getItem(input[i].getAttribute("name")));
						input[i].setAttribute("value", localStorage.getItem(input[i].getAttribute("name")));
					}
				}
			}
		 }
		 
		 function inputclick(e){
			 if(this.getAttribute("name")=="submit"){
				 e.preventDefault();
				var data = new FormData(univform);
				var request = new XMLHttpRequest();
				request.onreadystatechange = function () {
				   if (request.readyState === 4) {
					   var results = request.responseText;
					  console.log(results);
					  console.log(request.responseText);
					  if(typeof(results)!="undefined" && results != ""){
						localStorage.clear();
						currentloc = document.location.href;
						console.log(currentloc.substring(0, currentloc.lastIndexOf( "=" )+1)+"creer")
						document.location.replace(currentloc.substring(0, currentloc.lastIndexOf( "=" )+1)+"explorer&unid="+results);
					  }
				   }
				}
				request.open("POST", "https://www.unidice.fr/UnidiceTest/inc.php/foreign/subuniv.inc.php", true);
				request.setRequestHeader("X-Requested-With", "xmlhttprequest");
				request.send(data);
			 }
		 }
		 
		 function provisave(input){
			 console.log(input.getAttribute("name"));
			 if(input.getAttribute("name")!=("submit" || "reset")){
			 console.log(input.value);
				if(input.getAttribute("name")=="tags"){
					var tags = input.parentElement.getElementsByClassName("tag");
						console.log(tags);
					for(var i=0;i<tags.length;i++){
						console.log(tags[i].children[0]);
						console.log(tags[i].children[2]);
						localStorage.setItem(tags[i].children[2].getAttribute("name"), tags[i].children[0].innerText);
						console.log(localStorage);
					}
				}else{
					 localStorage.setItem(input.getAttribute("name"), input.value);
					 console.log(localStorage);
				}
			 }
		 }

		 let tags = [];
		 var nbTag = 0;
		 var nbAj = 0;


			 function createTag(label) {
				 if(nbAj < 10){
			   const div = document.createElement("div");
			   div.setAttribute("class", "tag");
			   const span = document.createElement("span");
				 span.setAttribute("class", "nomTag");
			   span.innerHTML = label;
				 const sendData = document.createElement("input");
				 sendData.setAttribute("type", "hidden");
				 sendData.setAttribute("tabindex", "0");
				 	sendData.setAttribute("name", "tagchain"+nbTag);
				 sendData.setAttribute("value", label);
			   const closeIcon = document.createElement("i");
			   closeIcon.innerHTML = "close";
			   closeIcon.setAttribute("class", "material-icons");
			   closeIcon.setAttribute("data-item", label);
			   div.appendChild(span);
			   div.appendChild(closeIcon);
				 div.appendChild(sendData);
				 nbTag++;
				 getinputs();
			   return div;
			 }
			 }

			 function clearTags() {
			   document.querySelectorAll(".tag").forEach(tag => {
			     tag.parentElement.removeChild(tag);
			   });
			   getinputs();
			 }


				 function addTags() {
						 console.log(nbAj);
					 if(nbAj < 10){
				 clearTags();
				   tags.slice().reverse().forEach(tag => {
				     tagContainer.prepend(createTag(tag));
				   });
				 }else{
		 nbAj = 9;
					 console.log("hop plus de tags");
				 }
				 getinputs();
				 }


			 taginput.addEventListener("keyup", (e) => {
			     if (e.key === "Enter") {
						 nbTag = 0;
						 if(nbAj < 10){
			       e.target.value.split(",").forEach(tag => {
			         tags.push(tag);

			       });
					 }
			       addTags();
			       taginput.value = "";
						 nbAj++;
			     }else if(e.key === " "){
					 delay = setTimeout(function(){
						 document.addEventListener("keydown", function scndspace(ev){
						if(ev.key === " "){
						nbTag = 0;
						 if(nbAj < 10){
						   ev.target.value.split(",").forEach(tag => {
							 tags.push(tag);

						   }, false);
							 }
						   addTags();
						   taginput.value = "";
								 nbAj++;
								 
										
						}
						document.removeEventListener("keydown", scndspace, false);
								 });
						clearTimeout(delay);
								 }, 1);
					
						
				 }
				 
				 
			 });
			 document.addEventListener("click", (e) => {

			   console.log(e.target.tagName);
			   if (e.target.tagName === "I") {
					 nbTag = 0;
 				 nbAj--;
			     const tagLabel = e.target.getAttribute("data-item");
			     const index = tags.indexOf(tagLabel);
			     tags = [...tags.slice(0, index), ...tags.slice(index+1)];
			     addTags();
			   }
			 })

		 taginput.focus(); 

		 </script>';
		 
		 	 include("footer.php");
		 	 	}
		 else die("");
?>
