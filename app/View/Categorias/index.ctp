<table class="table table-striped">
  <thead>
    <tr>
      <th>Nombre</th>
      <th>Acción</th>
    </tr>
  </thead>

  <tbody>

    <?php foreach($categorias as $cat):?>
      <tr>
        <td>
          <?php echo $cat['Categoria']['nombre']; ?>
        </td>
        
      </tr>
    <?php endforeach; ?>
  </tbody>
</table>

<?php
  echo $this->Form->create('Categoria');
  echo $this->Form->input('nombre');

  echo $this->Form->end('Crear categoria' ,array('controller' => 'categorias', 'action' => 'index'),
  array('class' => 'btn btn-sm btn-primary'));
 
?>