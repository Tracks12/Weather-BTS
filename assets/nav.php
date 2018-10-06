<!DOCTYPE html>
<!-- NAV -->
<nav>
	<div alt="accueil" title="Retour à l'accueil" onclick="document.location = './';"></div>
	<ul>
		<?php
			if(isset($_SESSION['user'])) {
				echo('<li><a class="menu" href="?index=home">Accueil</a></li>
					<li><a class="menu" href="?index=live">Live</a></li>
					<li><a class="menu" href="?index=story#main" id="path">Historique ></a></li>
					<li><a class="menu" href="?index=contact">Contact</a></li>
					<li><a class="menu" href="?logout">Déconnexion</a></li>');
			} else { echo('<li><a class="menu" href="?index=login">Connexion</a></li>'); }
		?>
	</ul>
	<?php
		if(isset($_SESSION['user'])) {
			echo('<ol id="subMenu" hidden>
				<li style="border-top: 0;"><a href="./?index=story#humidity">Taux humidité</a></li>
				<li><a href="./?index=story#temp">Temperature</a></li>
				<li><a href="./?index=story#pressure">Pression</a></li>
				<li><a href="./?index=story#carbon">Concentration CO²</a></li>
			</ol>');
		}
	?>
</nav>
<!-- END -->
