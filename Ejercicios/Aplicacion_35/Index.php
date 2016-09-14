<html>
<head>
	<title>Programación III - Aplicacion XXXV - Mauro Aquino</title>
</head>
<body>

<form method="POST">
<input type="text" placeholder="Ingrese ruta del archivo" name="ruta">
<button type="submit" name = "boton">ACEPTAR</button>
</form> 

</body>
</html>

<?php

/*Aplicación Nº 35 (Copiar archivos)
Generar una aplicación que sea capaz de copiar un archivo de texto (su ubicación se ingresará por la página) 
hacia otro archivo que será creado y alojado en ./misArchivos/yyyy_mm_dd_hh_ii_ss.txt, dónde yyyy corresponde 
al año en curso,  mm al mes, dd al día, hh hora, ii minutos y ss segundos.
*/

if(isset($_POST['boton'])){


	$ruta = $_POST['ruta'];

	$year=date('Y');
	$month=date('m');
	$day=date('d');
	$hora=date('H');
	$min=date('i');
	$seg=date('s');
	
	$nombredestino = $year."_".$month."_".$day."_".$hora."_".$min."_".$seg.".txt";

	if (file_exists($ruta)) 
	{

		$archivoorigen = fopen($ruta,'r');

		$archivodestino = fopen('misArchivos/'.$nombredestino,'w');

		while(!(feof($archivoorigen))){

		 $renglon = fgets($archivoorigen);

		 fwrite($archivodestino,$renglon);

		}

		fclose($archivoorigen);
		fclose($archivodestino);
		
		echo "El archivo se copio correctamente bajo el nombre $nombredestino";

	} else {

		echo "El archivo no existe";
	}
}

?>
