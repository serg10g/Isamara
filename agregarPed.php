<?php
require 'conexion.php';
$id= $_POST['id'];
$pedido = $_POST['pedido'];
$costo = $_POST['costo'];
$fecha = $_POST['fecha'];
$sql="INSERT INTO pedidos VALUES ('$id','$pedido','$costo',CURRENT_TIMESTAMP)";
$conexion->query($sql);
if($conexion->affected_rows>=1){
	header('location:inicio.php');
}

?>
