<!DOCTYPE html>
<!-- LIVE -->
<article>
	<?php
		$handle = file('./donnees.csv');
		$output = explode(';', $handle[count($handle)-1], 5);
		foreach($output as $value) { echo("$value<br />"); }
	?>
</article>
<!-- END -->
