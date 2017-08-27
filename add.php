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

			$coleccion = $xml->firstChild;

			$pelicula = $xml->createElement('pelicula');
			$coleccion->appendChild( $pelicula );
			
			$nombre = $xml->createElement('nombre', $a);
			$pelicula->appendChild( $nombre );

			$xml->save($archivo); 

			echo "existe";

		}else {

			$xml = new DomDocument("1.0", "UTF-8");
			$xml->formatOutput = true;
			$xml->preserveWhiteSpace = false;

			$a = $_POST['nombre'];

			$coleccion = $xml->createElement("colección");
			$xml->appendChild($coleccion);

			$pelicula = $xml->createElement('pelicula');
			$coleccion->appendChild( $pelicula );
			
			$nombre = $xml->createElement('nombre', $a);
			$pelicula->appendChild( $nombre );

			$xml->save($archivo); 

			echo "no existe";

		}
	}
 ?>