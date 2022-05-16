<?php
	if(defined("constante")){
			include("header.php");
				echo '  <div class="commuparent">
				  <div class="commuenfant" id="divA"></div>
				  <div class="commuenfant" id="divB"></div>
				  </div>
				  <div class="commucontenu">
				    <div class="conteneur">
				      <div class="contenutext">
				        <div class="fade">
				        <h1>Rejoignez nous sur les réseaux sociaux !</h1>
				        <p>Suivez nous sur nos réseaux pour etre tenu au courant de notre actualité !<br>
				          Retrouvez-nous sur Twitter, Instagram et Discord<br>
				 N&apos;hésitez pas à partager nos publications et à les commenter !</p>

				      <div class="contenuzone">
				        <div class="ImgEtDesc">
				          <a href="https://twitter.com/cri_eight"><img src="images/twitter.png" alt="Logo Twitter"></a>
				          <p>Twitter</p>
				        </div>
				          <div class="ImgEtDesc"><a href="https://www.instagram.com/cri_eight/"><img src="images/2048px-Instagram_icon.png" alt="Logo Instagram"></a>
				          <p>Instagram</p>
				        </div>
				          <div class="ImgEtDesc"><a href="https://discord.com/invite/X8qSXe6VTE"><img src="images/discord-logo-4-1.png" alt="Logo Discord"></a>
				          <p>Discord</p>
				        </div>
				      </div>
				      </div>
				      <div class="fade">
				      <h1>L&apos;Agence CRI8</h1>
				      <p>Visitez notre site pour en savoir plus sur notre équipe !</p>

				    <div class="contenuzone">
				        <div class="ImgEtDesc"><a href="https://cri8.fr"><img src="images/cri8.png" alt="Logo CRI8"></a>
				        <p>CRI8</p>
				      </div>
				    </div>
				    </div>
				      <div id="contact" class="fade">
				        <h1>Contactez-nous !</h1>
				      <p>
				        Contactez notre équipe grace à l&apos;adresse suivante : <a href="mailto:contact@cri8.fr">contact@cri8.fr</a>
				      </p>
				      <br>
				      <i>En cas de problème avec le site, veuillez nous contacter via cette adresse: <a href="mailto:contact@cri8.fr" id="adresse">support@cri8.fr</a> </i>
				    </div>
				    </div>
				  </div>
				  </div>
				<script>
				let elementsArray = document.querySelectorAll(".fade");
				console.log(elementsArray);
				window.addEventListener("scroll", fadeIn );
				function fadeIn() {
				    for (var i = 0; i < elementsArray.length; i++) {
				        var elem = elementsArray[i]
				        var distInView = elem.getBoundingClientRect().top - window.innerHeight + 20;
				        if (distInView < 0) {
				            elem.classList.add("inview");
				        } else {
				            elem.classList.remove("inview");
				        }
				    }
				}
				fadeIn();

				</script>';
	}else die("");
?>
