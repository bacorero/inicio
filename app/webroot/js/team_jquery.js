$(document).ready(function(){

	$("#categoria").change(function(){
		var valor = $("#categoria").val();
		$("#resultado").load("teams/obtener/"+valor);
						
	});


})