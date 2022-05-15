<?php
	if(defined("constante")){
		echo'<div id="body_cre">';
		include_once('header.php');
				echo'
				<div id="contenu_cre">
				<div class="titre">
				<h1>LISTE DES UNIVERS</h1>
				</div>
				<div class="navig">
				</div>
				<div id="addbtn"><a href="index.php?ref=creeruniv">+</a></div>
				<div class="liste">
				<ul>';
						$req = mysqli_query($_SESSION["mysqli"], 'SELECT * FROM users_univers WHERE user_id='.$_SESSION['user_id'].';'); 
						while($owner = $req->fetch_assoc()){
						$req2 = mysqli_query($_SESSION["mysqli"], 'SELECT * FROM univers WHERE univers_id='.$owner['univers_id'].';'); 
						while($univ = $req2->fetch_assoc()){
							echo'
							<div>
							<li class="univ">
								<div class="titreEtBouton">
									<p class="titreuniv">'.$univ['univers_nom'].'</p>
									<div class="boutonmodif">
										<form action="index.php?ref=creeruniv" method="post">
										<label>
										<div class="modifier">
											  <div class="modifierG">
												<img src="images/engrenage.png">
											  </div>
											  <div class="modifierD">
												<p>Modifier</p>
											  </div>
												<input type="submit" name="univers" value="'.$univ["univers_id"].'" style="display:none"/>
										</div>
										</label>
										</form>
									<form action="index.php?ref=listescenarii" method="post">
										<label class="bloc">
										<input type="submit" name="univers" value="'.$univ["univers_id"].'" style="display:none"/>
									<div class="modifier">
					          <div class="modifierG">
					            <img src="images/bars-solid_black.svg">
					          </div>
					          <div class="modifierD">
					            <p>Scenarii</p>
					          </div>
										</div>
					          
										</label>
									</form>
								</div>
									</div>
								<p class="descuniv">'.$univ['univers_desc'].'</p>
							</li>
							</div>';
							}
						}

							echo'

						</ul>
						<div id="pop-up">
					  	<div>
					    	<a id="fermer-pop-up" href="#" onclick="modifier()"><img class="icon" src="images/croix.png"></img></a>
								<h2>Modifier Univers</h2>
								<form action="#" method="get">
									<label>Nouveau nom</label>
									<input type="text"></input>
									<label>Nouveau genre</label>
									<input type="text"></input>
									<label>Nouveau monde</label>
									<input type="text"></input>
									<label>Nouveau monstre</label>
									<input type="text"></input>
									<input id="envoyer" type="submit" value="Enregistrer"/>
						    </form>
					    </div>
					  </div>
					</div>
		<script type="text/javascript">
			init_univ();
		</script>
		';
		echo'</div>';
	include_once('footer.php');
	echo'</div>';
	}
	else die("");
?>
