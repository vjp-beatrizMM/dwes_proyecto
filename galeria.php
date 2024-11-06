<?php
require_once 'utils/ultis.php';
require 'entities/Connection.class.php';
require 'entities/File.class.php';
require_once 'entities/QueryBuilders.class.php';
require_once 'exceptions/AppException.class.php';

$errores = [];
$descripcion = "";
$mensaje = '';

try {
    $config = require_once 'ap/config.php';

    App::bind('config',$config);
    //Ya no necesitamos llamar almétodo make
    // $connection = Connection::make($config['database']);
    $connection = App::getConnection();

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {

        $descripcion = trim(htmlspecialchars($_POST['descripcion']));
        $tiposAceptados = ['imagen/jpeg', 'image/jpg', 'image/gif', 'image/png'];
        $imagen = new File('imagen', $tiposAceptados);
        // $imagen ->saveUploadedFile(imagenGaleria::rutaImagenesGallery);
        //Si llega hasta aqui, es que no ha habido errores y se ha subido la imagen
        //Realizamos la consulta
        $sql = "INSERT INTO imagenes (nombre, descripcion) VALUES (:nombre, :descripcion)";
        $pdoStatement = $connection->prepare($sql);
        $parametersStatementArray = [':nombre' => $imagen->getFilename(), ':descripcion' => $descripcion];
        //Lanzxamos la sentencia y vemos is se ha ejecutado correctamente
        $response = $pdoStatement->execute($parametersStatementArray);
        if ($response === false) {
            $errores[] = 'No se ha podido guardar laimagen en la base de datos';
        } else {
            $descripcion = '';
            $mensaje = 'Imagen guardada';
        }
        $querySql = 'Select * from imagenes';
        $queryStatement = $connection->query($querySql);
        // while ($row = $queryStatement->fetch()) {
        //     //$row = ['id'=>1, 'nombre'=>'', 'descripcion=>'', numVisualizacion => 0, numLikes => 0, numDownloads=>o]
        //     echo 'ID: ' . $row['id'];
        //     echo 'Nombre: ' . $row['nombre'];
        //     echo 'Descripcion: ' . $row['descripcion'];
        //     echo 'Número de Visualizaciones: ' . $row['numVisualizacion'];
        //     echo 'Número de Likes: ' . $row['numLikes'];
        //     echo 'Número de Descargas: ' . $row['numDownloads'];
        // }
    }
    $queryBuilder = new QueryBuilder($connection);
    $imagenes = $queryBuilder->findAll('imagenes', 'ImagenGaleria');
} catch (FileException $exception) {
    $errores[] = $exception->getMessage();
} catch (QueryException $exception){
    $errores[] = $exception->getMessage();
} catch (AppException $exception){
    $errores[] = $exception->getMessage();
}


require 'views/galeria.view.php';
