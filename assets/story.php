<!DOCTYPE html>
<!-- HISTORIQUE -->
<div class="carousel">
	<article id="main">
		<table>
			<?php
				function tableMake($output, $z) {
					echo("<table>");
					for($i = 0; $i < count($output); $i++) {
						$cell = 'td'; if(!$i) { $cell = 'th'; }
						echo("<tr>
							<$cell>{$output[$i][0]}</$cell>
							<$cell>{$output[$i][$z]}</$cell>
						</tr>");
						if(!$i) { $i = $GLOBALS['x'] - 21; }
					} echo("</table>");
				}
				
				$handle = fopen($path, 'r');
				for($x = 0; $ligne = fgetcsv($handle, 1000, ';'); $x++) { // On voit combien il y a de ligne
					for($y = 0; $y < count($ligne); $y++) {
						if(($x !== 0) && ($y === 3)) { $ligne[$y] = $ligne[$y] / 100; } // Convertion de la pression en hPa
						$output[$x][$y] = $ligne[$y]; // On stock les valeurs dans une variable tampon
					}
				} fclose($handle);
				
				for($i = 0; $i < count($output); $i++) { // On sort la ligne de la variable tampon
					$cell = 'td'; if(!$i) { $cell = 'th'; }
					echo("<tr>");
					foreach($output[$i] as $col) { echo("<$cell>$col</$cell>"); } // On sort les colonnes
					echo("</tr>");
					if(!$i) { $i = $x - 21; } // On paramètre le nombre de ligne attendu à la sortie
				}
			?>
		</table>
	</article>
	<script>
		var table = [ <?php for($i = $x - 20; $i < count($output); $i++) {
				$sep = ", "; if($i === count($output)-1) { $sep = NULL; };
				echo("{ time: '".$output[$i][0]."', humidity: {$output[$i][1]}, temp: {$output[$i][2]}, pressure: {$output[$i][3]}, carbon: {$output[$i][4]} }$sep");
			} ?> ];
	</script>
	<article id="humidity">
		<div class="table">
			<?php tableMake($output, 1); ?>
		</div>
		<div class="graph">
			<div class="statgraph"></div>
			<script>makeGraph(0, table, 'humidity');</script>
		</div>
	</article>
	<article id="temp">
		<div class="table">
			<?php tableMake($output, 2); ?>
		</div>
		<div class="graph">
			<div class="statgraph"></div>
			<script>makeGraph(1, table, 'temp');</script>
		</div>
	</article>
	<article id="pressure">
		<div class="table">
			<?php tableMake($output, 3); ?>
		</div>
		<div class="graph">
			<div class="statgraph"></div>
			<script>makeGraph(2, table, 'pressure');</script>
		</div>
	</article>
	<article id="carbon">
		<div class="table">
			<?php tableMake($output, 4); ?>
		</div>
		<div class="graph">
			<div class="statgraph"></div>
			<script>makeGraph(3, table, 'carbon');</script>
		</div>
	</article>
</div>
<!-- END -->
