<?php
session_start();
include_once "conexion.php";
$accion = $_POST["accion"];

switch ($accion) {
    case 'alta':
        $materia = $_POST["materia"];
        $calificacion = $_POST["calificacion"];
        $semestre = $_POST["semestre"];
        $sql = "insert into historial(idUsuario,materia,calificacion,semestre) values('".$_SESSION['idUsuario']."','".$materia."','".$calificacion."','".$semestre."')";
        $res = mysqli_query($mysqli, $sql);
        echo "Se dio de alta corretamente";
        break;
    case 'baja':
        $idhistorial = $_POST["idHistorial"];
        $sql = "delete from historial where idHistorial= '$idHistorial'";
        $res = mysqli_query($mysqli, $sql);
        echo "El registro se elimino correctamente";
        break;
    case 'actualizacion':
        $idHistorial = $_POST["id"];
        $calificacion = $_POST["cal"];
        $sql = "update historial set calificacion= '". $calificacion ."' where idHistorial= '$idHistorial'";
        $res = mysqli_query($mysqli, $sql);
        echo "El registro se actualizo correctamente";
        break;
}

?>