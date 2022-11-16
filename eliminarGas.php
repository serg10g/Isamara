<?php
include 'conexion.php';
$id= $_GET['id'];
$sql="DELETE  FROM  gasto WHERE id='".$id."'";
$conexion->query($sql);
header('location:gastos.php');
?>