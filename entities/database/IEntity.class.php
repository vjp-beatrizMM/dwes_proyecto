<?php

    /**
     * Mapea todos los datos de una tabla de la base de datos
     * Las clases deben tener los mismos atraibutos que campos contenga la tabla
     */
    interface IEntity
    {
        //Declaramos un método toArray que debe ser implementado por cualquier clase que implemente esta interfaz
        // Devolverá un array cuyos índices/claves serán los atributos y su contenido serán los gets
        public function toArray(): array;
    }


    ?>