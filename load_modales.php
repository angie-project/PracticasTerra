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
          include_once "conexion.php";
              $sql = "select * from historial where idHistorial= '".$_GET['id_historial']."'";
              $res = mysqli_query($mysqli, $sql);
             // $row = mysqli_fetch_array($res);
             // print_r($row);
             // exit();
            ?>
            <div class="modal" tabindex="-1" role="dialog">
            <div class="modal-dialog modal-lg" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                    <h5 class="modal-title">Actualización de datos</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <p>Update</p>

                     <!--<div class="container-md">-->
                      <form id="frm_update">
                        <table class="table">
                          <thead>
                            <tr>
                              <th scope="col">Materia</th>
                              <th scope="col">Calificación</th>
                              <th scope="col">Semestre</th>
                            </tr>
                          </thead>
                            <tbody>
                            <!--<tr>
                            <th> <?php echo $_GET['id_historial'];?></th>
                            <td> 1</td>
                            <td> <input name="materia" id="materia" value="<?= $row['materia'];?>"/> </td>
                            <td> <input name="calificacion" id="calificacion" value="<?= $row['calificacion'];?>"/> </td>
                            <td> <input name="semestre" id="semestre" value="<?= $row['semestre']; ?>"/> </td>
                            </tr>-->
                            <?php
                            while($row=mysqli_fetch_array($res)){ 
                                  
                              echo '<tr> <input type="hidden" name="id_historial" value="'.$row['idHistorial'].'"/>
                                  <td> <input type="text" name="materia" id="materia" value="'.$row['materia'].'" /> </td>      
                                  <td> <input type="text" name="calificacion" id="calificacion" value="'.$row['calificacion'].'"/> </td>      
                                  <td> <input type="text" name="semestre" id="semestre" value="'.$row['semestre'].'"/> </td>
                                  </tr>';
                                } ?>
                            </tbody>
                        </table>
                      </form>   
                   <!-- </div> -->
                  </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-primary update_historial">Save changes</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                      </div>
                    </div>
            </div>
          </div>
          
          <script>
          $(document).ready(function(){
            $(".update_historial").on("click", function(){
            $.ajax({
                method: "POST",
                url: "historial_acciones.php",
                data: $("#frm_update").serialize()+"&accion=actualizacion",
                //data: {id_historial: <?php echo $_GET['id_historial'];?>,accion:"actualizacion"},
                //$("#frm_update").serialize()+"&accion=actualizacion",
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


//Hello

?>