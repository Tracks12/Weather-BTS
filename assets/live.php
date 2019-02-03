<!-- LIVE -->
<article id="dataLive">
	<?php
		$handle = file($path);
		$lline = $handle[count($handle)-1];
		$output = explode(';', $lline, 5);
	?>
	<h2>Données prise le : <?php echo($output[0]); ?></h2>
	<table>
		<tr class="bot">
			<?php
				for($i = 1; $i < count($output); $i++) {
					if($i === 3) { $output[$i] = $output[$i] / 100; }
					echo("<td><div class='statgraph'></div>
						{$output[$i]}
						<script>graph.jauge($i, { x: '$output[$i]'});</script></td>");
				}
			?>
		</tr>
		<tr>
			<td>Humidité (%)</td>
			<td>Temperature (°C)</td>
			<td>Pression (hPa)</td>
			<td>CO² (ppm)</td>
		</tr>
	</table>
</article>
<!-- END -->
