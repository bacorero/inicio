<br>
<br>
<br>
<br>

<pre><?php print_r($current_user); ?></pre>
<table class="table table-striped">
  <thead>
    <tr>
      <th>Nombre</th>
      <th>Apellido</th>
      <th>Acción</th>
    </tr>
  </thead>

  <tbody>

    <?php foreach($resultado as $var):?>
      <tr>
        <td>
          <?php echo $var['Arbitro']['nombre']; ?>
        </td>
        <td>
          <?php echo $var['Arbitro']['apellido']; ?>
        </td>

        <td>
          <?php echo $this->Html->link('Ver',
                array('controller' => 'arbitros', 
                        'action' => 'ver', $var['Arbitro']['id']),
                    array('class' => 'btn btn-sm btn-primary'));
            ?>
          <?php echo $this->Html->link('Modificar',
                array('controller' => 'arbitros', 
                        'action' => 'editar', $var['Arbitro']['id']),
                    array('class' => 'btn btn-sm btn-primary'));
            ?>
           <?php //Enlace para eliminar a un jugador         
               echo $this->Form->postLink('Eliminar',  
               array('action' => 'eliminar', $var['Arbitro']['id']),
               array('class' => 'btn btn-sm btn-primary'),
               array('confirm' => 'Eliminar al arbitro '.$var['Arbitro']['nombre'].'?')
               );
               ?>
        </td>
      </tr>
    <?php endforeach; ?>
  </tbody>
</table>

<?php echo $this->Html->link('Nuevo arbitro',
  array('controller' => 'arbitros','action' => 'nuevo'),
  array('class' => 'btn btn-sm btn-primary'));
            ?>