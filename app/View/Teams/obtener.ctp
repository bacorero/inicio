<div class="container">
  <div class="row">
    <div class="col-md-12 col-sm-12">
          <table class="table table-striped">
            <thead>
              <tr>
                <th>Nombre</th>
                <th>Población</th>
              </tr>
            </thead>
            <tbody>

            <?php foreach($teams as $team):?>
              <tr> 
              <!-- campo de la foto -->
                <td><?php echo $this->Html->image('../files/team/id_foto/'.$team['teams']['dir'].'/'.'thumb_'.$team['teams']['id_foto']); ?></td>
                <td><?php echo $team['teams']['nombre']; ?></td>
                <td><?php echo $team['teams']['poblacion']; ?></td>
            

                <td>
                <?php echo $this->Html->link('Ver',
                  array('controller' => 'teams', 'action' => 'ver', $team['teams']['id']),
                    array('class' => 'btn btn-primary')); ?>
                  </td>
                  <td>
                <?php echo $this->Html->link('Modificar',
                  array('controller' => 'teams', 'action' => 'editar', $team['teams']['id']),
                    array('class' => 'btn btn-success')); ?>
                  </td>
                  <td>
                <?php echo $this->Html->link('Eliminar',
                  array('controller' => 'teams', 'action' => 'eliminar', $team['teams']['id']),
                    array('class' => 'btn btn-danger')); ?>
                  </td>

              </tr>
             <?php endforeach; ?>
            </tbody>
          </table>
    </div>
  </div>
</div>