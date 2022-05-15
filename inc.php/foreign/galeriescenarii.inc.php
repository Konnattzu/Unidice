<?php
	if(defined("constante")){				
					if(isset($_POST['userpage'])){
						echo $_POST['userpage'];
						$row = mysqli_query($mysqli, 'SELECT * FROM users_univers WHERE user_id="'.$_POST['userpage'].'"');
						
						while($owner = $row->fetch_assoc()){
							$u=0;
							$pop=0;
							$row2 = mysqli_query($mysqli, 'SELECT * FROM univers WHERE univers_id="'.$owner['univers_id'].'"');
							while($univ = $row2->fetch_assoc()){
								
							$u++;
							$pop++;
							echo '<div>
							<div class="univers-item"><a href="#" onclick="modifieru('.$u.')"><img class="img-univ" src="../images/prototype.png" alt="image univers"></a></div>
							<div id="texte">'.$univ['univers_nom'].'</div>
					</div>';
					echo'<div id="pop-upu'.$u.'" style="display: none;">
						<div class="box">
							<span class="spanTB"></span>
							<span class="spanLR"></span>
								<!-- <span class="spanLR"></span> -->
							<div class="view-univ">
								<a id="fermer-pop-up" href="#" onclick="modifieru('.$u.')"><img class="icon" src="images/croix.png" height="30"></img></a>
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
										echo'</ul>
								<ul class="disc-univ">
									<li>Description :</li>
									<p>'.$univ['univers_desc'].'
									</p>
								</ul>
								<ul class="info-univ">';
										echo' <form action="index.php?ref=galeriescenarii" method="post">
											 <input type="hidden" name="univ" value="'.$univ["univers_id"].'"/>
											 <input id="envoyer" type="submit" value="Liste des scenarii"/>
										 </form>
										 <form action="index.php?ref=creerscenarii" method="post">
											 <input type="hidden" name="univ" value="'.$univ["univers_id"].'"/>
											 <input id="envoyer" type="submit" value="Créer un scénario"/>
										 </form>
								</ul>

							</div>
						</div>
						</div>
										';
										
							}
						}
					}else if(isset($_POST['univ'])){
						$req5 = mysqli_query($_SESSION["mysqli"], 'SELECT * FROM univers_scenarii WHERE univers_id="'.$_POST['univ'].'"');
						while($owner = $req5->fetch_assoc()){
						$req = mysqli_query($_SESSION["mysqli"], 'SELECT * FROM scenarii WHERE scenario_id='.$owner['scenario_id'].' ORDER BY scenario_id DESC LIMIT 100;'); 
						$s=0;
			
						while($scenar = $req->fetch_assoc()){ 
							$s++;
							echo '<div>
							<div class="scenarii-item"><a href="#" onclick="modifiers('.$s.')"><img class="img-scenar" src="../images/editor.png" alt="image univers"></a></div>
							<div id="texte">'.$scenar['scenario_nom'].'</div>
					</div>';
					echo'<div id="pop-ups'.$s.'" style="display: none;">
							<div class="box">
								<span class="spanTB"></span>
								<span class="spanLR"></span>
								<!-- <span class="spanLR"></span> -->
								<div class="view-univ">
								<a id="fermer-pop-up" href="#" onclick="modifiers('.$s.')"><img class="icon" src="images/croix.png" height="30"></img></a>
								<h1 class="title-univ">'.$scenar['scenario_nom'].'</h1>
								<ul class="tag-univ">
									<li><u>Tags</u> :</li>';
									$req4 = mysqli_query($_SESSION["mysqli"], 'SELECT * FROM tags WHERE scenario_id='.$scenar["scenario_id"].';');
										while($tag = $req4->fetch_assoc()){
											echo '<li>'.$tag["tag_name"].'</li>';
										}
								echo'</ul> 
								<ul class="info-univ">';
								$req2 = mysqli_query($_SESSION["mysqli"], 'SELECT * FROM users_scenarii WHERE scenario_id='.$scenar["scenario_id"].';');
										while($owner_id = $req2->fetch_assoc()){
										 $req3 = mysqli_query($_SESSION["mysqli"], 'SELECT * FROM users WHERE user_id='.$owner_id["user_id"].';');
										 while($owner = $req3->fetch_assoc()){
											  echo '<li><i>Créateur :<form action="index.php?ref=compte" method="post" id = "nom_user">
											<input type="hidden" name="userpage" value="'.$owner["user_id"].'"/>
											<input id="envoyer" type="submit" value="'.$owner["username"].'"/>
										</form></i></li>';
																  }
										}
										$likes = mysqli_num_rows(mysqli_query($_SESSION["mysqli"], 'SELECT * FROM scenario_likes WHERE scenario_id='.$scenar["scenario_id"].';'));
										$fav = mysqli_num_rows(mysqli_query($_SESSION["mysqli"], 'SELECT * FROM scenario_fav WHERE scenario_id='.$scenar["scenario_id"].';'));
										echo'<li><form id="formscenarlike" action="https://www.unidice.fr/UnidiceTest/inc.php/foreign/favlikes.inc.php" method="post">';
											echo'
											<label>';
											if(isset($_SESSION['user_id']) && mysqli_num_rows(mysqli_query($_SESSION["mysqli"], 'SELECT * FROM scenario_likes WHERE user_id='.$_SESSION["user_id"].' AND scenario_id='.$scenar["scenario_id"].';'))==1){
											echo'<input type="checkbox" id="likecheckbox" name="scenarlike" style="display:none;" value="1" checked/>
											<img class="checkreact" id="likefill" src="./images/Thumbs_up_filled.svg"/>
											<img class="checkreact" id="likempty" src="./images/Thumbs_up.svg" style="display:none;"/>';
											}else if(isset($_SESSION['user_id'])){
												echo'<input type="checkbox" id="likecheckbox" name="scenarlike" style="display:none;" value="0" checked/>
											<img class="checkreact" id="likefill" src="./images/Thumbs_up_filled.svg" style="display:none;"/>
											<img class="checkreact" id="likempty" src="./images/Thumbs_up.svg" />';
											}else{
												echo'<img class="checkreact" id="likempty" src="./images/Thumbs_up.svg" />';
											}
											echo'<input type="hidden" name="scenarpage" value="'.$scenar["scenario_id"].'"/>
											<input type="hidden" name="userid" value="'.$_SESSION["user_id"].'"/>
											</label>';
										echo'</form><a id="likenb">Likes: '.$likes.'</a></li>
										<li><form id="formscenarfav" action="https://www.unidice.fr/UnidiceTest/inc.php/foreign/favlikes.inc.php" method="post">';
											echo'
											<label>';
											if(isset($_SESSION['user_id']) && mysqli_num_rows(mysqli_query($_SESSION["mysqli"], 'SELECT * FROM scenario_fav WHERE user_id='.$_SESSION["user_id"].' AND scenario_id='.$scenar["scenario_id"].';'))==1){
											echo'<input type="checkbox" id="favcheckbox" name="scenarfav" style="display:none;" value="1" checked/>
											<img class="checkreact" id="favfill" src="./images/heart-filled.svg"/>
											<img class="checkreact" id="favempty" src="./images/heart-regular.svg" style="display:none;"/>';
											}else if(isset($_SESSION['user_id'])){
												echo'<input type="checkbox" id="favcheckbox" name="scenarfav" style="display:none;" value="0" checked/>
											<img class="checkreact" id="favfill" src="./images/heart-filled.svg" style="display:none;"/>
											<img class="checkreact" id="favempty" src="./images/heart-regular.svg" />';
											}else{
												echo'<img class="checkreact" id="favempty" src="./images/heart-regular.svg" />';
											}
											echo'<input type="hidden" name="scenarpage" value="'.$scenar["scenario_id"].'"/>
											<input type="hidden" name="userid" value="'.$_SESSION["user_id"].'"/>
											</label>';

										echo'</form><a id="favnb">Favoris: '.$fav.'</a></li>';
								echo'</ul>
								<ul class="disc-univ">
									<li>Description :</li>
									<p>'.$scenar['scenario_desc'].'
									</p>
								</ul>
								<ul class="info-univ">';
								echo'</ul>
						
							  </div>
						</div>
						</div>
										'; 
							}
						}
					}
					echo'</div>';
	}
	else die("");
?>
