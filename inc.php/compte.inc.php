<?php

	if(defined("constante")){
		
		if(isset($_POST['userpage'])&&($_POST['userpage']!=$_SESSION['user_id'])){
			$_SESSION['userpage'] = $_POST['userpage'];
			$own = 0;
		}else{
			$own = 1;
		}
		echo'<div id="body_compte">';
				include('header.php');
				echo '<div id="contenu_compte">';
		if($own == 1){
			if(isset($_SESSION['user_id'])){
				$currentuser = $_SESSION['user_id'];
				$default_img = "'images/aj_photo.png'";
				include('inc.php/foreign/modifcompte.inc.php');

				include('inc.php/foreign/profilinfo.inc.php');
				echo'
						<div id="max-width">
							<section class="profil" id="profil">
								<form id="profiledit" action="index.php?ref=compte" method="post" enctype="multipart/form-data">
								<div class="box">
								<label class="profile_pic">
									<img id="img-profil" src="'.$img_profil.'" alt="Your profile image here !" onerror="this.onerror=null; this.src='.$default_img.'">
									<input id="setimg" type="file" name="prof_pic" style="display:none">
								</label>
							</div>
								<div class="name-likes" id="name-likes">
									<div class="column centre">
										<p id="dispname" type="text" style="display: ;">'.$pseudo.'</p>
										
										<!-- <p type="text">0</p> <img id="likes-icon" src="./images/heart-regular.svg"/><br> -->
										
									</div>
									<input id="editname" type="text" style="display: none;" name="pseudo" value="'.$pseudo.'">
								</div>
								<h2 class="edit-save">
									<img class="edit" src="./images/pen-solid.svg" width="30px" height="30px"/>
									<label>
									<img class="save" src="./images/floppy-disk-regular.svg" width="30px" height="30px" style="display:none"/>
										<input type="submit" name="submit" value="Enregistrer" style="display:none">
									</label>
								</h2>
								<div class="bio" id="bio">
									<div class="column centre">
										<div class="field textarea" id="bio-disp">
											<textarea cols="128" rows="5" placeholder="Bio..." disable>'.$bio.'</textarea>
										</div>
										<div class="field textarea" id="bio-edit" style="display:none">
											<textarea name="bio" cols="128" rows="5" maxlength="512" placeholder="Bio...">'.$bio.'</textarea>
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
										<label>';
									if($univdisp == 1){
										echo'<img class="hide1" src="./images/eye-slash-solid.svg" style="display: ;"/>
                        				<img class="visible1" src="./images/eye-solid.svg" style="display: none;"/>
										<input form="profiledit" class="checkdisp" type="checkbox" name="univdisp" value="0" style="display: none;">
									</label>
									</h2>
										<div class="column1 centre">';
									}else if($univdisp == 0){
										echo'<img class="hide1" src="./images/eye-slash-solid.svg" style="display: none;"/>
                        				<img class="visible1" src="./images/eye-solid.svg" style="display: ;"/>
										<input form="profiledit" class="checkdisp" type="checkbox" name="univdisp" value="1" style="display: none;">
										</label>
										</h2>
										<div class="column1 centre" style="display: none;">';
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
										<label>';
									if($scenardisp == 1){
										echo'<img class="hide2" src="./images/eye-slash-solid.svg" style="display: ;"/>
                        				<img class="visible2" src="./images/eye-solid.svg" style="display: none;"/>
										<input form="profiledit" class="checkdisp" type="checkbox" name="scenardisp" value="0" style="display: none;">
									</label>
									</h2>
										<div class="column2 centre">';
									}else if($scenardisp == 0){
										echo'<img class="hide2" src="./images/eye-slash-solid.svg" style="display: none;"/>
                        				<img class="visible2" src="./images/eye-solid.svg" style="display: ;"/>
										<input form="profiledit" class="checkdisp" type="checkbox" name="scenardisp" value="1" style="display: none;">
										</label>
										</h2>
										<div class="column2 centre" style="display: none;">';
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
										<label>';
									if($persodisp == 1){
										echo'<img class="hide3" src="./images/eye-slash-solid.svg" style="display: ;"/>
                        				<img class="visible3" src="./images/eye-solid.svg" style="display: none;"/>
										<input form="profiledit" class="checkdisp" type="checkbox" name="persodisp" value="0" style="display: none;">
									</label>
									</h2>
										<div class="column3 centre">';
									}else if($persodisp == 0){
										echo'<img class="hide3" src="./images/eye-slash-solid.svg" style="display: none;"/>
                        				<img class="visible3" src="./images/eye-solid.svg" style="display: ;"/>
										<input form="profiledit" class="checkdisp" type="checkbox" name="persodisp" value="1" style="display: none;">
										</label>
										</h2>
										<div class="column3 centre" style="display: none;">';
									}
									include('inc.php/foreign/rowperso.inc.php');
									echo'
					<script type="text/javascript" src="js/compte.js"></script>
							</section>
							<div class="compt-deco">
					<a href="index.php?ref=logout">Déconnexion</a>
							</div>
						</div></div>'; 
			}else{header('Location: index.php?ref=connexion');}
		}else if($own == 0){
			$currentuser = $_POST['userpage'];
			$default_img = "'images/aj_photo.png'";
			include('inc.php/foreign/foreigncompte.inc.php'); 
		}
		include('footer.php');
		echo'</div></div>';
	}
	else die("");
?>