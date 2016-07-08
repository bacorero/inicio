<H1>MODIFICAR JUGADORES</H1>


<div class = "container-fluid">
	
	 

	<div class = "row">

		<div class = "col-sm-8">
			<?php echo $this->Form->create('Player', array('type' => 'file'));?>
	
			<?php echo $this->Form->input('nombre', array('class' => 'form-control')); ?>
			<?php echo $this->Form->input('apellido', array('class' => 'form-control')); ?> 
			<?php echo $this->Form->input('direccion', array('class' => 'form-control')); ?> 
		</div>

		<div class = "col-sm-4">
			<?php echo $this->Form->input('dni', array('class' => 'form-control')); ?>
			<?php echo $this->Form->input('telefono', array('class' => 'form-control')); ?>
			<?php echo $this->Form->input('id_foto.file.remove',array('type' =>'hidden')); ?> 
		</div>

	</div>

	<div class = "row">
		<div class = "col-sm-8">
			<!-- campo para modificar la foto -->
			<?php echo $this->Form->input('id_foto', array('type' => 'file', 'label' => 'Foto'));
      		echo $this->Form->input('dir',array('type' =>'hidden')); 
			?>
		</div>
		<div class = "col-sm-4">
			<div class = "botones">
				<!-- Boton modificar jugador -->
				<?php echo $this->Form->end('Modificar jugador',array('class' => 'btn btn-sm btn-primary')); ?>
			</div>
			<div class = "botones">
				<?php echo $this->Html->link('Cancelar',array('controller' => 'players', 'action' => 'index'),
				array('class' => 'btn btn-sm btn-primary')); ?>
			</div>
		</div>

	</div>

</div>
