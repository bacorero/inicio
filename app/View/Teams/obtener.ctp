     <div class="row">
        <div class="col-md-6">
          <div class="row">
        <div class="col-md-6">
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
                <td><?php echo $team['teams']['nombre']; ?></td>
                <td><?php echo $team['teams']['poblacion']; ?></td>
            <!-- campo de la foto -->
                <td><?php echo $this->Html->image('../files/team/id_foto/'.$team['teams']['dir'].'/'.'thumb_'.$team['teams']['id_foto']); ?></td>

                <td>
                <?php echo $this->Html->link('Ver',
                  array('controller' => 'teams', 'action' => 'ver', $team['teams']['id']),
                    array('class' => 'btn btn-sm btn-primary')); ?>
                  </td>
              </tr>
             <?php endforeach; ?>
            </tbody>
          </table>


          <?php echo $this->Html->link('Nuevo Equipo',
                  array('controller' => 'teams', 'action' => 'nuevo'),
                  array('class' => 'btn btn-sm btn-primary')); ?>
        </div>
      </div>