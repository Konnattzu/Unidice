<?php
	if(defined("constante")){
		$req1 = mysqli_query($_SESSION["mysqli"], 'SELECT * FROM users_perso WHERE user_id='.$currentuser.' ORDER BY perso_id DESC LIMIT 3;');
		while($owner = $req1->fetch_assoc()){
			$req3 = mysqli_query($_SESSION["mysqli"], 'SELECT * FROM personnages WHERE perso_id='.$owner["perso_id"].';');
			while($perso = $req3->fetch_assoc()){
				$persoimg = $default_img;
				$req2 = mysqli_query($_SESSION["mysqli"], 'SELECT * FROM images WHERE image_id='.$perso["perso_img"].';');
				while($image = $req2->fetch_assoc()){
					$persoimg = $image['image_path'];
				}
				echo'<form action="index.php?ref=ficheperso" method="post">
				<label class="bloc">
				<img class="galeries" src="'.$persoimg.'" alt="Your profile image here !" onerror="this.onerror=null; this.src='.$default_img.'">
				
				<input type="submit" name="perso" value="'.$perso["perso_id"].'" style="display:none"/>
				</label>
				<div class="gal-texte">'.$perso["perso_nom"].'</div>
				</form>';
			}
		}
	}
	else die("");
?>