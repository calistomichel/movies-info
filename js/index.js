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

				$('#data-xml').append(

					'<div class="box">'+
						'<article class="media">'+
							'<div class="media-content">'+
								'<div class="content">'+
									'<p>'+
										'<li> <strong>Nombre:</strong> '+nombre+'</li>'+
										'<li> <strong>Idioma:</strong> '+idioma+'</li>'+
										'<li> <strong>Duración:</strong> '+duracion+'</li>'+
										'<li> <strong>Descripción:</strong> '+descripcion+'</li>'+
										'<br>'+
									'</p>'+
								'</div>'+
							'</div>'+
						'</article>'+
					'</div>'

				);
			});
		}
	});
});