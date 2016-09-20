<!DOCTYPE html>
<html>
<head>
	<title>Programación III - Aplicación XXXVII - Mauro Aquino</title>
	<link rel="stylesheet" typw = "text/css" href="css/style.css">
</head>
<body>
<div class="form">
<form method="post" enctype="multipart/form-data">
    <h1>Seleccionar el archivo a encriptar:</h1>
    <input type="file" name="archivoASubir" id="archivoASubir">
    <button type="submit" name="aceptar">Encriptar</button>
 </form>

 <form method="post" enctype="multipart/form-data">
    <H1>Seleccionar el archivo a leer:</H1>
    <input type="file" name="archivoASubir" id="archivoASubir">
    <button type="submit" name="leer">Leer</button>
 </form>
</div>
</body>
</html>

<?php
/*
Aplicación Nº 37 (Encriptar / Desencriptar archivos) 
Crear una página web que permita encriptar mensajes y que se guarden en un archivo de texto y que sólo si se lee el archivo desde la página se podrá acceder a su texto claro, es decir se desencriptará.
Crear la clase Enigma, la cual tendrá la funcionalidad de encriptar/desencriptar los mensajes.
Su método estático Encriptar, recibirá un mensaje y a cada número del código ASCII de cada carácter del string le sumará 200. Una vez que cambie todos los caracteres, lo guardará en un archivo de texto (el path también se recibirá por parámetro).  Retornará TRUE si pudo guardar correctamente el archivo encriptado, FALSE, caso contrario.
El método estático Desencriptar, recibirá sólo el path de dónde se leerá el archivo. Realizar el proceso inverso para restarle a cada número del código ASCII de cada carácter leído 200, para poder retornar el mensaje y ser mostrado desesncriptado.
*/

if(isset($_POST['aceptar'])){

	if($_FILES["archivoASubir"]["type"] == "text/plain" && $_FILES["archivoASubir"]["errors"]==0){

			require_once("Enigma.php");

			$fecha = date("Ymd");
			$nombredestino = "encript".rand(1000000,9999999)."_".$fecha;

			$archivoorigen  = fopen($_FILES["archivoASubir"]["tmp_name"],'r');
			$archivodestino = fopen("encriptados/".$nombredestino.".txt",'w');

			while(!feof($archivoorigen)){

			$linea = fgets($archivoorigen);
			$linea = Enigma::Encriptar($linea);

			fwrite($archivodestino,$linea);

			}

			fclose($archivoorigen);
			fclose($archivodestino);

			echo '<div class="form"><h2> El archivo fue encriptado satisfactoriamente</h2></div>';
		
		}else{
			
		 echo '<div class="form"><h2>Error: El archivo a encriptar debe ser de texto</h2></div>';
	}

}


if(isset($_POST['leer'])){

	if($_FILES["archivoASubir"]["type"] == "text/plain"){

		require_once("Enigma.php");

		$fecha = date("Ymd");
		$nombredestino = "encript".rand(1000000,9999999)."_".$fecha;

		$archivoorigen  = fopen($_FILES["archivoASubir"]["tmp_name"],'r');
		
		echo '<div class="form"><h2> ARCHIVO LEIDO: </H2><br>';
		while(!feof($archivoorigen)){

			$linea = fgets($archivoorigen);
			$linea = Enigma::Desencriptar($linea);

			echo $linea;


			}
		echo '<div>';
			fclose($archivoorigen);

	}

	else {

			 echo '<div class="form"><h2>Error: El archivo a leer debe ser de texto</h2></div>';
	}
}


?>