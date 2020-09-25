<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

    <title>Hello, world!</title>
  </head>
  <body>
  
  <!--<div id="demo1" onclick="hola()" onmouseover="mensaje()">Hola mundo <br> <br></div>  -->
  <div id="demo2">Hola como estas <br> <br> </div>

  <div class="libro" id="libro"><br>Book Store</div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="js/jquery-3.5.1.min.js"> </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
  
    <script> 
       function hola() {
    document.getElementById("demo1").innerHTML = "Paragraph changed!";      //Sintaxis JavaScript 
    }

        function mensaje(){             //Esta funcion permite mandar un mensaje de alerta |Sintaxis Jquery 
         //   alert("Cuidado");                             y un
            console.log("Bienvenido lo hiciste bien");  //mensaje en la consola
        }

        $(document).ready(function() {
           //$("#demo2").html("Saludo desde Jquery");
           $("#demo2").on("click", function(){
               console.log("Has podido accedecer");
           });

           $(".libro").on("mouseover", function(){      //$ es la variable 
               console.log("Has podido accedecer a los libros, eeeeee :D");
           });

        });


        let texto = "Hola";
       // midiv.innerHTML("Bienvenidos");
    </script>

</body>
</html>