<?php
// require_once "utils/ultis.php";
// require_once "entities/ImagenGaleria.class.php";
// require_once "entities/Partner.class.php";
// require_once "entities/Connection.class.php";
// require_once "entities/repository/ImagenGaleriaRepositorio.class.php";
// require_once 'entities/repository/AsociadoRepositorio.class.php';

use proyecto\entities\ImagenGaleriaRepositorio;
use proyecto\entities\AsociadoRepositorio;
use proyecto\entities\FileException;
use proyecto\entities\QueryException;
use proyecto\entities\AppException;
use proyecto\entities\Partner;

use function proyecto\utils\getRandomPartners;

$imagenes = [];
$asociados = [];

try{
  
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

require "views/index.views.php";
