<H1>MODIFICAR EQUIPOS</H1>

<?php echo $this->Form->create('Team');?>
<?php echo $this->Form->input('nombre'); ?>
<?php echo $this->Form->input('poblacion'); ?>

 <?php echo $this->Form->end('Modificar equipo'); 

//Enlace para volver a la página anterior
echo $this->Html->link('Cancelar',array('controller' => 'teams', 'action' => 'index'),
	array('class' => 'btn btn-sm btn-primary'));