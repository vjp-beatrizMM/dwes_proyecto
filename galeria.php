<?php
require 'utils/ultis.php';

$errores = [];
$descripcion = "";
$mensaje = '';

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $descripcion = trim(htmlspecialchars($_POST['descripcion']));
    $mensaje = 'Datos enviados';
}

require 'views/galeria.view.php';


?>