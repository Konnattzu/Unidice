<?php
	if(defined("constante")){
		if(isset($_SESSION['userpage'])){
			$currentuser = $_SESSION['userpage'];
			$query = mysqli_query($mysqli, "SELECT username FROM users WHERE user_id = '".$currentuser."'");
			while($user = $query->fetch_assoc()){
				$Pseudo = $user['username'];
				
				$default_img = "'images/aj_photo.png'";
				include('inc.php/foreign/profilinfo.inc.php');
				
				echo'
						<div id="max-width">
							<section class="profil" id="profil">
								<form action="index.php?ref=compte" method="post" enctype="multipart/form-data">
								<div class="box">
								<label class="profile_pic">
								
									<img id="img-profil" src="'.$img_profil.'" alt="Your profile image here !" onerror="this.onerror=null; this.src='.$default_img.'">
									  
								</label>
							</div>
								<div class="name-likes" id="name-likes">
									<div class="column centre">
										<p type="text">'.$Pseudo.'</p>
										<!-- <p type="text">0</p> <img id="likes-icon" src="./images/heart-regular.svg"/><br> -->
										
									</div>
								</div>
								
								<div class="bio" id="bio">
									<div class="column centre">
										<div class="field textarea">
											<textarea cols="128" rows="5" placeholder="Bio..." disable>'.$bio.'</textarea>
										</div>
									</div>
								</div>
								</form>
							</section>
							<section class="galerie" id="univers">
								<div class="max-width">
								<h2 class="title">
								<form action="index.php?ref=galerie" method="post">
								<label>
								<u class="title-galerie">Galerie d&apos;univers</u>
										<input id="envoyer" type="submit" name="userpage" value="'.$currentuser.'" style="display:none"/>
									<input type="hidden" name="univers" value="1"/>
										</label>
									</form>
									</h2>';
									if($univdisp == 1){
										echo'<div class="column1 centre">';
									}else if($univdisp == 0){
										echo'<div class="column1 centre" style="display: none;">';
									}
								include('inc.php/foreign/rowuniv.inc.php'); 
									echo'</div>
								</div>
							</section>
							<section class="galerie" id="scénarie">
								<div class="max-width">
									<h2 class="title">
									<form action="index.php?ref=galerie" method="post">
								<label class="cattitle">
								<u class="title-galerie">Galerie de scénarii</u>
									<input id="envoyer" type="submit" name="userpage" value="'.$currentuser.'" style="display:none"/>
									<input type="hidden" name="scenario" value="1"/>
										</label>
									</form>
									</h2>';
									if($scenardisp == 1){
										echo'<div class="column1 centre">';
									}else if($scenardisp == 0){
										echo'<div class="column1 centre" style="display: none;">';
									}
								include('inc.php/foreign/rowscenar.inc.php');
									echo'</div>
								</div>
							</section>
							<section class="galerie" id="personnages">
								<div class="max-width">
									<h2 class="title">
									<form action="index.php?ref=galerie" method="post">
								<label class="cattitle">
									<u class="title-galerie">Galerie de personnages</u>
									<input id="envoyer" type="submit" name="userpage" value="'.$currentuser.'" style="display:none"/>
									<input type="hidden" name="personnage" value="1"/>
										</label>
									</form>
									</h2>'; 
									if($persodisp == 1){
										echo'<div class="column1 centre">';
									}else if($persodisp == 0){
										echo'<div class="column1 centre" style="display: none;">';
									}
									include('inc.php/foreign/rowperso.inc.php');
								
									
									echo'
					<script type="text/javascript" src="js/compte.js"></script>
						
					</div>
					</div>
					</div>'; 
				
			}
		}
	}
	else die("");
?>