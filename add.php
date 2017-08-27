<?php 
	if (isset($_POST['add'])) {

		$archivo = 'xml/archivo1.xml';

		if (file_exists($archivo)) {

			$xml = new DomDocument("1.0", "UTF-8");
			$xml->formatOutput = true;
			$xml->preserveWhiteSpace = false;
			$xml->load("xml/archivo1.xml");

			$a = $_POST['nombre'];

			$personas = $xml->firstChild;

			$persona = $xml->createElement('persona');
			$personas->appendChild( $persona );
			
			$nombre = $xml->createElement('nombre', $a);
			$persona->appendChild( $nombre );

			$xml->save('xml/archivo1.xml'); 

			echo "existe";

		}else {

			$xml = new DomDocument("1.0", "UTF-8");
			$xml->formatOutput = true;
			$xml->preserveWhiteSpace = false;

			$a = $_POST['nombre'];

			$personas = $xml->createElement("personas");
			$xml->appendChild($personas);

			$persona = $xml->createElement('persona');
			$personas->appendChild( $persona );
			
			$nombre = $xml->createElement('nombre', $a);
			$persona->appendChild( $nombre );

			$xml->save('xml/archivo1.xml'); 

			echo "no existe";

		}
	}
 ?>