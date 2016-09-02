<div class = "container">
	<h4>Jugador <?php echo $player['Player']['nombre'];?></h4>
	</div>
<div class = "container-fluid">
	<div class = "row">
		<div class = "col-sm-8">
			<p><strong>DNI: </strong><?php echo $player['Player']['dni'];?></p>
			<p><strong>Nombre: </strong><?php echo $player['Player']['nombre'];?></p>
			<p><strong>Apellidos: </strong><?php echo $player['Player']['apellido'];?></p>
			<p><strong>Teléfono: </strong><?php echo $player['Player']['telefono'];?></p>
			<p><strong>Fecha de nacimiento: </strong><?php echo $player['Player']['f_nacimiento'];?></p>
			<p><strong>Nacionalidad: </strong><?php echo $player['Player']['nacionalidad'];?></p>
			<p><strong>Dorsal: </strong><?php echo $player['Player']['dorsal'];?></p>
			<p><strong>Fecha de creación: </strong><?php echo $player['Player']['created'];?></p>
			<p><strong>Fecha última modificación: </strong><?php echo $player['Player']['modified'];?></p>
			<p><strong>Equipo: </strong><?php echo $equipos;?></p>
		</div>
		<div class = "col-sm-4">	
			<?php echo $this->Html->image('../files/player/id_foto/'.$player['Player']['dir'].'/'.'big_'.$player['Player']['id_foto']); ?>
		</div>
		<div>
			<br>
			<br>
			<br>
			<label for="observaciones">Observaciones</label>
			<textarea id="observaciones" rows="2" cols="25" readonly="readonly" style="resize:none">
				<?php echo $player['Player']['observaciones']; ?>
			</textarea>
		</div>
	</div>

	<div class = "row">
		<div class = "col-sm-4">
			<br>
			<button class="btn btn-warning" type="button">
				Tarjetas amarillas------<spam class="badge"><?php echo $player['Player']['t_amarillas']; ?></spam>
			</button>
			<button class="btn btn-danger" type="button">
				Tarjetas rojas-----------<spam class="badge"><?php echo $player['Player']['t_rojas']; ?></spam>
			</button>
			<button class="btn btn-info" type="button">
				Tarjetas acumuladas--<spam class="badge"><?php echo $player['Player']['t_acumuladas']; ?></spam>
			</button>
		</div>

		<div class="col col-sm-4">
			<br>
			<button class="btn btn-success" type="button">
					Partidos jugados-------<spam class="badge"><?php echo $player['Player']['p_jugados']; ?></spam>
			</button>
			<button class="btn btn-danger" type="button">
				Partidos sancionados-<spam class="badge"><?php echo $player['Player']['p_sancionados']; ?></spam>
			</button>
		</div>

		<div class = "col-sm-4">
			<br>
			<button class="btn btn-primary" type="button">
				Goles marcados------<spam class="badge"><?php echo $player['Player']['goles']; ?></spam>
			</button>
			<button class="btn btn-danger" type="button">
				Goles recibidos-------<spam class="badge"><?php echo $player['Player']['g_recibidos']; ?></spam>
			</button>
		</div>
	</div>

	<div class = "row">
		<div class = "col-sm-1">
			
		</div>
	</div>

	<div class=row>
		<div class="col sm-12">
			<spam class="label label success">Goles marcados</spam>
		</div>
	</div>


	<diw class = "row">
		<div class = "col-sm-3">
			<?php 
			//Enlace para modificar los jugadores
			echo $this->Html->link('Modificar',array('controller' => 'players', 'action' => 'editar', $player['Player']['id']),
				array('class' => 'btn btn-danger'));?>
		</div>
		<div class = "col-sm-3">
			<?php //Enlace para fichar a este jugador
			echo $this->Html->link('Fichar',array('controller' => 'players', 'action' => 'fichar', $player['Player']['id']),
				array('class' => 'btn btn-success'));?>
		</div>
		<div class ="col-sm-3">
			<?php //Enlace para volver a la página anterior
			echo $this->Html->link('Volver',array('controller' => 'players', 'action' => 'index'),
				array('class' => 'btn btn-primary')); 
				?>
		</div>
		<div class = "col-sm-3">
			<?php //Enlace para eliminar a un jugador								 
			echo $this->Html->link('Eliminar', 	
			array('action' => 'eliminar', $player['Player']['id']),
			array('class' => 'btn btn-danger'));
			?>
		</div>
	</div>

</div>

