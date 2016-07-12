<H1>MODIFICAR JUGADORES</H1>


<div class = "container-fluid">
	
	 

	<div class = "row">

		<div class = "col-sm-6">
			<?php echo $this->Form->create('Player', array('type' => 'file'));?>
	
			
				<?php echo $this->Form->input('nombre', array('class' => 'form-control')); ?>
			<?php echo $this->Form->input('apellido', array('class' => 'form-control')); ?> 
			<?php echo $this->Form->input('direccion', array('class' => 'form-control')); ?>
		</div>

		 
		
		<div class = "col-sm-4" >
			<?php echo $this->Form->input('dni', array('class' => 'form-control')); ?>
			<?php echo $this->Form->input('telefono', array('class' => 'form-control')); ?>
			<?php echo $this->Html->image('../files/player/id_foto/'.$player['Player']['dir'].'/'.'big_'.$player['Player']['id_foto']); ?>
			<?php echo $this->Form->input('id_foto.file.remove',array('type' =>'hidden')); ?> 
			<!-- campo para modificar la foto -->
			<?php echo $this->Form->input('id_foto', array('type' => 'file', 'label' => 'Cambiar Foto'));
      		echo $this->Form->input('dir',array('type' =>'hidden')); 
			?>
		</div>

		<div class = "col-sm-2">
			
			<div class = "botones">
				<?php echo $this->Form->input('p_jugados', array('class' => 'form-control', 'label' => 'Jugados')); ?>
			</div>

			<div class = "botones">
				<?php echo $this->Form->input('t_amarillas', array('class' => 'form-control', 'label' => 'Tarjetas amarillas')); ?>
			</div>

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
	<div class = "row">

		<div class = "col-sm-1 etiquetas">
			<?php echo $this->Form->input('p_jugados', array('class' => 'form-control', 'label' => 'Jugados')); ?> 
		</div>

		<div class = "col-sm-1 etiquetas">
			<?php echo $this->Form->input('t_amarillas',  array('class' => 'form-control', 'label' => 'Amarillas')); ?>
		</div>

		<div class = "col-sm-1 etiquetas">
			<?php echo $this->Form->input('t_rojas', array('class' => 'form-control', 'label' => 'Rojas')); ?>
		</div>

		<div class = "col-sm-1 etiquetas">
			<?php echo $this->Form->input('t_acumuladas',  array('class' => 'form-control', 'label' => 'Acumulados')); ?>
		</div>

		<div class = "col-sm-1 etiquetas">
			<?php echo $this->Form->input('goles',  array('class' => 'form-control', 'label' => 'Goles')); ?>
		</div>

	</div>

	<div class = "row">

		<div class = "col-sm-8">
			
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
