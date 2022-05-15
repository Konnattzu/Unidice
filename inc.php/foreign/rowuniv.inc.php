<?php
		$req1 = mysqli_query($_SESSION["mysqli"], 'SELECT * FROM users_univers WHERE user_id='.$currentuser.' ORDER BY univers_id DESC LIMIT 3;');
					            while($owner = $req1->fetch_assoc()){
									$req2 = mysqli_query($_SESSION["mysqli"], 'SELECT * FROM univers WHERE univers_id='.$owner["univers_id"].';');
					                while($univ = $req2->fetch_assoc()){
									$univimg = $default_img;
									$req2 = mysqli_query($_SESSION["mysqli"], 'SELECT * FROM images WHERE image_id='.$univ["univers_img"].';');
									while($image = $req2->fetch_assoc()){
										$univimg = $image['image_path'];
									}
									echo'
										<form action="index.php?ref=explorer" method="post">
										<label class="bloc">
										<img class="galeries" src="'.$univimg.'" alt="Your profile image here !" onerror="this.onerror=null; this.src='.$default_img.'">
										
										<input type="submit" name="univers" value="'.$univ["univers_id"].'" style="display:none"/>
										</label>
										<div class="gal-texte">'.$univ["univers_nom"].'</div>
									</form>';
									}
								}

?>