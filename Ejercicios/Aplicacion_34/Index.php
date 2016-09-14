<html>
<head>
	<title>Programación III - Aplicacion XXXIV - Mauro Aquino</title>
	<link rel="stylesheet" type="text/css" href="css/estilo.css">
</head>
<body>




</body>
</html>

<?php

/*
Aplicación Nº 34 (Contar letras) 
Se quiere realizar una aplicación que lea un archivo (../misArchivos/palabras.txt) y ofrezca estadísticas sobre cuantas palabras de 1, 2, 3, 4 
y más de 4 letras hay en el texto. No tener en cuenta los espacios en blanco ni saltos de líneas como palabras. Los resultados mostrarlos en 
una tabla.
*/

$archivo = fopen('MisArchivos/palabras.txt','r');

$listadopalabras = array();
$cantpalabras = 0;
$palabraunchr = 0;
$palabradoschr = 0;
$palabratreschr = 0;
$palabracuatrochr = 0;
$masdecuatro = 0;

while (!feof($archivo)){

			$_renglon=fgets($archivo);
			$_palabras=explode(" ",$_renglon);

			$listadopalabras[] = $_palabras;
							
		
}

fclose($archivo);

foreach($listadopalabras as $_palabra){

foreach($_palabra as $string){

	if($string!=""){

		$cantpalabras++;	
	
		switch (strlen(trim($string))){

			case 1:
			$palabraunchr++;
			break;	

			case 2:
			$palabradoschr++;
			break;	

			case 3:
			$palabratreschr++;
			break;	

			case 4:
			$palabracuatrochr++;
			break;

			default:
			$masdecuatro++;
			break;

		}


	}

}

}


echo '<table>
	  <tr><th>CANT UN CARACTER</th><th>CANT DOS CARACTERES</th><th>CANT TRES CARACTERES</th><th>CANT CUATRO CARACTERES</th><th>MAS DE CUATRO</th><tr>
	  <tr><td>'. $palabraunchr . '</td><td>' .$palabradoschr ."</td><td> " .$palabratreschr ."</td><td> " .$palabracuatrochr ."</td><td> ".$masdecuatro.'</td></tr>
	  <table>';

?>