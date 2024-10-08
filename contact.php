<?php


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $errores = [];
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $email = $_POST['email'];
    $asunto = $_POST['asunto'];
    $mensaje = $_POST['mensaje'];

    if (empty($nombre)) {
        $errores[] = "El campo First Name no puede estar vacío";
    }

    if (empty($email)) {
        $errores[] = "El campo Email está vacío";
    }
    
    if (empty($asunto)) {
        $errores[] = "El campo Subject está vacío";
    } 

}

require "views/contact.views.php"

?>