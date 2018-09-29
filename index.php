<!DOCTYPE html>
<!--
  File      : index.html
  Update at : 28/09/2018
  Update by : CARDINAL FLorian
-->
<?php
	session_start();
	if(!isset($_SESSION['user']) && !isset($_GET['index'])) { header('location: ./?index=login'); }
	if(isset($_GET['logout'])) { session_destroy(); header('location: ./'); }
?>
<html>
	<head>
		<meta charset="UTF-8">
		<title>Météo BTS</title>
		<link rel="icon" type="image/ico" href="./pics/icon.ico" />
		<link rel="stylesheet" type="text/css" href="./css/style.css" />
		<script language="javascript" type="text/javascript" src="./js/script.js"></script>
	</head>
	<body onload="mainMenu();">
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
		<?php require('./assets/header.html'); ?>
		<section>
			<aside>
				<?php
					if(isset($_GET['index'])) {
						switch($_GET['index']) {
							case 'home':
							default: echo('Accueil'); break;
							case 'live': break;
							case 'story': break;
							case 'contact': require('./assets/contact.html'); break;
							case 'login': require('./assets/login.html'); break;
						}
					} else { header('location: ./?index=home'); }
				?>
			</aside>
		</section>
		<?php require('./assets/footer.html'); ?>
	</body>
</html>
<!-- END -->
