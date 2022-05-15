<?php
	if(defined("constante")){
				echo '
<html lang="fr">
	<head>
		<title> Univers et scenarii </title>
		<meta charset="utf-8"/>
		<link rel="stylesheet" href="../css/univers_et_scenarii.css"/>
		 <script type="text/javascript">
			function newPopup(url) {
				popupWindow = window.open(url,'popUpWindow','height=500,width=600,left=10,top=10,resizable=yes,scrollbars=yes,toolbar=yes,menubar=no,location=no,directories=no,status=yes')
			}
		</script>
	</head>
	<body>
		<div id="corps">
			<div class="nope">
				<div class="nope" id="univers">GALERIE UNIVERS</div><div class="nope" id="scenarii">GALERIE SCENARII</div>
			</div>
			<div class="conteneur">
				<div>
					<a href="JavaScript:newPopup("../inc.php/personnages.php");"><div class="conteneur-item">U1</div></a>
					<div id="texte">NOM</div>
				</div>
				<div>
				<div class="conteneur-item">U2</div>
				<div  id="texte">NOM</div>
				</div>
				<div>
					<div class="conteneur-item">S1</div>
					<div id="texte">NOM</div>
				</div>
				<div>
					<div class="conteneur-item">S2</div>
					<div id="texte">NOM</div>
				</div>
			</div>
			<div class="conteneur2">
				<div>
					<div class="conteneur2-item">U3</div>
					<div id="texte">NOM</div>
				</div>
				<div>
				<div class="conteneur2-item">U4</div>
				<div id="texte">NOM</div>
				</div>
				<div>
					<div class="conteneur2-item">S3</div>
					<div id="texte">NOM</div>
				</div>
				<div>
					<div class="conteneur2-item">S4</div>
					<div id="texte">NOM</div>
				</div>
			</div>
		</div>
	</body>
</html>';
	}
	else die("");
?>

