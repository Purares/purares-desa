<?php 

class Conexion{
	static public function conectarBD (){
		
		#PDO("Nombre del servidor;Nombre de la Base de Datos", usuario, Contraseña )
		$link= new PDO("mysql:host=localhost;dbname=purares-test","root","");

		$link -> exec ("set names utf8"); #Todo lo que me ejecute sera con esta sintaxis que trabaja caracteres latinos.

		return $link;
	}
	
}

 ?>