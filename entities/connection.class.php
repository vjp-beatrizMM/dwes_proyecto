<?php
    require_once 'entities/App.class.php';
    require_once 'exceptions/AppException.class.php';
    require_once 'utils/strings.php';
    class Connection
    {
        public static function make()
        {
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
