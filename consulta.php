<?php
include_once "header.php";
session_start();
?>

<style>
.container{
    margin-top: 50px;  
}
</style>

<div class="container">
    <form action="consulta.php" method="post" id="form_clave" >
      <label for="input">Escribe el ID</label>
      <input name='inputid' class="form" placeholder="clave"> <br>
      <button class="btn btn-success" name="id_btn" type="submit">Consultar</button>
    </form>      
</div>

<?php
if(isset($_POST['id_btn'])){
$idHistorial = $_POST["inputid"];
include_once "conexion.php";
$sql = "select * from historial where idHistorial= '$idHistorial'";

$res = mysqli_query($mysqli, $sql);
}
?>

<div class="container">
<table class="table">
  <thead>
    <tr>
      <th scope="col">Img</th>
      <th scope="col">ID</th>
      <th scope="col">ID Usuario</th>
      <th scope="col">Materia</th>
      <th scope="col">Calificación</th>
      <th scope="col">Semestre</th>
    </tr>
  </thead>
  <tbody>

    <?php 
    if(isset($_POST['id_btn'])){
        while($row=mysqli_fetch_array($res)){
      echo  '<tr>
      <th scope="row"> <img src="img/arrorcolor.jpg" alt="Flecha colores"> </th>
      <td>'. $row['idHistorial'].'</td>
      <td>'. $row['idUsuario'].'</td>
      <td>' . $row['materia'].'</td>
      <td>' . $row['calificacion'].'</td>
      <td>' . $row['semestre'].'</td>
    </tr>';
        }    
    }
    ?> 
  </tbody>
</table>
</div>

<?php
include_once "footer.php";
?>