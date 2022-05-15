<?php
	if(defined("constante")){
		
				
		$query = mysqli_query($mysqli, "SELECT * FROM users WHERE user_id = '".$currentuser."'");
				while($tab = $query->fetch_assoc()){
				$queryimg = mysqli_query($mysqli, "SELECT image_path FROM images WHERE image_id = '".$tab['profil_img']."'");
					while($img = $queryimg->fetch_assoc()){
						$img_profil = $img["image_path"];
					}
				}
	}
	else die("");
?>