<?php
$idHistorial = $_POST["id"];
include_once "conexion.php";
$sql = "delete from historial where idHistorial= '$idHistorial'";
//echo $sql;
$res = mysqli_query($mysqli, $sql);
echo "El registro se borro correctamente";
?>