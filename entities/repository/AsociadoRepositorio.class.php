<?php
    require_once 'entities/QueryBuilders.class.php';

    class AsociadoRepositorio extends QueryBuilder{
        
        public function __construct(string $table = 'asociados', string $classEntity = 'Partner')
        {
            parent::__construct($table, $classEntity);
        }   

        //Establecemos una conexión lógica entre la tabla de la base de datos imágenes y la clase ImagenGaleria, que representa cada fila

    }


?>