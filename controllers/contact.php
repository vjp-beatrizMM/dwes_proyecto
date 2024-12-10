<?php

// require "utils/ultis.php";
// require_once 'entities/repository/MensajeRepositorio.class.php';
// require_once 'entities/Message.class.php';
// require_once 'exceptions/FileException.class.php';
// require_once 'exceptions/QueryException.class.php';
// require_once 'exceptions/AppException.class.php';
// require_once 'entities/File.class.php';
// require_once 'entities/Connection.class.php';
// require_once 'entities/App.class.php';

use proyecto\entities;
use proyecto\utils;
use proyecto\entities\App;
use proyecto\entities\MensajeRepositorio;
use proyecto\entities\Message;
use proyecto\entities\FileException;
use proyecto\entities\QueryException;
use proyecto\entities\AppException;

$errores = [];

try {
    // Configuración de la aplicación y conexión
    $config = require_once 'app/config.php';
    App::bind('config', $config);

    // Creamos una instancia del repositorio
    $mensajeRepositorio = new MensajeRepositorio();

    //  Verificamos si la solicitud es de tipo POST, es decir, si el formulario fue enviado
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        //Inicializamos la variables recogiendo los datos introducidos en el formulario
        // Inicializamos arrays para guardar posibles errores y los datos válidos y posteriormente mostrarlos
        $erroresForm = [];
        $datos = [];
        $nombre = $_POST['nombre'];
        $apellido = $_POST['apellido'];
        $asunto = $_POST['asunto'];
        $email = $_POST['email'];
        $texto = $_POST['mensaje'];
        $errorEmail = [];

        // Validamos los campos que son obligatorios, si están vacios añadimos el error al array
        if (empty($nombre)) {
            $erroresForm[] = "El campo First Name no puede estar vacío";
        } else {
            $datos[] = "Nombre: " . $nombre;
        }

        //Validamos además que email tenga un formato válido
        if (empty($email)) {
            $erroresForm[] = "El campo Email está vacío";
        } else {
            if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $datos[] =  "Email: " . $email;
            } else {
                $errorEmail[] = 'Email inválido';
            }
        }

        if (empty($asunto)) {
            $erroresForm[] = "El campo Subject está vacío";
        } else {
            $datos[] = "Asunto: " . $asunto;
        }

        if (!empty($apellido)) {
            $datos[] = "Apellido: " . $apellido;
        }

        if (!empty($texto)) {
            $datos[] = "Mensaje: " . $texto;
        }

        // Creamos un nuevo mensaje y lo guardamos 
        $mensaje = new Message($nombre, $apellido, $asunto, $email, $texto);
        $mensajeRepositorio->save($mensaje);

        //Limpiamos los campos del formulario
        $nombre = '';
        $apellido = '';
        $email = '';
        $subject = '';
        $texto = '';
    }
} catch (FileException $exception) {
    $errores[] = $exception->getMessage();
} catch (QueryException $exception) {
    $errores[] = $exception->getMessage();
} catch (AppException $exception) {
    $errores[] = $exception->getMessage();
} catch (PDOException $exception) {
    $errores[] = $exception->getMessage();
}

require "views/contact.views.php";
