<H2>Nuevo jugador</H2>

<?php
	echo $this->Form->create('Player');
	echo $this->Form->input('nombre');
	echo $this->Form->input('apellido');
	echo $this->Form->input('dni');
	echo $this->Form->input('telefono');
	echo $this->Form->end('Crear jugador');

	echo $this->Html->link('Volver',array('controller' => 'players', 'action' => 'index'),
	array('class' => 'btn btn-sm btn-primary')); 

?>