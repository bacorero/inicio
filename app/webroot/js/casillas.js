var num = 1;
	var valor = "";
	var mensaje;
	var oID;
	var tope;
	$("document").ready(
		function(){
		//Recogemos el valor de campos a imprimir
			tope = $('#tope').val();
			tope--;
		//Elección de equipos disponibles en el campeonato
				$('.equipos').click(function()
			{
					if(valor == "") //Si no hemos dejado campo anterior
					{
						valor = $(this).val();		//Obtengo el valor del campo
						$(this).attr('disabled', true); //Deshabilito el campo
					}
			});

		//Colocamos el equipo seleccionado en text

				$('.juego').click(function()
			{
					if($(this).val() == "") //En caso de campo vacio 
					{
						$(this).val(valor);//Pon el recogido anteriormente
						valor = "";	//Y borra
					}
					else
					{
						mensaje = confirm("Eliminar?");
						if(mensaje)
							{
							valor = $(this).val();
							for(var i=0;i<=tope;i++)
							{
								if($("#"+i).val()== valor)

									$("#"+i).attr('disabled', false);
								
							}
							valor = "";
							$(this).val("");
							mensaje = "";
							}
						else
							valor = "";
							
						}
				});	
								
	});