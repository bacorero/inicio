<H1>EQUIPOS</H1>

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
                <td><?php echo $team['Team']['nombre']; ?></td>
                <td><?php echo $team['Team']['poblacion']; ?></td>

                <!-- campo de la foto -->
                <td><?php echo $this->Html->image('../files/team/id_foto/'.$team['Team']['dir'].'/'.'thumb_'.$team['Team']['id_foto']); ?></td>

                <td>
                <?php echo $this->Html->link('Ver',
                  array('controller' => 'teams', 'action' => 'ver', $team['Team']['id']),
                    array('class' => 'btn btn-sm btn-primary')); ?>
                  </td>
              </tr>
             <?php endforeach; ?>
            </tbody>
          </table>

          <ul class="pagination">
            <li> <?php echo $this->Paginator->prev('<'.__('previus'), array('tag' => false), null, array('class' => 'prev disabled')); ?>
            </li>

            <?php echo $this->Paginator->numbers(array('separator' => '', 'tag' => 'li', 'currentTag' => 'a', 'currentClass' => 'active')); ?>

            <li><?php echo $this->Paginator->next(__('next').' >',array('tag' => false), null,array('class' => 'next disabled')); ?> </li>
          </ul>
          <?php echo $this->Html->link('Nuevo Equipo',
                  array('controller' => 'teams', 'action' => 'nuevo'),
                  array('class' => 'btn btn-sm btn-primary')); ?>
        </div>
      </div>

