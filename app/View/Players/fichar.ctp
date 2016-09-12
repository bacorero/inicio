<script type="text/javascript">

	$("document").ready(function(){
			
			$('#fichar').click(function(){
				if(confirm("Fichar jugador?"))
				{
					var valor = $("#equipo").val();
					alert("Fichado por el equipo " + valor);
				}
				else{
					var valor = $("#valor_equipo").val();
					alert("El jugador sigue en el equipo " + valor);
				}

				$('#equipo > option[value= '+valor+']').attr('selected','selected');

				});

			//var valor = $("#valor_equipo").val();
			//$('#equipo > option[value= '+valor+']').attr('selected','selected');

			});

</script>


<h4>Fichar jugador</h4>
<br>
<br>
<?php echo $this->Form->create('Player'); ?>
<div class="container-fluid">
	<div class="row">

		<div class="col col-sm-8">
		<div class ="form-group">
			<label for="valor_equipo">Equipo actual del jugador <?php echo $player['Player']['nombre']; ?>:</label>
			<input type="text" id="valor_equipo" value="<?php echo $equipo_act[0]['teams']['nombre']; ?>" class="form-control" readonly="readonly">

			<h4>Seleccione el equipo por el que fichar</h4>
          <select id="equipo" name="data[1]" class="form-control">
            <?php foreach($grouplist as $var): ?>
              <option value = "<?php echo $var['Team']['id']; ?>"><?php echo $var['Team']['nombre']; ?></option>
              <?php endforeach; ?>
          </select>
		</div>
		</div>

		<div class="col col-sm-4"> 
		<div class ="form-group">
			<input type="submit" value="Fichar" id="fichar" class="btn btn-danger" />
			<?php echo $this->Html->link('Cancelar',array('controller' => 'players', 'action' => 'index'),
				array('class' => 'btn btn-primary')); ?>
		</div>
		</div>

	</div>

</div>
