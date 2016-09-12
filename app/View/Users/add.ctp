<div class="container">
	<div class="row">
		<div class="col-md-6">
			<?php echo $this->Form->create('User', array('role' =>'form')); ?>
			<fieldset>
				<h2><?php echo __('Nuevo usuario'); ?></h2>
				<?php
					echo $this->Form->input('fullname', array('class'=>'form-control','label'=>'Nombre'));
					echo $this->Form->input('username', array('class'=>'form-control','label'=>'Usuario'));
					echo $this->Form->input('password', array('class'=>'form-control','label'=>'Contraseña'));
				?>
				</fieldset>
				<p><?php echo $this->Form->end(array('label'=>'Crear Usuario','class'=>'btn btn-success')); ?> </p>
				<div class="btn-group">

				</div>
		</div>
	</div>
</div>