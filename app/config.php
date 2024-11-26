<?php
//Devuelve un array asociativo con la configuración de la conexión a la base de datos
return [
    'database' => [
        'name' => 'proyecto', // Nombre de la base de datos
        'username' => 'user', // Usuario
        'password' => 'user', // Contraseña
        'connection' => 'mysql:host=localhost', //COnfiguración de la conexión
        'options' => [
            PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8", // Asegura que se utilice UTF-8 como codificación de caracteres
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, //Configura PDO para que lance excepciones en caso de errores de base de datos
            PDO::ATTR_PERSISTENT => true //Mantiene la conexión activa con la base de datos en lugar de abrir una nueva para cada solicitud.
        ]
    ]
];

?>