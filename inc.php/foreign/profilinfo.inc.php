<?php
	if(defined("constante")){
		
				
		$query = mysqli_query($mysqli, "SELECT * FROM users WHERE user_id = '".$currentuser."'");
				while($tab = $query->fetch_assoc()){
					$queryimg = mysqli_query($mysqli, "SELECT image_path FROM images WHERE image_id = '".$tab['profil_img']."'");
					while($img = $queryimg->fetch_assoc()){
						$img_profil = $img["image_path"];
					}
					$pseudo = $tab['username'];
					$bio = $tab['user_bio'];
					$paramquery = mysqli_query($mysqli, "SELECT * FROM parametres WHERE user_id = '".$tab['user_id']."'");
					while($param = $paramquery->fetch_assoc()){
						$univdisp = $param["univers_disp"];
						$scenardisp = $param['scenarii_disp'];
						$persodisp = $param['persos_disp'];
					}
				}
	}
	else die("");
?>