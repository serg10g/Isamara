<?php
if(!isset($_POST["total"])) exit;


session_start();


$total = $_POST["total"];
include_once "conexion.php";

ini_set('date.timezone', 'America/Mexico_City');
$ahora = date("Y-m-d H:i:s");


$sentencia = $base_de_datos->prepare("INSERT INTO ventas(fecha, total) VALUES (?, ?);");
$sentencia->execute([$ahora, $total]);


header("Location: ./inicio.php?status=1");
?>