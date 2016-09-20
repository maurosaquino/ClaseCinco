<!DOCTYPE html>
<html>
<head>
	<title>Programación III - Aplicacion XL - Mauro Aquino</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
	<div class="titulo">
	<H1>SELECCIONE UNA IMAGEN A SUBIR</H1>
    </div>
    <div class="wrapper">
	<div class="container">
		<form class="form" method="post" enctype="multipart/form-data">
			<input type="file" name="imagen" id="imgAsubir">
			<button name="subir" id="interior" type="submit" id="login-button">Subir Archivo</button>
		</form>
	</div>
	</div>


</body>
</html>

<?php
/*Aplicación Nº 40 (Galería de Imágenes) 
Amplíe el ejercicio de la galería de fotos realizada anteriormente y permita al usuario añadir nuevas fotos. Para ello hay que poner el atributo enc_type=”multipart/form-data” en el FORM y usar la variable $_FILES['foto'].*/

if(isset($_POST['subir'])){


if ($_FILES['imagen']['error']==0){


	if(strpos($_FILES['imagen']['type'],'image')!==false){

		if(($_FILES['imagen']['size']/1024)<1024){

		$ubicacion = 'fotos/';
		$tmp_name = $_FILES['imagen']['tmp_name'];

		move_uploaded_file($tmp_name, $ubicacion.$_FILES['imagen']['name']);		
		}else{

		echo '<div class="errores">El archivo no puede superar 1MB</div>';
		unset($_POST['subir']);

		}

	}else{

		echo '<div class="errores">El archivo debe ser una imagen</div>';
		unset($_POST['subir']);
	}

}else{

		echo '<div class="errores">La imagen no pudo cargarse</div>';
		unset($_POST['subir']);
}

}


$directorio = scandir('fotos/');

unset($directorio[0]);
unset($directorio[1]);
$x=0;



	$table=  '<div class=table-title>
			  <table>
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


	$table= $table . '</table></div>';

	echo $table;
?>