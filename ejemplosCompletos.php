<?php
include_once "header.php";
?>
<style> 
        .container2{
            margin-top: 50px;    /*Realiza un margen superior*/
            margin-bottom: 30px;
            margin-right: 200px;
            margin-left: 200px;
           /* margin: 0 auto;*/
            display:block;
           /*background-color: #000000;*/
            background-image: url('img/fonperros.jpg');
            position: relative;
            /*width: 100%;
            position:relative;
            float:left;*/
        }

        .perro{
            background-color: white;
            /*border: 1px yellow solid;*/
            border-style: dashed;          /*Realiza un borde punteado*/
            border-color: yellow;          /*Da color al borde punteado*/
            width: fit-content;
            padding-left: 30px;
            margin-left: 30px;
        }
</style>

<div class="container2"> 
<h1 class="perro">Hello, world!</h1> 
<div class="">
  
  <!-- <img src="img/muchoperro.jpg" alt="Muchos perritos"> -->
  <p class="" style="color:palevioletred">This is a simple hero unit, a simple jumbotron-style component for calling extra attention to featured content or information.</p>
  <hr class="">
  <p style="color:palevioletred;">It uses utility classes for typography and spacing to space content out within the larger container.</p>
  <p class="">
    <a class="btn btn-success perritos" id="perrito1" raza="chihuahua" href="#" role="button" data-toggle="modal" data-target="#exampleModal">Perrito 1</a>
    <a class="btn btn-success perritos" id="perrito2" raza="schnauzer" href="#" role="button" data-toggle="modal" data-target="#exampleModal">Perrito 2</a>   
  </p>

  <form action="valida.php?tipo=comentario" method="post" id="form_usuario">
  <div class="form-group" >
    <label for="usuario">Usuario</label>
    <input id="usuario" name="usuario" class="form-control"/>
    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
  </div>
  <div class="form-group">
  <label for="clave">Clave</label>
  <input id="clave" name="clave" class="form-control" type="password"/>
  </div>
   <button type="button" id="ajax_button" class="btn btn-primary">Submit</button>
   <!-- Enviar la clave y usuario en ajax-->
</form>

</div>
</div>

<div class="container">
<div class="jumbotron">
  <h1 class="display-4">Hello, world!</h1>
  <p class="lead">This is a simple hero unit, a simple jumbotron-style component for calling extra attention to featured content or information.</p>
  <hr class="my-4">
  <p>It uses utility classes for typography and spacing to space content out within the larger container.</p>
  <p class="lead">
    <a class="btn btn-primary btn-lg" href="#" role="button">Learn more</a>
  </p>
</div>

        <!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
  Launch demo modal
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Carcateristicas perros</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div id="contenido">
            
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
</div>

<script> 
  $(document).ready(function(){
    //let perritos = {}
      let perrito1 = {'raza': 'chihuahua', 'color': 'negro', 'edad':2};
      let perrito2 = {'raza': 'schnauzer', 'color': 'gris', 'edad':4};
      /*console.log(perrito1.color);
      $("#aprender").on("click", function(){
       alert("Aprende a conocer a tu " + perrito1.raza);
      });
      Agregar el listener 
      dentro del listener modificar el contenido del div con una etiqueta parecida a esta
      $("#demo2").html("Saludo desde Jquery");*/

      let contenido = $("#contenido");
      /*$("#perrito1").on("click", function(){
        contenido.html("La raza del perrito es: " + perrito1.raza);
      });

      $("#perrito2").on("click", function(){       /identificador "."clase y "#"id
        contenido.html(JSON.stringify(perrito2));  
      });*/

      $(".perritos").on("click", function(){
        console.log("Perros funcionando");
        let raza = $(this).attr("raza");
        contenido.html("La raza del perrito es: " + raza);
      });
      
      
      $("#ajax_button").on("click", function(){
        //console.log("usuario="+$("#usuario").val()+"&clave="+$("#clave").val());
        /*console.log($("#form_usuario").serialize());  //Regresa todos los campos con sus valores 
        return ;*/
        $.ajax({
        method: "POST",
        url: "respuesta.php",
        //data: "usuario="+$("#usuario").val()+"&clave="+$("#clave").val(), 
         data: $("#form_usuario").serialize(),
        cache:false
       })
      .done(function( msg ) {
        alert( "Data Saved: " + msg );
        });
      });
        /* http://localhost/ejercicios_terra/respuesta.php 
        variable=valor&variable1=valor1 

          // Comun para get  &-separacion 
https://www.google.com/ejercicios_terra/respuesta.php?usuario=Angy&clave=fds453*.&color=blue&.....
// Comun para post
https://www.google.com/ejercicios_terra/respuesta.php
usuario=Angy&clave=fds453*.&color=blue&.....
//Formatos para el envio de data
{'usuario': 'Angy', 'clave': 'fds453*.',....}
{'usuario': $("#usuario").val(), 'clave': $("#password").val() ,....}
"usuario=Angy"
data: "usuario="+$("#usuario").val(),
usuario=
"usuario=" + $("#usuario").val() + "clave=" + $("#password").val()
// html
// <input type="text" id="usuario" value=""/>
Angy
$("#usuario").val()

        */
  });

  //$(function(){   Forma abrebiada de una función con jQuery
  //});
 </script>

<?php
include_once "footer.php";
?>