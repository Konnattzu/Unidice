<?php
	if(defined("constante")){
		echo'<div id="body_cre">';
		include_once('header.php');
		if(isset($_POST["univers"])){
			$req = mysqli_query($_SESSION["mysqli"], 'SELECT * FROM univers WHERE univers_id='.$_POST["univers"].';');
	            while($univ = $req->fetch_assoc()){
					$_SESSION["current_univ"] = $univ;
				}
			
		}
		
				echo'
				<div id="contenu_cre">
				<div class="titre">
				<h1>LISTE DES SCENARII
				'.$_SESSION["current_univ"]["univers_nom"].'
				<h1></div>
				<div class="navig">
				<a href="index.php?ref=creer"><div class="return"><p>Retour</p></div></a>
				</div>
								<div id="addbtn"><a href="index.php?ref=creerscenar">+</a></div>

				<div class="liste">
					<ul>';
						$req = mysqli_query($_SESSION["mysqli"], 'SELECT * FROM univers_scenarii WHERE univers_id='.$_SESSION["current_univ"]["univers_id"].';'); 
						while($owner = $req->fetch_assoc()){
							$req1 = mysqli_query($_SESSION["mysqli"], 'SELECT * FROM users_scenarii WHERE scenario_id='.$owner['scenario_id'].' AND user_id='.$_SESSION['user_id'].';'); 
							while($scenarii = $req1->fetch_assoc()){
							$req2 = mysqli_query($_SESSION["mysqli"], 'SELECT * FROM scenarii WHERE scenario_id='.$scenarii['scenario_id'].';'); 
							while($scenar = $req2->fetch_assoc()){
								echo'
								<li class="univ">
									<div class="titreEtBouton">
									<p class="titreuniv">'.$scenar['scenario_nom'].'</p>
									<div class="boutonmodif">
										<form action="index.php?ref=creerscenar" method="post">
										<label>
									<div class="modifier">
							  <div class="modifierG">
								<img src="images/engrenage.png">
							  </div>
							  <div class="modifierD">
								<p>Modifier</p>
							  </div>
										</div>
												<input type="submit" name="scenario" value="'.$scenar["scenario_id"].'" style="display:none"/>
										</label>
										</form>
									</div>
										</div>
									<p class="descuniv">'.$scenar['scenario_desc'].'</p>
								</li>';
							}
							}
						}

							// echo'

						// </ul>
						// <div id="pop-up">
					  	// <div>
					    	// <a id="fermer-pop-up" href="#" onclick="modifier()"><img class="icon" src="images/croix.png"></img></a>
								// <h2>Modifier Scenario</h2>
								// <form action="#" method="get">
									// <label>Nouveau nom</label>
									// <input type="text"></input>
									// <label>Nouveau genre</label>
									// <input type="text"></input>
									// <label>Nouveau monde</label>
									// <input type="text"></input>
									// <label>Nouveau monstre</label>
									// <input type="text"></input>
									// <input id="envoyer" type="submit" value="Enregistrer"/>
						    // </form>
					    // </div>
					  // </div>
					// 
		// <script type="text/javascript">
			// init_univ();
		// </script>
				
					// ';
					echo'</div>';
					include_once('footer.php');
					echo'</div></div>';
	}
	else die("");
?>
