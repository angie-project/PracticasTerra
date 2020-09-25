<?php

include_once ("header.php");    //Once solo lo inclulle solo una vez  

?>

<div class="container">

<?php

echo "Esto es una prueba de validacion <br>"; 

echo $_POST['usuario'] . "<br>";
echo $_GET['tipo'] . "<br>";

echo $_POST['clave'];
?>

</div>

<?php

include_once ("footer.php");    //Once solo lo inclulle solo una vez  


?>
