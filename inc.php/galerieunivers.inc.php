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
					}
					echo'</div>';
	}
	else die("");
?>
