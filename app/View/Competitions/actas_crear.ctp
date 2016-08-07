
<br>
<br>
<br>
<br>

<div class = "container-fluid">
	<div class = "row">
		<span><h3>Fecha: <?php echo $jornada['Jornada']['nombre']; ?>
		Jornada numero <?php echo $jornada['Jornada']['jornada_numero']; ?></h3></span>
		<?php echo $this->Form->create('Partido'); ?>
	</div>
	<div class = "row">
	
		<div class = "col-sm-6">

			<div><?php echo $this->Html->image('../files/team/id_foto/'.$equipo_l['Team']['dir'].'/'.'thumb_'.$equipo_l['Team']['id_foto']); ?>
			</div>
			<div>
				<label for "goles_local">Goles marcados</label>
				<input type = "text" name = "data[1]" value = "<?php echo $partido['Partido']['equipo1_gol']; ?>" >
			</div>
		</div>

		<div class = "col-sm-6">
			<div><?php echo $this->Html->image('../files/team/id_foto/'.$equipo_v['Team']['dir'].'/'.'thumb_'.$equipo_v['Team']['id_foto']); ?>
			</div>
			<div>
				<label for "goles_visitante">Goles marcados</label>
				<input type = "text" name = "data[2]" value = "<?php echo $partido['Partido']['equipo2_gol']; ?>" />
			</div>
		</div>
	</div>
	<div class = "row" style="margin-top:30px;">
		<div class = "col-sm-6">
			<label for "data[3]">Estado del partido</label>
			<select name="data[3]"> value="data[3]"
				<option selected>Sin empezar</option>
				<option>1ª parte</option>
				<option>Descanso</option>
				<option>2ª parte</option>
				<option>Finalizado</option>
			</select>
		</div>
		<div class = "col-sm-6">
			<?php echo $this->Form->end('Modificar Acta'); ?>
		</div>
	</div>
</div>	