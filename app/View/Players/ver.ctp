<h2>Jugador <?php echo $player['Player']['nombre'];?></h2>
<div>
<spam>
<p><strong>DNI: </strong><?php echo $player['Player']['dni'];?></p>
<p><strong>Nombre: </strong><?php echo $player['Player']['nombre'];?></p>
<p><strong>Apellidos: </strong><?php echo $player['Player']['apellido'];?></p>

<p><strong>Teléfono: </strong><?php echo $player['Player']['telefono'];?></p>
<p><strong>Foto:</strong> </p>
<p><strong>Antigüedad: </strong><?php echo $player['Player']['created'];?></p>
<p><strong>Equipo: </strong><?php echo $equipos;?></p>

<!-- Solo para pruebas -->
<p>id_foto:<?php echo $player['Player']['id_foto']; ?></p>
<p>dir:<?php echo $player['Player']['dir'];?> </p>
</spam>

<spam class="aderechas">
<?php echo $this->Html->image('../files/player/id_foto/'.$player['Player']['dir'].'/'.'big_'.$player['Player']['id_foto']); ?>
</spam>
</div>
<spam class="botones">
<?php 
//Enlace para modificar los jugadores
echo $this->Html->link('Modificar',array('controller' => 'players', 'action' => 'editar', $player['Player']['id']),
	array('class' => 'btn btn-sm btn-primary'));?>
</spam>

<spam class="botones">
<?php 
//Enlace para fichar a este jugador
echo $this->Html->link('Fichar',array('controller' => 'players', 'action' => 'fichar', $player['Player']['id']),
	array('class' => 'btn btn-sm btn-primary'));?>
</spam>

<spam class="botones">
<?php 

//Enlace para volver a la página anterior

echo $this->Html->link('Volver',array('controller' => 'players', 'action' => 'index'),
	array('class' => 'btn btn-sm btn-primary')); 
	?>
</spam>

<spam class="botones">
<?php 

//Enlace para eliminar a un jugador
											 
		echo $this->Form->postLink('Eliminar', 	
		array('action' => 'eliminar', $player['Player']['id']),
		array('confirm' => 'Eliminar al jugador '.$player['Player']['nombre'].' '.$player['Player']['apellido'].'?'),
		array('class' => 'btn btn-sm btn-primary'));
?>
</spam>