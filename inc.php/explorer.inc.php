<?php
echo'<div id="body_exp">';
	if(isset($_POST['univers'])){
		$_SESSION['currentuniv'] = $_POST['univers'];
	}else if(isset($_GET) && isset($_GET['unid'])){
		$_SESSION['currentuniv'] = $_GET['unid'];
	}
	if(isset($_POST['scenario'])){
		$_SESSION['currentscenar'] = $_POST['scenario'];
	}else if(isset($_GET) && isset($_GET['sid'])){
		$_SESSION['currentscenar'] = $_GET['sid'];
	}
	include("header.php");
	echo'	<div id="contenu_exp">
			<form action="index.php?ref=explorer" method="post">
			<input type="text" name="barre_de_recherche" id="barre_de_recherche" placeholder="Rechercher">
			</form>';
				echo '
				<div class="row" style="display:flex;">
			<div class="boite">
				<div id="galerie-univers">GALERIE UNIVERS</div>
				<div class="univers">
				';
				if(isset($_SESSION['currentuniv'])){
					include('inc.php/foreign/ficheunivers.inc.php');
					include('inc.php/foreign/scrollunivers.inc.php');
				}else{
					include('inc.php/foreign/scrollunivers.inc.php');				
				}

			echo '</div>
			</div>

			<div class="boite">
			<div id="galerie-scenarii">GALERIE SCENARII</div>
			<div class="univers">';
				if(isset($_SESSION['currentscenar'])){	
					include('inc.php/foreign/fichescenario.inc.php');
					include('inc.php/foreign/scrollscenarii.inc.php');
				}else{
					include('inc.php/foreign/scrollscenarii.inc.php');
				}
			echo '
				</div>
				</div>
				<script type="text/javascript" src="js/popup.js">
					
					</script>
				
				</div>';	
				
										
										//include('inc.php/foreign/favlikes.inc.php');
				echo'</div>';
			include("footer.php");
			echo'</div>';
			
			
?>