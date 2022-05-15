<?php
	if(defined("constante")){
		include_once('header.php');
				$mysqli = $_SESSION['mysqli'];
				echo'
				<div id="contenu_cre">
				<div class="titre">
				<h1>LISTE DES PERSO</h1>
				</div>
				<div class="navig">
				<a href="index.php?ref=creer"><div class="return"><p>Retour</p></div></a>
				</div>
				<div class="liste">
					<ul>';
					if(isset($_POST['userpage'])){
						$row = mysqli_query($mysqli, 'SELECT * FROM users_perso WHERE user_id="'.$_POST['userpage'].'"');
						while($owner = $row->fetch_assoc()){
						$row2 = mysqli_query($mysqli, 'SELECT * FROM personnages WHERE perso_id="'.$owner['perso_id'].'"');
						while($perso = $row2->fetch_assoc()){
							/*$persoid = 
							$nomperso = 
							$persodesc = 
							$persouniv = 
							$persoclasse = 
							$persorace = 
							$persotaille = 
							$persopoids = 
							$persoage = 
							$persolvl = 
							$persocarac = 
							$persoinventory = 
							$persoimg = */
							
							echo $perso["perso_nom"];
							echo'
							<li class="univ">
								<div class="titreEtBouton">
								<p class="titreuniv">'.$perso["perso_nom"].'</p>
								<div class="boutonmodif">
								<a href="#" onclick="modifier()">
								<div class="modifier">
				          <div class="modifierG">
				            <img src="images/engrenage.png">
				          </div>
				          <div class="modifierD">
				            <p>Modifier</p>
				          </div>
									</div>
				          </a>
									<a href="index.php?ref=listescenarii">
									<div class="modifier">
					          <div class="modifierG">
					            <img src="images/bars-solid_black.svg">
					          </div>
					          <div class="modifierD">
					            <p>';
								$sqlreq = mysqli_query($mysqli, 'SELECT * FROM users_perso WHERE perso_id='.$perso["perso_id"].';');
								while($user = $sqlreq->fetch_assoc()){
									$userid = $user['user_id'];
$req = mysqli_query($mysqli, 'SELECT username FROM users WHERE user_id='.$userid.';');
								while($username = $req->fetch_assoc()){
									echo $username['username'];
								}

								}
								echo'</p>
					          </div>
										</div>
					          </a>
								</div>
									</div>
								<p class="descuniv">'.$perso["perso_desc"].'</p>
							</li>';
						}
						}
						}else {
							$row2 = mysqli_query($mysqli, 'SELECT * FROM personnages WHERE perso_id="'.$_SESSION['perso_id'].'"');
						while($perso = $row2->fetch_assoc()){
							/*$persoid = 
							$nomperso = 
							$persodesc = 
							$persouniv = 
							$persoclasse = 
							$persorace = 
							$persotaille = 
							$persopoids = 
							$persoage = 
							$persolvl = 
							$persocarac = 
							$persoinventory = 
							$persoimg = */
							
							echo $perso["perso_nom"];
							echo'
							<li class="univ">
								<div class="titreEtBouton">
								<p class="titreuniv">'.$perso["perso_nom"].'</p>
								<div class="boutonmodif">
								<a href="#" onclick="modifier()">
								<div class="modifier">
				          <div class="modifierG">
				            <img src="images/engrenage.png">
				          </div>
				          <div class="modifierD">
				            <p>Modifier</p>
				          </div>
									</div>
				          </a>
									<a href="index.php?ref=listescenarii">
									<div class="modifier">
					          <div class="modifierG">
					            <img src="images/bars-solid_black.svg">
					          </div>
					          <div class="modifierD">
					            <p>';
								$sqlreq = mysqli_query($mysqli, 'SELECT * FROM users_perso WHERE perso_id='.$perso["perso_id"].';');
								while($user = $sqlreq->fetch_assoc()){
									$userid = $user['user_id'];
$req = mysqli_query($mysqli, 'SELECT username FROM users WHERE user_id='.$userid.';');
								while($username = $req->fetch_assoc()){
									echo $username['username'];
								}

								}
								echo'</p>
					          </div>
										</div>
					          </a>
								</div>
									</div>
								<p class="descuniv">'.$perso["perso_desc"].'</p>
							</li>';
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
					  </div>';
						}
					echo'</div>
		<script type="text/javascript">
			init_univ();
		</script>
				</div>
					';
		
					include_once('footer.php');
	}
	else die("");
?>
