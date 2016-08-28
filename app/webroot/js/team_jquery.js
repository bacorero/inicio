$(document).ready(function(){
$("#resultado").load("teams/obtener/"+$("#categoria").val());

	$("#categoria").change(function(){
		var valor = $("#categoria").val();
		$("#resultado").load("teams/obtener/"+valor);
						
	});


})