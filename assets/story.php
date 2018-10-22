<!DOCTYPE html>
<!-- HISTORIQUE -->
<?php
	$outcount = 21; // Nombre de ligne voulu (20 pour les données plus 1 pour la légende)
	function tableMake($output, $z) {
		echo("<table>");
		for($i = 0; $i < count($output); $i++) {
			$cell = 'td'; if(!$i) { $cell = 'th'; }
			echo("<tr>
				<$cell>{$output[$i][0]}</$cell>
				<$cell>{$output[$i][$z]}</$cell>
			</tr>");
			if(!$i) { $i = $GLOBALS['x'] - $GLOBALS['outcount']; }
		} echo("</table>");
	}
	
	$handle = fopen($path, 'r');
	for($x = 0; $ligne = fgetcsv($handle, 1000, ';'); $x++) { // On voit combien il y a de ligne
		for($y = 0; $y <= 4; $y++) {
			if(($x !== 0) && ($y === 3)) { $ligne[$y] = $ligne[$y] / 100; } // Convertion de la pression en hPa
			$output[$x][$y] = $ligne[$y]; // On stock les valeurs dans une variable tampon
		}
	} fclose($handle);
?>
<div class="carousel">
	<script language="Javascript" type="text/javascript">
		var output = [ <?php for($i = $x - ($outcount-1); $i < count($output); $i++) {
				$sep = ", "; if($i === count($output)-1) { $sep = NULL; };
				echo("{ time: '".$output[$i][0]."', humidity: {$output[$i][1]}, temp: {$output[$i][2]}, pressure: {$output[$i][3]}, carbon: {$output[$i][4]} }$sep");
			} ?> ];
	</script>
	<!-- Tableau de toutes les valeurs -->
	<article id="main">
		<table>
			<?php
				for($i = 0; $i < count($output); $i++) { // On sort la ligne de la variable tampon
					$cell = 'td'; if(!$i) { $cell = 'th'; }
					echo("<tr>");
					foreach($output[$i] as $col) { echo("<$cell>$col</$cell>"); } // On sort les colonnes
					echo("</tr>");
					if(!$i) { $i = $x - $outcount; } // On paramètre le nombre de ligne attendu à la sortie
				}
			?>
		</table>
	</article>
	<!-- Tableau et Graphique -->
	<article id="humidity"> <!-- Taux Humidité -->
		<div class="table">
			<?php tableMake($output, 1); ?>
		</div>
		<div class="graph">
			<div class="statgraph"></div>
			<script language="javascript" type="text/javascript">graph.courbe(0, output, 'humidity');</script>
		</div>
	</article>
	<article id="temp"> <!-- Température -->
		<div class="table">
			<?php tableMake($output, 2); ?>
		</div>
		<div class="graph">
			<div class="statgraph"></div>
			<script language="javascript" type="text/javascript">graph.courbe(1, output, 'temp');</script>
		</div>
	</article>
	<article id="pressure"> <!-- Pression -->
		<div class="table">
			<?php tableMake($output, 3); ?>
		</div>
		<div class="graph">
			<div class="statgraph"></div>
			<script language="javascript" type="text/javascript">graph.courbe(2, output, 'pressure');</script>
		</div>
	</article>
	<article id="carbon"> <!-- Concentration CO² -->
		<div class="table">
			<?php tableMake($output, 4); ?>
		</div>
		<div class="graph">
			<div class="statgraph"></div>
			<script language="javascript" type="text/javascript">graph.courbe(3, output, 'carbon');</script>
		</div>
	</article>
</div>
<!-- END -->
