<?php include_once("header.php") ?>

<div id="container">
    <div class="row mt-3 ml-3">
        <div class="col col-sm-4"><button class="btn btn-success mod" id="alta" accion="alta">Alta</button></div>
        <div class="col col-sm-4"><button class="btn btn-primary mod" id="update" accion="update">Update</button></div>
        <div class="col col-sm-4"><button class="btn btn-danger mod" id="baja" accion="delete">Baja</button></div>
    </div>
    <div class="row mt-3 ml-3">
        <div class="col col-sm-12">
            <div id="respuesta"></div>
        </div>
    </div>
</div>

<script> 
    $(document).ready(function() {
           //$("#demo2").html("Saludo desde Jquery");
           $(".mod").on("click", function(){
               let modal = $(this).attr('accion');
                $.ajax({
                    method: "POST",
                    url: "load_modales.php", 
                    data: "accion="+modal,
                    cache:false
                })
                .done(function( msg ) {
                    $("#respuesta").html(msg);
                    $(".modal").modal();
                    });
           });

    });
</script>

<?php include_once("footer.php") ?>