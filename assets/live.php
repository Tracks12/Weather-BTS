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
		<?php
			echo("<tr>"); for($i = 1; $i < count($output); $i++) { echo("<td>{$output[$i]}</td>"); } echo("</tr>");
			echo("<tr>"); for($i = 1; $i < count($output); $i++) { echo("<td><script></script></td>"); } echo("</tr>");
		?>
	</table>
</article>
<!-- END -->
