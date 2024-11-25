<?php
require_once "utils/ultis.php";
require_once "entities/ImagenGaleria.class.php";
require_once "entities/Partner.class.php";

//PARTE GALERÍA

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


//PARTE ASOCIADOS

//Inicializamos array vacio para almacenar los asociados
$arrayPartners = [];
$contador = 1;

// Generamos 6 partners con un bucle for
for ($i = 1; $i <= 6; $i++) {
    $asociados[] = new Partner(
        'Partner ' . $i, // Nombre dinámico
        "log" . $contador . ".jpg", // Ruta del logo dinámica
        "Descripción " . $i // Descripción dinámica
    );
    // Ajustamos el contador para las imágenes
    if ($contador >= 3) {
        $contador = 1; // Reiniciar contador después de 3
    } else {
        $contador++;
    }
}

$sociosSeleccionados = getRandomPartners($asociados);

require "views/index.views.php";
