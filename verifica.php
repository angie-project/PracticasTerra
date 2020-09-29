<?php
session_start();

$usuario = $_POST['inputEmail'];
$clave = $_POST['inputPassword'];
$mysqli = mysqli_connect("localhost", "root", "", "empleados");
if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$res = mysqli_query($mysqli, "select * from usuarios where usuario = '$usuario' and clave = '$clave'");

 /* determinar el número de filas del resultado */
 $row_cnt = mysqli_num_rows($res);

 if($row_cnt>0){
    //echo "El usuario si existe";
    $row = mysqli_fetch_array($res);
    $_SESSION['idUsuario'] = $row["idUsuario"];
    $_SESSION['nombre'] = $row["usuario"];
    //printf ("%s \n", $row["idUsuario"]);
    //exit();
    header('Location: perfil.php');  //interpolacion 
 }else {
    //echo "El usuario no existe";
    $error= 1;
    header('Location: login.php?error=' . $error);
 }

/*$row = mysqli_fetch_assoc($res);
echo $row['_msg'];*/

/* echo "Esto es una prueba de validacion \n"; 
echo $_POST['inputEmail'] . "\n";
echo $_POST['inputPassword']; */

?>
