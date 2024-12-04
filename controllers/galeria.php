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
        $config = require_once 'app/config.php';

        //Guardamos la configuración en el contenedor de servicios:
        App::bind('config',$config);
        //Ya no necesitamos llamar al método make
        //$connection = Connection::make($config['database']);
        //Podemos obtener la conexion llamando al método getConection
        //$connection = App::getConnection();

        // $queryBuilder = new QueryBuilder('imagenes','ImagenGaleria'); Ya no podemos crearlos por el abstract, lo haremos desde Repository
        // $imagenes = $queryBuilder->findAll();
        $imagenRepository = new ImagenGaleriaRepositorio();
        // Creamos un objeto del tipo CategoriaRepositorio
        $categoriaRepositorio = new CategoriaRepositorio();
        

    }
    catch (FileException $exception) {
            $errores[] = $exception->getMessage();
    }catch (QueryException $exception) {
        $errores[] = $exception->getMessage();
    }catch (AppException $exception){
        $errores[] = $exception->getMessage();
    }catch(PDOException $exception){
        $errores[] = $exception->getMessage();
    }
    finally{
        //$queryBuilder = new QueryBuilder('imagenes','ImagenGaleria');
        
        $imagenes = $imagenRepository->findAll();
        // Rellenamos el array de categorías
        $categorias = $categoriaRepositorio->findAll();
    }
    require 'views/galeria.view.php';
?>