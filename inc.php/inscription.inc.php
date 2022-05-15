<?php
	if(defined("constante")){
		echo'<div id="body_log">';
		include("header.php");
				echo '<div id="contenu_log">
				<div class="container">
					<h2>Inscription</h2>';
				/* page: inscription.php */
			//connexion à la base de données:
			
			if(!$_SESSION['mysqli']) {
				echo "Connexion non établie.";
				exit;
			}
	                        //création automatique de la table users, une fois créée, vous pouvez supprimer les lignes de code suivantes:
				//echo mysqli_query($mysqli,"CREATE TABLE IF NOT EXISTS `".$BDD['db']."`.`users` ( `id` INT NOT NULL AUTO_INCREMENT , `pseudo` VARCHAR(25) NOT NULL , `mdp` CHAR(32) NOT NULL , `mail` VARCHAR(64) NOT NULL , PRIMARY KEY (`id`)) ENGINE = MyISAM;")?"Table users créée avec succès, vous pouvez maintenant supprimer la ligne ". __LINE__ ." de votre fichier ". __FILE__ ."!":"Erreur création table users: ".mysqli_error($mysqli);
				//la table est créée avec les paramètres suivants:
				//champ "id": en auto increment pour un id unique, peux vous servir pour une identification future
				//champ "pseudo": en varchar de 0 à 25 caractères
				//champ "mdp": en char fixe de 32 caractères, soit la longueur de la fonction md5()
				//champ "mail": en varchar de 0 à 64 caractères
				//fin création automatique
			//par défaut, on affiche le formulaire (quand il validera le formulaire sans erreur avec l'inscription validée, on l'affichera plus)
			
			//traitement du formulaire:
			
				echo '
				<form action="" method="post">
				<input type="text" class="input" name="pseudo" placeholder="Pseudo" required>
				<br/>
				<input type="password" class="input" name="mdp" placeholder="Mot de passe" required>
				<br/>
				<input type="mail" class="input" name="mail" placeholder="Email" required>
				<label class="NL"><input type="checkbox" name="newsletter" value="1" checked>Souhaitez vous recevoir des informations par mail</label>
				<label class="lang">Langue
					<select name="lang">
						<option value="fr">Francais</option>
						<option value="engl">Anglais</option>
					</select>
				</label>
				<label class="NL">';
				if(isset($_POST['pseudo'],$_POST['mdp'], $_POST['mail'])){//l'utilisateur à cliqué sur "S'inscrire", on demande donc si les champs sont défini avec "isset"
				if(empty($_POST['pseudo'])){//le champ pseudo est vide, on arrête l'exécution du script et on affiche un message d'erreur
					echo "Le champ Pseudo est vide.";
				} elseif(!preg_match("#^[a-zA-Z0-9_@.!()* ]+$#",$_POST['pseudo'])){//le champ pseudo est renseigné mais ne convient pas au format qu'on souhaite qu'il soit, soit: que des lettres minuscule + des chiffres (je préfère personnellement enregistrer le pseudo de mes membres en minuscule afin de ne pas avoir deux pseudo identique mais différents comme par exemple: Admin et admin)
					echo "Le Pseudo ne peut contenir que des chiffres, des lettres, et les caractères _, @, ., !, (), *";
				} elseif(strlen($_POST['pseudo'])>25){//le pseudo est trop long, il dépasse 25 caractères
					echo "Le pseudo est trop long, il dépasse 25 caractères.";
				} elseif(empty($_POST['mdp'])){//le champ mot de passe est vide
					echo "Le champ Mot de passe est vide.";
				} elseif(strlen($_POST['mdp'])<7){//le mot de passe est trop court, il a moins de 7 caractères
					echo "Le mot de passe est trop court, il doit contenir au moins 8 caractères.";
				} elseif(!preg_match("/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix",$_POST['mail'])){
					echo "L'adresse mail n'est pas valide.";
				} elseif(mysqli_num_rows(mysqli_query($mysqli,"SELECT * FROM users WHERE username='".$_POST['pseudo']."'"))==1){//on vérifie que ce pseudo n'est pas déjà utilisé par un autre membre
					echo "Ce pseudo est déjà utilisé.";
				} else {
					//toutes les vérifications sont faites, on passe à l'enregistrement dans la base de données:
					//Bien évidement il s'agit là d'un script simplifié au maximum, libre à vous de rajouter des conditions avant l'enregistrement comme la longueur minimum du mot de passe par exemple
					if(!mysqli_query($mysqli,"INSERT INTO users SET username='".$_POST['pseudo']."', passwd='".md5($_POST['mdp'])."', mail='".$_POST['mail']."', envoi_mail='".$_POST['newsletter']."'")){//on crypte le mot de passe avec la fonction propre à PHP: md5()
						echo "Une erreur s'est produite: ".mysqli_error($mysqli);//je conseille de ne pas afficher les erreurs aux visiteurs mais de l'enregistrer dans un fichier log
					} else {
						$req = mysqli_query($_SESSION["mysqli"], 'SELECT * FROM users ORDER BY user_id DESC LIMIT 1;');
						while($id = $req->fetch_assoc()){
							$_SESSION["id"] = $id['user_id'];
						}
						$_SESSION['pseudo'] = $_POST['pseudo'];
						mysqli_query($mysqli,"INSERT INTO parametres SET user_id='".$_SESSION["id"]."', lang='".$_POST['lang']."'");
						echo 'Vous êtes inscrit avec succès!';
						header("Location: index.php?ref=compte");
						//on affiche plus le formulaire
					}
				}
			}
				echo'</label>
				<button class="inscription">
					<input type="submit"  value="S&apos;inscrire">
				</button>
				</form>
				<a href="index.php?ref=connexion">
				<button class="annuler">
				<span>Se connecter</span>
			</button>
			</a>
				</div>
				</div>';
				include("footer.php");
				echo'</div>';
	}
	else die("");
?>
	