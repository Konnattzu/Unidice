<?php
	if(defined("constante")){
		$req = mysqli_query($_SESSION["mysqli"], 'SELECT * FROM univers ORDER BY univers_id DESC LIMIT 100;');
						$u=0;
						$pop=0;
						while($univ = $req->fetch_assoc()){ 
							$u++;
							$pop++;
							echo '<div>
							<div class="univers-item"><a href="#" onclick="modifieru('.$u.')"><img class="img-univ" src="../images/epee.png" alt="image univers"></a></div>
							<div id="texte">'.$gal['galerie_nom'].'</div>
					</div>';
					echo'<div id="pop-upu'.$u.'" style="display: none;">
						<div>
							   <div class="view-univ">
								 <a id="fermer-pop-up" href="#" onclick="modifieru('.$u.')"><img class="icon" src="images/croix.png" height="50"></img></a>
								<h1 class="title-gal">'.$gal['galerie_nom'].'</h1>
								<ul class="tag-gal">
									<li><u>Tags</u> :</li>';
									$req4 = mysqli_query($_SESSION["mysqli"], 'SELECT * FROM tags WHERE gal_id='.$gal["galerie_id"].';');
										while($tag = $req4->fetch_assoc()){  
											echo '<li>'.$tag["tag_name"].'</li>';
										}
								echo'</ul> 
								<ul class="info-gal">';
								$req2 = mysqli_query($_SESSION["mysqli"], 'SELECT * FROM users_galerie WHERE galerie_id='.$gal["galerie_id"].';');
										while($owner_id = $req2->fetch_assoc()){
										 $req3 = mysqli_query($_SESSION["mysqli"], 'SELECT * FROM users WHERE user_id='.$owner_id["user_id"].';');
										 while($owner = $req3->fetch_assoc()){
											  echo '<li id="createur><i">Créateur :<form action="index.php?ref=compte" method="post" id="nom_user">
											<input type="hidden" name="userpage" value="'.$owner["user_id"].'"/>
											<input id="envoyer" type="submit" value="'.$owner["username"].'"/>
										</form></i></li>';
																  }
										}
										$likes = mysqli_num_rows(mysqli_query($_SESSION["mysqli"], 'SELECT * FROM univers_likes WHERE univers_id='.$univ["univers_id"].';'));
										$fav = mysqli_num_rows(mysqli_query($_SESSION["mysqli"], 'SELECT * FROM univers_fav WHERE univers_id='.$univ["univers_id"].';'));			
										echo'<li class="floatright"><a>Like: '.$likes.'</a></li>
										<li class="floatright"><a>Favoris: '.$fav.'</a></li>
								</ul>
								<ul class="disc-univ">
									<li>Description :</li>
									<p>'.$univ['univers_desc'].'
									</p>
								</ul>
								<ul class="disc-univ">
									<li class="caract">Caractéristiques :</li>
									<p id="caract">'.$univ['univers_desc'].'
									</p>
								</ul>
								<ul class="info-univ">';
									echo'<form action="index.php?ref=galeriescenarii" method="post">
											<input type="hidden" name="univ" value="'.$univ["univers_id"].'"/>
											<input id="envoyer" type="submit" value="Liste des scenarii"/>
										</form>
										<form action="index.php?ref=creerscenarii" method="post">
											<input type="hidden" name="univ" value="'.$univ["univers_id"].'"/>
											<input id="envoyer" type="submit" value="Créer un scénario"/>
										</form>
										<form action="index.php?ref=creerperso" method="post">
											<input type="hidden" name="univ" value="'.$univ["univers_id"].'"/>
											<input id="envoyer" type="submit" value="Créer un personnage"/>
										</form>
								</ul>
							  </div>
						</div>
						</div>
						
										'; 
						}
						echo'<script>
						let btn = document.getElementByClassName("btn");
						let p = document.getElementByClassName("p");
						for (i=0;i<'.$pop.';i++){
							btn.addEventListener("click", () => {
								if(getComputedStyle(p[i]).display != "none"){
									p[i].style.display = "none";
								} else {
									p[i].style.display = "block";
								}
								})
						}
						</script>';
	}
	else die("");
?>
