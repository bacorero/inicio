<H1>JUGADORES</H1>

<?php
  /*$this->Paginator->options(array(
    'update' => '#contenedor-players',
    'before' => $this->Js->get('#procesando')->effect('fadeIn',array('buffer' => false)),
    'complete' => $this->Js->get('#procesando')->effect('fadeOut', array('buffer' => false)
  )));*/
?>
    <div id="contenedor-players">
      <div class="row">
        <div class="col-md-6">
        <!--
        <div class="progress oculto" id="procesando">
          <div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%">
            <spam class="sr-only">100% Complete</spam>
          </div>
        </div> -->

          <table class="table table-striped">
            <thead>
              <tr>
                <th>DNI</th>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Foto</th>
                <th>Teléfono</th>
                <th>Acción</th>
              </tr>
            </thead>
            <tbody>

            <?php foreach($players as $play):?>
              <tr>
                <td><?php echo $play['Player']['dni']; ?></td>
                <td><?php echo $play['Player']['nombre']; ?></td>
                <td><?php echo $play['Player']['apellido']; ?></td>

                <td><?php echo $this->Html->image('../files/player/id_foto/'.$play['Player']['dir'].'/'.'thumb_'.$play['Player']['id_foto']); ?></td>

				        <td><?php echo $play['Player']['telefono']; ?></td>
                <td>
                <?php echo $this->Html->link('Ver',
                  array('controller' => 'players', 'action' => 'ver', $play['Player']['id']),
                    array('class' => 'btn btn-sm btn-primary'));?>
                  </td>
              </tr>
             <?php endforeach; ?>
            </tbody>
          </table>

          <?php
            echo $this->Paginator->counter(array(
            'format' => __('Página {:page} de {:pages}, mostrando {:current} registros de {:count}, empezando en {:start}, terminando en  {:end}'))); ?>

          <ul class="pagination">
            <li> <?php echo $this->Paginator->prev('<'.__('previus'), array('tag' => false), null, array('class' => 'prev disabled')); ?>
            </li>

            <?php echo $this->Paginator->numbers(array('separator' => '', 'tag' => 'li', 'currentTag' => 'a', 'currentClass' => 'active')); ?>

            <li><?php echo $this->Paginator->next(__('next').' >',array('tag' => false), null,array('class' => 'next disabled')); ?> </li>
          </ul>

          <div class='botones_jugadores'>
          <?php echo $this->Html->link('Nuevo Jugador',
                  array('controller' => 'players', 'action' => 'nuevo'),
                  array('class' => 'btn btn-sm btn-primary')); ?>
          </div>
        </div>
        <?php echo $this->Js->writeBuffer(); ?>
      </div>

