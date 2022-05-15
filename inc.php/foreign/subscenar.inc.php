<?php
include("../bddconnect.inc.php");
$userid = $_SESSION['user_id'];
$sid = $_POST["scenario"];
$nom = $_POST["nomscenar"];
$description = $_POST["scenardesc"];

	if(isset($sid) && $sid != ""){
		if(mysqli_num_rows(mysqli_query($_SESSION["mysqli"], 'SELECT * FROM scenarii WHERE scenario_id="'.$sid.'";'))>=1){
			mysqli_query($_SESSION["mysqli"], 'UPDATE `scenarii` SET `scenario_nom`="'.$nom.'" WHERE scenario_id="'.$sid.'"');
			$rech = mysqli_query($_SESSION["mysqli"], 'SELECT * FROM scenarii WHERE scenario_id="'.$sid.'";');
		}
	}else if(isset($nom) && $nom != ""){
		mysqli_query($_SESSION["mysqli"], 'INSERT INTO `scenarii`(`scenario_nom`) VALUES ("'.$nom.'")');
		$rech = mysqli_query($_SESSION["mysqli"], 'SELECT * FROM scenarii ORDER BY scenario_id DESC LIMIT 1;');
	}


while($scenar=$rech->fetch_assoc()){		
		if(isset($description) && $description != ""){
			mysqli_query($_SESSION["mysqli"], 'UPDATE `scenarii` SET `scenario_desc`="'.$description.'" WHERE scenario_id="'.$scenar['scenario_id'].'"');
		}
	for($i = 9;$i >= 0;$i--){	
	if(isset($_POST['tagchain'.$i]) && ($_POST['tagchain'.$i] != "")){
		$tags = $_POST['tagchain'.$i];	
			mysqli_query($_SESSION["mysqli"],  'INSERT INTO `tags`(`tag_name`,`scenario_id`) VALUES ("'.$tags.'","'.$scenar['scenario_id'].'")');	
	}

	}
	for($i = 0;$i <= 100;$i++){	
	if(isset($_POST['nomEtape'.$i]) && ($_POST['nomEtape'.$i] != "")){
		$etapeTitre = $_POST['nomEtape'.$i];
		$etapeDesc = $_POST['descEtape'.$i];	
			mysqli_query($_SESSION["mysqli"],  'INSERT INTO `scenario_steps`(`scenario_id`,`step_nom`,`step_desc`) VALUES ("'.$scenar['scenario_id'].'","'.$etapeTitre.'","'.$etapeDesc.'")');	
	}

	}
	mysqli_query($_SESSION["mysqli"],  'INSERT INTO `users_scenarii`(`user_id`,`scenario_id`) VALUES ("'.$userid.'","'.$scenar['scenario_id'].'")');	
	mysqli_query($_SESSION["mysqli"],  'INSERT INTO `univers_scenarii`(`univers_id`,`scenario_id`) VALUES ("'.$_SESSION['current_univ']['univers_id'].'","'.$scenar['scenario_id'].'")');	

	if (isset($_FILES['prof_pic']) AND $_FILES['prof_pic']['error'] == 0){
		if ($_FILES['prof_pic']['size'] <= 20000000){
			   $infosfichier = pathinfo($_FILES['prof_pic']['name']);
			   $extension_upload = $infosfichier['extension'];
			   $extensions_autorisees = array('jpg', 'jpeg', 'gif', 'png');
			   if (in_array($extension_upload, $extensions_autorisees)){ 
				   move_uploaded_file($_FILES['prof_pic']['tmp_name'],'bdd_img/'.$_FILES['prof_pic']['name']);
				   echo "Les changements on été sauvegardés !";
					$query = mysqli_query($mysqli, "SELECT * FROM scenarii WHERE scenario_id = '".$scenar['scenario_id']."'");
					while ($row = mysqli_fetch_array($query)) {
						$pp = $row['univers_img'];
					}
					if($pp==0){
						mysqli_query($mysqli, "INSERT INTO `images`(`image_name`, `image_path`) VALUES ('".$_FILES['prof_pic']['name']."','bdd_img/".$_FILES['prof_pic']['name']."')");
						$img_query = mysqli_query($mysqli, "SELECT image_id FROM images WHERE image_name = '".$_FILES['prof_pic']['name']."'");
						while ($row = mysqli_fetch_array($img_query)) {
							$img_id = $row['image_id'];
						}
						mysqli_query($mysqli, "UPDATE `scenarii` SET `scenario_img`='".$img_id."' WHERE scenario_id = '".$univ['scenario_id']."'");
					}else{
						mysqli_query($mysqli, "UPDATE `images` SET `image_name`='".$_FILES['prof_pic']['name']."',`image_path`='bdd_img/".$_FILES['prof_pic']['name']."' WHERE image_id = '".$pp."'");
					}
				}
			}
		}
		echo $scenar['scenario_id'];
}
?>
