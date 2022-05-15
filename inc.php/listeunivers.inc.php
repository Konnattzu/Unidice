<?php
	if(defined("constante")){
		include_once('header.php');
				echo'
				<div id="contenu_cre">
				<div class="titre">
				<h1>LISTE DES UNIVERS</h1>
				</div>
				<div class="navig">
				<a href="index.php?ref=creer"><div class="return"><p>Retour</p></div></a>
				</div>
				<div id="addbtn">+</div>
				<div class="liste">
					<ul>';
						$row = count(array(1,2,3,4,5));
						$tab = 0;
						while($tab < $row){
							$tab++;
							echo'
							<li class="univ">
								<div class="titreEtBouton">
								<p class="titreuniv">Nom Univers</p>
								<div class="boutonmodif">
								<a href="#" onclick="modifier()">
								<div class="modifier">
				          <div class="modifierG">
				            <img src="images/engrenage.png">
				          </div>
				          <div class="modifierD">
				            <p>Modifier</p>
				          </div>
									</div>
				          </a>
									<a href="index.php?ref=listescenarii">
									<div class="modifier">
					          <div class="modifierG">
					            <img src="images/bars-solid_black.svg">
					          </div>
					          <div class="modifierD">
					            <p>Scenarii</p>
					          </div>
										</div>
					          </a>
								</div>
									</div>
								<p class="descuniv">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi non tincidunt tortor, at cursus sapien. Fusce malesuada eros et nunc consectetur egestas. Morbi fermentum quis dui in ultricies. Nunc euismod sapien vel diam sodales, id mattis lacus tempus. Donec felis velit, efficitur eu interdum in, interdum non metus. Proin eu libero porta, pharetra lacus eget, placerat lacus. Aenean rutrum mauris eget sodales porta. Morbi ac nisl sodales magna lacinia maximus. Nunc quis massa at sem efficitur sodales et et nibh. Fusce lacinia feugiat mauris, eu elementum neque gravida in. Ut ac arcu interdum, vulputate ex id, rhoncus urna. Sed non metus sed nibh auctor ultricies. Fusce in lorem ac sapien commodo vehicula ac eu augue. Phasellus aliquam sapien sit amet neque aliquam elementum.</p>
							</li>';
						}

							echo'

						</ul>
						<div id="pop-up">
					  	<div>
					    	<a id="fermer-pop-up" href="#" onclick="modifier()"><img class="icon" src="images/croix.png"></img></a>
								<h2>Modifier Univers</h2>
								<form action="#" method="get">
									<label>Nouveau nom</label>
									<input type="text"></input>
									<label>Nouveau genre</label>
									<input type="text"></input>
									<label>Nouveau monde</label>
									<input type="text"></input>
									<label>Nouveau monstre</label>
									<input type="text"></input>
									<input id="envoyer" type="submit" value="Enregistrer"/>
						    </form>
					    </div>
					  </div>
					</div>
		<script type="text/javascript">
			init_univ();
		</script>
				</div>
					';
					include_once('footer.php');
	}
	else die("");
?>
