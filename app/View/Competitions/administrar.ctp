<?php echo $this->Html->script('casillas.js'); ?>

<br>
<br>
<br>
<br>
<br>
<div class = "container-fluid">
	<div class = "row">
		<div class = "col-sm-12">
			<?php echo $this->Form->create('Competition'); ?>
			<input type = "text" name = "data[<?php echo 0 ?>]" > 
		</div>
	</div>


	<div class = "row">
	<!-- Imprimo los campos de los equipos disponibles -->
		<?php $cont = 0; ?>
		<div class = "col-sm-4 entradas">
			<input type ="text" value = "<?php echo $tope; ?>"  id = "tope">
			<?php foreach($grouplist as $g): ?>
				<input type = "text" value = "<?php echo $g; ?>" class = "equipos" id = "<?php echo $cont; ?>">
				<?php $cont++; ?>
			<?php endforeach ?>
		</div>

		<!-- Imprimo los campos de locales y visitantes según el nº de equipos -->
		<div class = "col-sm-4">
			<h2>Equipo local</h2>
			<?php $cont = 1; ?>
			<!-- <?php echo $this->Form->create('Competition'); ?> -->
			<?php for($i = 1; $i<= 3; $i++){ ?>
			<input type = "text" name = "data[<?php echo $cont; ?>]" class = "juego" > 
			<?php 
				$cont++; } ?>
			
		</div> 
		<div class = "col-sm-4">
			<h2>Equipo visitante</h2>
			<?php for($i = 4; $i<= 6; $i++){ ?>
			<input type = "text" name = "data[<?php echo $cont; ?>]" class = "juego" > 
			<?php 
				$cont++; } ?>
		</div>

	</div>

	<div class = "row">
		<?php echo $this->Form->end('Probar'); ?>
		<!-- <pre><?php print_r($arrai); ?></pre> -->
		<!-- <pre><?php print_r($data_array); ?></pre> -->
	</div>
 <!--
	<div class = "row">
		<div class = "col-sm-12">
			<?php echo $this->Form->create('Competition'); ?>
			<input type = "text" id ="PartidoEquipo1" name = "data[Partido][equipo1]" > 
			<input type = "text"  name = "data[Partido][equipo2]" >
			<?php echo $this->Form->end('Probar'); ?>
			<pre><?php print_r($arrai); ?></pre>

		</div>
	</div> -->
</div>




<!--
<select id="equipos" size= <?php echo $tope; ?> >
	
	<option value="<?php echo $g ?>" ><?php echo $g ?></option>
	
</select>
<pre><?php print_r($id_jornada); ?></pre>
<pre><?php echo $id_jornada['Jornada']['id']; ?></pre>

<pre><?php print_r($jarray); ?></pre> -->