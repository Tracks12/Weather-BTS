<!-- NAV -->
<nav>
	<img type="image/png" src="./pics/logo.png" alt="accueil" title="Retour à l'accueil" onclick="document.location = './';" />
	<ul>
		<?php
			if(isset($_SESSION['user'])) {
				echo('<li><a class="menu" href="?index=home">Accueil</a></li>
					<li><a class="menu" href="?index=live">Live</a></li>
					<li><a class="menu" href="?index=story">Historique</a></li>
					<li><a class="menu" href="?index=contact">Contact</a></li>
					<li><a class="menu" href="?logout">Déconnexion</a></li>');
			} else { echo('<li><a class="menu" href="?index=login">Connexion</a></li>'); }
		?>
	</ul>
</nav>
<!-- END -->

