<script type="text/javascript">
		$(function(){
			$("#calendario").datepicker({

			});
		});
	</script>

<H2>Nuevo equipo</H2>

<?php
	echo $this->Form->create('Team');
	echo $this->Form->input('nombre');
	echo $this->Form->input('poblacion');
	echo $this->Form->end('Crear equipo');
	echo $this->Html->link('Volver',array('controller' => 'teams', 'action' => 'index'),
	array('class' => 'btn btn-sm btn-primary')); ?>

	
		<div class="row">
			<div class="col-sm-4">
				<div class="form-group">
					<div class="input-group date" >
						<input type="text" class="form-control" id ="calendario" />
						<spam class="input-group-addon">
						<span class="glyphicon glyphicon-calendar"></spam>
						</spam>
					</div>
				</div>
			</div>
		</div>
	
		

	

