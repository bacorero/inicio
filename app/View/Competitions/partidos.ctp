<br>
<br>
<br>
<br>
<div class = "container-fluid">

	<div class = "row">
		<div class = "col-sm-12">
				<?php echo $this->Html->link('Volver',
        array('controller' => 'competitions', 'action' => 'ver',$id_jornada),
            array('class' => 'btn btn-sm btn-primary'));?>
			<p style="font-size:2em;">Jornada <?php echo $jornada['Jornada']['jornada_numero']; ?></p>
			<p>Fecha: <?php echo $jornada['Jornada']['nombre']; ?></p>
			
		</div> 
	</div>
		
	<div class = "row">
		<div class = "col-sm-7">
			<table class="table table-striped">
				<?php foreach($partidos as $var): ?>
					<tr>
						<td>
							<span><?php echo $var['Partido']['equipo1']; ?></span>
							<span style="float:right"><?php echo $var['Partido']['estado']; ?></span>
							<span  class="marcador_l"><?php echo $var['Partido']['equipo1_gol']; ?></span>
							<span style="float:right"><?php echo $this->Html->image('../files/team/id_foto/'.$escudos1[$var['Partido']['equipo1_id']]['Team']['dir'].'/'.'thumb_'.$escudos1[$var['Partido']['equipo1_id']]['Team']['id_foto']); ?></span>
						</td>
					</tr>
				<?php endforeach; ?>
			</table>
		</div>


		<div class = "col-sm-5">

			<table class="table table-striped">
				<?php foreach($partidos as $var): ?>
					<tr>
						<td>
							<span class="marcador_r"><?php echo $var['Partido']['equipo2_gol']; ?></span>
							<span style="float:left"><?php echo $this->Html->image('../files/team/id_foto/'.$escudos2[$var['Partido']['equipo2_id']]['Team']['dir'].'/'.'thumb_'.$escudos2[$var['Partido']['equipo2_id']]['Team']['id_foto']); ?></span>
							<span><?php echo $var['Partido']['equipo2']; ?></span>
							<span style="float:right">
								<?php if($current_user['role'] == 'admin'): ?>
								<?php echo $this->Html->link('Acta',
           array('controller' => 'competitions', 'action' => 'actas_crear', $var['Partido']['id']),
            array('class' => 'btn btn-sm btn-primary'));?>
        <?php endif; ?>
       </span>
						</td>
					</tr>
				<?php endforeach; ?>
			</table>
		</div>

	</div>
</div>

