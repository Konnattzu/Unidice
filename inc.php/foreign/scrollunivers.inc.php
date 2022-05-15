<?php

	if(defined("constante")){
		if(isset($_SESSION['currentuniv'])){
			$req = mysqli_query($_SESSION["mysqli"], 'SELECT * FROM univers WHERE univers_id = '.$_SESSION["currentuniv"].' <> 1 ORDER BY univers_id DESC LIMIT 100;');
			$u=1;
		}else{
			$req = mysqli_query($_SESSION["mysqli"], 'SELECT * FROM univers ORDER BY univers_id DESC LIMIT 100;'); 
			$u=0;
		}
						$default_img = "'../images/prototype.png'";
						$pop=0;
						while($univ = $req->fetch_assoc()){
							$u++;
							
										
										if($univ['univers_img'] == 0){
											$img_univ = $default_img;
										}else{
											$queryimg = mysqli_query($mysqli, "SELECT * FROM images WHERE image_id = '".$univ['univers_img']."'");
											while($img = $queryimg->fetch_assoc()){				
												$img_univ = $img["image_path"];
											}
										}
										
							$pop++;
							echo '<div>
							<div class="univers-item"><a href="#" onclick="modifieru('.$u.')"><img class="img-univ" src="'.$img_univ.'" alt="image univers" onerror="this.onerror=null; this.src='.$default_img.'"></a></div>
							<div id="texte">'.$univ['univers_nom'].'</div>
					</div>';
					echo'<div id="pop-upu'.$u.'" style="display: none;">
						<div class="box">
							<span class="spanTB"></span>
							<span class="spanLR"></span>
								<!-- <span class="spanLR"></span> -->
							<div class="view-univ">
								<a id="fermer-pop-up" href="#" onclick="modifieru('.$u.')"><img class="icon" src="images/croix.png" height="25vh"></img></a>
								<h1 class="title-univ">'.$univ['univers_nom'].'</h1>
								<ul class="tag-univ">
									<li><u>Tags</u> :</li>';
									$req4 = mysqli_query($_SESSION["mysqli"], 'SELECT * FROM tags WHERE univers_id='.$univ["univers_id"].';');
										while($tag = $req4->fetch_assoc()){
											echo '<li>'.$tag["tag_name"].'</li>';
										}
										
								echo'</ul>
								<ul class="info-univ">';
								$req2 = mysqli_query($_SESSION["mysqli"], 'SELECT * FROM users_univers WHERE univers_id='.$univ["univers_id"].';');
										while($owner_id = $req2->fetch_assoc()){
										 $req3 = mysqli_query($_SESSION["mysqli"], 'SELECT * FROM users WHERE user_id='.$owner_id["user_id"].';');
										 while($owner = $req3->fetch_assoc()){
											  echo '<li><i>Créateur :<form action="index.php?ref=compte" method="post" id = "nom_user">
											<input type="hidden" name="userpage" value="'.$owner["user_id"].'"/>
											<input id="envoyer" type="submit" value="'.$owner["username"].'"/>
										</form></i></li>';
																  }
										}
										$likes = mysqli_num_rows(mysqli_query($_SESSION["mysqli"], 'SELECT * FROM univers_likes WHERE univers_id='.$univ["univers_id"].';'));
										$fav = mysqli_num_rows(mysqli_query($_SESSION["mysqli"], 'SELECT * FROM univers_fav WHERE univers_id='.$univ["univers_id"].';'));
										echo'<li><form id="formlike'.$u.'" action="https://www.unidice.fr/UnidiceTest/inc.php/foreign/favlikes.inc.php" method="post">';
											echo'
											<label>';
											if(isset($_SESSION['user_id']) && mysqli_num_rows(mysqli_query($_SESSION["mysqli"], 'SELECT * FROM univers_likes WHERE user_id='.$_SESSION["user_id"].' AND univers_id='.$univ["univers_id"].';'))==1){
											echo'<input type="checkbox" id="likecheckbox'.$u.'" name="univlike" style="display:none;" value="1" checked/>
											<img class="checkreact" id="likefill'.$u.'" src="./images/Thumbs_up_filled.svg"/>
											<img class="checkreact" id="likempty'.$u.'" src="./images/Thumbs_up.svg" style="display:none;"/>';
											}else if(isset($_SESSION['user_id'])){
												echo'<input type="checkbox" id="likecheckbox'.$u.'" name="univlike" style="display:none;" value="0" checked/>
											<img class="checkreact" id="likefill'.$u.'" src="./images/Thumbs_up_filled.svg" style="display:none;"/>
											<img class="checkreact" id="likempty'.$u.'" src="./images/Thumbs_up.svg" />';
											}else{
												echo'<img class="checkreact" id="likempty'.$u.'" src="./images/Thumbs_up.svg" />';
											}
											echo'<input type="hidden" name="univpage" value="'.$univ["univers_id"].'"/>
											<input type="hidden" name="userid" value="'.$_SESSION["user_id"].'"/>
											</label>';
										echo'</form><a id="likenb'.$u.'">Likes: '.$likes.'</a></li>
										<li><form id="formfav'.$u.'" action="https://www.unidice.fr/UnidiceTest/inc.php/foreign/favlikes.inc.php" method="post">';
											echo'
											<label>';
											if(isset($_SESSION['user_id']) && mysqli_num_rows(mysqli_query($_SESSION["mysqli"], 'SELECT * FROM univers_fav WHERE user_id='.$_SESSION["user_id"].' AND univers_id='.$univ["univers_id"].';'))==1){
											echo'<input type="checkbox" id="favcheckbox'.$u.'" name="univfav" style="display:none;" value="1" checked/>
											<img class="checkreact" id="favfill'.$u.'" src="./images/heart-filled.svg"/>
											<img class="checkreact" id="favempty'.$u.'" src="./images/heart-regular.svg" style="display:none;"/>';
											}else if(isset($_SESSION['user_id'])){
												echo'<input type="checkbox" id="favcheckbox'.$u.'" name="univfav" style="display:none;" value="0" checked/>
											<img class="checkreact" id="favfill'.$u.'" src="./images/heart-filled.svg" style="display:none;"/>
											<img class="checkreact" id="favempty'.$u.'" src="./images/heart-regular.svg" />';
											}else{
												echo'<img class="checkreact" id="favempty'.$u.'" src="./images/heart-regular.svg" />';
											}
											echo'<input type="hidden" name="univpage" value="'.$univ["univers_id"].'"/>
											<input type="hidden" name="userid" value="'.$_SESSION["user_id"].'"/>
											</label>';

										echo'</form><a id="favnb'.$u.'">Favoris: '.$fav.'</a></li>';
										
								echo'</ul>
								<ul class="disc-univ">
									<li>Description :</li>
									<p>'.$univ['univers_desc'].'</p>
								</ul>
								<div class="arrangement-listes-univ" style="display: flex; flex-direction: row; flex-wrap: wrap;">
								<ul class="des-univ">
									<h3>Dés: </h3>';
									$req2 = mysqli_query($mysqli, 'SELECT * FROM dice WHERE univers_id='.$univ['univers_id'].';');
										while($dice = $req2->fetch_assoc()){
											echo'<li><p>'.$dice['nb_dice'].'d'.$dice['valeur'].'</p><img src="https://unidice.fr/UnidiceTest/images/aj_photo.png" alt="ajouter image"></li>';
										}
								echo'</ul>
								<ul class="caracteristiques-univ">
										<h3>Caracteristiques: </h3>';
										$req1 = mysqli_query($mysqli, 'SELECT * FROM univers_carac WHERE univers_id="'.$univ['univers_id'].'";');
									  while($result = $req1->fetch_assoc()){
											$req2 = mysqli_query($mysqli, 'SELECT * FROM caracteristiques WHERE carac_id="'.$result['carac_id'].'";');
											while($carac = $req2->fetch_assoc()){
												echo'<li><p>'.$carac['carac_nom'].'</p><img src="https://unidice.fr/UnidiceTest/images/aj_photo.png" alt="ajouter image"></li>';
											}
									  }
									echo'</ul>
								<ul class="races-univ">
									<h3>Races:</h3>';
									$req1 = mysqli_query($mysqli, 'SELECT * FROM univers_race WHERE univers_id='.$univ['univers_id'].';');
									while($result = $req1->fetch_assoc()){
										$req2 = mysqli_query($mysqli, 'SELECT * FROM races WHERE race_id='.$result['race_id'].';');
										while($race = $req2->fetch_assoc()){
											echo'<li><p>'.$race['race_nom'].'</p><img src="https://unidice.fr/UnidiceTest/images/aj_photo.png" alt="ajouter image"></li>';
										}
									}
								echo'</ul>
								<ul class="classes-univ">
										<h3>Classes:</h3>';
									$req1 = mysqli_query($mysqli, 'SELECT * FROM univers_classe WHERE univers_id='.$univ['univers_id'].';');
									while($result = $req1->fetch_assoc()){
										$req2 = mysqli_query($mysqli, 'SELECT * FROM classes WHERE classe_id='.$result['classe_id'].';');
										while($classe = $req2->fetch_assoc()){
											echo'<li><p>'.$classe['classe_nom'].'</p><img src="https://unidice.fr/UnidiceTest/images/aj_photo.png" alt="ajouter image"></li>';
										}
									}
									echo'</ul>
								<ul class="objets-univ">
									<h3>Objets:</h3>';
										$req2 = mysqli_query($mysqli, 'SELECT * FROM objets WHERE univers_id='.$univ['univers_id'].';');
										while($objet = $req2->fetch_assoc()){
											echo'<li><p>'.$objet['obj_nom'].'</p><img src="https://unidice.fr/UnidiceTest/images/aj_photo.png" alt="ajouter image"></li>';
										}
								echo'</ul>
									<ul class="bestiaire-univ">
										<h3>Bestiaire:</h3>';
										$req1 = mysqli_query($mysqli, 'SELECT * FROM bestiaire WHERE univers_id='.$univ['univers_id'].';');
									while($result = $req1->fetch_assoc()){
										$req2 = mysqli_query($mysqli, 'SELECT * FROM creatures WHERE creature_id='.$result['creature_id'].';');
										while($creature = $req2->fetch_assoc()){
										echo'<li><p>'.$creature['creature_nom'].'</p><img src="https://unidice.fr/UnidiceTest/images/aj_photo.png" alt="ajouter image"></li>';
										}
									}
									echo'</ul>
								</div>
								<ul class="disc-univ">
									<h3>Règles additionnelles:</h3>';
									if($univ['regles_add'] == ""){
									echo'<li><p>-</p></li>';
									}else{
										echo'<li><p>'.$univ['regles_add'].'</p></li>';
									}
								echo'</ul>
									
								'; 
										echo'
										<ul class="info-univ">
										<form action="index.php?ref=galerie" method="post">
											 <input type="hidden" name="univ" value="'.$univ["univers_id"].'"/>
											 <input type="hidden" name="scenario" value="1"/>
											 <input id="envoyer" type="submit" value="Liste des scenarii"/>
										 </form>
										 <form action="index.php?ref=creerscenar" method="post">
											 <input type="hidden" name="univ" value="'.$univ["univers_id"].'"/>
											 <input type="hidden" name="scenario" value="1"/>
											 <input id="envoyer" type="submit" value="Créer un scénario"/>
										 </form>
										 
								</ul>
								<ul class="info-univ">
								<form action="index.php?ref=creerperso" method="post">
											<input type="hidden" name="univ" value="'.$univ["univers_id"].'"/>
											<input id="envoyer" type="submit" value="Créer un personnage"/>
										</form>
								</ul>

							</div>
						</div>
						</div>';
						}
						// echo'<script type="text/javascript">
										// var formunivlike = document.querySelector("#formunivlike");
										// var formunivfav = document.querySelector("#formunivfav");
										// var likefill = document.getElementById("likefill");
										// var likempty = document.getElementById("likempty");
										// var favfill = document.getElementById("favfill");
										// var favempty = document.getElementById("favempty");
										// var likenb = document.getElementById("likenb");
										// var favnb = document.getElementById("favnb");
										// formunivlike.addEventListener("click", function(e){	
										// console.log("oui");
											// e.preventDefault();
											// univlike = document.getElementById("likecheckbox");
											// univfav = document.getElementById("favcheckbox");
											// if(likempty.style.display == ""){
												// likefill.style.display = "";
												// likempty.style.display = "none";
											// }else{
												// likefill.style.display = "none";
												// likempty.style.display = "";
											// }
											// if(univlike.getAttribute("value") == "0"){
												// univlike.setAttribute("value", "1");
											// }else{
												// univlike.setAttribute("value", "0");
											// }
											// var data = new FormData(formunivlike);
											// var request = new XMLHttpRequest();
											// request.onreadystatechange = function () {
											   // if (request.readyState === 4) {
												   // var results = request.responseText;
												  // console.log(results);
												  // console.log(request.responseText);
												  // likenb.innerHTML = "Likes: " + results[0];
												  // favnb.innerHTML = "Favoris: " + results[1];
											   // }
											// }
											// request.open("POST", "https://www.unidice.fr/UnidiceTest/inc.php/foreign/favlikes.inc.php", true);
											// request.setRequestHeader("X-Requested-With", "xmlhttprequest");
											// request.send(data);
										// });
										// formunivfav.addEventListener("click", function(e){	
											// e.preventDefault();
											// univlike = document.getElementById("likecheckbox");
											// univfav = document.getElementById("favcheckbox");
											// if(favempty.style.display == ""){
												// favfill.style.display = "";
												// favempty.style.display = "none";
											// }else{
												// favfill.style.display = "none";
												// favempty.style.display = "";
											// }
											// if(univfav.getAttribute("value") == "0"){
												// univfav.setAttribute("value", "1");
											// }else{
												// univfav.setAttribute("value", "0");
											// }
											// var data = new FormData(formunivfav);
											// var request = new XMLHttpRequest();
											// request.onreadystatechange = function () {
											   // if (request.readyState === 4) {
												   // var results = request.responseText;
												  // console.log(results);
												  // console.log(request.responseText);
												  // likenb.innerHTML = "Likes: " + results[0];
												  // favnb.innerHTML = "Favoris: " + results[1];
											   // }
											// }
											// request.open("POST", "https://www.unidice.fr/UnidiceTest/inc.php/foreign/favlikes.inc.php", true);
											// request.setRequestHeader("X-Requested-With", "xmlhttprequest");
											// request.send(data);
										// });
										// </script>';
						// echo'<script>
						// let btn = document.getElementByClassName("btn");
						// let p = document.getElementByClassName("p");
						// for (i=0;i<'.$pop.';i++){
							// btn.addEventListener("click", () => {
								// if(getComputedStyle(p[i]).display != "none"){
									// p[i].style.display = "none";
								// } else {
									// p[i].style.display = "block";
								// }
								// })
						// }
						
						
						// </script>';
	}
	else die("");
?>
