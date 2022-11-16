<?php
require 'conexion.php';
$id= $_POST['id'];
$correo = $_POST['correo'];
$nombre_c = $_POST['nombre_c'];
$numero = $_POST['numero'];
$sql="INSERT INTO clientes VALUES ('$id','$correo', '$nombre_c','$numero')";
$conexion->query($sql);
if($conexion->affected_rows>=1){
	header('location:clientes.php');
}

?>

