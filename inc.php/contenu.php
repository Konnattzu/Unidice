<?php
	if(defined("constante")){
		session_start();
		include("inc.php/foreign/bddconnect.inc.php");
		echo'<!DOCTYPE html>
			<html lang="fr">
				<head>
					<title> Unidice - Site de création et de partage de jeux de rôles </title>
					<meta charset="utf-8"/>
					<meta name="viewport" content="width=device-width, initial-scale=1.0">
					<meta name="keywords" content="Unidice, uni, Cri8, RPG, JDR, jeux, rôles, créer, explorer, jouer"/>
					<meta name="description" content="Site de création et de partage de jeux de rôles fondé par Cri8"/>
					<link rel="icon" href="images/favicon.ico" />
					<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">
					<link rel="stylesheet" href="css/unidice.css"/>
					<link rel="stylesheet" href="css/personnages.css"/>
					<link rel="stylesheet" href="css/jouer.css"/>
					<link rel="stylesheet" href="css/explorer.css"/>
					<link rel="stylesheet" href="css/contenu_cre.css"/>
					<link rel="stylesheet" href="css/compte.css"/>
					<link rel="stylesheet" href="css/form.css"/>
					<link rel="stylesheet" href="css/connection.css">
					<link rel="stylesheet" href="./css/inscription.css">
					<link rel="stylesheet" href="./css/galerie.css">
					<script src="js/modesombre.js"></script>
					<script src="js/onglets.js"></script>
					<script src="js/univers_et_scenarii.js"></script>
					<script src="js/jquery.min.js" charset="utf-8"></script>
					<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
				</head>
				<body>';
		if(isset($_GET) && isset($_GET["ref"])) {
			$page = $_GET["ref"];
			switch($page){
				case "accueil":
					include("inc.php/accueil.inc.php");
				break;
				case "jouer":
					if(isset($_SESSION['user_id'])){
					include("inc.php/jouer.inc.php");
					}else{
						header('Location: index.php?ref=connexion');
					}
				break;
				case "creer":
				if(isset($_SESSION['user_id'])){
					 include("inc.php/creer.inc.php");
					 }else{
						 header('Location: index.php?ref=connexion');
					 }
				break;
				case "explorer":
					include("inc.php/explorer.inc.php");
				break;
				case "listescenarii":
				if(isset($_SESSION['user_id'])){
					include("inc.php/foreign/listescenarii.inc.php");
					}else{
						header('Location: index.php?ref=connexion');
					}
				break;
				case "inscription":
					if(empty($_SESSION['user_id'])){
						include("inc.php/inscription.inc.php");
					} else {
						$page = "compte";
						echo '<SCRIPT language="JavaScript">
						window.location="index.php?ref=compte";
						</SCRIPT>';
					}
				break;
				case "connexion":
					if(empty($_SESSION['user_id'])){
						include("inc.php/connexion.inc.php");
					} else {
						$page = "compte";
						echo '<SCRIPT language="JavaScript">
						window.location="index.php?ref=compte";
						</SCRIPT>';
					}
				break;
				case "compte":
					include("inc.php/compte.inc.php");
				break;
				case "logout":
					include("inc.php/logout.inc.php");
				break;
				case "creeruniv":
				if(isset($_SESSION['user_id'])){
					include("inc.php/creeruniv.inc.php");
				}else{
						header('Location: index.php?ref=connexion');
				}
				break;
				case "creerscenar":
				if(isset($_SESSION['user_id'])){
					include("inc.php/creerscenar.inc.php");
				}else{
						header('Location: index.php?ref=connexion');
				}
				break;
				case "creerperso":
				if(isset($_SESSION['user_id'])){
					include("inc.php/creerperso.inc.php");
					}else{
						header('Location: index.php?ref=connexion');
					}
				break;
				case "galeriepersos":
					if(isset($_SESSION['user_id'])){
						include("inc.php/galeriepersos.inc.php");
					}else{
						header('Location: index.php?ref=connexion');
					}
				break;
				case "galerieunivers":
					if(isset($_SESSION['user_id'])){
						include("inc.php/galerieunivers.inc.php");
					}else{
						header('Location: index.php?ref=connexion');
					}
				break;
				case "galeriescenarii":
					if(isset($_SESSION['user_id'])){
						include("inc.php/galeriescenarii.inc.php");
					}else{
						header('Location: index.php?ref=connexion');
					}
				break;
				case "ficheperso":
					include("inc.php/ficheperso.inc.php");
				break;
				case "oui":
					include("inc.php/accueil.inc.php");
					//include("inc.php/oui.php");
				break;
				case "galerie":
					include("inc.php/accueil.inc.php");
					//include("inc.php/galerie.inc.php");
				break;
				case "test":
					include("inc.php/mabite.php");
					//include("inc.php/galerie.inc.php");
				break;
			}
		} else { include("inc.php/accueil.inc.php"); }
				echo'</body>
	</html>';
	}
	else die("");
?>
