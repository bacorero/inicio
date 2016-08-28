    <!-- Fixed navbar -->
    <div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <?php echo $this->Html->link('Competiciones', array('controller' => 'competitions', 'action' => 'index'), array('class' => 'navbar-brand' )); ?>
          <?php //echo $this->Html->link('Árbitros', array('controller' => 'arbitros', 'action' => 'index')) ?>
          

        </div>
        <div class="navbar-collapse collapse">
          <ul class="nav navbar-nav">

            <?php if($current_user['role'] == 'admin'): ?>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">Equipos<span class="caret"></span></a>
              <ul class="dropdown-menu" role="menu">
                <li><?php echo $this->Html->link('Ver equipos', array('controller' => 'teams', 'action' => 'index')) ?></li>
                <li><?php echo $this->Html->link('Nuevo equipo', array('controller' => 'teams', 'action' => 'nuevo')) ?></li>
              </ul>
            </li>
            <?php endif; ?>

            <?php if($current_user['role'] == 'user'): ?>
              <ul class="dropdown-menu" role="menu">
                <li><?php echo $this->Html->link('Árbitros', array('controller' => 'arbitros', 'action' => 'index')) ?></li>
              </ul>
            <?php endif; ?>

            
           

          </ul>
          
          <?php if(isset($current_user)): ?>
          <?php //echo $this->Form->create('Platillo', array('type' => 'GET', 'class' => 'navbar-form navbar-left', 'url' => array('controller' => 'platillos', 'action' => 'search'))); ?>

          <div class="form-group">
              <?php //echo $this->Form->input('search', array('label' => false, 'div' => false, 'id' => 's', 'class' => 'form-control s', 'autocomplete' => 'off', 'placeholder' => 'Buscar...')); ?>
          </div>

          <?php //echo $this->Form->button('Buscar', array('div' => false, 'class' => 'btn btn-primary')); ?>
          <?php echo $this->Form->end(); ?>
          <?php endif; ?>

          <?php if(!isset($current_user)): ?>
          <?php echo $this->Form->create('User', array('type' => 'POST', 'class' => 'navbar-form navbar-left', 'url' => array('controller' => 'users', 'action' => 'login'))); ?>
          <div class="form-group">
              <?php echo $this->Form->input('username', array('label' => false, 'div' => false, 'id' => 's', 'class' => 'form-control s', 'autocomplete' => 'off', 'placeholder' => 'Usuario...')); ?>
              <?php echo $this->Form->input('password', array('label' => false, 'div' => false, 'id' => 's', 'class' => 'form-control s', 'autocomplete' => 'off', 'placeholder' => 'Contraseña...')); ?>
          </div>
          <?php echo $this->Form->button('Acceder', array('div' => false, 'class' => 'btn btn-primary')); ?>
          <?php echo $this->Form->end(); ?>
          <?php endif; ?>
          
          <?php if(isset($current_user)): ?>
            <ul class="nav navbar-nav navbar-right">
              <li>
                <?php echo $this->Html->link('Salir', array('controller' => 'users', 'action' => 'logout')); ?>
              </li>
            </ul>  
          <?php endif; ?>        
          
        </div><!--/.nav-collapse -->
      </div>
    </div>