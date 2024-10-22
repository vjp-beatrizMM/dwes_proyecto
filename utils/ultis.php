<?php
    function esOpcionMenuActiva(string $opcionMenu): bool{
        if($_SERVER['PHP_SELF']==$opcionMenu){
            return true;
        }else{
            return false;
        }
    }

    function existeOpcionMenuActivaEnArray(array $opciones) : bool{

        foreach($opciones as $opcion){
            if(esOpcionMenuActiva($opcion)){
                return true;
            }
        }
        return false;
        
    }
?>