<?php
$idHistorial = $_POST["id"];
$calificacion = $_POST["cal"];
include_once "conexion.php";
$sql = "update historial set calificacion= '". $calificacion ."' where idHistorial= '$idHistorial'";
//echo $sql;
$res = mysqli_query($mysqli, $sql);
echo "El registro se actualizo correctamente";
?>