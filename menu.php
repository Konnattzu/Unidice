<?php
	if(defined("constante")){
		echo'<div class="side-bar">
			<div class="close-btn">
				<img class="icon" src="./images/times-solid.svg" width="30px" height="30px"/>
			</div>
			<div class="menu">
				<div class="item"><a href="index.php?ref=accueil">Accueil</a></div>
				<div class="item"><a href="index.php?ref=compte">Mon Compte</a></div>
				<div class="item"><a href="index.php?ref=communaute">Communauté</a></div>
				<div class="item"><a href="https://www.cri8.fr/">A Propos</a></div>
			</div>
		</div>';
	}
	else die("");
?>
