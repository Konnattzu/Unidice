<?php
if(defined("constante")){
	if(isset($_POST['scenario'])){
		$_SESSION['currentscenar'] = $_POST['scenario'];
		echo'<script>localStorage.clear();</script>';
		$req = mysqli_query($_SESSION["mysqli"], 'SELECT * FROM scenarii WHERE scenario_id = '.$_SESSION["currentscenar"].';');
		while($scenar = $req->fetch_assoc()){
			$sid = $scenar['scenario_id'];
			$nom = $scenar['scenario_nom'];
			$description = $scenar['scenario_desc'];
		}
	}
	echo'<div id="body_cre">';
	include('header.php');
	if(isset($_POST['univ'])){
		$req = mysqli_query($_SESSION["mysqli"], 'SELECT * FROM univers WHERE univers_id='.$_POST["univ"].';');
        while($univ = $req->fetch_assoc()){
					$_SESSION["currentuniv"] = $univ;
		}
	}

	echo'
	<div id="contenu_creuniv">
	<a href="index.php?ref=listescenarii"><div class="return"><p>Retour</p></div></a><div id="contenu_creuniv_cadre">
		<div id="contenu_creuniv_form">

			<form method="post" action="" id="scenarform" enctype="multipart/form-data">
					<h1>Créer un scénario</h1>
					<h2>'.$_SESSION['currentuniv']['univers_nom'].'</h2>
						<div id="nomEtImage">
				<div id="nom">
        <label>Nom:</label>
          <input type="text" name="nomscenar" class="aligne input" id="nomscenar" placeholder="Nom du scénario" value="'.$nom.'">
          <input type="hidden" name="scenario" value="'.$sid.'">
        </div>
				<div id="droite">
					<label class="profile_pic">
					<div class="box"><p>+ UNE IMAGE</p>
						<input type="file" class="input" name="prof_pic" style="display:none">
					</div>
					</label>
				</div>
				</div>
				<div>
					<label >Description:</label>
				</div>
        <div >
				 <textarea name="scenardesc" id="description" rows="5" cols="50" maxlength="512" placeholder="Pitchez votre scénario...">'.$description.'</textarea><br>

					</div>
					<label>Tags de votre scénario:</label>
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
		<div class="AddRemove" onclick="ajouterEtape()">Ajouter une étape</div>
          <div>
		<ul id="listeEtapes">
		</ul>
		</div>
					<div id="EnvoyerEtReset">
						<input type="reset" class="input" value="Reset" id="reset">
				<label>
							<input type="submit" class="input" name="submit" value="Enregistrer">
					<input type="hidden" name="length" value="5">
					</label>
				</div>
		</div>
			</form>
          </div>


     
		 <script src="js/ajetape.js">
			
		</script>
		 <script>
		const tagContainer = document.querySelector(".tag-container");
		 const taginput = document.querySelector(".tag-container input");
		 var scenarform = document.getElementById("scenarform");
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
				var data = new FormData(scenarform);
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
				request.open("POST", "https://www.unidice.fr/UnidiceTest/inc.php/foreign/subscenar.inc.php", true);
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
			   return div;
			 }
			 }

			 function clearTags() {
			   document.querySelectorAll(".tag").forEach(tag => {
			     tag.parentElement.removeChild(tag);
			   });
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
				 }


			 input.addEventListener("keyup", (e) => {

			     if (e.key === "Enter") {
						 nbTag = 0;
						 if(nbAj < 10){
			       e.target.value.split(",").forEach(tag => {
			         tags.push(tag);

			       });
					 }
			       addTags();
			       input.value = "";
						 nbAj++;
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

		 input.focus();

		 </script>';
		 
		 	 include("footer.php");
			 echo'</div></div>';
		 	 	}
		 else die("");
?>
