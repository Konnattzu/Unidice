<?php
if(defined("constante")){
	if(isset($_POST['personnage'])){
		$_SESSION['currentperso'] = $_POST['personnage'];
		echo'<script>localStorage.clear();</script>';
		$req = mysqli_query($_SESSION["mysqli"], 'SELECT * FROM personnages WHERE perso_id = '.$_SESSION["currentperso"].';');
		while($perso = $req->fetch_assoc()){
			$pid = $perso['perso_id'];
			$nom = $perso['perso_nom'];
			$description = $perso['perso_desc'];
			$_SESSION['currentuniv'] = $perso['perso_univers'];
		}
	}
	echo'<div id="body_cre">';
	include('header.php');
echo"<div id='contenu_cre'><div id='contenu_cre_cadre'><div id='contenu_cre_form'>";
if(isset($_POST['univ'])){
	$_SESSION['currentuniv'] = $_POST['univ'];
}
$outrange = false;

	
if(isset($_SESSION['currentuniv'])){
	$req = mysqli_query($mysqli, 'SELECT * FROM univers WHERE univers_id="'.$_SESSION['currentuniv'].'";');
	$univ = array();
	$k=0;
	while($result = $req->fetch_assoc()){
		$univid = $result['univers_id'];
		$univnom = $result['univers_nom'];
		
	}
       echo' <form action="" method="post" id="persoform" enctype="multipart/form-data">
						<h1>Créer un personnage</h1><h2>'.$univnom.'</h2>
				<div id="nom">
        <label>Nom:</label>
          <input type="text" name="nomperso" id="nomperso" value="'.$nom.'">
          <input type="hidden" name="personnage" value="'.$pid.'">
        </div>
        <div id="titre">
          <label id="titre-avatar">Avatar: </label><label id="titre-description">Description:</label>
        </div>
        <div id="ppEtDesc">
        <div id="gauche">
          <label class="profile_pic">
          <div class="box">';
		  $default_img = "'images/aj_photo.png'";
            echo'<img src="" alt="Your character&apos;s image" onerror="this.onerror=null; this.src='.$default_img.'">
            <input type="file" name="prof_pic" style="display:none">
          </div>
          </label>
        </div>
        <div id="droite">
          <textarea name="persodesc" id="description" rows="5" cols="50" maxlength="512" placeholder="Décrivez votre personnage...">'.$description.'</textarea><br>

          <ul>
            <li>
            <label>Race: </label>
            <select name="race" id="race-select">
              <option value="">--Choisir une race--</option>';
			  
			  $req1 = mysqli_query($mysqli, 'SELECT * FROM univers_race WHERE univers_id='.$univid.';');
			while($result = $req1->fetch_assoc()){
				$req2 = mysqli_query($mysqli, 'SELECT * FROM races WHERE race_id='.$result['race_id'].';');
				while($race = $req2->fetch_assoc()){
					
					$racebonus = "";
					
					$req4 = mysqli_query($mysqli, 'SELECT * FROM bonus WHERE bonus_id='.$race['race_bonus'].';');
					while($bonus = $req4->fetch_assoc()){
						$req3 = mysqli_query($mysqli, 'SELECT * FROM carac_races WHERE race_id='.$race['race_id'].' AND base_carac=1;');
						while($caracrace = $req3->fetch_assoc()){
							if(isset($racebonus)&&($racebonus != "")){
								$racebonus .= ", ";
							}
						
							$req5 = mysqli_query($mysqli, 'SELECT * FROM caracteristiques WHERE carac_id='.$caracrace['carac_id'].';');
							while($caracs = $req5->fetch_assoc()){
								$carac = $caracs;
							}
							$racebonus .= $bonus["bonus_type"];
							$racebonus .= $bonus["bonus_valeur"]." ";
							$racebonus .= $carac["carac_short"];
						}
					}
					echo'<option value="'.$race['race_id'].'">'.$race['race_nom'].' ('.$racebonus.')</option>';
				}
			}
            echo'</select>
            </li>
            <li>
            <label>Classe:</label>
            <select name="classe" id="classe-select" >
              <option value="">--Choisir une classe--</option>';
			  $req1 = mysqli_query($mysqli, 'SELECT * FROM univers_classe WHERE univers_id='.$univid.';');
				while($result = $req1->fetch_assoc()){
					$req2 = mysqli_query($mysqli, 'SELECT * FROM classes WHERE classe_id='.$result['classe_id'].';');
					while($classe = $req2->fetch_assoc()){
						$classebonus = "";
						$req4 = mysqli_query($mysqli, 'SELECT * FROM bonus WHERE bonus_id='.$classe['classe_bonus'].';');
						while($bonus = $req4->fetch_assoc()){
							$req3 = mysqli_query($mysqli, 'SELECT * FROM carac_classes WHERE classe_id='.$classe['classe_id'].' AND base_carac=1;');
							while($caracclasse = $req3->fetch_assoc()){
								if(isset($classebonus)&&($classebonus != "")){
									$classebonus .= ", ";
								}
							
								$req5 = mysqli_query($mysqli, 'SELECT * FROM caracteristiques WHERE carac_id='.$caracclasse['carac_id'].';');
								while($caracs = $req5->fetch_assoc()){
									$carac = $caracs;
								}
								$classebonus .= $bonus["bonus_type"];
								$classebonus .= $bonus["bonus_valeur"]." ";
								$classebonus .= $carac["carac_short"];
							}
						}
						echo'<option value="'.$classe['classe_id'].'" >'.$classe['classe_nom'].' ('.$classebonus.')</option>
						';
						
					}
				}
            echo'</select>
			</li>
            <li>
            <label>Age:</label>
            <input type="number" name="age" id="age" min="1" max="1000">
            </li>
            <li>
            <label>Taille:</label>
            <input type="number" name="taille" step=".01" id="taille" min="1" max="20">
            <label>(en m)</label>
            </li>
            <li>
              <label>Poids:</label>
              <input type="number" name="poids" step=".01" id="poids" min="0" max="300">
              <label>(en kg)</label>
            </li>
          </ul>
          </div>
        </div>
        <div id="caracteristiques">
          <div id="titre-carac">
          <label>Caracteristiques:</label>
        </div>
        <div>
		<table>
		';
		$rangee = 0;
		$length = 0;
		$limit = 0;
		$plus = 0;
		$req1 = mysqli_query($mysqli, 'SELECT * FROM univers_carac WHERE univers_id="'.$univid.'";');
          while($result = $req1->fetch_assoc()){
				$req2 = mysqli_query($mysqli, 'SELECT * FROM caracteristiques WHERE carac_id="'.$result['carac_id'].'";');
				while($carac = $req2->fetch_assoc()){
					$req3 = mysqli_query($mysqli, 'SELECT * FROM bonus WHERE bonus_id="'.$carac['default_bonus'].'";');
					  while($add = $req3->fetch_assoc()){
						  $bonus = $add;
					  }
					$req4 = mysqli_query($mysqli, 'SELECT * FROM dice WHERE dice_id="'.$bonus['bonus_dice'].'";');
					  while($de = $req4->fetch_assoc()){
						  $dice = $de;
					  }
					$length++;
					$rangee--;
					if($rangee > 0){
						  echo'<td>'.$carac['carac_nom'].'<label>
						  <input type="number" name="carac'.$length.'" class="carac" value="" readonly>
						  <input type="hidden" name="caracid'.$length.'" class="caracid" value="'.$carac['carac_id'].'">
						  </label>
						 <p class="caracset" id="'.$length.'" value="'.$bonus['bonus_valeur'].'" dicenb="'.$dice['nb_dice'].'" dice="'.$dice['valeur'].'">Attribuer</p>
						  </td>';
					}else if($rangee < 0){
						$rangee = 2;
						echo'<tr>
						<td>'.$carac['carac_nom'].'<label>
						  <input type="number" name="carac'.$length.'" class="carac" value="" readonly>
						  <input type="hidden" name="caracid'.$length.'" class="caracid" value="'.$carac['carac_id'].'">
						  </label>
						  <p class="caracset" id="'.$length.'" value="'.$bonus['bonus_valeur'].'" dicenb="'.$dice['nb_dice'].'" dice="'.$dice['valeur'].'">Attribuer</p>
						  </td>';
					}else if($rangee == 0){
						echo'<td>'.$carac['carac_nom'].'<label>
						  <input type="number" name="carac'.$length.'" class="carac" value="" readonly>
						  <input type="hidden" name="caracid'.$length.'" class="caracid" value="'.$carac['carac_id'].'">
						  </label>
						  <p class="caracset" id="'.$length.'" value="'.$bonus['bonus_valeur'].'" dicenb="'.$dice['nb_dice'].'" dice="'.$dice['valeur'].'">Attribuer</p>
						  </td>
						  </tr>';
					}
					$limit += $dice['nb_dice']*$dice['valeur'];
					$plus += $bonus['bonus_valeur'];
				}
			}
			if($length){ 
				$limit = $limit / $length;
			}
			if($limit>=100){
				$limit *= 0.35;
				$limit *= $length;
				$limit += $plus;
				$limit = floor($limit);
			}else{
				$limit *= 0.6;
				$limit *= $length;
				$limit += $plus;
				$limit = floor($limit);
			}
			if($limit <= 0){
				$limit = 1;
			}
        echo'
		</table>
		<p>La somme de vos caractéristique doit être inférieure à '.$limit.'</p>
		</div>';
		if($outrange == true){
			echo'La limite de caractéristiques a été dépassée';
		}
		echo'</div>
      <div id="EnvoyerEtReset">
        <input type="reset" value="Reset" id="reset">
		<label>
          <input type="submit" name="submit" value="Enregistrer">
		  <input type="hidden" name="length" value="'.$length.'">
		  <input type="hidden" name="limit" value="'.$limit.'">
		  </label>
    </div>

	</form>
	<script type="text/javascript">
		 var persoform = document.getElementById("persoform");
		 getinputs();
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
				 console.log(this);
				 e.preventDefault();
				var data = new FormData(persoform);
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
						document.location.replace(currentloc.substring(0, currentloc.lastIndexOf( "=" )+1)+"ficheperso&unid="+results);
					  }
				   }
				}
				request.open("POST", "https://www.unidice.fr/UnidiceTest/inc.php/foreign/subperso.inc.php", true);
				request.setRequestHeader("X-Requested-With", "xmlhttprequest");
				request.send(data);
			 }
		 }
		 
		 function provisave(input){
			 console.log(input.getAttribute("name"));
			 if(input.getAttribute("name")!=("submit" || "reset")){
			 console.log(input.value);
				 localStorage.setItem(input.getAttribute("name"), input.value);
				 console.log(localStorage);
			 }
		 }
		
		caracset = document.getElementsByClassName("caracset");
		console.log(caracset);
		// caracid = document.getElementsByClassName("caracid");
		// carac = document.getElementsByClassName("carac");
		// b = 0;
		// bonusid = Array();
		// bonus = 0;
		// pos1 = Array();
		// pos2 = Array();
		
		
		for (var i = 0 ; i < '.$length.'; i++) {
		   caracset[i].addEventListener("click", rollset);
		}
		// function newBonus(){
			// bonus = this.getAttribute("value");
			// console.log(bonus);
			// // for (var i = 0 ; i < '.$length.'; i++) {
			   // // bonusid[i] = caracid[i].getAttribute("value");
			   // // pos1[i] = caracid[i].getAttribute("name");
			   // // pos2[i] = carac[i].getAttribute("name");
			   // // console.log(bonusid[i]);
			   // // console.log(pos1[i]);
			   // // console.log(pos2[i]);
			// // }
			// // for(var j = 0; j<bonus.length;j++){
			// // if(bonus[j] == bonusid[j]){
				// // add = document.getElementsByClassName(pos2[j]);
				// // add.setAttribute("value",bonus[j]);
			// // }
			// //}
		// }
		

$(document).ready(function () {
    $(caracset).click(function(e) {
            e.preventDefault();
            e.stopPropagation();
            e.stopImmediatePropagation();

            return false;
    });});
var input;
function rollset(){
	value = Number(this.getAttribute("value"));
	dice = Number(this.getAttribute("dice"));
	nbdice = Number(this.getAttribute("dicenb"));
	result = 0;
	for (var i = 0 ; i < nbdice; i++) {
		roll = Math.floor((Math.random()*(dice-1)+1));
		result += roll;
	}
	result += value;
	id = this.getAttribute("id");
	input = document.getElementsByName("carac"+id);
	for(j=0;j<id;j++){
		input[j].setAttribute("value",result);
	}
	
}
</script>
</div>
</div>

     ';
}else{header('Location: index.php?ref=connexion');}
      include('footer.php');
	  echo'</div></div></div>';
	  	}
	else die("");
?>
