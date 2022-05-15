<?php
	if(defined("constante")){
		echo'<div id="body_acc">';
			include("header.php");
				echo '<section id="contenu_acc">
					<div class="column centre">
						<a href="index.php?ref=explorer">Explorer</a>
						<a href="index.php?ref=creer">Créer</a>
						<a id="play" href="index.php?ref=jouer">Jouer</a>
					</div>
					</section>
					<div class="slider">
					<div class="slides">
					<div class="slide"><a href="https://twitter.com/cri_eight" target="blank"><img src="./images/1.jpg" class="slidimg" alt="Twitter" /></a></div>
					<div class="slide"><a href="https://discord.gg/JC3bPgfU" target="blank"><img src="./images/2.jpg" class="slidimg" alt="Discord" /></a></div>
					<div class="slide"><a href="https://www.instagram.com/cri_eight/" target="blank"><img src="./images/3.jpg" class="slidimg" alt="Instagram" /></a></div>
				</div>
			</div>
		</div>';
	}else die("");
?>
