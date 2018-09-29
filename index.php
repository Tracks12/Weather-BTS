<!DOCTYPE html>
<!--
  File      : index.html
  Update at : 28/09/2018
  Update by : CARDINAL FLorian
-->
<?php session_start(); ?>
<html>
	<head>
		<meta charset="UTF-8">
		<title>Weather BTS</title>
		<link rel="icon" type="image/ico" href="./pics/icon.ico" />
		<link rel="stylesheet" type="text/css" href="./css/style.css" />
		<script language="javascript" type="text/javascript" src="./js/script.js"></script>
	</head>
	<body onload="mainMenu();">
		<nav>
			<img type="image/png" src="./pics/logo.png" onclick="document.location = './';" />
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
		<header>
			<h1>Weather BTS SN-EC</h1>
		</header>
		<section>
			<aside>
				<?php
					switch($_GET['index']) {
						case 'login': require('login.html'); break;
						default: if(!isset($_SESSION['user'])) {
								header('location: ./?index=login');
							} break;
					}
				?>
			</aside>
		</section>
		<footer>
			<p>Fait par :</p>
			<marquee>Andrieu Laurent, Ardanouy Baptiste, Cardinal Florian</marquee>
		</footer>
	</body>
</html>
<!-- END -->
