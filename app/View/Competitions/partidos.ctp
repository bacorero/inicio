<br>
<br>
<br>
<br>
<br>
<br>
<table class="table table-striped">
	<thead>
	    <tr>
	        <th>Equipo local</th>
	        <th></th>
	        <th>Equipo visitante</th>
	    </tr>
	</thead>

	<tbody>
		<?php foreach($partidos as $var): ?>
			<tr>
				<td><?php echo $var['Partido']['equipo1']; ?></td>
				<td><?php echo $var['Partido']['equipo1_gol']; ?>
					<?php echo "  -  "; ?>
					<?php echo $var['Partido']['equipo2_gol']; ?></td>
				<td><?php echo $var['Partido']['equipo2']; ?></td>
			</tr>
		<?php endforeach; ?>
	</tbody>
</table>
   