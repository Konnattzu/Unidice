<?php
	if(defined("constante")){
		include_once('header.php');
				$mysqli = $_SESSION['mysqli'];
				echo'
				<div id="contenu_cre">
				<div class="titre">
				<h1>LISTE DES SCENARII</h1>
				</div>
				<div class="navig">
				<a href="index.php?ref=creer"><div class="return"><p>Retour</p></div></a>
				</div>
				<div class="liste">
					<ul>';
					if(isset($_POST['userpage'])){
						include('inc.php/foreign/galeriescenariiuser.inc.php');
					}else if(isset($_POST['univ'])){
						include('inc.php/foreign/galeriescenariiunivers.inc.php');
					}
					echo'</div>
		<script type="text/javascript">
			init_univ();
		</script>
				</div>
					';
		
					include_once('footer.php');
	}
	else die("");
?>
