<?php
    require_once 'entities/QueryBuilders.class.php';

    class MensajeRepositorio extends QueryBuilder{
        
        public function __construct(string $table = 'mensajes', string $classEntity = 'Message')
        {
            parent::__construct($table, $classEntity);
        }   

        //Establecemos una conexión lógica entre la tabla de la base de datos mensajes y la clase Message, que representa cada fila

    }


?>