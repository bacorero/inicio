<script type="text/javascript">
		$(function(){
			$("#calendario").datepicker({

			});
		});
	</script>

<?php echo $this->Html->script('casillas.js'); ?>

<br>
<br>
<br>
<br>
<br>
<div class = "container-fluid">
	<div class = "row">
	<?php echo $this->Form->create('Competition'); ?>
		<div class = "col-sm-3">
			<?php //echo $this->Form->create('Competition'); ?>
			<fieldset>
				<legend align="right">Fecha de la primera jornada</legend>
				<label for "data[<?php echo 0 ?>]">Fecha</label>
				<input type = "text" name = "data[<?php echo 0 ?>]" id ="calendario">
			</fieldset>
		</div>
	</div>
	<div class = "row">
	<!-- Imprimo los campos de los equipos disponibles -->
		<?php $cont = 0; ?>
		<div class = "col-sm-4 entradas">
			<fieldset>
			<input type ="hidden" value = "<?php echo $tope; ?>"  id = "tope">
				<legend>Equipos a jugar</legend>
				<?php foreach($grouplist as $g): ?>
					<input type = "text" value = "<?php echo $g; ?>" class = "equipos" id = "<?php echo $cont; ?>">
					<?php $cont++; ?>
				<?php endforeach ?>
			</fieldset>
		</div>

		<!-- Imprimo los campos de locales y visitantes según el nº de equipos -->
		<div class = "col-sm-4">
			<fieldset>
				<legend>Local</legend>
				<?php $cont = 1; ?>
				<?php for($i = 1; $i<= $tope/2; $i++){ ?>
				<input type = "text" name = "data[<?php echo $cont; ?>]" class = "juego" > 
				<?php $cont++; } ?>
			</fieldset>
			
		</div> 
		<div class = "col-sm-4">
			<fieldset>
				<legend>Visitante</legend>
				<?php for($i = ($tope/2)+1; $i<= $tope; $i++){ ?>
				<input type = "text" name = "data[<?php echo $cont; ?>]" class = "juego" > 
				<?php $cont++; } ?>
			</fieldset>
		</div>

	</div>

	<div class = "row" style = "margin-top:30px;">
		<div class = "col-sm-4"></div>
		<div class = "col-sm-4">
			<?php echo $this->Form->end('Sortear'); ?>
		</div>
		<div class = "col-sm-4"></div>
	</div>
	</form>
</div>




<!--
<select id="equipos" size= <?php echo $tope; ?> >
	
	<option value="<?php echo $g ?>" ><?php echo $g ?></option>
	
</select>
<pre><?php print_r($id_jornada); ?></pre>
<pre><?php echo $id_jornada['Jornada']['id']; ?></pre>

<pre><?php print_r($jarray); ?></pre> -->