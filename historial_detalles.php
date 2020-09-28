<?php
if(isset($_POST['id_btn'])){
$idHistorial = $_POST["inputid"];
include_once "conexion.php";
$sql = "select * from historial where idHistorial= '$idHistorial'";
//echo $sql;
$res = mysqli_query($mysqli, $sql);
}
?>

<div class="container">
<table class="table">
  <thead>
    <tr>
      <th scope="col">Img</th>
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
      <th scope="row"> <img src="img/delete.jpg" alt="Flecha colores" class="delete"></th>
      <th scope="row"> <img src="img/update.jpg" alt="Flecha colores" class="update"></th>
      <td>'. $row['idHistorial'].'</td>
      <td>'. $row['idUsuario'].'</td>
      <td> <input name="materia" id="materia" value="'.$row['materia'].'" /></td>      
      <td> <input name="calificacion" id="calificacion" value="'.$row['calificacion'].'" /></td>      
      <td> <input name="semestre" id="semestre" value="'.$row['semestre'].'" /></td>
    </tr>';
        }    
    }
    ?> 
  </tbody>
</table>
</div>

<script>
      $(".delete").on("click", function(){
    let idHistorial = <?php echo $_POST['inputid']?>;
   // alert("Mostrando detalles Jquery"+idHistorial);
        $.ajax({
        method: "POST",
        url: "historial_delete.php",
        //data: "x="+$("#inputEmail").val()+"&inputPassword="+$("#inputPassword").val(), 
        data: "id="+idHistorial+"&id_btn=1&telefono=5554",
        cache:false
       })
      .done(function( msg ) {
          alert(msg);
        window.location.href = "perfil.php";
        //$("#respuesta").html(msg);
        });
  });

      $(".update").on("click", function(){
    let idHistorial = <?php echo $_POST['inputid']?>;
    let calificacion = $("#calificacion").val();
    if(calificacion == ""){
        alert("La calificacion no puede ir vacia");
        return;
    }
        $.ajax({
        method: "POST",
        url: "historial_update.php",
        data: "id="+idHistorial+"&telefono=5554&cal="+calificacion,
        cache:false
       })
      .done(function( msg ) {
          alert(msg);
        window.location.href = "perfil.php";
        });
  });
</script>