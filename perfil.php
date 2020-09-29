<?php
session_start();
include_once "header.php";
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
<button type="button" class="btn btn-primary btn_alta_historial" >
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
        <div id="respuesta">
        
        </div>
      </div>
      
    </div>
  </div>
</div>
</div>


  
<table class="table">
  <thead>
    <tr>
      <th scope="col">Materia</th>
      <th scope="col">Calificación</th>
      <th scope="col">Semestre</th>
      <th scope="col">Acción</th>
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
      <td>' . $row['materia'].'</td>
      <td>' . $row['calificacion'].'</td>
      <td>' . $row['semestre']. '</td>
      <th scope="row">
      <img src="img/arrorcolor.jpg" alt="Flecha colores" class="detalles" id_historial="'.$row['idHistorial'].'">
      <img src="img/delete.jpg" alt="Flecha colores" class="del">
      </th>
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
    $('#exampleModal').modal('show'); 
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

  $(".btn_alta_historial").on("click", function(){
   // alert("Mostrando detalles Jquery"+idHistorial);
        $('#exampleModal').modal('show');             //muestra el modal
        $.ajax({
        method: "GET",
        url: "historial_alta.php",
        //data: "x="+$("#inputEmail").val()+"&inputPassword="+$("#inputPassword").val(), 
        //data: "inputid="+idHistorial+"&id_btn=1&telefono=5554",
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