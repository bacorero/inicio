<H2>Nuevo árbitro</H2>
<br>
<br>
<br>
<br>
<br>
<br>
<?php
	echo $this->Form->create('Arbitro');//, array('type' => 'file'));
	echo $this->Form->input('nombre');
	echo $this->Form->input('telefono');
	
	//echo $this->Form->input('id_foto', array('type' => 'file', 'label' => 'Foto'));
	//echo $this->Form->input('dir',array('type' =>'hidden'));

	echo $this->Form->end('Crear árbitro');

	echo $this->Html->link('Volver',array('controller' => 'arbitros', 'action' => 'index'),
	array('class' => 'btn btn-sm btn-primary')); 

?>