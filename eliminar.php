<?php
include 'conexion.php';
$id= $_GET['id'];
$sql="DELETE  FROM  principal WHERE id='".$id."'";
$conexion->query($sql);
header('location:admin1.php');
?>