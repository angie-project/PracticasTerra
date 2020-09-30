<?php
$accion = $_GET['accion'];

// echo $accion;

    switch ($accion) {
        case 'alta':
            echo '<div class="modal" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title">Alta datos</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                      <form id="frm_alta_historial">
                      <label for="materia"> Materia </label>
                      <input id="materia" name="materia"/> <br>
                      <label for="calificacion"> Calificación </label>
                      <input id="calificacion" name="calificacion"/><br>
                      <label for="semestre"> Semestre </label>
                      <input id="semestre" name="semestre"/>
                    </form> 
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-primary alta_historial">Save changes</button>
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
              </div>
            </div>
          </div>
                    
          <script>
          $(document).ready(function(){
          $(".alta_historial").on("click", function(){
          $.ajax({
              method: "POST",
              url: "historial_acciones.php",
              data: $("#frm_alta_historial").serialize()+"&accion=alta",
              cache:false
            })
            .done(function( msg ) {
              window.location.href = "perfil.php";
              $("#respuesta").html(msg);
              });
              });
          });
          </script>
          
          ';
            break;

            
        case 'update':
            ?>
            <div class="modal" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
              <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                  <div class="modal-content">
                    <div class="modal-header">
                    <h5 class="modal-title">Actualización de datos</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <p>Update</p>

                    <div class="">
                      <table class="table" id="actualiza">
                        <thead>
                          <tr>
                            <th scope="col">ID</th>
                            <th scope="col">ID Usuario</th>
                            <th scope="col">Materia</th>
                            <th scope="col">Calificación</th>
                            <th scope="col">Semestre</th>
                          </tr>
                          
                        </thead>
                            <tbody>
                            <td>'. $row['idHistorial'].'</td>
                            <td>'. $row['idUsuario'].'</td>
                            <td> <input name="materia" id="materia" value="'.$row['materia'].'" /></td>      
                            <td> <input name="calificacion" id="calificacion" value="'.$row['calificacion'].'" /></td>      
                            <td> <input name="semestre" id="semestre" value="'.$row['semestre'].'" /></td>
                            </tbody>
                      </table>
                    </div>
                  </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-primary update_historial">Save changes</button>
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          
          <script>
          $(document).ready(function(){
          $(".update_historial").on("click", function(){
            let calificacion = $("#calificacion").val();
            if(calificacion == ""){
                alert("La calificacion no puede ir vacia");
                return;
              }
          $.ajax({
              method: "POST",
              url: "historial_acciones.php",
              data: $("#actualiza").serialize()+"&accion=actualizacion",
              cache:false
            })
            .done(function( msg ) {
              window.location.href = "perfil.php";
              $("#respuesta").html(msg);
              });
              });
          });
          </script>
          <?php
            break;


        case 'delete':
          include_once "conexion.php";
          //$nom = "Angie" . "Cesar";
          $sql = "select * from historial where idHistorial= '" . $_GET['id_historial'] ."'";
          //echo $sql;
          $res = mysqli_query($mysqli, $sql);
          $row=mysqli_fetch_array($res);
          ?>
             <div class="modal" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
              <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                  <div class="modal-content">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title">Baja de datos</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                        <p>¿Estas seguro que deseas eliminar este campo?</p>
      
                        <?php
                            echo "<p>".$row['materia']."</p>";
                        ?>
                      
      
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-primary delete_historial">Save changes</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          
          <script>
          $(document).ready(function(){
          $(".delete_historial").on("click", function(){
          $.ajax({
              method: "POST",
              url: "historial_acciones.php",
              data: {id_historial: <?php echo $_GET['id_historial'];?>,accion:"baja"},
             //data: "id_historial=<?php echo $_GET['id_historial'];?>&accion=baja",
              cache:false
            })
            .done(function( msg ) {
              window.location.href = "perfil.php";
              $("#respuesta").html(msg);
              });
              });
          });
          </script>
          <?php
            break;
    }


?>