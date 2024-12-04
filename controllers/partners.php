<?php

require 'utils/ultis.php';
require_once 'entities/Partner.class.php';
require_once 'entities/repository/AsociadoRepositorio.class.php';
require_once 'entities/Connection.class.php'; 
require_once 'entities/App.class.php'; 
require_once 'entities/ImagenGaleria.class.php';
require_once 'exceptions/FileException.class.php';
require_once 'exceptions/QueryException.class.php';
require_once 'exceptions/AppException.class.php';
require_once 'entities/File.class.php';

$errores = [];
$descripcion = '';
$mensaje = '';

try {
    // Configuración de la aplicación y conexión
    $config = require_once 'app/config.php';
    App::bind('config', $config);

    // Creamos una instancia del repositorio
    $asociadosRepositorio = new AsociadoRepositorio();

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $nombre = trim(htmlspecialchars($_POST['nombre']));
        $descripcion = trim(htmlspecialchars($_POST['descripcion']));

        $tiposAceptados = ['image/jpeg', 'image/jpg', 'image/gif', 'image/png'];

        // Manejar el archivo subido
        $logo = new File('logo', $tiposAceptados);
        $logo->saveUploadFile(Partner::RUTA_LOGOS);

        // Creamos un nuevo asociado y lo guardamos
        $asociado = new Partner($nombre, $logo->getFileName(), $descripcion);
        $asociadosRepositorio->save($asociado);
        $mensaje = 'Asociado guardado';
    }
} catch (FileException $exception) {
    $errores[] = $exception->getMessage();
} catch (QueryException $exception) {
    $errores[] = $exception->getMessage();
} catch (AppException $exception) {
    $errores[] = $exception->getMessage();
} catch (PDOException $exception) {
    $errores[] = $exception->getMessage();
} finally {
    
    $asociados = $asociadosRepositorio->findAll();
    
}

require 'views/partners.view.php';
