<?php echo $this->Form->create('Team', array('type' => 'file'));?>
<div class="container">
	<div class="row">

		<div class="col col-sm-8">
				<div class ="form-group">

					<label for="nombre">Nombre del club</label>
					<input type="text" class="form-control" id="nombre" name="data[1]">

					<label for="contacto">Persona de contacto</label>
					<input type="text" class="form-control" id="contacto" name="data[2]" >

					<label for="direccion">Direccion</label>
					<input type="text" class="form-control" id="direccion" name="data[3]">

					<label for="poblacion">Poblacion</label>
					<input type="text" class="form-control" id="poblacion" name="data[4]" >

					<label for="telefono">Telefono contacto</label>
					<input type="text" class="form-control" id="telefono" name="data[5]" >
				</div>			
		</div>



		<div class="col col-sm-4">
					<?php //echo $this->Html->image('../files/team/id_foto/'.$team['Team']['dir'].'/'.'big_'.$team['Team']['id_foto']); ?>
			<?php echo $this->Form->input('id_foto.file.remove',array('type' =>'hidden')); ?>

<!-- campo para modificar la foto -->
			<?php echo $this->Form->input('id_foto', array('type' => 'file', 'label' => 'Subir Foto','class' => 'btn btn-primary'));
      		echo $this->Form->input('dir',array('type' =>'hidden')); 
			?>

			<h4>Seleccione una categoria</h4>
     <select id="categoria" name = "data[6]">
       <?php foreach($grouplist as $data): ?>
         <option value = "<?php echo $data['Categoria']['id']; ?>"><?php echo $data['Categoria']['nombre']; ?>
         </option>
       <?php endforeach; ?>
     </select>

			</div>

	</div>	
	<div class="row">
		<div class="col col-sm-12"> 
			<input type="submit" value="Crear equipo" class="btn btn-success" />
			<?php //echo $this->Form->end('Modificar equipo',array('class' => 'btn btn-sm btn-primary')); ?>
			<?php echo $this->Html->link('Cancelar',array('controller' => 'teams', 'action' => 'index'),
				array('class' => 'btn btn-primary')); ?>
			</div>
	</div>
</div>
	
		

	

