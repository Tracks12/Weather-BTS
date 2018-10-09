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
					} echo("</table>");
				}
				
				$handle = fopen($path, 'r');
				for($x = 0; $ligne = fgetcsv($handle, 1000, ';'); $x++) { // On voit combien il y a de ligne
					for($y = 0; $y < count($ligne); $y++) { $output[$x][$y] = $ligne[$y]; } // On stock les valeur dans une variable tampon
				} fclose($handle);
				
				for($i = 0; $i < count($output); $i++) { // On sort la ligne de la variable tampon
					$cell = 'td'; if(!$i) { $cell = 'th'; }
					echo("<tr>");
					foreach($output[$i] as $col) { // On en sort ses colonnes
						echo("<$cell>$col</$cell>");
					} echo("</tr>");
					if(!$i) { $i = $x-20; } // On paramètre le nombre de ligne attendu à la sortie
				}
			?>
		</table>
	</article>
	<article id="humidity">
		<?php tableMake($output, 1); // Humidité ?>
	</article>
	<article id="temp">
		<?php tableMake($output, 2); // Température ?>
	</article>
	<article id="pressure">
		<?php tableMake($output, 3); // Pression ?>
	</article>
	<article id="carbon">
		<?php tableMake($output, 4); // Concentration CO² ?>
	</article>
</div>
<!-- END -->
