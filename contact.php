<?php

require "utils/ultis.php";

//  Verificamos si la solicitud es de tipo POST, es decir, si el formulario fue enviado
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    //Inicializamos la variables recogiendo los datos introducidos en el formulario
    // Inicializamos arrays para guardar posibles errores y los datos válidos y posteriormente mostrarlos
    $errores = [];
    $datos = [];
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $email = $_POST['email'];
    $asunto = $_POST['asunto'];
    $mensaje = $_POST['mensaje'];
    $errorEmail= [];

    // Validamos los campos que son obligatorios, si están vacios añadimos el error al array
    if (empty($nombre)) {
        $errores[] = "El campo First Name no puede estar vacío";
    }else{
        $datos[]= "Nombre: ".$nombre;
    }

    //Validamos además que email tenga un formato válido
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