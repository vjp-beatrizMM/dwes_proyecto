<?php

namespace proyecto\entities;

// require_once 'entities/App.class.php';
// require_once 'exceptions/AppException.class.php';
use proyecto\utils;
use PDO;
use PDOException;

class Connection
{
    public static function make()
    {
        // $option=[
        //     PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8", 
        //     PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION, 

        //     PDO::ATTR_PERSISTENT=>true
        // ];
        // try{
        //     $connection = new PDO('mysql:host=dwes.local;dbname=proyecto;charset=utf8','user','user',$option);
        // }catch(PDOException $PDOException){
        //     die($PDOException->getMessage());
        // }
        // return $connection;
        try {
            $config = APP::get('config')['database']; //Recuperamos la configuración global de la base de datos registrada en el contenedor de la clase App
            $connection = new PDO( //Creamos la conexión real con la base de datos ( PDO: objeto en PHP que representa una conexión a una base de datos)
                //Usamos estos valores para construir la conexión
                $config['connection'] . ';dbname=' . $config['name'],
                $config['username'],
                $config['password'],
                $config['options']
            );
        } catch (PDOException $PDOException) {

            throw new AppException(utils\getErrorString(ERROR_CON_BD));
        }
        return $connection;
    }
}
