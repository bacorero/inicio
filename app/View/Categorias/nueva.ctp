<h2>Nueva categoria</h2>

<?php
	echo $this->Form->create('Categoria', array('type' => 'file'));
	echo $this->Form->input('nombre');

	echo $this->Form->end('Crear categoria');

	echo $this->Html->link('Volver',array('controller' => 'categorias', 'action' => 'index'),
	array('class' => 'btn btn-sm btn-primary')); 

?>