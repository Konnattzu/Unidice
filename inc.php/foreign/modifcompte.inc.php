<?php
	if(defined("constante")){
		if(isset($_POST['submit'])){
			if (isset($_FILES['prof_pic']) AND $_FILES['prof_pic']['error'] == 0){
				if ($_FILES['prof_pic']['size'] <= 20000000){
				   $infosfichier = pathinfo($_FILES['prof_pic']['name']);
				   $extension_upload = $infosfichier['extension'];
				   $extensions_autorisees = array('jpg', 'jpeg', 'gif', 'png');
				   if (in_array($extension_upload, $extensions_autorisees)){ 
					   move_uploaded_file($_FILES['prof_pic']['tmp_name'],'bdd_img/'.$_FILES['prof_pic']['name']);
					   echo "Les changements on été sauvegardés !";
						$query = mysqli_query($mysqli, "SELECT * FROM users WHERE user_id = '".$currentuser."'");
						while ($row = mysqli_fetch_array($query)) {
							$pp = $row['profil_img'];
						}
						if($pp==0){
							mysqli_query($mysqli, "INSERT INTO `images`(`image_name`, `image_path`) VALUES ('".$_FILES['prof_pic']['name']."','bdd_img/".$_FILES['prof_pic']['name']."')");
							$img_query = mysqli_query($mysqli, "SELECT image_id FROM images WHERE image_name = '".$_FILES['prof_pic']['name']."'");
							while ($row = mysqli_fetch_array($img_query)) {
								$img_id = $row['image_id'];
							}
							mysqli_query($mysqli, "UPDATE `users` SET `profil_img`='".$img_id."' WHERE user_id = '".$currentuser."'");
						}else{
							mysqli_query($mysqli, "UPDATE `images` SET `image_name`='".$_FILES['prof_pic']['name']."',`image_path`='bdd_img/".$_FILES['prof_pic']['name']."' WHERE image_id = '".$pp."'");
						}
					}
				}
			}
			if(isset($_POST['bio'])){
				mysqli_query($mysqli, "UPDATE `users` SET `user_bio`='".$_POST['bio']."' WHERE user_id='".$currentuser."'");
			}
			if(isset($_POST['pseudo'])){
				if (!strlen(trim($_POST['pseudo']))) {
				
				}else{
					mysqli_query($mysqli, "UPDATE `users` SET `username`='".trim($_POST['pseudo'])."' WHERE user_id='".$currentuser."'");
				}
			}
			if(isset($_POST['univdisp'])){
				mysqli_query($mysqli, "UPDATE `parametres` SET `univers_disp`='".$_POST['univdisp']."' WHERE user_id='".$currentuser."'");
			}
			if(isset($_POST['scenardisp'])){
				mysqli_query($mysqli, "UPDATE `parametres` SET `scenarii_disp`='".$_POST['scenardisp']."' WHERE user_id='".$currentuser."'");
			}
			if(isset($_POST['persodisp'])){
				mysqli_query($mysqli, "UPDATE `parametres`SET `persos_disp`='".$_POST['persodisp']."' WHERE user_id='".$currentuser."'");
			}
			
		}
	}
	else die("");
?>