<?php
include 'conexion.php';
$id= $_GET['id'];
$sql="DELETE  FROM  pedidos WHERE id='".$id."'";
$conexion->query($sql);
header('location:inicio.php');
?>