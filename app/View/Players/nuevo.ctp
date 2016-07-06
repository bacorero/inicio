<H2>Nuevo jugador</H2>

<?php
	echo $this->Form->create('Player', array('type' => 'file'));
	echo $this->Form->input('nombre');
	echo $this->Form->input('apellido');
	echo $this->Form->input('dni');
	echo $this->Form->input('telefono');
	
	echo $this->Form->input('id_foto', array('type' => 'file', 'label' => 'Foto'));
	echo $this->Form->input('dir',array('type' =>'hidden'));

	echo $this->Form->end('Crear jugador');

	echo $this->Html->link('Volver',array('controller' => 'players', 'action' => 'index'),
	array('class' => 'btn btn-sm btn-primary')); 

?>