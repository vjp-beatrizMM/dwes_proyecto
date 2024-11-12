<?php
require_once 'utils/ultis.php';
require_once 'entities/file.class.php';
require_once 'entities/imagenGaleria.class.php';
require_once 'exceptions/FileException.class.php';
require_once 'entities/connection.class.php';
require_once 'entities/QueryBuilders.class.php';
require_once 'exceptions/appException.class.php';
require_once 'entities/repository/imagenGaleriaRepositorio.class.php';
require_once 'entities/repository/categoriaRepositorio.class.php';
require_once 'entities/database/IEntity.class.php';
require_once 'entities/Categoria.class.php';

//array para guardar los mensajes de los errores
$errores = [];
$descripcion = '';
$mensaje = '';
try {
    $config=require_once'app/config.php';

    App::bind('config',$config);

    
    $imagenRepositorio= new ImagenGaleriaRepositorio();
    $categoriaRepositorio = new CategoriaRepositorio();

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {



        $descripcion = trim(htmlspecialchars($_POST['descripcion']));
        $categoria = trim(htmlspecialchars($_POST['categoria']));
        $tiposAceptados = ['image/jpeg', 'image/jpg', 'image/gif', 'image/png'];
        //tipologia MIME 'tipodearchivo/extension'
        $imagen = new File('imagen', $tiposAceptados);
        //el parametro fileName es 'imagen' porque asi lo indicamos en
        //en el formulario (type='file' name='imagen')
        $imagen->saveUploadFile(imagenGaleria::rutaImagenesGallery);
        //si llega hasta aqui, no hay errores y se ha subido la imagen
        $imagen->copyFile(imagenGaleria::rutaImagenesGallery, imagenGaleria::rutaImagenesPortfolio);



        // $sql = "INSERT INTO imagenes (nombre,descripcion) VALUES (:nombre,:descripcion)";
        // $pdoStatement = $connection->prepare($sql);
        // $parametersStatementArray = ['nombre' => $imagen->getFileName(), ':descripcion' => $descripcion];
        // //Lanzamos la sentecia y vemos si se ha ejecutado correctamente
        // $response = $pdoStatement->execute($parametersStatementArray);


        $imagenGaleria= new ImagenGaleria($imagen->getFileName(),$descripcion);
        $imagenRepositorio->save($imagenGaleria);
        $descripcion = '';
        $mensaje = 'Imagen guardada';


        //if ($response === false) {
        //    $errores[] = 'No se ha podido guardar la imagen en la base de datos.';
        //} else {
        //    $descripcion = '';
        //    $mensaje = 'Imagen guardada';
        //}
    }
    //$imagenRepositorio = new QueryBuilder('imagenes','imagenGaleria');
    $imagenes = $imagenRepositorio->findAll();
} catch (FileException $exception) {
    $errores[] = $exception->getMessage();
    //guardo en un array los errores
}catch (QueryException $exception) {
    $errores[] = $exception->getMessage();
}catch(AppException $exception){
    $errores[] = $exception->getMessage();

}catch(PDOException $exception){
    $errores[] = $exception->getMessage();

}catch(PDOException $exception){
    $errores[] = $exception->getMessage();

}finally{   
        $imagenes = $imagenRepositorio->findAll();
        $categoria = $categoriaRepositorio->findAll();
}

require 'views/gallery.view.php';
