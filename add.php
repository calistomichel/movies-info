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

			echo "Elemento Archivado Correctamente";

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

			echo "Elemento Archivado Correctamente";

		}
	}

 ?>

 <a href="index.html">Volver atrás</a>