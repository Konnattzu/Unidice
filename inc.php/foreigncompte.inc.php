<?php
	if(defined("constante")){
		include('inc.php/foreign/profilimg.inc.php');
				
				echo'
						<div id="max-width">
							<section class="profil" id="profil">
								<form action="index.php?ref=compte" method="post" enctype="multipart/form-data">
								<div class="box">
								<label class="profile_pic">
								
									<img id="img-profil" src="'.$img_profil.'" alt="Your profile image here !" onerror="this.onerror=null; this.src='.$default_img.'">
									<input type="file" name="prof_pic" style="display:none">
									  
								</label>
							</div>
								<div class="name-likes" id="name-likes">
									<div class="column centre">
										<p type="text">'.$Pseudo.'</p>
										<p type="text">8</p>
										<img id="likes-icon" src="./images/heart-regular.svg"/><br>
									</div>
								</div>
								<h2 class="edit-save">
								
                    <img class="edit" src="./images/pen-solid.svg" width="30px" height="30px"/>
					<label>
                    <img class="save" src="./images/floppy-disk-regular.svg" width="30px" height="30px"/></h2>
					
								<input type="submit" name="submit" value="Enregistrer" style="display:none">
					</label>
								<div class="bio" id="bio">
									<div class="column centre">
										<div class="field textarea">
											<textarea cols="30" rows="10" placeholder="Bio..." style="pointer-events: none;"></textarea>
										</div>
									</div>
								</div>
								</form>
							</section>
							<section class="galerie" id="univers">
								<div class="max-width">
								<h2 class="title">
								<form action="index.php?ref=galerieunivers" method="post">
								<label class="cattitle">
								<u>Galerie d&apos;univers</u>
										<input id="envoyer" type="submit" name="userpage" value="'.$currentuser.'" style="display:none"/>
										</label>
									</form>
									<img class="hide1" src="./images/eye-slash-solid.svg"/>
                        <img class="visible1" src="./images/eye-solid.svg"/></h2>
									<div class="column1 centre">';
								include('inc.php/foreign/rowuniv.inc.php');
									echo'</div>
								</div>
							</section>
							<section class="galerie" id="scénarie">
								<div class="max-width">
									<h2 class="title">
									<u><form action="index.php?ref=galeriescenarii" method="post">
								<label class="cattitle">
									Galerie de scénarii
									
									<input id="envoyer" type="submit" name="userpage" value="'.$currentuser.'" style="display:none"/>
										</label>
									</form></u> 
									<img class="hide1" src="./images/eye-slash-solid.svg"/>
                        <img class="visible1" src="./images/eye-solid.svg"/></h2>
									<div class="column2 centre">';
								include('inc.php/foreign/rowscenar.inc.php');
									echo'</div>
								</div>
							</section>
							<section class="galerie" id="personnages">
								<div class="max-width">
									<h2 class="title">
									<form action="index.php?ref=galeriepersos" method="post">
								<label class="cattitle">
									<u>Galerie de personnages</u>
									
									<input id="envoyer" type="submit" name="userpage" value="'.$currentuser.'" style="display:none"/>
										</label>
									</form>
									<img class="hide1" src="./images/eye-slash-solid.svg"/>
                        <img class="visible1" src="./images/eye-solid.svg"/></h2>
									<div class="column3 centre">';
									include('inc.php/foreign/rowperso.inc.php');
								
									
									echo'<script src="js/compte.js"></script>
									</div>
								</div>
							</section>
						</div>
						
					</div>'; 
	}
	else die("");
?>