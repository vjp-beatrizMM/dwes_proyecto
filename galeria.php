<?php
require 'utils/ultis.php';
require 'entities/connection.class.php';
require 'entities/File.class.php';
$errores = [];
$descripcion = "";
$mensaje = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    try {
        $descripcion = trim(htmlspecialchars($_POST['descripcion']));
        $tiposAceptados = ['imagen/jpeg', 'image/jpg', 'image/gif', 'image/png'];
        $imagen = new File('imagen', $tiposAceptados);
        // $imagen ->saveUploadedFile(imagenGaleria::rutaImagenesGallery);
        //Si llega hasta aqui, es que no ha habido errores y se ha subido la imagen
        //Realizamos la consulta
        $connection = Connection::make();
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
        while ($row = $queryStatement->fetch()) {
            //$row = ['id'=>1, 'nombre'=>'', 'descripcion=>'', numVisualizacion => 0, numLikes => 0, numDownloads=>o]
            echo 'ID: ' . $row['id'];
            echo 'Nombre: ' . $row['nombre'];
            echo 'Descripcion: ' . $row['descripcion'];
            echo 'Número de Visualizaciones: ' . $row['numVisualizacion'];
            echo 'Número de Likes: ' . $row['numLikes'];
            echo 'Número de Descargas: ' . $row['numDownloads'];
        }
    } catch (FileException $exception) {
        $errores[] = $exception->getMessage();
    }
}

require 'views/galeria.view.php';
