<?php echo $this->Html->script('casillas.js'); ?>

<br>
<br>
<br>
<br>
<br>
<div class = "container-fluid">
	<div class = "row">
		<?php $cont = 0; ?>
		<div class = "col-sm-4 entradas">
			<input type ="text" value = "<?php echo $tope; ?>" visible = "hidden" id = "tope">
			<?php foreach($grouplist as $g): ?>
				<input type = "text" value = "<?php echo $g; ?>" class = "equipos" id = "<?php echo $cont; ?>">
				<?php $cont++; ?>
			<?php endforeach ?>

		</div>

		<div class = "col-sm-4">
			<h2>Equipo local</h2>
			<?php $cont = 0; ?>
			<?php for($i = 1; $i<= $tope/2; $i++){ ?>
			<input type = "text" id = "<?php echo $cont; ?>" class = "juego" > 
			<?php } ?>
			
		</div>
		<div class = "col-sm-4">
			<h2>Equipo visitante</h2>
			<?php for($i = 1; $i<= $tope/2; $i++){ ?>
			<input type = "text" id = "<?php echo $cont; ?>" class = "juego" > 
			<?php } ?>
		</div>
	</div>
</div>

<!--
<select id="equipos" size= <?php echo $tope; ?> >
	
	<option value="<?php echo $g ?>" ><?php echo $g ?></option>
	
</select>
-->


<pre><?php print_r($competicion); ?></pre> 