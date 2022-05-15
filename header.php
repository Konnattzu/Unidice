<?php
	if(defined("constante")){
		echo'<div id="top-bar">
			<a href="index.php?ref=accueil"><img id="logo" src="./images/Unidice.png" alt="Unidice"/></a>
			<div class="menu-btn">
				<img class="icon" src="./images/bars-solid.svg" width="30px" height="30px"/>
			</div>
		</div>';
		include("menu.php");
		echo'<script type="text/javascript">
		$(document).ready(function(){
			$(".menu-btn").click(function(){
				$(".side-bar").addClass("active");
				$(".menu-btn").css("visibility", "hidden");
			});
			$(".close-btn").click(function(){
				$(".side-bar").removeClass("active");
				$(".menu-btn").css("visibility", "visible");
			});
		});
	</script>';
	}
	else die("");
?>
