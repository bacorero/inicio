<h2> Equipo  <?php echo $team['Team']['nombre'];?></h2>

<p><strong>Nombre: </strong><?php echo $team['Team']['nombre'];?></p>
<p><strong>Población: </strong><?php echo $team['Team']['poblacion'];?></p>

<br>
<hr>
<br>
<h3>Jugadores</h3>
<?php if (empty($team['Player'])): ?>
	<p>El Equipo no tiene jugadores</p>

<?php endif ?>

	<div class="row">
        <div class="col-md-6">
          <table class="table table-striped">
            <thead>
              <tr>
                <th>DNI</th>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Teléfono</th>
              </tr>
            </thead>
            <tbody>

            <?php foreach($team['Player'] as $var):?>
              <tr> 
                <td><?php echo $var['dni']; ?></td>
                <td><?php echo $var['nombre']; ?></td>
                <td><?php echo $var['apellido']; ?></td>
                <td><?php echo $var['telefono']; ?></td>
                <td>
                <?php echo $this->Html->link('Ver',
                  array('controller' => 'players', 'action' => 'ver', $var['id']),
                    array('class' => 'btn btn-sm btn-primary')); ?>
                  </td>
              </tr>
             	<?php endforeach; ?>
            </tbody>
          </table>
        </div>
    </div>

<spam class="botones">
<?php 
//Enlace para modificar los equipos
echo $this->Html->link('Modificar',array('controller' => 'teams', 'action' => 'editar', $team['Team']['id']),
	array('class' => 'btn btn-sm btn-primary'));?>
</spam>

<spam class="botones">
<?php
//Enlace para volver a la página anterior
echo $this->Html->link('Volver',array('controller' => 'teams', 'action' => 'index'),
	array('class' => 'btn btn-sm btn-primary')); ?>
</spam>

<spam class="botones">
<?php
//Enlace para fichar un nuevo jugador

