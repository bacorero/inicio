<br>
<br>
<br>
<br>
<br>
<br>
<table class="table table-striped">
  <thead>
    <tr>
      <th>Nombre</th>
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
          <?php echo $var['Arbitro']['telefono']; ?>
        </td>
        <td>
          <?php echo $this->Html->link('Ver',
                array('controller' => 'arbitros', 
                        'action' => 'ver', $var['Arbitro']['id']),
                    array('class' => 'btn btn-sm btn-primary'));
            ?>
        </td>
      </tr>
    <?php endforeach; ?>
  </tbody>
</table>