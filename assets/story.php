<!DOCTYPE html>
<!-- HISTORIQUE -->
<div class="carousel">
	<article>
		<?php
			$data = './data.csv';
			$handle = fopen($data, 'r');
			for($x = 0; $ligne = fgetcsv($handle, 1000, ';'); $x++) { } // On voit combien il y a de ligne
			fclose($handle);
			
			$x = $x - 20; // On soustrait le nombre de ligne à sortir
			$handle = fopen($data, 'r');
			
			echo("<table>");
			for($i = 0; $ligne = fgetcsv($handle, 1000, ';'); $i++) {
				if(($i >= $x) || !$i) { // On fait une condition pour afficher le nb de ligne souhaité
					$cell = 'td'; if(!$i) { $cell = 'th'; }
					echo("<tr>");
					for($j = 0; $j < count($ligne); $j++) {
						if($ligne[$j] || !$j) { echo("<$cell>$ligne[$j]</$cell>"); }
					} echo("</tr>");
				}
			} echo("</table>");
			
			fclose($handle);
		?>
	</article>
</div>
<!-- END -->
