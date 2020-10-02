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
        echo "Se dio de alta correctamente";
        break;
    case 'baja':
        $idhistorial = $_POST["id_historial"]; 
        $sql = "delete from historial where idHistorial= '$idhistorial'";
        $res = mysqli_query($mysqli, $sql);
        echo "El registro se elimino correctamente...";
        break;
    case 'actualizacion':
        $idhistorial = $_POST["id_historial"];
        $materia = $_POST["materia"];
        $calificacion = $_POST["calificacion"];
        $semestre = $_POST["semestre"];
        $sql = "update historial set materia= '". $materia ."',calificacion= '". $calificacion ."',semestre= '". $semestre ."'  where idHistorial= '$idhistorial'";
        $res = mysqli_query($mysqli, $sql);
        echo "El registro se actualizo correctamente...";
        break;
}

?>