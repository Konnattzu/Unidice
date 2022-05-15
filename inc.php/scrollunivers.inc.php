<?php
	if(defined("constante")){
		$req = mysqli_query($_SESSION["mysqli"], 'SELECT * FROM univers ORDER BY univers_id DESC LIMIT 100;');
			$u=0;
			while($univ = $req->fetch_assoc()){ 
			$u++;
			echo '<div class="univers-item"><a href="#" onclick="modifieru('.$u.')"><img class="img-univ" src="../images/epee.png" alt="image univers"></a></div>
			<div id="texte">'.$univ['univers_nom'].'</div>
			</div>';
			echo'<div id="pop-upu'.$u.'" style="visibility: hidden;">
				<div>
					<div class="view-univ">
						<a id="fermer-pop-up" href="#" onclick="modifieru('.$u.')"><img class="icon" src="images/croix.png" height="50"></img></a>
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
								echo '<li><i><form action="index.php?ref=compte" method="post">
								<input type="hidden" name="userpage" value="'.$owner["user_id"].'"/>
								<input id="envoyer" type="submit" value="'.$owner["username"].'"/>
								</form></i></li>';
							}
						}
						$likes = mysqli_num_rows(mysqli_query($_SESSION["mysqli"], 'SELECT * FROM univers_likes WHERE univers_id='.$univ["univers_id"].';'));
						$fav = mysqli_num_rows(mysqli_query($_SESSION["mysqli"], 'SELECT * FROM univers_fav WHERE univers_id='.$univ["univers_id"].';'));			
						echo'<li><a>Like: '.$likes.'</a></li>
						<li><a>Favoris: '.$fav.'</a></li>
						</ul>
						<ul class="disc-univ">
						<li>Description :</li>
						<p>'.$univ['univers_desc'].'
						</p>
						</ul>
						<ul class="info-univ">';
						echo'<form action="index.php?ref=listescenarii" method="post">
						<input type="hidden" name="univ" value="'.$univ["univers_id"].'"/>
						<input id="envoyer" type="submit" value="Liste des scenarii"/>
						</form>
						<li><a>Créer un scénario</a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
	<script>
	function modifieru(i) {
		el = document.getElementById("pop-up"+i);
		el.style.visibility = (el.style.visibility == "visible") ? "hidden" : "visible";
	}
	function modifiers(i) {
		el = document.getElementById("pop-up"+i);
		el.style.visibility = (el.style.visibility == "visible") ? "hidden" : "visible";
	}
	</script>'; 
	}
	}
	else die("");
?>
