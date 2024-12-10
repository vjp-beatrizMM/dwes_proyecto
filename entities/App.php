<?php
// require_once 'exceptions/AppException.class.php';
// require_once 'utils/strings.php'
namespace proyecto\entities;
use proyecto\utils;
use proyecto\entities\AppException;


    // Inyección de dependencias, no crearemos el objeto, solicitaremos al contenedor que nos devuelva el que necesitamos
    class App {

        /**
         * Creamos un array para almacenar los valores para la conexión de la BBDD
         */
        private static $container = [];


        //Uso: App::bind('config', ['db_name' => 'mi_base_de_datos', 'user' => 'root']);
        //Permite agregar el valor de la configuración al contenedor, asociándolo a una clave única
        public static function bind($clave, $valor){
            self::$container[$clave]=$valor;

        }

        //Recuperamos el valor asociado a una clave de la configuracion en el contenedor.
        //Si la clave no existe, lanza una excepción AppException.
        public static function get(string $key){
            if(!array_key_exists($key, self::$container)){
                // throw new AppException(ERROR_STRINGS[ERROR_APP_CORE]);
                throw new AppException(utils\getErrorString(ERROR_APP_CORE));
            }
            return static::$container[$key]; //Static es más flexible que self porque permite extender la funcionalidad
        }

        //Gestionamos la conexión a la BD
        public static function getConnection(){
            //Si la clave 'connection' no existe en el contenedor, crea una conexión llamando al método Connection::make()
            //Almacenamos la conexión en el contenedor
            if(!array_key_exists('connection', self::$container)){
                self::$container['connection'] = Connection::make();
            }
            return static::$container['connection'];
        }


    }


?>