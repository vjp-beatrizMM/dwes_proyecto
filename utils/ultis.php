<?php
function esOpcionMenuActiva(string $opcionMenu): bool
{
    //Este método es redundante y estricto con la coincidencia de la ruta y la opción
    // if ($_SERVER['PHP_SELF'] == $opcionMenu) {
    //     return true;
    // } else {
    //     return false;
    // }

    //Busca la coincidencia dentro de la cadena, no la igualdad exacta
    return strpos($_SERVER['PHP_SELF'], $opcionMenu) !== false;
}

function existeOpcionMenuActivaEnArray(array $opciones): bool
{

    foreach ($opciones as $opcion) {

        if (esOpcionMenuActiva($opcion)) {
            return true;
        }
    }
    return false;
}


/**
 * Comprueba la cantidad de asociados en el array, si son tres o menos, los muestra
 * Si son más, los mezcla aleatoriamente y nos muestra tres
 * @param [array] $asociados
 * @return void
 */
function getRandomPartners(array $asociados, int $max = 3): array {
    //Si el array contiene tres o menso asociados, nos los devuelve
    if (count($asociados) <= $max) {
        return $asociados;
    }
    // En caso contrario, los mezcla y devuelve tres
    shuffle($asociados); // Mezcla aleatoria
    return array_slice($asociados, 0, $max); // Toma los primeros $max elementos
}
