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

$cakeDescription = __d('cake_dev', 'CakePHP: the rapid development php framework');
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
	<?php
		echo $this->Html->meta('icon');

		echo $this->Html->css(array('cake.generic','style.css','bootstrap.min.css','bootsrtap-theme.min.css'));
		echo $this->Html->script(array('jquery.min.js','docs.min.js','bootstrap.min.js'));

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
          <a class="navbar-brand" href="/inicio">Home</a>
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

            <li><a href="#contact">Jornada</a></li>

          </ul>
        </div><!--/.nav-collapse -->
      </div>

    </nav>

    <div id="content">
  
    	<?php echo $this->Flash->render(); ?>

			<?php echo $this->fetch('content'); ?>
      
    </div>
	
</body>
</html>
