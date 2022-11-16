<?php
require 'conexion.php';

$articulo = $_POST['articulo'];
$costo = $_POST['costo'];
$marca = $_POST['marca'];
$departamento = $_POST['departamento'];
$imagen =  addslashes(file_get_contents($_FILES['imagen']['tmp_name']));
$sql="INSERT INTO almacen VALUES ('$id','$articulo', '$costo','$marca','$departamento','$imagen')";
$conexion->query($sql);
if($conexion->affected_rows>=1){
	header('location:almacen.php');
}

?>