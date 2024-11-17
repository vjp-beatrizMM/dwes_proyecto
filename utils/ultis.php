<?php
function esOpcionMenuActiva(string $opcionMenu): bool
{
    if ($_SERVER['PHP_SELF'] == $opcionMenu) {
        return true;
    } else {
        return false;
    }
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
