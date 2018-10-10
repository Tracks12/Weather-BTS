<!DOCTYPE html>
<!-- LIVE -->
<article>
	<?php
		$handle = file($path); //donnees.csv
		$lline = $handle[count($handle)-1];
		$output = explode(';', $lline, 5);
		foreach($output as $value) { echo("$value<br />"); }
	?>
</article>
<!-- END -->
