<!DOCTYPE html>
<!-- LIVE -->
<article>
	<?php
		$handle = file($path);
		$output = explode(';', $handle[count($handle)-1], 5);
		foreach($output as $value) { echo("$value<br />"); }
	?>
</article>
<!-- END -->
