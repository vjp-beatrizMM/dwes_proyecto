<?php
// require_once 'utils/ultis.php';
// require_once 'entities/File.class.php';
// require_once 'entities/ImagenGaleria.class.php';
// require_once 'exceptions/FileException.class.php';
// require_once 'entities/Connection.class.php';
// require_once 'entities/QueryBuilders.class.php';
// require_once 'exceptions/AppException.class.php';
// require_once 'entities/repository/ImagenGaleriaRepositorio.class.php';
// require_once 'entities/repository/CategoriaRepositorio.class.php';

use proyecto\entities;
use proyecto\entities\ImagenGaleriaRepositorio;
use proyecto\entities\CategoriaRepositorio;
use proyecto\entities\FileException;
use proyecto\entities\QueryException;
use proyecto\entities\AppException;
use proyecto\entities\File;
use proyecto\entities\App;

// Definimos el array de errores y las varibles que utilizaremos en galeria.view
$descripcion = '';
$mensaje = '';

try {

    $imagenRepository = new ImagenGaleriaRepositorio();
    $categoriaRepositorio = new CategoriaRepositorio();
    $descripcion = trim(htmlspecialchars($_POST['descripcion']));
    $categoria = trim(htmlspecialchars($_POST['categoria']));
    $tiposAceptados = ['image/jpeg', 'image/jpg', 'image/gif', 'image/png'];
    $imagen = new File('imagen', $tiposAceptados);
    $imagen->saveUploadFile(entities\ImagenGaleria::RUTA_IMAGENES_GALLERY);
    $imagen->copyFile(entities\ImagenGaleria::RUTA_IMAGENES_GALLERY, entities\ImagenGaleria::RUTA_IMAGENES_PORTFOLIO);
    $imagenGaleria = new entities\ImagenGaleria($imagen->getFileName(), $descripcion, categoria: $categoria);
    $imagenRepository->save($imagenGaleria);
    $descripcion = ""; // Reiniciamos la variables para que no aparezca rellena en el formulario
    $mensaje = 'Imagen guardada';
    // Método info es propia de la clase Monolog/Logger
    App::get('logger')->$log->info();

    
} catch (FileException $exception) {
    $errores[] = $exception->getMessage();
} catch (QueryException $exception) {
    $errores[] = $exception->getMessage();
} catch (AppException $exception) {
    $errores[] = $exception->getMessage();
} catch (PDOException $exception) {
    $errores[] = $exception->getMessage();
} 

header('location: /gallery_new');