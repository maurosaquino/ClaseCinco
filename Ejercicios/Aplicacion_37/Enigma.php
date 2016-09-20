<?php

class Enigma{

static function Encriptar($linea){

	$vector = str_split($linea);

	foreach ($vector as $str){

		$encript = ord($str) + 200;

		$vect[]=chr($encript); 

	}

	$lineaencriptada = implode("",$vect);

	return $lineaencriptada;


}


static function Desencriptar($encriptado){

	$desencript = str_split($encriptado);

	foreach ($desencript as $str){

		$desen = ord($str) - 200;

		$vectdos[]=chr($desen); 

	}

	$lineadesncriptada = implode("",$vectdos);

	return $lineadesncriptada;

}

}

?>