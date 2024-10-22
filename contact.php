<?php

require "utils/ultis.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $errores = [];
    $datos = [];
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $email = $_POST['email'];
    $asunto = $_POST['asunto'];
    $mensaje = $_POST['mensaje'];
    $errorEmail= [];

    if (empty($nombre)) {
        $errores[] = "El campo First Name no puede estar vacío";
    }else{
        $datos[]= "Nombre: ".$nombre;
    }

    if (empty($email)) {
        $errores[] = "El campo Email está vacío";
    }else{
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $datos[]=  "Email: ". $email;
        }else{
            $errorEmail []= 'Email inválido';
        }
    }
    
    if (empty($asunto)) {
        $errores[] = "El campo Subject está vacío";
    } else{
        $datos[]= "Asunto: ". $asunto;
    }

    if(!empty($apellido)){
        $datos[]= "Apellido: ".$apellido;
    }

    if(!empty($mensaje)){
        $datos[]= "Mensaje: ".$mensaje;
    }
}

require "views/contact.views.php"

?>