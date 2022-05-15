<?php
echo'<div id="body_exp">';
	include("header.php");
	echo'	<div id="contenu_exp">
			<form action="" method="post">
			<input type="text" name="barre_de_recherche" id="barre_de_recherche" placeholder="Rechercher">
			</form>';
			if(isset($_POST['univers'])){
				echo '
				<div class="row" style="display:flex;">
			<div class="boite">
				<div id="galerie-univers">GALERIE UNIVERS</div>
				<div class="univers">
				';
				
					include('inc.php/foreign/galerieunivers.inc.php');
				}

				if(isset($_POST['scenario'])){	
			echo'<div class="boite">
			<div id="galerie-scenarii">GALERIE SCENARII</div>
			<div class="univers">';
					include('inc.php/foreign/galeriescenarii.inc.php');
				}
				
				if(isset($_POST['personnage'])){
				echo'<div class="boite">
				<div id="galerie-univers">GALERIE PERSOS</div>
				<div class="univers">
				';
					include('inc.php/foreign/galeriepersos.inc.php');
				}
				
			echo '
				</div>
				</div>';
			include("footer.php");
			echo '</div>
			</div>
				<script type="text/javascript" src="js/popup.js">
					
					</script>
				
			</div>
			</div>';
			
			
?>