<h1>Relación de Competiciones</h1>
<table class="table table-striped">
            <thead>
              <tr>
                <th>Nombre</th>
                <th>Temporada</th>
                <th>Categoria</th>
                <th>Acción</th>
              </tr>
            </thead>
            <tbody>

            <?php foreach($competiciones as $cats):?>
              <tr>
                <td><?php echo $cats['Competition']['nombre']; ?></td>
                <td><?php echo $cats['Competition']['temporada']; ?></td>
                <?php foreach ($categorias as $catego):
                  if($cats['Competition']['categoria_id'] == $catego['Categoria']['id'])
                  { ?>
                    <td><?php echo $catego['Categoria']['nombre'] ?></td>
                  <?php } endforeach; ?>
                <td>
                  <?php echo $this->Html->link('Ver',
                  array('controller' => 'competitions', 'action' => 'ver', $cats['Competition']['id']),
                    array('class' => 'btn btn-sm btn-primary'));?>

                  <?php echo $this->Html->link('Administrar',
                  array('controller' => 'competitions', 'action' => 'administrar', $cats['Competition']['id']),
                    array('class' => 'btn btn-sm btn-primary'));?>

                  
                </td>
                
              </tr>
             <?php endforeach; ?>
            </tbody>
          </table>
          