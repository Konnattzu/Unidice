<?php
	if(defined("constante")){
		$req1 = mysqli_query($_SESSION["mysqli"], 'SELECT * FROM users_scenarii WHERE user_id='.$currentuser.' ORDER BY scenario_id DESC LIMIT 3;');
					            while($owner = $req1->fetch_assoc()){
									$req2 = mysqli_query($_SESSION["mysqli"], 'SELECT * FROM scenarii WHERE scenario_id='.$owner["scenario_id"].';');
					                while($scenar = $req2->fetch_assoc()){
									$scenarimg = $default_img;
									$req2 = mysqli_query($_SESSION["mysqli"], 'SELECT * FROM images WHERE image_id='.$scenar["scenario_img"].';');
									while($image = $req2->fetch_assoc()){
										$scenarimg = $image['image_path'];
									}
									echo'
										<form action="index.php?ref=explorer" method="post">
										<label class="bloc">
										<img class="galeries" src="'.$scenarimg.'" alt="Your profile image here !" onerror="this.onerror=null; this.src='.$default_img.'">
										<input type="submit" name="scenario" value="'.$scenar["scenario_id"].'" style="display:none"/>
										</label>
										<div class="gal-texte">'.$scenar["scenario_nom"].'</div>
									</form>';
									}
								}
	}
	else die("");
?>