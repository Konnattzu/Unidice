<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
	if(defined("constante")){
            echo'<div id="body_jeu">';
			include ('header.php');
			echo '<div id="contenu_jeu">';
				echo '<div id="timeline">
				<div id="line">';
				//Zone de la timeline
				$currentscenar = 19;
				$req = mysqli_query($mysqli, "SELECT * FROM scenario_steps WHERE scenario_id='".$currentscenar."';");
				while($step = $req->fetch_assoc()){
					echo'
                    <span class="tooltip">
						<svg xmlns="http://www.w3.org/2000/svg" version="1.1">
							<circle cx="100%" cy="50%" r="1.5vh" fill="black"></circle>
                                                </svg>
						
						<span class="tooltiptext">
						<img class="toolarrow" src="images/TriangleArrow-Up.svg" alt="">
						<h2 class="step_title">'.$step["step_nom"].'</h2>
						<div class="step_desc">
							'.$step["step_desc"].'
						</div>
						</span>
                    </span>';
				}
				$univdice = array(1, 2, 8);
				$univraces = array(2, 3, 4, 5, 6, 7, 8);
				$univclasses = array(2, 3, 4, 5, 6);
				$univbeasts = array(7, 8);
				$gamepersos = array(50, 88, 287);
				$gamebeasts = array(7, 7, 7, 7, 8);
				$gamequipements = array(2, 13);
				$gameobjects = array(1, 6, 7);
				$gamecarac = array(2, 3, 4, 5, 6, 7);
					echo'<div id="pop-up">
                          <div>
                            <a id="fermer-pop-up" href="#" onclick="modifier()"><img class="icon" src="images/croix.png" height="50"/></a>
                            <p>Le contenu que vous souhaitez voir va ici.</p>
                          </div>
					</div>
					</div>
				</div>';
				//Zone des différents actions, comme les dés, l'inventaire, etc...
				$dice = "'dice'";
				$personnages = "'personnages'";
				$ennemis = "'ennemis'";
				$equipements = "'equipements'";
				$objets = "'objets'";
				$universpedia = "'universpedia'";
				//Zone des onglets
				echo '<div id="gameface">
				<div class="contenu_onglets">
					
				</div>
				
				<div id="actiontable">
				<div id="gametable">
					<ul>
						<li><a class="onglet_0 onglet" id="onglet_dice" onclick="javascript:change_onglet('.$dice.')"><img class="icon" src="images/des.png" height="40"/></a></li>
						<li><a class="onglet_0 onglet" id="onglet_equipements" onclick="javascript:change_onglet('.$equipements.')"><img class="icon" src="images/equipements.png" height="40"/></a></li>
						<li><a class="onglet_0 onglet" id="onglet_objets" onclick="javascript:change_onglet('.$objets.')"><img class="icon" src="images/objets.png" height="40"/></a></li>
						<li><a class="onglet_0 onglet" id="onglet_ennemis" onclick="javascript:change_onglet('.$ennemis.')"><img class="icon" src="images/ennemis.png" height="40"/></a></li>
						<li><a class="onglet_0 onglet" id="onglet_personnages" onclick="javascript:change_onglet('.$personnages.')"><img class="icon" src="images/personnages.png" height="40"/></a></li>
						<li><a class="onglet_0 onglet" id="onglet_universpedia" onclick="javascript:change_onglet('.$universpedia.')"><img class="icon" id="icon6" src="images/universpedia.png" height="40"/></a></li>
					</ul>
				</div>
				<div class="contenu_onglet" id="contenu_onglet_dice">
						<h1>Dés</h1>
						<ul>
						<form action="" method="post">
						<li>
							<label for="numb_list">
							</label>
							<input list="numb_choice" id="numb_list" name="numb" size="4"/>
							<datalist id="numb_choice">
								<option value="1">';
								for($i=0;$i<count($univdice);$i++){
									$req = mysqli_query($mysqli, "SELECT * FROM dice WHERE dice_id='".$univdice[$i]."';");
									while($dice = $req->fetch_assoc()){
										echo'<option value="'.$dice["nb_dice"].'">';
									}
								}
							echo'</datalist>
							d
							<select name="dice" id="dice_select">
								<option value=""> </option>';
								for($i=0;$i<count($univdice);$i++){
									$req = mysqli_query($mysqli, "SELECT * FROM dice WHERE dice_id='".$univdice[$i]."';");
									while($dice = $req->fetch_assoc()){
										echo'<option value="'.$dice["valeur"].'">'.$dice["valeur"].'</option>';
									}
								}
							echo'</select>
							+
							<select name="bonus" id="bonus_select">
								<option value=""> </option>';
								for($i=0;$i<count($gamecarac);$i++){
									$req = mysqli_query($mysqli, "SELECT * FROM caracteristiques WHERE carac_id='".$gamecarac[$i]."';");
									while($carac = $req->fetch_assoc()){
										echo'<option value="'.$carac["carac_nom"].'">'.$carac["carac_nom"].'</option>';
									}
								}
							echo'</select>
							</li>
							<li>
							Lanceur:
							<select name="launcher" id="launch_select">
								<option value=""></option>';
								for($i=0;$i<count($gamepersos);$i++){
									$req = mysqli_query($mysqli, "SELECT * FROM caracteristiques WHERE carac_id='".$gamepersos[$i]."';");
									while($perso = $req->fetch_assoc()){
										echo'<option value="J'.$i.'">'.$perso["perso_nom"].'</option>';
									}
								}
								for($i=0;$i<count($gamebeasts);$i++){
									$req = mysqli_query($mysqli, "SELECT * FROM creatures WHERE creature_id='".$gamebeasts[$i]."';");
									while($beast = $req->fetch_assoc()){
										echo'<option value="E'.$i.'">'.$beast["creature_nom"].'</option>';
									}
								}
							echo'</select>
							</li>
							<li>
							Cible:
							<select name="target" id="target_select">
							<option value=""></option>';
								for($i=0;$i<count($gamepersos);$i++){
									$req = mysqli_query($mysqli, "SELECT * FROM caracteristiques WHERE carac_id='".$gamepersos[$i]."';");
									while($perso = $req->fetch_assoc()){
										echo'<option value="J'.$i.'">'.$perso["perso_nom"].'</option>';
									}
								}
								for($i=0;$i<count($gamebeasts);$i++){
									$req = mysqli_query($mysqli, "SELECT * FROM creatures WHERE creature_id='".$gamebeasts[$i]."';");
									while($beast = $req->fetch_assoc()){
										echo'<option value="E'.$i.'">'.$beast["creature_nom"].'</option>';
									}
								}
							echo'</select>
							<br>
							</li>
							<li>
							Difficulté:
							<select name="diff" id="diff_select">
								<option value=""> </option>';
								for($i=0;$i<count($gamecarac);$i++){
									$req = mysqli_query($mysqli, "SELECT * FROM caracteristiques WHERE carac_id='".$gamecarac[$i]."';");
									while($carac = $req->fetch_assoc()){
										echo'<option value="'.$carac["carac_nom"].'">'.$carac["carac_nom"].'</option>';
									}
								}
							echo'</select>
							</li>
						</form>
						</ul>
					</div>
					<div class="contenu_onglet" id="contenu_onglet_personnages">
						<h1>Personnages</h1>
						<ul>';
						for($i=0;$i<count($gamepersos);$i++){
							$req = mysqli_query($mysqli, "SELECT * FROM caracteristiques WHERE carac_id='".$gamepersos[$i]."';");
							while($perso = $req->fetch_assoc()){
								echo'<li><h2>'.$perso["perso_nom"].'</h2></li>';
								$req1 = mysqli_query($mysqli, "SELECT * FROM races WHERE race_id='".$perso["perso_race"]."';");
								while($race = $req->fetch_assoc()){
									echo'<li>Race: '.$race["race_nom"].'</li>';
								}
								$req1 = mysqli_query($mysqli, "SELECT * FROM classes WHERE classe_id='".$perso["perso_classe"]."';");
								while($classe = $req->fetch_assoc()){
									echo'<li>Classe: '.$classe["classe_nom"].'</li>';
								}
								echo'<li>Age: '.$perso["perso_age"].'</li>
								<li>Taille: '.$perso["perso_taille"].'</li>
								<li>Poids: '.$perso["perso_poids"].'</li>';
							}
						}
						echo'</ul>
					</div>
					<div class="contenu_onglet" id="contenu_onglet_ennemis">
						<h1>Ennemis</h1>
						<ul>';
						for($i=0;$i<count($gamebeasts);$i++){
							$req = mysqli_query($mysqli, "SELECT * FROM creatures WHERE creature_id='".$gamebeasts[$i]."';");
							while($beast = $req->fetch_assoc()){
								echo'<li><h2>'.$beast["creature_nom"].'</h2></li>';
							}
						}
						echo'</ul>
					</div>
					<div class="contenu_onglet" id="contenu_onglet_equipements">
						<h1>Equipements</h1>
						<ul>';
						for($i=0;$i<count($gamequipements);$i++){
							$req = mysqli_query($mysqli, "SELECT * FROM objets WHERE obj_id='".$gamequipements[$i]."';");
							while($equip = $req->fetch_assoc()){
								echo'<li><h2>'.$equip["obj_nom"].'</h2></li>';
								$req1 = mysqli_query($mysqli, "SELECT * FROM bonus WHERE bonus_id='".$equip["obj_bonus"]."';");
								while($bonus = $req->fetch_assoc()){
									echo'<li>Bonus: '.$bonus["bonus_nom"].'</li>';
								}
							}
						}
						echo'</ul>
					</div>
					<div class="contenu_onglet" id="contenu_onglet_objets">
						<h1>Objets</h1>
						<ul>';
						for($i=0;$i<count($gameobjects);$i++){
							$req = mysqli_query($mysqli, "SELECT * FROM objets WHERE obj_id='".$gameobjects[$i]."';");
							while($obj = $req->fetch_assoc()){
								echo'<li><h2>'.$obj["obj_nom"].'</h2></li>';
								$req1 = mysqli_query($mysqli, "SELECT * FROM bonus WHERE bonus_id='".$obj["obj_bonus"]."';");
								while($bonus = $req->fetch_assoc()){
									echo'<li>Bonus: '.$bonus["bonus_nom"].'</li>';
								}
							}
						}
						echo'</ul>
						</div>
					<div class="contenu_onglet" id="contenu_onglet_universpedia">
						<h1>Universpedia</h1>
						<ul>
						<li><h2>Races</h2></li>';
						for($i=0;$i<count($univraces);$i++){
							$req1 = mysqli_query($mysqli, "SELECT * FROM races WHERE race_id='".$univraces[$i]."';");
							while($race = $req->fetch_assoc()){
								echo'<li><h3>'.$race["race_nom"].'</h3></li>';
							}
						}
						echo'
						</ul>
						<ul>
						<li><h2>Classes</h2></li>';
						for($i=0;$i<count($univclasses);$i++){
							$req1 = mysqli_query($mysqli, "SELECT * FROM classes WHERE classe_id='".$univclasses[$i]."';");
							while($classe = $req->fetch_assoc()){
								echo'<li><h3>'.$classe["classe_nom"].'</h3></li>';
							}
						}
						echo'</ul>
						<ul>
						<li><h2>Bestiaire</h2></li>';
						for($i=0;$i<count($univbeasts);$i++){
							$req1 = mysqli_query($mysqli, "SELECT * FROM creatures WHERE creature_id='".$univbeasts[$i]."';");
							while($beast = $req->fetch_assoc()){
								echo'<li><h3>'.$beast["creature_nom"].'</h3></li>';
							}
						}
						echo'</ul>
						<ul>
						<li><h2>Objets</h2></li>';
						for($i=0;$i<count($gameobjects);$i++){
							$req1 = mysqli_query($mysqli, "SELECT * FROM objets WHERE obj_id='".$gameobjects[$i]."';");
							while($object = $req->fetch_assoc()){
								echo'<li><h3>'.$object["obj_nom"].'</h3></li>';
							}
						}
						echo'</ul>
					</div>              
				</div>
				<div id="visualgame">
				<div class="bg-jouer"></div>
				<span class="jetonJ">J1</span>
				<div id="gamedisp"></div> 
			</div>
			</div>';
		echo'</div>
		<script type="text/javascript">
			var anc_onglet = "dice";
			change_onglet(anc_onglet);
					
			const zoomElement = document.querySelector("#gamedisp");
			let zoom = 1;
			const ZOOM_SPEED = 0.1;

			document.addEventListener("wheel", function(e) {  
    
			if(e.deltaY < 0){    
			if (zoomElement.style.transform >= `scale(3)`) {
            console.log("now scroll down");
            return false;
			}
			zoomElement.style.transform = `scale(${zoom += ZOOM_SPEED})`;  

			}else{    
				if (zoomElement.style.transform <= `scale(1)`) {
				// console.log("minus");
				return false;
				}
				zoomElement.style.transform = `scale(${zoom -= ZOOM_SPEED})`;
			}
		});
		gamedisp = document.getElementById("gamedisp");
		nbJetons = 1;
		jeton = [];
		
		visualgame = document.getElementById("visualgame");
		body_jeu = document.getElementById("body_jeu");
		minLeft = Math.floor(visualgame.offsetLeft - (gamedisp.offsetWidth / 2));
		minTop = Math.floor(visualgame.offsetTop - (gamedisp.offsetHeight / 2));
		maxLeft = Math.floor((visualgame.offsetLeft + visualgame.offsetWidth) - (gamedisp.offsetWidth / 2));
		maxTop = Math.floor((visualgame.offsetTop + visualgame.offsetHeight) - (gamedisp.offsetHeight / 2));
		console.log(minLeft,minTop,maxLeft,maxTop);
		gamedisp.onmousedown = function(event) { 
			body_jeu.style.userSelect = "none";
			posXdown = event.pageX;
			posYdown = event.pageY;
			posLeft = gamedisp.offsetLeft;
			posTop = gamedisp.offsetTop;
			postX = 0;
			postY = 0;
			function moveAt(pageX, pageY) {
				moveX = posLeft+(pageX - posXdown);
				moveY = posTop+(pageY - posYdown);
				offX = moveX-postX;
				offY = moveY-postY;
				if((gamedisp.offsetLeft >= minLeft) && (gamedisp.offsetLeft <= maxLeft)){
						gamedisp.style.left = moveX + "px";
				} else if((gamedisp.offsetLeft < minLeft)&&(offX > 0)){
						gamedisp.style.left = minLeft + "px";
				} else if((gamedisp.offsetLeft > maxLeft)&&(offX < 0)){
						gamedisp.style.left = maxLeft + "px";
				}
					
				if((gamedisp.offsetTop >= minTop) && (gamedisp.offsetTop <= maxTop)){
						gamedisp.style.top = moveY + "px";
				} else if((gamedisp.offsetTop < minTop)&&(offY > 0)){
						gamedisp.style.top = minTop + "px";
					} else if((gamedisp.offsetTop > maxTop)&&(offY < 0)){
						gamedisp.style.top = maxTop + "px";
					}
					
					postX = gamedisp.offsetLeft;
					postY = gamedisp.offsetTop;
				}
				function onMouseMove(event) {
				  moveAt(event.pageX, event.pageY);
				}
				document.addEventListener("mousemove", onMouseMove);
			   
			    document.onmouseup = function() {				   
					document.removeEventListener("mousemove", onMouseMove);
					body_jeu.style.userSelect = "auto";
					if((gamedisp.offsetTop < minTop)){
						gamedisp.style.top = minTop + "px";
					}
					if((gamedisp.offsetTop > maxTop)){
						gamedisp.style.top = maxTop + "px";
					}
					gamedisp.onmouseup = null;
				};
				return;
			};
			gamedisp.ondragstart = function() {
				return false;
			};
			
			jetons = document.getElementsByClassName("jetonJ");
			for(i=0;i<jetons.length;i++){
			console.log(jetons[i]);
			
			jetons[i].onmousedown = function(event) { 
				
				var that = this;
				console.log("obj "+that); 
				body_jeu.style.userSelect = "none";
				posXdown = event.pageX;
				posYdown = event.pageY;
				posLeft = that.offsetLeft;
				posTop = that.offsetTop;
				postX = 0;
				postY = 0;
				function moveAt(pageX, pageY) {
					moveX = posLeft+(pageX - posXdown);
					moveY = posTop+(pageY - posYdown);
					offX = moveX-postX;
					offY = moveY-postY;
					if((that.offsetLeft >= minLeft) && (that.offsetLeft <= maxLeft)){
							that.style.left = moveX + "px";						
					} else if((that.offsetLeft < minLeft)&&(offX > 0)){
							that.style.left = minLeft + "px";
					} else if((that.offsetLeft > maxLeft)&&(offX < 0)){
							that.style.left = maxLeft + "px";
					}
					console.log(offX);			
					console.log(offY);			
					
						
					if((that.offsetTop >= minTop) && (that.offsetTop <= maxTop)){
							that.style.top = moveY + "px";		
					} else if((that.offsetTop < minTop)&&(offY > 0)){
							that.style.top = minTop + "px";
						} else if((that.offsetTop > maxTop)&&(offY < 0)){
							that.style.top = maxTop + "px";
						}
					console.log(that.style.left);			
					console.log(that.style.top);			
						
						postX = that.offsetLeft;
						postY = that.offsetTop;
					}
					function onMouseMove(event) {
					  moveAt(event.pageX, event.pageY);
					}
					document.addEventListener("mousemove", onMouseMove);
				   
					document.onmouseup = function() {		
						document.removeEventListener("mousemove", onMouseMove);
						body_jeu.style.userSelect = "auto";
						if((that.offsetTop < minTop)){
							that.style.top = minTop + "px";
						}
						if((that.offsetTop > maxTop)){
							that.style.top = maxTop + "px";
						}
						that.onmouseup = null;
					};
					return;
				}; 
				that.ondragstart = function() {
				return false;
				};
			}
			
			
			
			</script>
			</div>';
			}
	else die("");
?>