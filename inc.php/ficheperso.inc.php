<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
if(defined("constante")){
echo'<div id="body_exp">';
	include("header.php");
	if (isset ($_POST["perso"])){
		$_SESSION["perso"]=$_POST["perso"];
	}
	if(isset($_SESSION["perso"])){
		echo $_SESSION["perso"];
	include("inc.php/foreign/infosperso.inc.php");
	echo'	<div id="contenu_exp">';
	echo'	<form action="index.php?ref=explorer" method="post">
			<input type="text" name="barre_de_recherche" id="barre_de_recherche" placeholder="Rechercher">
			</form>';
				echo '<div id="galerie-univers">GALERIE PERSOS</div>
			<div class="boite">
				<div class="univers">';
				$req = mysqli_query($_SESSION["mysqli"], 'SELECT * FROM personnages WHERE perso_id='.$_SESSION["perso"].';');
					$p=0;
					$default_img = "'../images/aj_photo.png'";
						$req = mysqli_query($_SESSION["mysqli"], 'SELECT * FROM personnages WHERE perso_id='.$_SESSION["perso"].';');
						while($perso = $req->fetch_assoc()){
							$p++;
							if($perso['perso_img'] == 0){
													$img_perso = $default_img;
												}else{
										$queryimg = mysqli_query($mysqli, "SELECT * FROM images WHERE image_id = '".$perso['perso_img']."'");
											while($img = $queryimg->fetch_assoc()){
												
													$img_perso = $img["image_path"];
												}
											}
							echo '<div>
							<div class="univers-item"><a href="#" onclick="modifieru('.$p.')"><img class="img-univ" src="'.$img_perso.'" alt="image personnage" onerror="this.onerror=null; this.src='.$default_img.'"></a></div>
							<div id="texte">'.$perso['perso_nom'].'</div>
					</div>';
					echo'<div id="pop-upu'.$p.'" style="display: ;">
						<div class="box">
						
							<span class="spanTB"></span>
							<span class="spanLR"></span>
								<!-- <span class="spanLR"></span> -->
							<div class="view-univ">
								 <a id="fermer-pop-up" href="#" onclick="modifieru('.$p.')"><img class="icon" src="images/croix.png" height="50"></img></a>
								<h1 class="title-univ">'.$perso['perso_nom'].'</h1>
								<ul class="info-univ">';
								
								$req2 = mysqli_query($_SESSION["mysqli"], 'SELECT * FROM users_perso WHERE perso_id='.$perso["perso_id"].';');
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
									<p>'.$oui_desc.'</p>
								</ul>
								
								<ul class="profil-univ">
								<li>Race: '.$oui_race.'</li>
								<li>Classe: '.$oui_classe.'</li>
								<li>Age: '.$oui_age.'</li>
								<li>Taille: '.$oui_taille.'</li>
								<li>Poids: '.$oui_poids.'</li>
								</ul>
								<p class="title-carac">Caractéristiques</p>';
								$req1 = mysqli_query($mysqli, 'SELECT * FROM univers_carac WHERE univers_id="'.$oui_univers.'";');
									  while($result = $req1->fetch_assoc()){
										  echo'
								<ul class="carac-univ">';
											$req2 = mysqli_query($mysqli, 'SELECT * FROM caracteristiques WHERE carac_id="'.$result['carac_id'].'";');
											while($carac = $req2->fetch_assoc()){
												echo'<li>'.$carac['carac_nom'].': ';
													$req3 =  mysqli_query($mysqli,'SELECT * FROM carac_values WHERE perso_id="'.$perso["perso_id"].'" AND carac_id="'.$result['carac_id'].'" ');
													while($coin = $req3->fetch_assoc()){
														echo $coin["value"];
													}
												echo'</li>';
											}
											echo'</ul>';
									  }
								
								
										echo'
								<ul class="info-univ">';
									echo'<form action="index.php?ref=galeriepersonnages" method="post">
											<input type="hidden" name="univ" value="'.$perso["perso_id"].'"/>
											<input id="envoyer" type="submit" value="Liste des personnages"/>
										</form>

								</ul>

							  </div>
						</div>
						</div>
										';
						
						
							   
							  }
							


								
						
							

			echo '</div>
			</div>
			</div>
			<script type="text/javascript" src="js/popup.js"></script>
			';



			}
			include("footer.php");
			echo'</div>
			</div>';
				}
	else die("");
?>
