		$(document).ready(function() {
         	$.ajax({
                type: "POST",
                url: "get.php",
                success: function(response)
                {
                	$('.selector-categoria select').html('<option disabled selected value> -- Selecciona una opción -- </option>'+response).fadeIn();	
                }
            });

			$('select#seleccion').on('change',function(){
    			var valor = $(this).val();

    			$('#data-xml').empty();

				$.ajax({
					url: 'xml/'+valor,
					dataType: 'XML',
					success: procesarXML
				});

				function procesarXML(data){
					$(data).find('pelicula').each(function(){
						var nombre = $(this).find('nombre').text();
						var idioma = $(this).find('idioma').text();
						var duracion = $(this).find('duracion').text();
						var descripcion = $(this).find('descripcion').text();

						console.log(nombre+' '+idioma+' '+duracion+' '+descripcion);

						$('#data-xml').append(
							'<li> Nombre:'+nombre+'</li>'+
							'<li> Idioma:'+idioma+'</li>'+
							'<li> Duración:'+duracion+'</li>'+
							'<li> Descripción:'+descripcion+'</li><hr/>'
						);
					});

				console.log(data);
				
				}

			});

        });