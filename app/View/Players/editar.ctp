<H4>MODIFICAR JUGADORES</H4>
<?php echo $this->Form->create('Player', array('type' => 'file'));?>
<div class = "container-fluid">
	<div class = "row">

		<div class = "col-sm-8">
			<div class ="form-group">
				<label for="nombre">Nombre:</label>
				<input type="text" class="form-control" id="nombre" value =" <?php echo $player['Player']['nombre']; ?>" name="data[1]">
				<label for="apellido">Apellidos:</label>
				<input type="text" class="form-control" id="apellido" value =" <?php echo $player['Player']['apellido']; ?>" name="data[2]">
				<label for="direccion">Dirección:</label>
				<input type="text" class="form-control" id="direccion" value =" <?php echo $player['Player']['direccion']; ?>" name="data[3]">
				<label for="dni">DNI:</label>
				<input type="text" class="form-control" id="dni" value =" <?php echo $player['Player']['dni']; ?>" name="data[4]">
				<label for="telefono">Teléfono:</label>
				<input type="text" class="form-control" id="telefono" value =" <?php echo $player['Player']['telefono']; ?>" name="data[5]">
				<label for="nacionalidad">Nacionalidad:</label>
				<input type="text" class="form-control" id="nacionalidad" value =" <?php echo $player['Player']['nacionalidad']; ?>" name="data[6]">
				<label for="f_nacimiento">Fecha de nacimiento:</label>
				<input type="text" class="form-control" id="f_nacimiento" value =" <?php echo $player['Player']['f_nacimiento']; ?>" name="data[7]">

				<label for="dorsal">Dorsal:</label>
				<input type="text" class="form-control" id="dorsal" value =" <?php echo $player['Player']['dorsal']; ?>" name="data[16]">

				<label for="goles">Goles marcados:</label>
				<input type="text" class="form-control" id="goles" value =" <?php echo $player['Player']['goles']; ?>" name="data[13]">
				<label for="g_recibidos">Goles recibidos:</label>
				<input type="text" class="form-control" id="g_recibidos" value =" <?php echo $player['Player']['g_recibidos']; ?>" name="data[9]">

				<label for="t_amarillas">Tarjetas amarillas:</label>
				<input type="text" class="form-control" id="t_amarillas" value =" <?php echo $player['Player']['t_amarillas']; ?>" name="data[10]">
				<label for="t_rojas">Tarjetas rojas:</label>
				<input type="text" class="form-control" id="t_rojas" value =" <?php echo $player['Player']['t_rojas']; ?>" name="data[11]">
				<label for="t_acumuladas">Tarjetas acumuladas:</label>
				<input type="text" class="form-control" id="t_acumuladas" value =" <?php echo $player['Player']['t_acumuladas']; ?>" name="data[12]">

				<label for="p_jugados">Partidos jugados:</label>
				<input type="text" class="form-control" id="p_jugados" value =" <?php echo $player['Player']['p_jugados']; ?>" name="data[14]">
				<label for="p_sancionados">Partidos sancionados:</label>
				<input type="text" class="form-control" id="p_sancionados" value =" <?php echo $player['Player']['p_sancionados']; ?>" name="data[15]">

				<label for="observaciones">Observaciones:</label>
				<input type="text" class="form-control" id="observaciones" value =" <?php echo $player['Player']['observaciones']; ?>" name="data[8]">
			</div>
		</div>

		<div class = "col-sm-4" >

			<?php echo $this->Html->image('../files/player/id_foto/'.$player['Player']['dir'].'/'.'big_'.$player['Player']['id_foto']); ?>



			<?php echo $this->Form->input('id_foto.file.remove',array('type' =>'hidden')); ?> 
			<!-- campo para modificar la foto -->

			<input type="file" name="data[17]">
			<input type="hidden" name="data[18]">
			<?php //echo $this->Form->input('id_foto', array('type' => 'file', 'label' => 'Cambiar Foto'));
      		//echo $this->Form->input('dir',array('type' =>'hidden')); 
			?>
		</div>
	</div>

	<div class="row">

		<div class="col col-sm-12"> 
			<input type="submit" value="Modificar" class="btn btn-danger" />
			<?php echo $this->Html->link('Cancelar',array('controller' => 'players', 'action' => 'index'),
				array('class' => 'btn btn-primary')); ?>
		</div>

	</div>

</div>
