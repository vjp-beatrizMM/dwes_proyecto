<?php
require "utils/ultis.php";
require "entities/imagenGaleria.class.php";

// Inicializazamos un array vacío para almacenar los objetos de tipo ImagenGaleria
$imagenes = [];

// Bucle para generar 12 objetos de la clase ImagenGaleria
for ($i = 1; $i <= 12; $i++) {

    // Crear un nuevo objeto ImagenGaleria
    $imagen = new ImagenGaleria(
        $i . '.jpg',                      // Nombre de la imagen
        'descripcion imagen ' . $i,       // Descripción imagen
        rand(100, 1000),                   // Número aleatorio de visualizaciones entre 100 y 1000
        rand(50, 500),                    // Número aleatorio de descargas entre 50 y 500
        rand(10, 100)                    // Número aleatorio de likes entre 10 y 100
    );

    // Añadir el objeto al array de imágenes
    $imagenes[] = $imagen;
}

// Imprimimos el array de objetos (para probar)
// echo '<pre>';
// print_r($imagenes);
// echo '</pre>';

require "views/index.views.php";
