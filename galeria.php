<?php
require_once 'utils/ultis.php';
require_once 'entities/Connection.class.php';
require_once 'entities/File.class.php';
require_once 'entities/QueryBuilders.class.php';
require_once 'exceptions/AppException.class.php';
require_once 'entities/ImagenGaleria.class.php';
require_once 'entities/repository/imagenGaleriaRepositorio.class.php';

$errores = [];
$descripcion = "";
$mensaje = '';



try {
    $config = require_once 'app/config.php';

    App::bind('config', $config);
    //Ya no necesitamos llamar almétodo make
    // $connection = Connection::make($config['database']);
    $connection = App::getConnection();
    // $queryBuilder = new QueryBuilder('imagenes', 'ImagenGaleria');
    $imagenRepositorio = new ImagenGaleriaRepositorio();

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {

        $descripcion = trim(htmlspecialchars($_POST['descripcion']));
        $tiposAceptados = ['image/jpeg', 'image/jpg', 'image/gif', 'image/png'];
        $imagen = new File('imagen', $tiposAceptados);
        // $imagen ->saveUploadedFile(imagenGaleria::rutaImagenesGallery); Descomentar cuando tengamos el metodo
        $imagen->copyFile(ImagenGaleria::rutaImagenesGallery, ImagenGaleria::rutaImagenesPortfolio);

        //Si llega hasta aqui, es que no ha habido errores y se ha subido la imagen
        //Realizamos la consulta
        // $sql = "INSERT INTO imagenes (nombre, descripcion) VALUES (:nombre, :descripcion)";
        // $pdoStatement = $connection->prepare($sql);
        // $parametersStatementArray = [':nombre' => $imagen->getFilename(), ':descripcion' => $descripcion];
        // //Lanzxamos la sentencia y vemos is se ha ejecutado correctamente
        // $response = $pdoStatement->execute($parametersStatementArray);
        $imagenGaleria = new ImagenGaleria($imagen->getFileName(), $descripcion);
        $imagenRepositorio->save($imagenGaleria);
        $descripcion = '';
        $mensaje = 'Imagen guardada';

        // if ($response === false) {
        //     $errores[] = 'No se ha podido guardar laimagen en la base de datos';
        // } else {
        //     $descripcion = '';
        //     $mensaje = 'Imagen guardada';
        // }
        // $querySql = 'Select * from imagenes';
        // $queryStatement = $connection->query($querySql);
        
    }
    $queryBuilder = new QueryBuilder('imagenes', 'ImagenGaleria');
    $imagenes = $queryBuilder->findAll();
} catch (FileException $exception) {
    $errores[] = $exception->getMessage();
} catch (QueryException $exception) {
    $errores[] = $exception->getMessage();
} catch (AppException $exception) {
    $errores[] = $exception->getMessage();
} catch (PDOException $exception) {
    $errores[] = $exception->getMessage();
} finally {
    $imagenes = $imagenRepositorio->findAll();
}


require 'views/galeria.view.php';
