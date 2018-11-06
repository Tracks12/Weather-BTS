<!DOCTYPE html>
<!-- LIVE -->
<article>
	<?php
		$handle = file($path);
		$lline = $handle[count($handle)-1];
		$output = explode(';', $lline, 5);
	?>
	<h2>Données prise le : <?php echo($output[0]); ?></h2>
	<table>
		<tr class="top"> 
			<?php for($i = 1; $i < count($output); $i++) { echo("<td><script>graph.jauge()</script></td>"); } ?>
		</tr>
		<tr class="bot">
			<?php
				for($i = 1; $i < count($output); $i++) {
					if($i === 3) { $output[$i] = $output[$i] / 100; }
					echo("<td>{$output[$i]}</td>");
				}
			?>
		</tr>
	</table>
</article>
<!-- END -->
