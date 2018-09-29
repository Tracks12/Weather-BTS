<!DOCTYPE html>
<!--
  File      : index.html
  Update at : 28/09/2018
  Update by : CARDINAL FLorian
-->
<?php
	session_start();
	
	$thead = array('', '');
	if(isset($_GET['index'])) {
		switch($_GET['index']) {
			case 'login': $thead = array('login', 'Connexion'); break;
		}
	}
?>
<html>
	<head>
		<meta charset="UTF-8">
		<title>Météo BTS<?php echo(" - ".$thead[0]); ?></title>
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
		<?php require('./assets/header.php'); ?>
		<section>
			<aside>
				<?php
					switch($_GET['index']) {
						case 'login': require('./assets/login.html'); break;
						default: header('location: ./?index=login'); break;
					}
				?>
			</aside>
		</section>
		<?php require('./assets/footer.html'); ?>
	</body>
</html>
<!-- END -->
