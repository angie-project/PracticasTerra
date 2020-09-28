<form id="frm_alta_historial">
            <label for="materia"> Materia </label>
            <input id="materia" name="materia"/> <br>
            <label for="calificacion"> Calificación </label>
            <input id="calificacion" name="calificacion"/><br>
            <label for="semestre"> Semestre </label>
            <input id="semestre" name="semestre"/>

            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary alta_historial">Save changes</button>
          </form> 

    <script>
    $(document).ready(function(){
    $(".alta_historial").on("click", function(){
    $.ajax({
        method: "POST",
        url: "historial_acciones.php",
        //data: "x="+$("#inputEmail").val()+"&inputPassword="+$("#inputPassword").val(), 
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

          