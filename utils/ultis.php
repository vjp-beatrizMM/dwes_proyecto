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


//Función para extraer 3 partners de un array y los devuelve
function extractorPartners(array $partners): array
{
    shuffle($partners);
    return array_slice($partners, 0, 3);
}
