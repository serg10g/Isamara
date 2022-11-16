<?php
require 'conexion.php';

$id= $_POST['id'];
$fecha= $_POST['fecha'];
$reparacion = $_POST['reparacion'];
$nombre = $_POST['nombre'];
$apellido= $_POST['apellido'];
$telefono = $_POST['telefono'];
$modelo = $_POST['modelo'];
$descripcion = $_POST['descripcion'];
$problema = $_POST['problema'];
$descripcion_r = $_POST['descripcion_r'];
$presupuesto = $_POST['presupuesto'];
$estado=$_POST['estado'];
$color= $_POST['color'];
$cuenta= $_POST['cuenta'];
$sql="INSERT INTO principal  VALUES ('$id', CURRENT_TIMESTAMP ,'$reparacion','$nombre', '$apellido','$telefono','$modelo','$descripcion','$problema','$descripcion_r','$cuenta','$presupuesto','$estado','$color')";
$conexion->query($sql);



if( $conexion->affected_rows>=1){
	header('location:Principal.php');
}

   else{
	echo "!!!!!Erro ///NO hay registro///!!!!!";
}
?>
 