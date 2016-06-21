<H1>MODIFICAR JUGADORES</H1>

<?php echo $this->Form->create('Player');?>
<?php echo $this->Form->input('nombre'); ?>
<?php echo $this->Form->input('apellido'); ?>
<?php echo $this->Form->input('dni'); ?>
<?php echo $this->Form->input('telefono'); ?>
<?php echo $this->Form->end('Modificar jugador'); 

//Enlace para volver a la página anterior
echo $this->Html->link('Cancelar',array('controller' => 'players', 'action' => 'index'),
	array('class' => 'btn btn-sm btn-primary'));
?>