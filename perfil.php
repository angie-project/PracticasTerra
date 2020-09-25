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
<div class="jumbotron" >
  <h1 class="display-4">Bienvenido! <?= $_SESSION['nombre'];?></h1>
  <p class="lead">This is a simple hero unit, a simple jumbotron-style component for calling extra attention to featured content or information.</p>
  <hr class="my-4">
  <p>It uses utility classes for typography and spacing to space content out within the larger container.</p>
  <p class="lead">
    <a class="btn btn-primary btn-lg" href="#" role="button" >Learn more</a>
  </p>
</div>

<?php
include_once "conexion.php";
$sql = "select * from historial where idUsuario= '". $_SESSION['idUsuario'] . "'";
echo $sql;
$res = mysqli_query($mysqli, $sql);
?>

<div class="container">
  <div id="respuesta">

  </div>
<table class="table">
  <thead>
    <tr>
      <th scope="col">Img</th>
      <th scope="col">Materia</th>
      <th scope="col">Calificación</th>
    </tr>
  </thead>
  <tbody>
    <?php 
    while($row=mysqli_fetch_array($res)){
      /*echo 'id Historial', $idhistorial= $row['idHistorial'],'<br>';
      echo 'id Usuario :', $idusuario= $row['idUsuario'], '<br>';
      echo 'Materia :', $materia= $row['materia'],'<br>';
      echo 'Calificacion :', $cal= $row['calificacion'],'<br>';*/
      echo  '<tr>
      <th scope="row">
      <img src="img/arrorcolor.jpg" alt="Flecha colores" onclick="mostrar_detalles('.$row['idHistorial'].')">
      <img src="img/arrorcolor.jpg" alt="Flecha colores" class="detalles" id_historial="'.$row['idHistorial'].'">
      </th>
      <td>' . $row['materia'].'</td>
      <td>' . $row['calificacion'].'</td>
    </tr>';
    }   
    ?> 
  </tbody>
</table>
</div>

<script> 
function mostrar_detalles(idHistorial){
    alert("Mostrando detalles"+idHistorial);
}

$(document).ready(function(){
  $(".detalles").on("click", function(){
    let idHistorial = $(this).attr('id_historial');
   // alert("Mostrando detalles Jquery"+idHistorial);
        $.ajax({
        method: "POST",
        url: "historial_detalles.php",
        //data: "x="+$("#inputEmail").val()+"&inputPassword="+$("#inputPassword").val(), 
        data: "inputid="+idHistorial+"&id_btn=1&telefono=5554",
        cache:false
       })
      .done(function( msg ) {
        $("#respuesta").html(msg);
        });
 
  });
});
</script>

<?php
include_once "footer.php";
?>