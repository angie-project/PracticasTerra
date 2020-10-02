<?php
$nombre = "Angelica";
$apellido = "Cesar";
echo 'hola $nombre <br>';
echo "hola $nombre <br>";
echo 'hola ' .$nombre;

$libro = ' <input id="libro" name="libro"/>';
$libro2 = " <input id=\"libro\" name=\"libro\"/>";
echo $libro;
echo $libro2;
$libro3 = " <input id=\"libro\" name=\"libro\" value=\"$nombre\"/>";
echo $libro3;
$libro4 = ' <input id="libro" name="libro" value="'.$nombre.'"/>';
echo $libro4;
$libro5 = '<input id="libro" name="libro" onclick="reservar('.$nombre.')"/>';
echo $libro5;
$libro6 = "<input id='libro' name='libro' onclick='".$nombre."'/>";
echo $libro6;

?>
