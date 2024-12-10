<?php
// require_once "utils/ultis.php";
// require_once "entities/ImagenGaleria.class.php";
// require_once "entities/Partner.class.php";
// require_once "entities/Connection.class.php";
// require_once "entities/repository/ImagenGaleriaRepositorio.class.php";
// require_once 'entities/repository/AsociadoRepositorio.class.php';

use proyecto\entities;
use proyecto\entities\ImagenGaleriaRepositorio;
use proyecto\entities\AsociadoRepositorio;
use proyecto\entities\FileException;
use proyecto\entities\QueryException;
use proyecto\entities\AppException;
use proyecto\entities\App;
//PARTE GALERÍA

// A partir de ahora, vamos a mostrar las imágenes que tenemos en la base de datos, ya no nos hace falta generar el array de imágenes
// // Inicializazamos un array vacío para almacenar los objetos de tipo ImagenGaleria
// $imagenes = [];
// // Bucle para generar 12 objetos de la clase ImagenGaleria
// for ($i = 1; $i <= 12; $i++) {
//     // Crear un nuevo objeto ImagenGaleria
//     $imagen = new ImagenGaleria(
//         $i . '.jpg',                      // Nombre de la imagen
//         'descripcion imagen ' . $i,       // Descripción imagen
//         rand(100, 1000),                   // Número aleatorio de visualizaciones entre 100 y 1000
//         rand(50, 500),                    // Número aleatorio de descargas entre 50 y 500
//         rand(10, 100)                    // Número aleatorio de likes entre 10 y 100
//     );
//     // Añadir el objeto al array de imágenes
//     $imagenes[] = $imagen;
// }
// // Imprimimos el array de objetos (para probar)
// // echo '<pre>';
// // print_r($imagenes);
// // echo '</pre>';

//

$imagenes = [];
$asociados = [];

try{
    $config=require_once'app/config.php';
  
    App::bind('config',$config);
  
    $imagenRepositorio= new ImagenGaleriaRepositorio();
    $asociadosRepositorio = new AsociadoRepositorio();

  }catch (FileException $exception) {
    $errores[] = $exception->getMessage();
    //guardo en un array los errores
  }catch (QueryException $exception) {
    $errores[] = $exception->getMessage();
  }catch(AppException $exception){
    $errores[] = $exception->getMessage();
  
  }catch(PDOException $exception){
    $errores[] = $exception->getMessage();
  
  }
  finally{
    
    $imagenes = $imagenRepositorio->findAll();
    $asociados = $asociadosRepositorio->findAll();
    $sociosSeleccionados = getRandomPartners($asociados);
  }


//PARTE ASOCIADOS

//Inicializamos array vacio para almacenar los asociados
// $arrayPartners = [];
// $contador = 1;

// // Generamos 6 partners con un bucle for
// for ($i = 1; $i <= 6; $i++) {
//     $asociados[] = new Partner(
//         'Partner ' . $i, // Nombre dinámico
//         "log" . $contador . ".jpg", // Ruta del logo dinámica
//         "Descripción " . $i // Descripción dinámica
//     );
//     // Ajustamos el contador para las imágenes
//     if ($contador >= 3) {
//         $contador = 1; // Reiniciar contador después de 3
//     } else {
//         $contador++;
//     }
// }


require "views/index.views.php";
