<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.View.Layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

$cakeDescription = __d('cake_dev', 'Competiciones de Alcoy');
$cakeVersion = __d('cake_dev', 'CakePHP %s', Configure::version())
?>
<!DOCTYPE html>
<html>
<head>
	<?php echo $this->Html->charset(); ?>
	<title>
		<?php echo $cakeDescription ?>:
		<?php echo $this->fetch('title'); ?>
	</title>
  <meta name="viewport" content = "width = device-width, user-scalable = no, initial-scale = 1.0, maximum-scale = 1.0, minimum-scale = 1.0">
	<?php
		echo $this->Html->meta('icon');

		echo $this->Html->css(array('cake.generic','jquery-ui.css','style.css','bootstrap.min.css','bootsrtap-theme.min.css'));
		echo $this->Html->script(array('jquery.min.js','docs.min.js','bootstrap.min.js','jquery-ui.js'));

		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
	?>
</head>
<body>
	<!-- Fixed navbar -->
    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="nav navbar-nav" href="/inicio">Home</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav">

            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Jugadores <span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><?php echo $this->Html->link('Jugadores',array('controller' => 'players', 'action' => 'index'),
  array('class' => 'btn btn-sm btn-primary'));?></li>
                <li><?php echo $this->Html->link('Nuevo jugador',array('controller' => 'players', 'action' => 'nuevo'));?></li>
              </ul>
            </li>

            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Equipos <span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><?php echo $this->Html->link('Ver equipos',array('controller' => 'teams', 'action' => 'index'),
  array('class' => 'btn btn-sm btn-primary'));?></li>
                <li><?php echo $this->Html->link('Crear equipo',array('controller' => 'teams', 'action' => 'nuevo'),
  array('class' => 'btn btn-sm btn-primary'));?></li>
              </ul>
            </li>

            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Competiciones <span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><?php echo $this->Html->link('Nueva competicion',array('controller' => 'competitions', 'action' => 'nueva'),
  array('class' => 'btn btn-sm btn-primary'));?></li>
                <li><?php echo $this->Html->link('Clasificaciones',array('controller' => 'competitions', 'action' => 'index'),
  array('class' => 'btn btn-sm btn-primary'));?></li>
  <li><?php echo $this->Html->link('Ver categorías',array('controller' => 'categorias', 'action' => 'index'),
  array('class' => 'btn btn-sm btn-primary'));?></li>
                <li><?php echo $this->Html->link('Crear categoría',array('controller' => 'categorias', 'action' => 'nueva'),
  array('class' => 'btn btn-sm btn-primary'));?></li>
              </ul>
            </li>

            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Actas <span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><?php echo $this->Html->link('Ver actas',array('controller' => 'categorias', 'action' => 'index'),
  array('class' => 'btn btn-sm btn-primary'));?></li>
                <li><?php echo $this->Html->link('Crear acta',array('controller' => 'categorias', 'action' => 'nueva'),
  array('class' => 'btn btn-sm btn-primary'));?></li>
              </ul>
            </li>

            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Arbitros <span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><?php echo $this->Html->link('Ver árbitros',array('controller' => 'arbitros', 'action' => 'index'),
  array('class' => 'btn btn-sm btn-primary'));?></li>
                <li><?php echo $this->Html->link('Crear arbitro',array('controller' => 'arbitros', 'action' => 'nuevo'),
  array('class' => 'btn btn-sm btn-primary'));?></li>
              </ul>
            </li>

          </ul>
        </div><!--/.nav-collapse -->
      </div>

    </nav>

    <content>
      <div id="content">
    
      	<?php //echo $this->Flash->render(); ?>

  			<?php echo $this->fetch('content'); ?>
        
      </div>
    </content>
    <footer >
    
    </footer>
	
</body>
</html>
