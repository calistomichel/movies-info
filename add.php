	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.5.1/css/bulma.min.css">
    <link rel="stylesheet" href="css/style.css">

<?php 

	if (isset($_POST['add'])) {

		$categoria = $_POST['categoria'];
		$archivo = 'xml/'.$categoria.'.xml';

		if (file_exists($archivo)) {

			$xml = new DomDocument("1.0", "UTF-8");
			$xml->formatOutput = true;
			$xml->preserveWhiteSpace = false;
			$xml->load($archivo);

			$a = $_POST['nombre'];
			$b = $_POST['idioma'];
			$c = $_POST['duracion'];
			$d = $_POST['descripcion'];

			$coleccion = $xml->firstChild;

			$pelicula = $xml->createElement('pelicula');
			$coleccion->appendChild( $pelicula );
			
			$nombre = $xml->createElement('nombre', $a);
			$pelicula->appendChild( $nombre );
			$idioma = $xml->createElement('idioma', $b);
			$pelicula->appendChild( $idioma );
			$duracion = $xml->createElement('duracion', $c);
			$pelicula->appendChild( $duracion );
			$descripcion = $xml->createElement('descripcion', $d);
			$pelicula->appendChild( $descripcion );

			$xml->save($archivo); 

			ob_start();
			echo "Elemento Archivado Correctamente";
			$php_respuesta = ob_get_contents();
			ob_end_clean();

		}else {

			$xml = new DomDocument("1.0", "UTF-8");
			$xml->formatOutput = true;
			$xml->preserveWhiteSpace = false;

			$a = $_POST['nombre'];
			$b = $_POST['idioma'];
			$c = $_POST['duracion'];
			$d = $_POST['descripcion'];

			$coleccion = $xml->createElement("colección");
			$xml->appendChild($coleccion);

			$pelicula = $xml->createElement('pelicula');
			$coleccion->appendChild( $pelicula );
			
			$nombre = $xml->createElement('nombre', $a);
			$pelicula->appendChild( $nombre );
			$idioma = $xml->createElement('idioma', $b);
			$pelicula->appendChild( $idioma );
			$duracion = $xml->createElement('duracion', $c);
			$pelicula->appendChild( $duracion );
			$descripcion = $xml->createElement('descripcion', $d);
			$pelicula->appendChild( $descripcion );

			$xml->save($archivo); 

			ob_start();
			echo "Elemento Archivado Correctamente";
			$php_respuesta = ob_get_contents();
			ob_end_clean();

		}
	}

 ?>

 	<section class="hero is-dark is-warning is-fullheight">
  		<div class="hero-body">
    		<div class="container">
      			<h1 class="title pad-bottom-1">
				  Movies Info
      			</h1>
      			<h2 class="subtitle pad-bottom-2">
      				<?php
						echo($php_respuesta);
					?>
      			</h2>
      			<a class="button is-primary" href="index.html">Volver atrás</a>
    		</div>
  		</div>
	</section>

	<footer class="footer">
	  	<div class="container">
	    	<div class="content has-text-centered">
			<p>
	        		<strong>Movies Info</strong> by <a href="https://github.com/calistomichel" target="_blank">Calisto Michel</a>.
	      		</p>
	      		<p>
	        		<a class="icon" href="https://github.com/calistomichel/movies-info" target="_blank">
	          			<i class="fa fa-github"></i>
	        		</a>
	      		</p>
	    	</div>
	  	</div>
	</footer>	

	<script type="text/javascript" src="https://code.jquery.com/jquery-2.2.4.min.js"></script>
	
	<script type="text/javascript" src="js/index.js"></script>