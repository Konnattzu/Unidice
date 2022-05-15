<?php



$req =  mysqli_query($mysqli,'SELECT * FROM personnages WHERE perso_id='.$_SESSION["currentperso"].' ');
 while($perso = $req->fetch_assoc()){

$oui_nom = $perso["perso_nom"];

$oui_desc = $perso["perso_desc"];
$oui_classe = $perso["perso_classe"];
$oui_race = $perso["perso_race"];

$req =  mysqli_query($mysqli,'SELECT * FROM races WHERE race_id='.$perso["perso_race"].' ');while($race = $req->fetch_assoc()){	$oui_race = $race["race_nom"];}$req =  mysqli_query($mysqli,'SELECT * FROM classes WHERE classe_id='.$perso["perso_classe"].' ');while($classe = $req->fetch_assoc()){	$oui_classe = $classe["classe_nom"];}

$oui_age = $perso["perso_age"];

$oui_poids = $perso["perso_poids"];

$oui_taille = $perso["perso_taille"];
$oui_univers = $perso["perso_univers"];
}

?>
