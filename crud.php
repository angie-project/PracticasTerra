<?php
session_start();
include_once "header.php";
?>

<style>
    .container{
        margin-top: 50px;  
    }
    .container2{
        margin: 50px;
    }
</style>

<?php
include_once "conexion.php";
$sql = "select * from historial where idUsuario= '". $_SESSION['idUsuario'] . "'";
$res = mysqli_query($mysqli, $sql);
?>

<div class="container">
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
        Alta historial 
    </button>

    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Alta del historial</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <div id="contenido">
            <form id="frm_alta_historial">
                <label for="materia"> Materia </label>
                <input id="materia" name="materia"/> <br>
                <label for="calificacion"> Calificación </label> 
                <input id="calificacion" name="calificacion"/><br>
                <label for="semestre"> Semestre </label>
                <input id="semestre" name="semestre"/>
            </form> 
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary alta_historial">Save changes</button>
        </div>
        </div>
    </div>
    </div>
   <div class="container2">
    <table class="table">
  <thead>
    <tr>
      <th scope="col">Img</th>
      <th scope="col">Materia</th>
      <th scope="col">Calificación</th>
      <th scope="col">Semestre</th>
    </tr>
  </thead>
  <tbody>
    <?php 
    while($row=mysqli_fetch_array($res)){
      echo  '<tr>
      <th scope="row">
      <img src="img/arrorcolor.jpg" alt="Flecha colores" class="detalles" id_historial="'.$row['idHistorial'].'">
      <img src="img/delete.jpg" alt="Tache" class="detalles" id_historial="'.$row['idHistorial'].'">
      </th>
      <td>' . $row['materia'].'</td>
      <td>' . $row['calificacion'].'</td>
      <td>' . $row['semestre'].'</td>
    </tr>';
    }   
    ?> 
  </tbody>
 </table>
  </div> 
</div>

<script>
  $(document).ready(function(){
    
});
</script>

<?php
include_once "footer.php";
?>