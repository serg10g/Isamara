<?php
 
$conexion = new mysqli("localhost", "root", "12345678", "proyectoex");

$contraseña = "12345678";
$usuario = "root";
$nombre = "proyectoex";
try{
	$base_de_datos = new PDO('mysql:host=localhost;dbname=' . $nombre, $usuario, $contraseña);
	 $base_de_datos->query("set names utf8;");
    $base_de_datos->setAttribute(PDO::ATTR_EMULATE_PREPARES, FALSE);
    $base_de_datos->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $base_de_datos->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
}catch(Exception $e){
	echo "Ocurrió algo con la base de datos: " . $e->getMessage();
}
?>