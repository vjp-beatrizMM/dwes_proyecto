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
