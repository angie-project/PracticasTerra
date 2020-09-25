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

    <div>
        <div class="page-header">
            <h1>Bievenido a Books Store <br> <small> Registrese en el siguiente formulario</small></h1>
        </div>
    </div>


  <div class="container">
    <form action="/action_page.php">
      <div class="form-group">
        <label for="email">Email address:</label>
        <input type="email" class="form-control" id="email">
      </div>
      <div class="form-group">
        <label for="pwd">Password:</label>
        <input type="password" class="form-control" id="pwd">
      </div>
      <div class="checkbox">
        <label><input type="checkbox"> Remember me</label>
      </div>
        <button type="submit" class="btn btn-default">Submit</button>
    </form>
  </div>

    <div class="container">
        <div class="alert alert-success" role="alert">
        <a href="#" class="alert-link">¡Excelente vas por buen camino! </a>
        </div>
        <div class="alert alert-info" role="alert">
         <a href="#" class="alert-link">¡Bien, pero podrias mejorar!</a>
            </div>
        <div class="alert alert-warning" role="alert">
        <a href="#" class="alert-link">¡Cuidado puede que estes hqaciendo algo erroneo!</a>
        </div>
            <div class="alert alert-danger" role="alert">
            <a href="#" class="alert-link">¡Peligro pueden ser vulnerables tus datos!</a>
        </div>
    </div>

    <div class="container">
        <div class="progress">
             <div class="progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%;">
                60%
            </div>
        </div>
    </div>

   <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="js/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
  
</body>


</html>