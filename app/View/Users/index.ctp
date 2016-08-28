<table class="table table-striped">
            <thead>
              <tr>
                <th>Id</th>
                <th>Nombre</th>
                <th>Usuario</th>
                <th>Rol</th>
                <th>Acción</th>
              </tr>
            </thead>
            <tbody>

            <?php foreach($usuarios as $var):?>
              <tr>
                <td><?php echo $var['User']['id']; ?></td>
                <td><?php echo $var['User']['fullname']; ?></td>
                <td><?php echo $var['User']['username']; ?></td>
                
                <td>
                <?php echo $this->Html->link('Ver',
                  array('controller' => 'players', 'action' => 'ver', $play['Player']['id']),
                    array('class' => 'btn btn-sm btn-primary'));?>
                </td>
              </tr>
             <?php endforeach; ?>
            </tbody>
          </table>