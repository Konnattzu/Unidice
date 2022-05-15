<?php
include("../bddconnect.inc.php");
	$userid = $_SESSION['user_id'];
	$unid = $_POST["univers"];
	$nom = $_POST["nomuniv"];
	$description = $_POST["univdesc"]; 

	if(isset($unid) && $unid != ""){
		if(mysqli_num_rows(mysqli_query($_SESSION["mysqli"], 'SELECT * FROM univers WHERE univers_id="'.$unid.'";'))>=1){
			mysqli_query($_SESSION["mysqli"], 'UPDATE `univers` SET `univers_nom`="'.$nom.'" WHERE univers_id="'.$unid.'"');
			$rech = mysqli_query($_SESSION["mysqli"], 'SELECT * FROM univers WHERE univers_id="'.$unid.'";');
		}
	}else if(isset($nom) && $nom != ""){
		mysqli_query($_SESSION["mysqli"], 'INSERT INTO `univers`(`univers_nom`) VALUES ("'.$nom.'")');
		$rech = mysqli_query($_SESSION["mysqli"], 'SELECT * FROM univers ORDER BY univers_id DESC LIMIT 1;');
	}

	while($univ=$rech->fetch_assoc()){		
		if(isset($description) && $description != ""){
			mysqli_query($_SESSION["mysqli"], 'UPDATE `univers` SET `univers_desc`="'.$description.'" WHERE univers_id="'.$univ['univers_id'].'"');
		}
		for($i = 9;$i >= 0;$i--){	
		if(isset($_POST['tagchain'.$i]) && ($_POST['tagchain'.$i] != "")){
			$tags = ($_POST['tagchain'.$i]);	
				mysqli_query($_SESSION["mysqli"],  'INSERT INTO `tags`(`tag_name`,`univers_id`) VALUES ("'.$tags.'","'.$univ['univers_id'].'")');	
		}

		}
		for($i = 1;$i <= 16;$i++){	
		if((isset($_POST['nombrelances'.$i]) && ($_POST['nombrelances'.$i] != "")) && (isset($_POST['Valeur'.$i]) && ($_POST['Valeur'.$i] != ""))){
			$deLancer = $_POST['nombrelances'.$i];
			$deValeur = $_POST['Valeur'.$i];	
				mysqli_query($_SESSION["mysqli"],  'INSERT INTO `dice`(`univers_id`, `nb_dice`, `valeur`) VALUES ("'.$univ['univers_id'].'","'.$deLancer.'","'.$deValeur.'")');	
		}
		}
		for($i = 1;$i <= 20;$i++){	
		if(isset($_POST['nomClasse'.$i]) && ($_POST['nomClasse'.$i] != "")){
			$classeNom = $_POST['nomClasse'.$i];
			$classeDesc = $_POST['descClasse'.$i];	
			echo $_POST['nomClasse'.$i];
			mysqli_query($_SESSION["mysqli"],  'INSERT INTO `classes`(`classe_nom`, `classe_desc`) VALUES ("'.$classeNom.'", "'.$classeDesc.'")');	
			$rech = mysqli_query($_SESSION["mysqli"], 'SELECT * FROM classes ORDER BY classe_id DESC LIMIT 1;');
			while($classe=$rech->fetch_assoc()){
				mysqli_query($_SESSION["mysqli"],  'INSERT INTO `univers_classe`(`univers_id`, `classe_id`) VALUES ("'.$univ['univers_id'].'","'.$classe['classe_id'].'")');	
			}
		}
		}
		for($i = 1;$i <= 20;$i++){	
		if(isset($_POST['nomRace'.$i]) && ($_POST['descRace'.$i] != "")){
			$raceNom = $_POST['nomRace'.$i];
			$raceDesc = $_POST['descRace'.$i];	
			mysqli_query($_SESSION["mysqli"],  'INSERT INTO `races`(`race_nom`, `race_desc`) VALUES ("'.$raceNom.'", "'.$raceDesc.'")');	
			$rech = mysqli_query($_SESSION["mysqli"], 'SELECT * FROM races ORDER BY race_id DESC LIMIT 1;');
			while($race=$rech->fetch_assoc()){
				mysqli_query($_SESSION["mysqli"],  'INSERT INTO `univers_race`(`univers_id`, `race_id`) VALUES ("'.$univ['univers_id'].'","'.$race['race_id'].'")');	
			}
				
		}
		}
		for($i = 1;$i <= 20;$i++){	
		if(isset($_POST['nomObjet'.$i]) && ($_POST['descObj'.$i] != "")){
			$objetNom = $_POST['nomObjet'.$i];
			$objetDesc = $_POST['descObj'.$i];	
			mysqli_query($_SESSION["mysqli"],  'INSERT INTO `objets`(`obj_nom`, `obj_desc`, `univers_id`) VALUES ("'.$objetNom.'", "'.$objetDesc.'", "'.$univ['univers_id'].'")');	
					
		}
		}
		mysqli_query($_SESSION["mysqli"],  'INSERT INTO `users_univers`(`user_id`,`univers_id`) VALUES ("'.$userid.'","'.$univ['univers_id'].'")');	
		
		if (isset($_FILES['prof_pic']) AND $_FILES['prof_pic']['error'] == 0){
		if ($_FILES['prof_pic']['size'] <= 20000000){
			   $infosfichier = pathinfo($_FILES['prof_pic']['name']);
			   $extension_upload = $infosfichier['extension'];
			   $extensions_autorisees = array('jpg', 'jpeg', 'gif', 'png');
			   if (in_array($extension_upload, $extensions_autorisees)){ 
				   move_uploaded_file($_FILES['prof_pic']['tmp_name'],'bdd_img/'.$_FILES['prof_pic']['name']);
				   echo "Les changements on été sauvegardés !";
					$query = mysqli_query($mysqli, "SELECT * FROM univers WHERE univers_id = '".$univ['univers_id']."'");
					while ($row = mysqli_fetch_array($query)) {
						$pp = $row['univers_img'];
					}
					if($pp==0){
						mysqli_query($mysqli, "INSERT INTO `images`(`image_name`, `image_path`) VALUES ('".$_FILES['prof_pic']['name']."','bdd_img/".$_FILES['prof_pic']['name']."')");
						$img_query = mysqli_query($mysqli, "SELECT image_id FROM images WHERE image_name = '".$_FILES['prof_pic']['name']."'");
						while ($row = mysqli_fetch_array($img_query)) {
							$img_id = $row['image_id'];
						}
						mysqli_query($mysqli, "UPDATE `univers` SET `univers_img`='".$img_id."' WHERE univers_id = '".$univ['univers_id']."'");
					}else{
						mysqli_query($mysqli, "UPDATE `images` SET `image_name`='".$_FILES['prof_pic']['name']."',`image_path`='bdd_img/".$_FILES['prof_pic']['name']."' WHERE image_id = '".$pp."'");
					}
				}
			}
		}
		echo $univ['univers_id'];
	}
?>
