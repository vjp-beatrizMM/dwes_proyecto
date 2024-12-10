<?php
    // require_once 'entities/QueryBuilders.class.php';
    // require_once 'entities/Categoria.class.php';
    namespace proyecto\entities;
    use proyecto\utils;
    class CategoriaRepositorio extends QueryBuilder{
        public function __construct(string $table = 'categorias', string $classEntity = 'Categoria')
        {
            parent::__construct($table, $classEntity);
        }
    }

    //Establecemos una conexión lógica entre la tabla de nuestra base de datos categorias y la clase Categoria, que representa cada fila.


?>