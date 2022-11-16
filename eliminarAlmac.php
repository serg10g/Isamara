<?php
include 'conexion.php';
$id= $_GET['id'];
$sql="DELETE  FROM  almacen WHERE id='".$id."'";
$conexion->query($sql);
header('location:almacen.php');


?>