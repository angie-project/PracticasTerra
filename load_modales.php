<?php
$accion = $_GET['accion'];

// echo $accion;

    switch ($accion) {
        case 'alta':
            echo '<div class="modal" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title">Modal title</h5>
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
            echo '<div class="modal" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title">Modal title</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <p>Update</p>









                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-primary">Save changes</button>
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
              </div>
            </div>
          </div>';
            break;
        case 'delete':
            echo '<div class="modal" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title">Modal title</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <p>Delete</p>

                Table
                Deseas borrar

                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-primary">Save changes</button>
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
              </div>
            </div>
          </div>';
            break;
        
    }


?>