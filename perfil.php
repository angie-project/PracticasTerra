<?php
session_start();
include_once "header.php";
?>
<style>
.container{
    margin-top: 50px;  
}
body{
  background-image: url("img/fblanco.jpg");
}
</style>

<div class="container">
  <div class="jumbotron">
    <h1 class="display-4">Bienvenido! <?= $_SESSION['nombre'];?></h1>
  </div>
  
<?php
include_once "conexion.php";
$sql = "select * from historial where idUsuario= '". $_SESSION['idUsuario'] . "'";
echo $sql;
$res = mysqli_query($mysqli, $sql);
?>

<div class="container2">
  <button type="button" class="btn btn-primary btn_alta_historial mod_alta" accion="alta">
    Alta historial 
  </button>
    <div class="row mt-3 ml-3">
        <div class="col col-sm-12">
            <div id="respuesta"></div>
        </div>
    </div>
<!-- <button type="button" class="btn btn-primary btn_alta_historial" >
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
</div> -->

 
    <table class="table table-hover table-bordered" id="table_datos">
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
          <img src="img/arrorcolor.jpg" alt="Flecha colores" class="mod_update" accion="update" id_historial="'.$row['idHistorial'].'">
          <img src="img/delete.jpg" alt="Flecha colores" class="mod_baja" accion="delete" id_historial="'. $row['idHistorial'] .'">
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
//El data table con paginacion presentaba problemas 
$(document).ready(function(){
  $('#table_datos').DataTable({
"responsive": true,
                    "autoWidth": true,
                    "lengthMenu": [10, 25, 50],
                    "pageLength": 4,
    "language": {
                        "sProcessing":     "Procesando...",
                        "sLengthMenu":     "Mostrar _MENU_ registros",
                        "sZeroRecords":    "No se encontraron resultados",
                        "sEmptyTable":     "Ningún dato disponible en esta tabla",
                        "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
                        "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
                        "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
                        "sInfoPostFix":    "",
                        "sSearch":         "Buscar:",
                        "sUrl":            "",
                        "sInfoThousands":  ",",
                        "sLoadingRecords": "Cargando...",
                        "oPaginate": {
                            "sFirst":    "Primero",
                            "sLast":     "Último",
                            "sNext":     "Siguiente",
                            "sPrevious": "Anterior"
                        },
                        "oAria": {
                            "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
                            "sSortDescending": ": Activar para ordenar la columna de manera descendente"
                        }
                    },
                    "dom": 'lBfrtip',
                    "buttons": [
                        'copyHtml5',
                        'csvHtml5'
                    ]

  });

  // $(".detalles").on("click", function(){
  //   let idHistorial = $(this).attr('id_historial');
  //   $('#exampleModal').modal('show'); 
  //  // alert("Mostrando detalles Jquery"+idHistorial);
  //       $.ajax({
  //       method: "POST",
  //       url: "historial_detalles.php",
  //       //data: "x="+$("#inputEmail").val()+"&inputPassword="+$("#inputPassword").val(), 
  //       data: "inputid="+idHistorial+"&id_btn=1&telefono=5554",
  //       cache:false
  //      })
  //     .done(function( msg ) {
  //       $("#respuesta").html(msg);
  //       });
 
  // });

  // $(".btn_alta_historial").on("click", function(){
  //  // alert("Mostrando detalles Jquery"+idHistorial);
  //       $('#exampleModal').modal('show');             //muestra el modal
  //       $.ajax({
  //       method: "GET",
  //       url: "historial_alta.php",
  //       //data: "x="+$("#inputEmail").val()+"&inputPassword="+$("#inputPassword").val(), 
  //       //data: "inputid="+idHistorial+"&id_btn=1&telefono=5554",
  //       cache:false
  //      })
  //     .done(function( msg ) {
  //       $("#respuesta").html(msg);
  //       });
  // });
 
  $(".mod_alta").on("click", function(){
        let modal = $(this).attr('accion');
        $.ajax({
            method: "GET",
            url: "load_modales.php", 
            data: "accion="+modal,
            cache:false
        })
        .done(function( msg ) {
            $("#respuesta").html(msg);
            $(".modal").modal();
            });
    });

    $(".mod_update").on("click", function(){
        let modal = $(this).attr('accion');
        let id_historial= $(this).attr('id_historial');
        //alert(modal+" "+id_historial);
        //return;
        $.ajax({
            method: "GET",
            url: "load_modales.php", 
            data: "accion="+modal+"&id_historial="+id_historial,
            cache:false
        })
        .done(function( msg ) {
            $("#respuesta").html(msg);
            $(".modal").modal();
            });
    });

    $(".mod_baja").on("click", function(){
        let modal = $(this).attr('accion');
        let id_historial= $(this).attr('id_historial');
        $.ajax({
            method: "GET",
            url: "load_modales.php", 
            data: "accion="+modal+"&id_historial="+id_historial,
            cache:false
        })
        .done(function( msg ) {
            $("#respuesta").html(msg);
            $(".modal").modal();
            });
    });
  
});
</script>

<?php
include_once "footer.php";
?>