<H1>MODIFICAR JUGADORES</H1>

<?php echo $this->Form->create('Player', array('type' => 'file'));?>
<?php echo $this->Form->input('nombre'); ?>
<?php echo $this->Form->input('apellido'); ?>
<?php echo $this->Form->input('dni'); ?>
<?php echo $this->Form->input('telefono'); ?>

<!-- campo para modificar la foto -->
<?php echo $this->Form->input('id_foto', array('type' => 'file', 'label' => 'Foto'));
      echo $this->Form->input('dir',array('type' =>'hidden')); 
?>

<?php echo $this->Form->end('Modificar jugador'); 

//Enlace para volver a la página anterior
echo $this->Html->link('Cancelar',array('controller' => 'players', 'action' => 'index'),
	array('class' => 'btn btn-sm btn-primary'));
?>