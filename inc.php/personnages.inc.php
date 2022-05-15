<?php
	echo ' <div id="body_perso">';
	include("header.php")
	echo'
		<div id="contenu_perso">
				<img src="chevalier.jpg" alt="image de chevalier" width="25%"/>
				<div class="corps">
		<span id="utilisateur">Nom Utilisateur</span><span id="LVL">LVL</span><span>1</span><span>2</span><span>3</span>
		<span id="nom">'.$tab["perso_nom"].'</span>
		<div class="conteneur">
			<div>
				<p id="texte">Caractéristique</p>
					<div class="conteneur-item">Force</div>
					<div class="conteneur-item">Intelligence</div>
				</div>
				<div>
				<p id="texte">Valeur</p>
					<div class="conteneur-item">10</div>
					<div class="conteneur-item">16</div>
				</div>
				<div>
				<p id="texte">Bonus</p>
					<div class="conteneur-item">+1</div>
					<div class="conteneur-item">+3</div>
				</div>	
			</div>
			<div class="conteneur">
				<div>
				<p id="texte">Attaque</p>
					<div class="conteneur-item">Contact</div>
					<div class="conteneur-item">Distance</div>
					<div class="conteneur-item">Magique</div>
				</div>
				<div>
				<p id="texte">Valeur</p>
					<div class="conteneur-item">0</div>
					<div class="conteneur-item">+5</div>
					<div class="conteneur-item">+10</div>
				</div>
				<div>
				<p id="texte">Bonus</p>
					<div class="conteneur-item">+0</div>
					<div class="conteneur-item">-2</div>
					<div class="conteneur-item">+3</div>
				</div>	
			</div>
			<div class="conteneur">
				<div>
				<p id="texte">Points de vie</p>
					<div class="conteneur-item">PV</div>
				</div>
				<div>
				<p id="texte">Valeur</p>
					<div class="conteneur-item">100</div>
				</div>
				<div>
				<p id="texte">Bonus</p>
					<div class="conteneur-item">+10</div>
				</div>	
			</div>
			</div>
			<p id="desc">Description</p>
				<div id="description">
			<ul>
				<li>Profil: </li>
				<li>Sexe: </li>
				<li>Taille: </li>
			</ul>
			<ul>
				<li>Culture: </li>
				<li>Âge: </li>
				<li>Poids: </li>
			</ul>
			</div>';
		echo'</div>';
		include("footer.php");
	echo'</div>';
?>