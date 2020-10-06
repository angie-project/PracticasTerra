<?php
include_once "header.php";
?>

  <link href="css/signin.css" rel="stylesheet">
  
  <div class="Container">
  <form action="verifica.php" method="post" id="form_sig" class="form-signin">
     <!-- <img class="mb-4" src="https://getbootstrap.com/docs/4.0/assets/brand/bootstrap-solid.svg" alt="User" width="100" height="100"> -->
      <img class="mb-4" src="img/user.png" alt="User" width="120" height="120">
      <body background="img/fondo.jpg">
      <h1 class="h3 mb-3 font-weight-normal">Please sign in</h1>
      <label for="inputEmail" class="sr-only">Email address</label>
      <input name='inputEmail' type="text" id="inputEmail" class="form-control" placeholder="Email address" required autofocus>
      <label for="inputPassword" class="sr-only">Password</label>
      <input name='inputPassword' type="password" id="inputPassword" class="form-control" placeholder="Password" required>
      <div class="checkbox mb-3">
        <label>
          <input type="checkbox" value="remember-me"> Remember me
        </label>
      </div>
      <button class="btn btn-lg btn-primary btn-block" id="ajax_button" type="submit">Sign in</button>
      <p class="mt-5 mb-3 text-muted">&copy; 2017-2018</p>
      
      <?php
        if(isset($_GET['error'])){
          echo "<span class=\"success\" id='error' style='color: #ed1b24'> Usuario o contraseña incorrecta, ¡intentalo nuevamente!</span>";
        }
      ?>
      
    </form>
  </div>  
   
  <script>
    /*$("#ajax_button").on("click", function(){
        $.ajax({
        method: "POST",
        url: "verifica.php",
        //data: "inputEmail="+$("#inputEmail").val()+"&inputPassword="+$("#inputPassword").val(), 
        data: $("#form_usuario").serialize(),
        cache:false
       })
      .done(function( msg ) {
        alert( "Data Saved: " + msg );
        });
      });*/ 
  </script>
  
<?php
include_once "footer.php";
?>