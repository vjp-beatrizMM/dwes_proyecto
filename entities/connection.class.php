<?php
    require_once 'entities/App.class.php';
    require_once 'exceptions/AppException.class.php';
    require_once 'utils/strings.php';
    class Connection
    {
        public static function make()
        {
            // $option=[
        //     PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8",//Para que utilice laencriptación utf8
        //     PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION,//para cuando se produzca un error 

        //     PDO::ATTR_PERSISTENT=>true
        // ];
        // try{
        //     $connection = new PDO('mysql:host=dwes.local;dbname=proyecto;charset=utf8','userProyecto','1234',$option);
        // }catch(PDOException $PDOException){
        //     die($PDOException->getMessage());//Detiene la ejecución del script.El string se muestra.
        // }
        // return $connection;
            try {
                $config = APP::get('config')['database'];
                $connection = new PDO(
                    $config['connection'] . 'dbname='.$config['name'],
                    $config['username'], 
                    $config['password'],
                    $config['options']
                );
            } catch (PDOException $PDOException) {
                // die($PDOException->getMessage());
                throw new AppException(getErrorString(ERROR_CON_BD));
            }
            return $connection;
        }
    }
?>
