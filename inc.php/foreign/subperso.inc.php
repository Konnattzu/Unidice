<?php

$userid = $_SESSION['user_id'];
$pid = $_POST['personnage'];
$nom = $_POST["nomperso"];
$description = $_POST["persodesc"];
$univers = $_SESSION['univ'];
$race = $_POST["race"];
$classe = $_POST["classe"];
$age = $_POST["age"];
$taille = $_POST["taille"];
$poids = $_POST["poids"];
$length = $_POST["length"];
$limit = $_POST["limit"];
$totalstat = 0;
$caracid = array();
$caracvalue = array();
for($i = 1; $i <= $length; $i++){
	$caracid[$i] = $_POST["caracid".$i];
	$caracvalue[$i] = $_POST["carac".$i];
}
for($i=1; $i <= count($caracvalue); $i++){
	$totalstat += $caracvalue[$i];
	echo $totalstat.' ';
	if($totalstat > $limit){
		$outrange = true;
	}
}

	if(isset($pid) && $pid != ""){
		if(mysqli_num_rows(mysqli_query($_SESSION["mysqli"], 'SELECT * FROM personnages WHERE perso_id="'.$pid.'";'))>=1){
			mysqli_query($_SESSION["mysqli"], 'UPDATE `personnages` SET `perso_nom`="'.$nom.'" WHERE perso_id="'.$pid.'"');
			$rech = mysqli_query($_SESSION["mysqli"], 'SELECT * FROM personnages WHERE perso_id="'.$pid.'";');
		}
	}else if(isset($nom) && $nom != ""){
		mysqli_query($_SESSION["mysqli"], 'INSERT INTO `personnages`(`perso_nom`) VALUES ("'.$nom.'")');
		$rech = mysqli_query($_SESSION["mysqli"], 'SELECT * FROM personnages ORDER BY perso_id DESC LIMIT 1;');
	}


if($outrange == false){		
	while($perso=$rech->fetch_assoc()){
		$persoid = $perso['perso_id'];
		mysqli_query($_SESSION["mysqli"], 'UPDATE personnages SET (perso_desc="'.$description.'", perso_univers="'.$univers.'", perso_classe="'.$classe.'", perso_race="'.$race.'", perso_taille="'.$taille.'", perso_poids="'.$poids.'", perso_age="'.$age.'", perso_lvl="1") WHERE perso_id="'.$persoid.'";');
		if (isset($_FILES['prof_pic']) AND $_FILES['prof_pic']['error'] == 0){
		if ($_FILES['prof_pic']['size'] <= 20000000){
							   $infosfichier = pathinfo($_FILES['prof_pic']['name']);
							   $extension_upload = $infosfichier['extension'];
							   $extensions_autorisees = array('jpg', 'jpeg', 'gif', 'png');
							   if (in_array($extension_upload, $extensions_autorisees)){ 
								   move_uploaded_file($_FILES['prof_pic']['tmp_name'],'bdd_img/'.$_FILES['prof_pic']['name']);
								   echo "Les changements on été sauvegardés !";
									$query = mysqli_query($mysqli, "SELECT * FROM personnages WHERE perso_id = '".$persoid."'");
									while ($row = mysqli_fetch_array($query)) {
										$pp = $row['perso_img'];
									}
									if($pp==0){
										mysqli_query($mysqli, "INSERT INTO `images`(`image_name`, `image_path`) VALUES ('".$_FILES['prof_pic']['name']."','bdd_img/".$_FILES['prof_pic']['name']."')");
										$img_query = mysqli_query($mysqli, "SELECT image_id FROM images WHERE image_name = '".$_FILES['prof_pic']['name']."'");
										while ($row = mysqli_fetch_array($img_query)) {
											$img_id = $row['image_id'];
										}
										mysqli_query($mysqli, "UPDATE `personnages` SET `perso_img`='".$img_id."' WHERE perso_id = '".$persoid."'");
									}else{
										mysqli_query($mysqli, "UPDATE `images` SET `image_name`='".$_FILES['prof_pic']['name']."',`image_path`='bdd_img/".$_FILES['prof_pic']['name']."' WHERE image_id = '".$pp."'");
									}
								}
							}
						}
		mysqli_query($_SESSION["mysqli"], 'INSERT INTO users_perso (user_id, perso_id) VALUES ('.$userid.', '.$persoid.')');
		for($j = 1; $j <= $length; $j++){
			mysqli_query($_SESSION["mysqli"], 'INSERT INTO carac_values (carac_id, perso_id, value) VALUES ('.$caracid[$j].', '.$persoid.', '.$caracvalue[$j].')');
		}
		$_SESSION['currentperso'] = $persoid;
		echo $persoid;
	}
}



?>
