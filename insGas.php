<?php
require 'conexion.php';
$gasto = $_POST['gasto'];
$monto = $_POST['monto'];
$fecha = $_POST['fecha'];
$sql="INSERT INTO gasto VALUES ('$id','$gasto', '$monto','$fecha')";
$conexion->query($sql);
if($conexion->affected_rows>=1){
	header('location:gastos.php');
}

?>