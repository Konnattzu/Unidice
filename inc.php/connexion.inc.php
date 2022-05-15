<?php
	if(defined("constante")){
		$mysqli = $_SESSION['mysqli'];
		echo'<div id="body_con">';
		include("header.php");
		echo '<div id="contenu_con">
		<div class="container">
		<h2>Connexion</h2>
		<form action="" method="post">
		<label>
        <input type="text" class="email" name="pseudo" placeholder="Pseudo" required>
        <br/>
        <input type="password" class="pwd" name="mdp" placeholder="Mot de passe" required>
		<input type="hidden" name="submit">
		</label>
		<label class="NL">';
		if(isset($_POST['submit'])) { // si le bouton "Connexion" est appuyé
			// on vérifie que le champ "Pseudo" n'est pas vide
			// empty vérifie à la fois si le champ est vide et si le champ existe belle et bien (is set)
			if(empty($_POST['pseudo'])) {
				echo "Le champ Pseudo est vide.";	
			} else {
				// on vérifie maintenant si le champ "Mot de passe" n'est pas vide"
				if(empty($_POST['mdp'])) {
					echo "Le champ Mot de passe est vide.";
				} else {
					// les champs sont bien posté et pas vide, on sécurise les données entrées par le membre:
					$Pseudo = htmlentities($_POST['pseudo'], ENT_QUOTES, "ISO-8859-1"); // le htmlentities() passera les guillemets en entités HTML, ce qui empêchera les injections SQL
					$MotDePasse = htmlentities($_POST['mdp'], ENT_QUOTES, "ISO-8859-1");
					//on se connecte à la base de données:
					//on vérifie que la connexion s'effectue correctement:
					if(!$mysqli){
						echo "Erreur de connexion à la base de données.";
					} else {
						// on fait maintenant la requête dans la base de données pour rechercher si ces données existe et correspondent:	
						//echo $mysqli;
						$Requete = mysqli_query($mysqli,"SELECT * FROM users WHERE username = '".$Pseudo."'");//si vous avez enregistré le mot de passe en md5() il vous suffira de faire la vérification en mettant mdp = '".md5($MotDePasse)."' au lieu de mdp = '".$MotDePasse."'					
						// si il y a un résultat, mysqli_num_rows() nous donnera alors 1
						// si mysqli_num_rows() retourne 0 c'est qu'il a trouvé aucun résultat
						 while($tab = $Requete->fetch_assoc()){
							$user = $tab['username'];
							$pass = $tab['passwd'];
							$id = $tab['user_id'];
						}
						if($user == $Pseudo){
							if($pass == md5($MotDePasse)){
								// on ouvre la session avec $_SESSION:
								$_SESSION['pseudo'] = $Pseudo; // la session peut être appelée différemment et son contenu aussi peut être autre chose que le pseudo
								$_SESSION['user_id'] = $id;
								header("Location: index.php?ref=compte");
							} else {
								echo "Le mot de passe est incorrect";
							}
						}else{
							echo "Le pseudo est incorrect, le compte n'a pas été trouvé.";
						}
					}
				}
			}
		}
	  echo'</label>
				<button class="connecter">
					<input type="submit" id="submit" name="connexion" value="Se connecter">
				</button>
			</form>
		<a href="index.php?ref=inscription"><button class="inscription"><p>Inscription</p></button></a>
    </div>';
		/*
		Page: connexion.php
		*/		
		echo '</div>';
		include("footer.php");
		echo'</div>';
	}
	else die("");
?>