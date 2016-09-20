<!DOCTYPE html>
<html>
<head>
	<title>Programación III - Aplicacion XXXVIII - Mauro Aquino</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>

</body>
</html>

<?php
/*Aplicación Nº 38 (Generar Tabla de Imágenes) 
Hacer un programa que muestre en una tabla de 4 columnas todas las imágenes del directorio "fotos". Para ello consulte en la web (en concreto la referencia de funciones de directorios). En el directorio sólo existirán fotos. Utilizar el tag <img> para la visualización.*/


$directorio = scandir('fotos/');

unset($directorio[0]);
unset($directorio[1]);
$x=0;



	$table=  '<table>
			  <tr>
			  <th>Columna Uno   </th>
			  <th>Columna Dos   </th>
			  <th>Columna Tres  </th>
			  <th>Columna Cuatro</th>
			  </tr>
			  <tr>';

				foreach($directorio as $archivo){

					$type = mime_content_type('fotos/'.$archivo);

					if(strpos($type,'image')!==false){

						if($x>3){
							$table = $table . '</tr><tr>';
							$x=0;
						}		
					
						$table = $table . '<td><img src="fotos/'.$archivo.'" height="100" width="100"></td>';
						$x++;
					
					}

				}


	$table= $table . '</table>';

	echo $table;
?>