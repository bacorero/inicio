<H1>MODIFICAR EQUIPOS</H1>

<?php echo $this->Form->create('Team', array('type' => 'file'));?>
<?php echo $this->Form->input('nombre'); ?>
<?php echo $this->Form->input('poblacion'); ?>


<?php echo $this->Html->image('../files/team/id_foto/'.$team['Team']['dir'].'/'.'big_'.$team['Team']['id_foto']); ?>
			<?php echo $this->Form->input('id_foto.file.remove',array('type' =>'hidden')); ?>

<!-- campo para modificar la foto -->
			<?php echo $this->Form->input('id_foto', array('type' => 'file', 'label' => 'Cambiar Foto'));
      		echo $this->Form->input('dir',array('type' =>'hidden')); 
			?>

 <!-- Boton modificar jugador -->
			<?php echo $this->Form->end('Modificar equipo',array('class' => 'btn btn-sm btn-primary')); ?> 

<!-- Boton para volver a la pagina principal -->
			<?php echo $this->Html->link('Cancelar',array('controller' => 'teams', 'action' => 'index'),
	array('class' => 'btn btn-sm btn-primary')); ?>