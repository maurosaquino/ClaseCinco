<!DOCTYPE html>
<html>
<head>
	<title>Programación III - Aplicacion XXXIX - Mauro Aquino</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>

</body>
</html>

<?php
/*Aplicación Nº 39 (Generar Tabla de Imágnes II) 
Ídem al anterior, pero que muestre las fotos en un tamaño de 100x100 píxeles y que al pulsar se muestre la foto en su tamaño original en una página distinta (agregarle un link para poder volver a la página de inicio).*/


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
					
						$table = $table . '<td><form action="mostrar.php" method="post"><button name="foto" value="fotos/'.$archivo.'"><img src="fotos/'.$archivo.'" height="100" width="100"></button></td>';
						$x++;
					
					}

				}


	$table= $table . '</table>';

	echo $table;
?>