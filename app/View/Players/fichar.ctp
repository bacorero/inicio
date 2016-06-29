<H1>FICHAR JUGADOR</H1>

<?php echo $this->Form->create('Player'); ?>
<?php echo $this->Form->input('team_id',array(
										'type' => 'select',
										'options' => $grouplist
										)
										); ?>
<?php echo $this->Form->input('apellido'); ?>
<?php echo $this->Form->end('Fichar jugador'); 

//Enlace para volver a la página anterior
echo $this->Html->link('Cancelar',array('controller' => 'players', 'action' => 'index'),
	array('class' => 'btn btn-sm btn-primary'));
?>