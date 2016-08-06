<?php echo $this->Html->script('team_jquery.js'); ?>
<H1>EQUIPOS</H1>
    <div class = "container">
      <div class="row">
        <div class="col-md-4 col-sm-4" >
        </div>

        <div class="col-md-4 col-sm-4">
          <select id="categoria">
            <?php foreach($grouplist as $data): ?>
              <option value = "<?php echo $data['Categoria']['id']; ?>"><?php echo $data['Categoria']['nombre']; ?></option>
              <?php endforeach; ?>
          </select>
        </div>

        <div class="col-md-4 col-sm-4" >
        </div>
      </div>
      <hr>
      <div class = "row">
        <div class="col-md-12 col-sm-12" id = "resultado">
        </div>
      </div>
    </div>








 <!--     <div class="row">
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
      -->

