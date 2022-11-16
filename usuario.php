<?php
require 'conexion.php';
$correo = $_POST['correo'];
$usuario = $_POST['usuario'];
$clave = $_POST['clave'];
$tipo = $_POST['tipo'];
$sql="INSERT INTO usuarios VALUES ('$id','$correo', '$usuario','$clave','$tipo')";
$conexion->query($sql);
if($conexion->affected_rows>=1){
	header('location:Usuarios.php');
}

?>