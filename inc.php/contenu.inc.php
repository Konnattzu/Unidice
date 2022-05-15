<?php
	if(defined("constante")){
		session_start();
		if(isset($_GET) && isset($_GET["ref"])) {
			$page = $_GET["ref"];
			switch($page){
				case "accueil":
					include("inc.php/accueil.inc.php");
				break;
				case "jouer":
					include("inc.php/jouer.inc.php");
				break;
				case "univers":
					include("inc.php/univers.inc.php");
				break;
				case "scenario":
					include("inc.php/scenario.inc.php");
				break;
				case "creer":
					include("inc.php/explorer.inc.php");
				break;
				case "explorer":
					include("inc.php/explorer.inc.php");
				break;
				case "listeunivers":
					include("inc.php/listeunivers.inc.php");
				break;
				case "modifunivers":
					include("inc.php/modifunivers.inc.php");
				break;
				case "listescenarii":
					include("inc.php/listescenarii.inc.php");
				break;
				case "modifscenarii":
					include("inc.php/modifscenarii.inc.php");
				break;
				case "explorer":
					include("inc.php/explorer.inc.php");
				break;
				case "univers1":
					include("inc.php/univers1.inc.php");
				break;
				case "univers2":
					include("inc.php/univers2.inc.php");
				break;
				case "inscription":
					if(empty($_SESSION['pseudo'])){
						include("inc.php/inscription.inc.php");
					} else {
						$page = "compte";
						header("Location: index.php?ref=compte");
					}
				break;
				case "connexion":
					if(empty($_SESSION['pseudo'])){
						include("inc.php/connexion.inc.php");
					} else {
						$page = "compte";
						header("Location: index.php?ref=compte");
					}
				break;
				case "compte":
					if(empty($_SESSION['pseudo'])){
						$page = "connexion";
						header("Location: index.php?ref=connexion");
					} else {
						include("inc.php/compte.inc.php");
					}
				break;
				case "logout":
					include("inc.php/logout.inc.php");
				break;
				case "forum":
					include("inc.php/forum.inc.php");
				break;
				case "apropos":
					include("inc.php/apropos.inc.php");
				break;
			}
		} else { include("inc.php/accueil.inc.php"); }
	}
	else die("");
?>
