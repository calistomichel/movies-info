<?php

	$directorio = opendir("xml");
	while ($archivo = readdir($directorio))
	{
    	if (!is_dir($archivo))
    	{
        	echo '<option value="'.$archivo.'">'.$archivo.'</option>';
    	}
	}

 ?>