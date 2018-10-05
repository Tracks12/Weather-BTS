<!DOCTYPE html>
<!-- HISTORIQUE -->
<div class="carousel">
	<article>
		<table>
			<?php
				$data = './donnees.csv';
				$handle = fopen($data, 'r');
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
		<table>
			<?php
				
			?>
		</table>
	</article>
	<article id="temp">
	</article>
	<article id="pressure">
	</article>
	<article id="carbon">
	</article>
</div>
<!-- END -->
