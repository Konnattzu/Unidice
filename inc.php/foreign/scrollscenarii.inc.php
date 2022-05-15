<?php

	if(defined("constante")){			
		if(isset($_SESSION['currentscenar'])){
			$req = mysqli_query($_SESSION["mysqli"], 'SELECT * FROM scenarii WHERE scenario_id = '.$_SESSION["currentscenar"].' <> 1 ORDER BY scenario_id DESC LIMIT 100;');
			$s=1;
		}else{
			$req = mysqli_query($_SESSION["mysqli"], 'SELECT * FROM scenarii ORDER BY scenario_id DESC LIMIT 100;'); 
			$s=0;
		}
					$default_img = "'../images/editor.png'";
						
						$pop=0;
						while($scenar = $req->fetch_assoc()){ 
							$s++;
							if($scenar['scenario_img'] == 0){
													$img_scenar = $default_img;
												}else{
										$queryimg = mysqli_query($mysqli, "SELECT * FROM images WHERE image_id = '".$scenar['scenario_img']."'");
											while($img = $queryimg->fetch_assoc()){
												
													$img_scenar = $img["image_path"];
												}
											}
										$pop++;
							echo '<div>
							<div class="scenarii-item"><a href="#" onclick="modifiers('.$s.')"><img class="img-univ" src="'.$img_scenar.'" alt="image univers" onerror="this.onerror=null; this.src='.$default_img.'"></a></div>
							<div id="texte">'.$scenar['scenario_nom'].'</div>
					</div>';
					echo'<div id="pop-ups'.$s.'" style="display: none;">
							<div class="box">
								<span class="spanTB"></span>
								<span class="spanLR"></span>
								<!-- <span class="spanLR"></span> -->
								<div class="view-univ">
								<a id="fermer-pop-up" href="#" onclick="modifiers('.$s.')"><img class="icon" src="images/croix.png" height="25vh"></img></a>
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
										echo'<li><form id="formscenarlike'.$u.'" action="https://www.unidice.fr/UnidiceTest/inc.php/foreign/favlikes.inc.php" method="post">';
											echo'
											<label>';
											if(isset($_SESSION['user_id']) && mysqli_num_rows(mysqli_query($_SESSION["mysqli"], 'SELECT * FROM scenario_likes WHERE user_id='.$_SESSION["user_id"].' AND scenario_id='.$scenar["scenario_id"].';'))==1){
											echo'<input type="checkbox" id="likecheckbox'.$u.'" name="scenarlike" style="display:none;" value="1" checked/>
											<img class="checkreact" id="likefill'.$u.'" src="./images/Thumbs_up_filled.svg"/>
											<img class="checkreact" id="likempty'.$u.'" src="./images/Thumbs_up.svg" style="display:none;"/>';
											}else if(isset($_SESSION['user_id'])){
												echo'<input type="checkbox" id="likecheckbox'.$u.'" name="scenarlike" style="display:none;" value="0" checked/>
											<img class="checkreact" id="likefill'.$u.'" src="./images/Thumbs_up_filled.svg" style="display:none;"/>
											<img class="checkreact" id="likempty'.$u.'" src="./images/Thumbs_up.svg" />';
											}else{
												echo'<img class="checkreact" id="likempty" src="./images/Thumbs_up.svg" />';
											}
											echo'<input type="hidden" name="scenarpage" value="'.$scenar["scenario_id"].'"/>
											<input type="hidden" name="userid" value="'.$_SESSION["user_id"].'"/>
											</label>';
										echo'</form><a id="likenb'.$u.'">Likes: '.$likes.'</a></li>
										<li><form id="formscenarfav'.$u.'" action="https://www.unidice.fr/UnidiceTest/inc.php/foreign/favlikes.inc.php" method="post">';
											echo'
											<label>';
											if(isset($_SESSION['user_id']) && mysqli_num_rows(mysqli_query($_SESSION["mysqli"], 'SELECT * FROM scenario_fav WHERE user_id='.$_SESSION["user_id"].' AND scenario_id='.$scenar["scenario_id"].';'))==1){
											echo'<input type="checkbox" id="favcheckbox'.$u.'" name="scenarfav" style="display:none;" value="1" checked/>
											<img class="checkreact" id="favfill'.$u.'" src="./images/heart-filled.svg"/>
											<img class="checkreact" id="favempty'.$u.'" src="./images/heart-regular.svg" style="display:none;"/>';
											}else if(isset($_SESSION['user_id'])){
												echo'<input type="checkbox" id="favcheckbox'.$u.'" name="scenarfav" style="display:none;" value="0" checked/>
											<img class="checkreact" id="favfill'.$u.'" src="./images/heart-filled.svg" style="display:none;"/>
											<img class="checkreact" id="favempty'.$u.'" src="./images/heart-regular.svg" />';
											}else{
												echo'<img class="checkreact" id="favempty" src="./images/heart-regular.svg" />';
											}
											echo'<input type="hidden" name="scenarpage" value="'.$scenar["scenario_id"].'"/>
											<input type="hidden" name="userid" value="'.$_SESSION["user_id"].'"/>
											</label>';

										echo'</form><a id="favnb'.$u.'">Favoris: '.$fav.'</a></li>';
										
								echo'</ul>
								<ul class="disc-univ">
									<li><h1>Description :<h1></li>
									<p>'.$scenar['scenario_desc'].'
									</p>
								</ul>
								<ul class="etapes-univ">
								<h1>Etapes :</h1>';
								$rech = mysqli_query($_SESSION["mysqli"], 'SELECT * FROM scenario_steps WHERE scenario_id='.$scenar["scenario_id"].';');
								while($etape = $rech->fetch_assoc()){ 
								echo'
									<div>
									<h2>'.$etape['step_nom'].'</h2>
									<li>
									<p>'.$etape['step_desc'].'</p>
									</li>
									</div>
								';
								}
							echo'</ul>
						
							  </div>
						</div>
						</div>
										'; 
						}
	}
	else die("");
?>
