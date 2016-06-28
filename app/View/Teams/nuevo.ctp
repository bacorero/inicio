<H2>Nuevo equipo</H2>

<?php
	echo $this->Form->create('Team');
	echo $this->Form->input('nombre');
	echo $this->Form->input('poblacion');
	echo $this->Form->end('Crear equipo');

	echo $this->Html->link('Volver',array('controller' => 'teams', 'action' => 'index'),
	array('class' => 'btn btn-sm btn-primary')); 

?>