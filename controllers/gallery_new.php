<?php
require_once 'utils/ultis.php';
require_once 'entities/File.class.php';
require_once 'entities/ImagenGaleria.class.php';
require_once 'exceptions/FileException.class.php';
require_once 'entities/Connection.class.php';
require_once 'entities/QueryBuilders.class.php';
require_once 'exceptions/AppException.class.php';
require_once 'entities/repository/ImagenGaleriaRepositorio.class.php';
require_once 'entities/repository/CategoriaRepositorio.class.php';

// Definimos el array de errores y las varibles que utilizaremos en galeria.view
$errores = [];
$descripcion = '';
$mensaje = '';

try {

    $imagenRepository = new ImagenGaleriaRepositorio();
    $categoriaRepositorio = new CategoriaRepositorio();
    $descripcion = trim(htmlspecialchars($_POST['descripcion']));
    $categoria = trim(htmlspecialchars($_POST['categoria']));
    $tiposAceptados = ['image/jpeg', 'image/jpg', 'image/gif', 'image/png'];
    $imagen = new File('imagen', $tiposAceptados);
    $imagen->saveUploadFile(ImagenGaleria::RUTA_IMAGENES_GALLERY);
    $imagen->copyFile(ImagenGaleria::RUTA_IMAGENES_GALLERY, ImagenGaleria::RUTA_IMAGENES_PORTFOLIO);
    $imagenGaleria = new ImagenGaleria($imagen->getFileName(), $descripcion, categoria: $categoria);
    $imagenRepository->save($imagenGaleria);
    $descripcion = ""; // Reiniciamos la variables para que no aparezca rellena en el formulario
    $mensaje = 'Imagen guardada';

    
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