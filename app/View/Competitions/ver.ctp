
<br>
<br>
<br>
<br>
<br>
<br>

<table class="table table-striped">
	<thead>
	    <tr>
	        <th>Jornada</th>
	        <th>Fecha</th>
	        <th>Acción</th>
	    </tr>
	</thead>

	<tbody>
		<?php foreach($jornada as $var): ?>
			<tr>
				<td><?php echo $var['Jornada']['jornada_numero']; ?></td>
				<td><?php echo $var['Jornada']['nombre']; ?></td>
				<td><?php echo $this->Html->link('Ver partidos',
                  array('controller' => 'competitions', 'action' => 'partidos', $var['Jornada']['id']),
                  array('class' => 'btn btn-sm btn-primary'));?></td>
			</tr>
		<?php endforeach; ?>
	</tbody>
</table>