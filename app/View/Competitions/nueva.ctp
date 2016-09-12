<h2>NUEVA COMPETICION</h2>
<?php
	echo $this->Form->create('Competition');
	echo $this->Form->input('temporada');
	echo $this->Form->input('nombre');
	echo $this->Form->input('categoria_id',array(
										'type' => 'select',
										'options' => $grouplist
										)
										); 
	echo $this->Form->end('Crear competicion');

	echo $this->Html->link('Cancelar',array('controller' => 'competitions', 'action' => 'administrar'),
	array('class' => 'btn btn-sm btn-primary')); 

?>